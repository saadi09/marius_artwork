<?php namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use App\Models\ActivitylogsModel;



/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('user_logs', function()
{
   
	$request = service('request');
    require_once APPPATH . 'ThirdParty/UserInfo.class.php'; 
    $url = base_url().$_SERVER['PATH_INFO'];
    $method = $request->uri->getPath();
    $ip = \UserInfo::get_ip();
    $browser = \UserInfo::get_browser();
    $os = \UserInfo::get_os();
    $device = \UserInfo::get_device();

    $controller = 'Activity_logs';
    $data = array();
    $data['user_id'] = 1;
    $data['action_controller'] = "test";
    $data['action_method'] = $method;
    $data['action_url'] =  $url;
    $data['ip'] = $ip;
    $data['browser'] = $browser;
    $data['os'] = $os;
    $data['device'] = $device;
	$action = $data['action_controller'];

	//$UserLogsModel = new ActivitylogsModel();
	//$UserLogsModel->insert($data);
	
	// if($action == "Activity_logs" || $data['action_method'] == "get_logs" || $data['action_method'] == "custom_search"){}
	// else {if(!empty($data['user_id'])){$UserLogsModel->insert($data);}}
});


Events::on('pre_system', function () {
	if (ENVIRONMENT !== 'testing')
	{
		if (ini_get('zlib.output_compression'))
		{
			throw FrameworkException::forEnabledZlibOutputCompression();
		}

		while (ob_get_level() > 0)
		{
			ob_end_flush();
		}

		ob_start(function ($buffer) {
			return $buffer;
		});
	}

	/*
	 * --------------------------------------------------------------------
	 * Debug Toolbar Listeners.
	 * --------------------------------------------------------------------
	 * If you delete, they will no longer be collected.
	 */
	if (ENVIRONMENT !== 'production')
	{
		Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
		Services::toolbar()->respond();
	}
});
