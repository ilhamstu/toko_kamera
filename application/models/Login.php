<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Model {

    public function u_login($e,$p){
        $this->db->where('email', $e);
        $this->db->where('passwd', $p);
        $q = $this->db->get('user');
        return $q;
    }

}