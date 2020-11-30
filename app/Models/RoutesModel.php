<?php 
namespace App\Models;
use CodeIgniter\Model;

class RoutesModel extends Model
{
    protected $table = 'menus_routes';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['label', 'route'];
}