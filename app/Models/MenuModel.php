<?php 
namespace App\Models;
use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menus';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['parent', 'name','class','url','display_order'];
}