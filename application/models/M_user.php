<?php
defined('BASEPATH') or die('No direct script access allowed');

class M_user extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function pelanggan_pesan_menu()
    {
        $data_pelanggan = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'no_hp' => $this->input->post('no_hp', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
        );
        if ($this->db->insert('pelanggan', $data_pelanggan) === TRUE)
        {
            $data_pemesanan = array(
                'id_pelanggan' => $this->db->insert_id(),
                'id_menu' => $this->input->post('menu', TRUE),
                'id_user' => $this->session->id_user,
                'total' => $this->input->post('jumlah', TRUE),
                'status' => 'aktif',
            );
            if ($this->db->where('id_pemesanan', $this->input->post('id_pemesanan', TRUE))->update('pemesanan', $data_pemesanan) === TRUE)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    public function pelanggan_bayar()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan', TRUE),
            'id_user' => $this->session->id_user,
            'total_bayar' => $this->input->post('total_bayar', TRUE),
            'bayar' => $this->input->post('uang_bayar', TRUE),
            'kembali' => $this->input->post('uang_bayar', TRUE)-$this->input->post('total_bayar', TRUE),
        );
        if ($this->db->insert('transaksi', $data) === TRUE)
        {
            $this->session->last_transaksi = $this->db->insert_id();
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
?>