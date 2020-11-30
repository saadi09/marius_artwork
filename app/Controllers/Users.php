<?php namespace App\Controllers;

use App\Models\UserModel;


class Users extends BaseController
{
	public function index()
	{
		$session = \Config\Services::session($config);
		if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true){
			return redirect()->to('menu_manager');
		}else{
			helper(['form']);
			return view('login');
		}
	}

	public function login(){
		$data = [];
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];
			
			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				
				$model = new UserModel();
				$user = $model->where('email', $this->request->getVar('email'))->first();
				$this->setUserSession($user);
				//return redirect()->to('menu_manager');
				return redirect()->to('dashboard');
			}
		}
		return view('login');
	}

	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['name'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register(){
		helper(['form']);
		return view('register');
	}

	public function registerUser(){
		$data = [];
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				//'lastname' => 'required|min_length[3]|max_length[20]',
				//'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				//'password' => 'required|min_length[8]|max_length[255]',
				//'password_confirm' => 'matches[password]',
			];
			//! $this->validate($rules
			if (10 > 50) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();
				$newData = [
					'name' => $this->request->getVar('firstname'),
					'email' => $this->request->getVar('email'),
					'user_type' => $this->request->getVar('user_type'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return view('login');

			}
		}
		return view('login');
	}
	
	public function forgotPassword(){
		return view('forgot_password');
	}

	public function logout(){
		$session = \Config\Services::session($config);
		session()->destroy();
		helper(['form']);
		return view('login');
	}

	//--------------------------------------------------------------------

}
