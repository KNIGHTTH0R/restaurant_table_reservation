<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function autoload()
	{
		$auto = array(
			'main_css' => $this->load->view('user/autoload/main_css', null, true),
			'sidebar' => $this->load->view('user/autoload/sidebar', null, true),
			'main_js' => $this->load->view('user/autoload/main_js', null, true),
		);
		return $auto;
	}

	public function index()
	{
		$this->load->view('user/content/login', null, false);
	}

	public function auth_login()
	{
		// RULES FORM VALIDATION
		$rules = array(
			array(
				'field' => 'username',
				'label' => 'username',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'password',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($rules);

		// ERROR MESSAGE
		$res = new StdClass();
		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() === FALSE)
		{
			$res->info = false;
			$res->message = validation_errors();
		}
		
		// LOGIN PROCESS
		$this->load->model('auth');
		$auth = $this->auth->login();

		if ($auth === FALSE)
		{
			$res->info = false;
			$res->message = 'username atau password salah';
		}
		else
		{
			$res->info = true;
			$res->message = 'redirecting to dashboard';

			$this->session->id_user = $auth['id_user'];
			$this->session->username = $auth['username'];
			$this->session->level = $auth['level'];
		}

		echo json_encode($res);
	}

	public function logout()
	{
		$this->session->id_user = null;
		$this->session->username = null;
		$this->session->level = null;

		if ($this->session->level == null)
		{
			redirect(base_url('user/index'));
		}
	}

}
