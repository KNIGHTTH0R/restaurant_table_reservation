<?php
defined('BASEPATH') or die('No direct script access allowed');

class User_view extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->id_user == null)
        {
            redirect(base_url('user/index'));
        }
        $this->load->database();
    }

    public function index()
    {
        switch ($this->session->level)
        {
            case 'administrator':
                redirect(base_url('user_view/meja'));
                break;
            case 'waiter':
                redirect(base_url('user_view/waiter'));
                break;
            case 'kasir':
                redirect(base_url('user_view/kasir'));
                break;
            case 'owner':
                redirect(base_url('user_view/owner'));
                break;
        }
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

    public function meja()
    {
        $data['meja'] = $this->db->get('meja')->result_array();
        $view = array(
            'auto' => $this->autoload(),
            'content' => $this->load->view('user/content/meja', $data, true),
            'second_js' => $this->load->view('user/js/meja.js', null, true),
        );
        $this->load->view('user/autoload/base', $view, false);
    }

    public function menu()
    {
        $data['menu'] = $this->db->get('menu')->result_array();

        if (!empty($this->input->get('edt_id_menu', TRUE)))
        {
            $data['edit_menu'] = $this->db->get_where('menu', array('id_menu'=>$this->input->get('edt_id_menu', TRUE)))
            ->result_array()[0];
        }

        $view = array(
            'auto' => $this->autoload(),
            'content' => $this->load->view('user/content/menu', $data, true),
            'second_js' => $this->load->view('user/js/menu.js', null, true),
        );
        $this->load->view('user/autoload/base', $view, false);
    }

    public function waiter()
    {
        $data['pemesanan'] = $this->db->having('status', 'pending')->get('pemesanan')->result_array();
        $data['menu'] = $this->db->get('menu')->result_array();

        $view = array(
            'auto' => $this->autoload(),
            'content' => $this->load->view('user/content/waiter', $data, true),
            'second_js' => $this->load->view('user/js/waiter.js', null, true),
        );
        $this->load->view('user/autoload/base', $view, false);
    }

    public function data_pemesanan()
    {
        $data['pemesanan'] = $this->db->having('status', 'aktif')->get('pemesanan')->result_array();
        $data['lap_pemesanan'] = $this->db->having('status', 'selesai')->get('pemesanan')->result_array();

        $view = array(
            'auto' => $this->autoload(),
            'content' => $this->load->view('user/content/pemesanan', $data, true),
            'second_js' => $this->load->view('user/js/pemesanan.js', null, true),
        );
        $this->load->view('user/autoload/base', $view, false);
    }

    public function kasir()
    {
        $data['pemesanan'] = $this->db->having('status', 'aktif')->get('pemesanan')->result_array();
        if ($this->input->get('id_pemesanan-bayar'))
        {
            $data['menu'] = $this->db->select('menu.id_menu, nama_menu, harga, total')->from('menu')
            ->join('pemesanan', 'menu.id_menu = pemesanan.id_menu')->where('pemesanan.id_pemesanan', $this->input->get('id_pemesanan-bayar', TRUE))
            ->get()->result_array()[0];
        }

        $view = array(
            'auto' => $this->autoload(),
            'content' => $this->load->view('user/content/kasir', $data, true),
            'second_js' => $this->load->view('user/js/kasir.js', null, true),
        );
        $this->load->view('user/autoload/base', $view, false);
    }

    public function data_transaksi()
    {
        $data['transaksi'] = $this->db->get('transaksi')->result_array();

        $view = array(
            'auto' => $this->autoload(),
            'content' => $this->load->view('user/content/transaksi', $data, true),
            'second_js' => $this->load->view('user/js/transaksi.js', null, true),
        );
        $this->load->view('user/autoload/base', $view, false);
    }
    
    public function owner()
    {
        $data['lap_transaksi'] = $this->db->get('transaksi')->result_array();
        $data['lap_pemesanan'] = $this->db->having('status', 'selesai')->get('pemesanan')->result_array();

        $view = array(
            'auto' => $this->autoload(),
            'content' => $this->load->view('user/content/owner', $data, true),
            'second_js' => $this->load->view('user/js/owner.js', null, true),
        );
        $this->load->view('user/autoload/base', $view, false);
    }
}
?>