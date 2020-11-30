<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MenuModel;
use App\Models\FontsModel;
use App\Models\RoutesModel;
use App\Models\GroupsModel;
use App\Models\GroupPermissionModel;
use App\Models\ArtWroksModel;
use App\Models\ArtWroksImagesModel;

class ArtWorks extends BaseController
{
	protected $menus = [];
	public function __construct(){
		$session = \Config\Services::session($config);
        
        $this->db = db_connect();

		$MenusModel = new MenuModel();
        $data = $MenusModel->orderBy('id', 'ASC')
        ->where('parent',0)
        ->findAll();
        
        $mdata = [];
        foreach($data as $row){
            $builder = $this->db->table('menus')
            ->join('user_permission', 'user_permission.sub_menu_id = menus.id', 'left')
            ->where('parent',$row['id'])
            ->where('permission','YES');
            $rs = $builder->get()->getResult('array');
            
        	if(isset($rs)){
        	   $submenu['sub_menu'] = $rs;
        	}else{
        		$submenu['sub_menu'] = [];
        	}
        	array_push($mdata,array_merge($row,$submenu));
        }
        $this->menus = $mdata;
	}


	public function index(){
		$data['menus'] =  $this->menus;
		return view('art_works/index',$data);
	}

	public function ajaxLoadData()
    {
        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        $search_value = $_REQUEST['search']['value'];

        if(!empty($search_value)){
            $total_count = $this->db->query("SELECT * from oa_art_works join users on users.id = oa_art_works.author_id join oa_art_work_types on oa_art_work_types.id  = oa_art_works.type_id  WHERE id like '%".$search_value."%' OR title like '%".$search_value."%' OR description like '%".$search_value."%' OR users.name like '%".$search_value."%'")->getResult();
            $data = $this->db->query("SELECT * from oa_art_works users join on users.id = oa_art_works.author_id join oa_art_work_types on oa_art_work_types.id  = oa_art_works.type_id WHERE id like '%".$search_value."%' OR title like '%".$search_value."%' OR description like '%".$search_value."%' OR users.name like '%".$search_value."%' limit $start, $length")->getResult();
        }else{
            $total_count = $this->db->query("SELECT * from oa_art_works join users on users.id = oa_art_works.author_id join oa_art_work_types on oa_art_work_types.id  = oa_art_works.type_id")->getResult();
            $data = $this->db->query("SELECT * from oa_art_works join users on users.id = oa_art_works.author_id join oa_art_work_types on oa_art_work_types.id  = oa_art_works.type_id limit $start, $length")->getResult();
        }
        
        $data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );


        $json_data = [];
        foreach ($data['data'] as $row) {
        	$view = site_url("view_art_work")."/".$row->id_artwork;
        	$action = [
        		'action' => '
        		<a href="'.$view.'" class="btn  btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
        		<a href="#" onclick="test('.$row->id_artwork.');"  class="btn  btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>'
        	];

            $var = $row->status;
            switch ($var) {
              case "Pending":
                $color = "block";
                break;
              case "Approved":
                $color = "green";
                break;
              case "Disapproved":
                $color = "blue";
                break;
              case "Cancelled":
                $color = "red";
                break;
              case "Deleted":
                $color = "red";
                break;    
              default:
                $color = "block";
            }

            $status = [
                'status' => '<span style="color:'.$color.';font-weight:bold;">'.$row->status.'</span>'
            ];

        	settype($action, "object");
            settype($status, "object");
        	$obj_merged = (object) array_merge((array) $row, (array) $action,(array) $status);
        	$json_data[] = $obj_merged;
       	
        }

        $data['data'] = $json_data;
        echo json_encode($data);

    }

	public function create(){
		$builder = $this->db->table('oa_art_work_types');
        $data['type'] = $builder->get()->getResult();
		$data['menus'] =  $this->menus;
		return view('art_works/create',$data);
	}

	public function store(){

		$ArtWroksModel = new ArtWroksModel();
        $data = [
            'title' => $this->request->getVar('title'),
            'description'  => $this->request->getVar('description'),
            'type_id'  => $this->request->getVar('art_types'),
            'author_id'  => 1,//$_SESSION['id'],
            'price'  => $this->request->getVar('price'),
        ];
        $last_id =  $ArtWroksModel->insert($data);

        $images = [];
	    if($imagefile = $this->request->getFiles())
		{
		   foreach($imagefile['fileUpload'] as $img)
		   {
		      if ($img->isValid() && ! $img->hasMoved())
		      {
		        $newName = $img->getRandomName();
		        $img->move(WRITEPATH.'uploads', $newName);
		        //$img->getClientExtension();
		        //$type = $img->getClientMimeType();
		        $images[] = [
		        	'art_work_id' => $last_id,
		        	'image' => $newName,
		        ];

		      }
		   }
		}
		
		$ArtWroksImagesModel = new ArtWroksImagesModel();
		$ArtWroksImagesModel->insertBatch($images);
		
		return json_encode("Success");

	}

	public function show($id=null){

		$builder = $this->db->table('oa_art_works')
        ->join('oa_art_work_types', 'oa_art_work_types.id = oa_art_works.type_id')
        ->join('users', 'users.id = oa_art_works.author_id')
        ->where('oa_art_works.id_artwork',$id);
        $data['data'] = $builder->get()->getResult();
        
        $ArtWroksImagesModel = new ArtWroksImagesModel();
        $data['images'] = $ArtWroksImagesModel->where('art_work_id',$id)->findAll();

		$data['menus'] =  $this->menus;
		return view('art_works/view',$data);	
	}


    public function update(){
        $ArtWroksModel = new ArtWroksModel();
        $data = [
            'status' => $this->request->getVar('status'),
            //'description'  => $this->request->getVar('description'),
            //'type_id'  => $this->request->getVar('art_types'),
            //'author_id'  => 1,//$_SESSION['id'],
            //'price'  => $this->request->getVar('price'),
        ];
        
        $id = $this->request->getVar('id');
        $ArtWroksModel->update($id,$data);
        require_once APPPATH . 'ThirdParty/phpmailer.class.php';
        $user_email = $this->request->getVar('email');
        $title = $this->request->getVar('title');
        $user_name = $this->request->getVar('user_name');
        ///$body =  view('art_works/email_template', $user, true);
        \emailSender::sendmail($user_email,$user_name,$title);
        echo json_encode("Success");

    }



}
