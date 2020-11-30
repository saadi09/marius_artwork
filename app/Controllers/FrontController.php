<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MenuModel;
use App\Models\FontsModel;
use App\Models\RoutesModel;
use App\Models\GroupsModel;
use App\Models\GroupPermissionModel;
use App\Models\ArtWroksModel;
use App\Models\ArtWroksImagesModel;

class FrontController extends BaseController
{
	public function index(){
        
        echo view("front_end/layout/header");
        echo view("front_end/layout/slider_area");
        echo view("front_end/main/index");
        echo view("front_end/layout/footer");

    }
}
