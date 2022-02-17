<?php

class Pelanggan extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('nama'))){
			redirect('welcome/login');
		}
    }
// untuk index admin
    public function index(){
        $data['kmr'] = $this->Mcrud->get_limit('kamera')->result();
        $this->template->load('user/layout','user/main',$data);
    }

    public function tambah_sewa(){
        $id_kam = $this->input->post('id_kam');
        $hrg = $this->input->post('hrg');
        $d1 = $this->input->post('tgl_pjm');
        $d2 = $this->input->post('tgl_kmbl');
        $y = new Datetime($d1);
        $z = new DateTime($d2);
        $x = $z->diff($y)->days;
        $jml = $this->input->post('jumlah');
        $harga = $jml*$hrg;
        if ($x >= 7) {
            $i = $x*$harga*0.1;
            $ttl = $x*$harga-$i;
        }else {
            $ttl = $x*$harga;
        }
        
        $di = array(
            'kamera_id' => $id_kam,
            'user_id' =>$this->session->userdata('id'),
            'tgl_sewa' => $d1,
            'tgl_kembali' => $d2,
            'jumlah' => $jml,
            'total_harga_sewa' => $ttl,
            'status' => 'booked'
        );
        $this->Mcrud->insert('disewa',$di);
        redirect('pelanggan');

    }
}