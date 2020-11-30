<?php 
namespace App\Models;
use CodeIgniter\Model;

class ArtWroksImagesModel extends Model
{
    protected $table = 'oa_art_work_images';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['art_work_id','image'];
}