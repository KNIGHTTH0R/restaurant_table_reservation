<?php
defined('BASEPATH') or die('No direct script access allowed');

class Auth extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login()
    {
        $condition = array(
            'username' => $this->input->post('username'),
            'password' => hash('sha256',$this->input->post('password'))
        );
        $res = $this->db->get_where('user', $condition);
        
        if ($res->result_id->num_rows == 0)
        {
            return FALSE;
        }
        return $res->result_array()[0];
    }
}
?>