<?php 
namespace App\Models;
use CodeIgniter\Model;

class ActivitylogsModel extends Model
{
    protected $table = 'activity_logs';

    protected $primaryKey = 'log_id';
    
    protected $allowedFields = ['user_id','user_ip','user_browser','user_os','user_device','login_at','logout_at'];
}