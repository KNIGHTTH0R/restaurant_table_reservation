<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function autoload()
	{
		$auto = array(
			'main_css' => $this->load->view('client/autoload/main_css', null, true),
			'navbar' => $this->load->view('client/autoload/navbar', null, true),
			'footer' => $this->load->view('client/autoload/footer', null, true),
			'main_js' => $this->load->view('client/autoload/main_js', null, true),
		);
		return $auto;
	}

	public function index()
	{
		$view = array(
			'auto' => $this->autoload(),
			'content' => $this->load->view('client/content/home', null, true),
		);
		$this->load->view('client/autoload/base', $view, false);
	}

	public function pesan()
	{
		$data['meja'] = $this->db->get('meja')->result_array();
		$view = array(
			'auto' => $this->autoload(),
			'content' => $this->load->view('client/content/pesan', $data, true),
			'css_nd' => $this->load->view('client/css/pesan.css', $data, true),
			'js_nd' => $this->load->view('client/js/pesan.js', $data, true),
		);
		$this->load->view('client/autoload/base', $view, false);
	}

	public function new_pesanan()
	{
		$rules = array(
            array(
                'field' => 'kode_meja',
                'label' => 'Kode Meja',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($rules);
        
        $res = new stdClass();
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() === FALSE)
        {
            $res->info = false;
            $res->message = validation_errors();
        }
        else
        {
			$data =  array(
				'kode_meja' => $this->input->post('kode_meja'),
				'status' => 'pending'
			);
			if ($this->db->insert('pemesanan',$data) === TRUE &&
			$this->db->where('kode_meja',$this->input->post('kode_meja', TRUE))->update('meja', array('status'=>'terpakai')) === TRUE)
            {
                $res->info = true;
                $res->message = 'Silahkan Tunggu, Waiter akan menuju meja anda';
            }
            else
            {
                $res->info = false;
                $res->message = 'Maaf, Terjadi kesalahan saat memesan meja';
            }
        }

        echo json_encode($res);
	}
}
