<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
        $data['kmr'] = $this->Mcrud->get_limit('kamera')->result();
        $this->template->load('layout','main',$data);
    }

	public function login(){
		$this->load->view('login');
	}

	public function cek_login(){
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		$data = $this->Login->u_login($email,$pass);
		$show = $data->row();

		if(empty($data->num_rows())){
			$this->session->set_flashdata('f','Email / Password salah');
			redirect('welcome/login');
		}else{
			$user = array(
				'nama' => $show->nama,
				'email' => $show->email,
				'level' => $show->level,
				'id' => $show->user_id,
				'status' => 'logged in'
			);
			$this->session->set_userdata($user);
			if ($this->session->userdata('level') == 'admin') {
				redirect('admin');
			}else{
				redirect('pelanggan');
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}