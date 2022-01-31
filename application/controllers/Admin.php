<?php

class Admin extends CI_Controller{

    function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('nama'))){
			redirect('welcome/login');
		}
        if (($this->session->userdata('level')) != 'admin') {
            redirect('pelanggan');
        }
	}
    
    public function index(){
        $data['la'] = 'active';
        $data['lb'] = '';
        $data['lc'] = '';
        $data['ld'] = '';
        $data['le'] = '';
        $data['lf'] = '';
        $data['lg'] = '';
        $this->template->load('admin/layout','admin/dashboard',$data);
    }

    public function data_kamera(){
        $data['la'] = '';
        $data['lb'] = 'active';
        $data['lc'] = '';
        $data['ld'] = '';
        $data['le'] = '';
        $data['lf'] = '';
        $data['lg'] = '';
        $data['kmr'] = $this->Mcrud->get('kamera')->result();
        $this->template->load('admin/layout','admin/data_kamera',$data);
    }

    public function tambah_kamera(){
        $nama = $this->input->post('nm_km');
        $tipe = $this->input->post('tipe');
        $stok = $this->input->post('stok');
        $hrg = $this->input->post('harga');
        $foto =$_FILES['foto'];
        $dcek = array('nama_kamera' => $nama);
        $cek = $this->Mcrud->get_where('kamera',$dcek);

        if ($cek->row_object() == 1) {
            $this->session->set_flashdata('alert','
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Oopss!</strong>  Data sudah ada.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ');
            redirect('admin/data_kamera');
        }else {
            if ($_FILES['foto']['name'] == null) {
                $foto = '';
            }else {
                $config['upload_path'] = './img';
                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['remove_spaces'] = 'TRUE';
                $config['detect_mime'] = 'TRUE';

                $this->load->library('upload',$config);
                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('alert','
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Oopss!</strong> Proses upload gagal.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
                }else {
                        $foto = $this->upload->data('file_name');
                }
            }
            $datainsert = array(
                'nama_kamera' => $nama,
                'tipe' => $tipe,
                'stok' => $stok,
                'harga' => $hrg,
                'gambar' => $foto
            );
            
            $this->session->set_flashdata('alert','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yeay!</strong> Data berhasil ditambah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ');
            $this->Mcrud->insert('kamera', $datainsert);
            redirect('admin/data_kamera');
        }
    }

    public function edit_kamera(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nm_km');
        $tipe = $this->input->post('tipe');
        $stok = $this->input->post('stok');
        $hrg = $this->input->post('harga');
        $foto = $_FILES['foto'];
        
        if($_FILES['foto']['name'] == null) {
            $datainsert = array(
                    'nama_kamera' => $nama,
                    'tipe' => $tipe,
                    'stok' => $stok,
                    'harga' => $hrg
                );
        } else {
            $config['upload_path'] = './img';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size'] = '2048';
            $config['remove_spaces'] = 'TRUE';
            $config['detect_mime'] = 'TRUE';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('alert','
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Oopss!</strong> Proses upload gagal.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ');
            }else {
                $foto = $this->upload->data('file_name');
                $datainsert = array(
                    'nama_kamera' => $nama,
                    'tipe' => $tipe,
                    'stok' => $stok,
                    'harga' => $hrg,
                    'gambar' => $foto
                );
            }
        }
        $this->Mcrud->update('kamera',$datainsert,'kamera_id',$id);
        $this->session->set_flashdata('alert','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yeay!</strong> Data berhasil diubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ');
        redirect('admin/data_kamera');
    }

    public function hapus(){
        $id = $this->input->post('id');
        $this->Mcrud->delete('kamera','kamera_id',$id);
        $error = $this->db->error();
        if ($error['code'] != 0 ) {
			$this->session->set_flashdata('alert','
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Oopss!</strong> Data gagal dihapus.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            ');
		}else{
			$this->session->set_flashdata('alert','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Yeay!</strong> Data berhasil dihapus.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            ');
		}
		redirect('admin/data_kamera');
    }
    
    public function data_user(){
        $data['la'] = '';
        $data['lb'] = '';
        $data['lc'] = 'active';
        $data['ld'] = '';
        $data['le'] = '';
        $data['lf'] = '';
        $data['lg'] = '';
        $data['usr'] = $this->Mcrud->get('user')->result();
        $this->template->load('admin/layout','admin/data_user',$data);
    }

    public function tambah_user(){
        $user = $this->input->post('nm_us');
        $email = $this->input->post('email');
        $almt = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $lvl = $this->input->post('lvl');
        $pass = $this->input->post('pass');

        $datainsert = array(
            'nama' => $user,
            'email' => $email,
            'passwd' => $pass,
            'alamat' => $almt,
            'no_telp' => $telp,
            'level' => $lvl
        );

        $this->Mcrud->insert('user',$datainsert);
        $this->session->set_flashdata('alert','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Yeay!</strong> User berhasil ditambah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            ');
        redirect('admin/data_user');
    }

    public function POS(){
        $data['la'] = '';
        $data['lb'] = '';
        $data['lc'] = '';
        $data['ld'] = 'active';
        $data['le'] = '';
        $data['lf'] = '';
        $data['lg'] = '';
        $w = $this->input->post('cari');
        if ($w) {
            $data['ds'] = $this->Mcrud->join_like('disewa s','kamera k','user u','k.kamera_id=s.kamera_id','u.user_id=s.user_id',$w)->result();
        } else {
            $data['ds'] = $this->Mcrud->join3_w('disewa s','kamera k','user u','k.kamera_id=s.kamera_id','u.user_id=s.user_id')->result();
        }
        $this->template->load('admin/layout','admin/pos',$data);
    }

    public function del_book($id){
        $this->Mcrud->delete('disewa','disewa_id',$id);
        redirect('admin/pos');
    }

    public function xlunas($id){
        $datainsert = array(
            'sewa_id' => $id,
            'stat_trx' => 'belum bayar'
        );
        $this->Mcrud->insert('transaksi',$datainsert);
        $dataupdate = array(
            'status' => 'sewa'
        );
        $this->Mcrud->update('disewa',$dataupdate,'disewa_id',$id);
        redirect('admin/pos');
    }

    public function ylunas($id){
        $data = array(
            'sewa_id' => $id,
            'stat_trx' => 'lunas'
        );
        $this->Mcrud->insert('transaksi',$data);
         $dataupdate = array(
            'status' => 'sewa'
        );
        $this->Mcrud->update('disewa',$dataupdate,'disewa_id',$id);
        redirect('admin/pos');
    }

    public function laporan_sewa(){
        $data['la'] = '';
        $data['lb'] = '';
        $data['lc'] = '';
        $data['ld'] = '';
        $data['le'] = 'active';
        $data['lf'] = '';
        $data['lg'] = 'menu-is-opening menu-open active';
        $data['ds'] = $this->Mcrud->join3('disewa s','kamera k','user u','k.kamera_id=s.kamera_id','u.user_id=s.user_id')->result();
        $this->template->load('admin/layout','admin/laporan_sewa',$data);
    }

    public function dikembalikan($id){
        $dataupdate = array(
            'status' => 'selesai'
        );
        $this->Mcrud->update('disewa',$dataupdate,'disewa_id',$id);
        redirect('admin/laporan_sewa');
    }

    public function laporan_trx(){
        $data['la'] = '';
        $data['lb'] = '';
        $data['lc'] = '';
        $data['ld'] = '';
        $data['le'] = '';
        $data['lf'] = 'active';
        $data['lg'] = 'menu-is-opening menu-open active';
        $data['dt'] = $this->Mcrud->join3('transaksi t','disewa s','user u','s.disewa_id=t.sewa_id','u.user_id=s.user_id')->result();
        $this->template->load('admin/layout','admin/laporan_trx',$data);
    }
}