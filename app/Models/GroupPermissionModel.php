<?php 
namespace App\Models;
use CodeIgniter\Model;

class GroupPermissionModel extends Model
{
    protected $table = 'user_permission';

    protected $primaryKey = 'per_id ';
    
    protected $allowedFields = ['group_id', 'main_menu_id','permission','sub_menu_id','added_by'];
}