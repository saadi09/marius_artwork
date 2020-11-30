<?php 
namespace App\Models;
use CodeIgniter\Model;

class ArtWroksModel extends Model
{
    protected $table = 'oa_art_works';

    protected $primaryKey = 'id_artwork';
    
    protected $allowedFields = ['title','description','price','type_id','author_id','status'];

}