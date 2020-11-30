<?php 
namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\FontsModel;
use App\Models\RoutesModel;
use App\Models\GroupsModel;
use App\Models\GroupPermissionModel;

class Home extends BaseController
{
	
	protected $menus = [];
	public function __construct(){
        require_once APPPATH . 'ThirdParty/ssp.class.php';
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

	public function index()
	{
		$session = \Config\Services::session($config);
        if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true){
            //return redirect()->to('menu_manager');
            $data['menus'] =  $this->menus;
            return view('home',$data);
        }else{
            helper(['form']);
            return view('login');
        }


	}


	public function menuManger(){
        $session = \Config\Services::session($config);
		$MenusModel = new MenuModel();
        $data['data'] = $MenusModel->orderBy('id', 'ASC')->findAll();
		$data['menus'] =  $this->menus;
		return view('menus/index',$data);
	}

	public function menuCreate(){

		$MenusModel = new MenuModel();
        $data['parents'] = $MenusModel->orderBy('id', 'ASC')->where('parent',0)->findAll();
        
        $FontsModel = new FontsModel();
        $data['fonts'] = $FontsModel->orderBy('id', 'ASC')->findAll();

        $RoutesModel = new RoutesModel();
        $data['routes'] = $RoutesModel->orderBy('id', 'ASC')->findAll();

        $data['menus'] =  $this->menus;
		return view('menus/create',$data);

	}

	public function menuStore(){
		$MenuModel = new MenuModel();
        $data = [
            'parent' => $this->request->getVar('parent'),
            'name'  => $this->request->getVar('name'),
            'class'  => $this->request->getVar('class'),
            'url'  => $this->request->getVar('url'),
            'display_order'  => $this->request->getVar('order'),
        ];
        $MenuModel->insert($data);
        echo "Success";
       
	}

    public function menuEdit($id){

        $MenusModel = new MenuModel();
        $data['parents'] = $MenusModel->orderBy('id', 'ASC')->findAll();
        
        $FontsModel = new FontsModel();
        $data['fonts'] = $FontsModel->orderBy('id', 'ASC')->findAll();

        $RoutesModel = new RoutesModel();
        $data['routes'] = $RoutesModel->orderBy('id', 'ASC')->findAll();

        $data['data'] = $MenusModel->orderBy('id', 'ASC')->where('id',$id)->first();
        $data['menus'] =  $this->menus;
        return view('menus/edit',$data);

    }

    public function menuUpdate(){
        $MenuModel = new MenuModel();
        $data = [
            'parent' => $this->request->getVar('parent'),
            'name'  => $this->request->getVar('name'),
            'class'  => $this->request->getVar('class'),
            'url'  => $this->request->getVar('url'),
            'display_order'  => $this->request->getVar('order'),
        ];
        $id = $this->request->getVar('id');
        $MenuModel->update($id,$data);
        echo "Success";
        //return $this->response->redirect(site_url('/menu_create'));
    }

    //Delete Menu Routes here
    public function menuDelete(){
        $id = $this->request->getVar('id');
        $MenuModel = new MenuModel();
        $data['menus'] = $MenuModel->where('id', $id)->delete($id);
        return "Success";
    }    

    //Menu Routes item listing here
    public function listMenuRoutes(){

        $RoutesModel = new RoutesModel();
        $data['routes'] = $RoutesModel->orderBy('id', 'ASC')->findAll();
        $data['menus'] =  $this->menus;
        return view('menus/menu_route_list',$data);   
    }

    //Create Menu Routes here 
    public function menuRoutes()
    {
        $data['menus'] =  $this->menus;
        return view('menus/create_menu_route',$data);
    }

    //Create Menu Routes Edit here 
    public function menuRoutesEdit($id=null)
    {
        $RoutesModel = new RoutesModel();
        $data['routes'] = $RoutesModel->orderBy('id', 'ASC')->where('id',$id)->first();
        $data['menus'] =  $this->menus;
        return view('menus/edit_menu_route',$data);
    }

    //Store Menu Routes here
    public function menuRouteStore(){
        $RoutesModel = new RoutesModel();
        $data = [
            'label'  => $this->request->getVar('name'),
            'route'  => $this->request->getVar('route'),
        ];
        $RoutesModel->insert($data);
        echo "Success";
        //return $this->response->redirect(site_url('/menu_create'));
    }

    //Update Menu Routes here
    public function menuRouteUpdate(){
        $RoutesModel = new RoutesModel();
        $data = [
            'label'  => $this->request->getVar('name'),
            'route'  => $this->request->getVar('route'),
        ];
        $id = $this->request->getVar('id');
        $RoutesModel->update($id,$data);
        echo "Success";
    }

    //Delete Menu Routes here
    public function deleteMenuRoutes(){
        $id = $this->request->getVar('id');
        $RoutesModel = new RoutesModel();
        $data['routes'] = $RoutesModel->where('id', $id)->delete($id);
        return "Success";
    }    


    // Groups and Permissions -------------------------------------------
    public function add_groups(){
        $data['menus'] =  $this->menus;
        return view('menus/add_groups',$data);
    }

    public function storeGroups(){
        $GroupsModel = new GroupsModel();
        $data = [
            'type'  => $this->request->getVar('name'),
        ];
        $GroupsModel->insert($data);
        echo "Success";   
    }

    public function groupsPermission(){

        $data['menus'] =  $this->menus;
        $GroupsModel = new GroupsModel();
        $data['data'] = $GroupsModel->orderBy('id', 'ASC')->findAll();
        return view('menus/groups_permission',$data);   
    }

    public function userGroupsPermission($id=null){
        $data['menus'] =  $this->menus;
        $data['group_id'] =  $id;
        $MenusModel = new MenuModel();
        $data['parents'] = $MenusModel->orderBy('id', 'ASC')->where('parent',0)->findAll();
        return view('menus/users_groups_permission',$data);   
    }
    public function getChildMenu(){
        
        $id = $this->request->getVar('id');
        $group_id = $this->request->getVar('group_id');
        
        $builder = $this->db->table('menus')
        ->join('user_permission', 'user_permission.sub_menu_id = menus.id', 'left')
        ->where('parent',$id);

        $query = $builder->get();
        $html = "";
        foreach ($query->getResult() as $row)
        {
            $y = $row->permission === "YES" ? "selected" : "y";
            $n = $row->permission === "NO" ? "selected" : "n";

            $html .= '<tr>';
            $html .= '<td>'.$row->id.'</td>';
            $html .= '<td>'.$row->name.'</td>';
            $html .= '<td>';
            $html .= '<select class="form-control" style="width: 100%;" name="permission[]">';
            $html .= '<option value="YES" '.$y.' >YES</option>';
            $html .= '<option value="NO" '.$n.'>NO</option>';
            $html .= '</select>';
            $html .= '</td>';
            $html .= '<td style="display:none;">';
            $html .= '<input type="hidden" name="sub_menu_id[]" value="'.$row->id.'">';
            $html .= '<input type="hidden" name="parent_id[]" value="'.$row->parent.'">';
            $html .= '</td>';
            $html .= '</tr>'; 
            
        }
        //added last row for buttons
        $html .= '<tr>';
        $html .= '<td colspan="6" align="center">';
        $html .= '<button type="submit" class="btn btn-primary">UPDATE</button>';
        $html .= '<button type="button" onclick="validate(this)" value="17" class="btn btn-danger">DENIED</button>';
        $html .= '<input type="hidden" name="group_id" value="2">';
        $html .= '</td>';
        $html .= '</tr>';  
        return $html;
    }

    public function storePermission(){
       $data =  $this->request->getVar();
       $permission = $data['permission'];
       $sub_menu_id = $data['sub_menu_id'];
       $parent_id = $data['parent_id'];
       $group_id = $this->request->getVar('group_id'); 
       $mdata=[];
       foreach($permission as $index=>$value){
           $mdata[] = [
            'group_id' => $group_id,
            'main_menu_id' => $parent_id[$index],
            'permission' => $permission[$index],
            'sub_menu_id' => $sub_menu_id[$index],
            'added_by' => 'aq',
           ];
        }
        
        $GroupPermissionModel = new GroupPermissionModel();
        $GroupPermissionModel->where('main_menu_id', $parent_id[0])
        ->where('group_id',$group_id)
        ->delete();
        $GroupPermissionModel->insertBatch($mdata);
        echo json_encode("Success");           
    }

    public function activityLogs(){
        $data['data'] = [];
        $data['menus'] =  $this->menus;
        return view('activity_logs/index',$data);   
    }

    public function list_data_using_ssp_ajax()
    {
        // this is database details
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "activity_logs";

        //primary key
        $primaryKey = "log_id";

        $columns = array(
            array(
                "db" => "user_id",
                "dt" => 0,
            ),
            array(
                "db" => "action_controller",
                "dt" => 1,
            ),
            array(
                "db" => "action_method",
                "dt" => 2,
            ),
            array(
                "db" => "date_time",
                "dt" => 3,
            ),
            array(
                "db" => "action",
                "dt" => 4,
                "formatter" => function ($value, $row) {
                    return '<a href="#" class="btn  btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>';
                },
            ),
            
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function ajaxLoadData()
    {
        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        /* If we pass any extra data in request from ajax */
        //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

        /* Value we will get from typing in search */
        $search_value = $_REQUEST['search']['value'];

        if(!empty($search_value)){
            // If we have value in search, searching by id, name, email, mobile

            // count all data
            $total_count = $this->db->query("SELECT * from activity_logs WHERE id like '%".$search_value."%' OR action_controller like '%".$search_value."%' OR action_method like '%".$search_value."%' OR action_url like '%".$search_value."%'")->getResult();

            $data = $this->db->query("SELECT * from activity_logs WHERE id like '%".$search_value."%' OR action_controller like '%".$search_value."%' OR action_method like '%".$search_value."%' OR action_url like '%".$search_value."%' limit $start, $length")->getResult();
        }else{
            // count all data
            $total_count = $this->db->query("SELECT * from activity_logs")->getResult();

            // get per page data
            $data = $this->db->query("SELECT * from activity_logs limit $start, $length")->getResult();
        }
        
        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );
        echo json_encode($json_data);
    }

}
