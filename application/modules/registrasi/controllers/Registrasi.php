<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
		$this->_public_view= $this->config->item('public_view');
		$this->load->model('Model_lib');
	}

	public function index()
	{
		$data=array('page_content' => 'registrasi');
		$this->load->view($this->_public_view,$data);
	}
	/*public function index()
	{
		$this->load->view('beranda');
	}*/
	function form()
    {
	    echo '<script type="text/javascript" src="'. base_url().'asset/ajax/tanggal.js"></script>';

	    echo '<form id="form1" class="form-horizontal">';
	       echo '<div class="panel panel-default">
	                               <div class="panel-body">';
	                                         echo '<div class="row">
	                                                         <div class="col-md-12">
	                                                            <div class="form-group">
	                                                                     <label for="inputEmail" class="control-label col-sm-4">Nomor Pokok Mahasiswa (NPM)</label>
	                                                                     <div class="col-sm-4">
	                                                                           <input type="text" class="form-control input-sm" value="" id="npm" name="npm" maxlength="16" onkeypress="return checkIt(event);">
	                                                                    </div>
	                                                              </div>
	                                                         </div>';
	                                         echo '</div>';
	                                         echo '<div class="row">
	                                                         <div class="col-md-12">
	                                                            <div class="form-group">
	                                                                     <label for="inputEmail" class="control-label col-sm-4">Nama Mahasiswa</label>
	                                                                     <div class="col-sm-4">
	                                                                           <input type="text" class="form-control input-sm" value="" id="nama" name="nama" maxlength="50">
	                                                                    </div>
	                                                              </div>
	                                                         </div>';
	                                         echo '</div>';
	                                         echo '<div class="row">
	                                                         <div class="col-md-12">
	                                                            <div class="form-group">
	                                                                     <label for="inputEmail" class="control-label col-sm-4">alamat</label>
	                                                                     <div class="col-sm-2">
	                                                                           <input type="text" class="form-control input-sm" id="alamat" name="alamat" value="">
	                                                                     </div>
	                                                              </div>
	                                                         </div>';
	                                         echo '</div>';
	                                         echo '<div class="row">
	                                                         <div class="col-md-12">
	                                                            <div class="form-group">
	                                                                     <label for="inputEmail" class="control-label col-sm-4">Telepon</label>
	                                                                     <div class="col-sm-2">
	                                                                           <input type="text" class="form-control input-sm" id="telp" name="telp" value="" maxlength="18" onkeypress="return checkIt(event);">
	                                                                     </div>
	                                                              </div>
	                                                         </div>';
	                                         echo '</div>';
	                                         echo '<div class="row">
	                                                         <div class="col-md-12">
	                                                            <div class="form-group">
	                                                                     <label for="inputEmail" class="control-label col-sm-4">Email</label>
	                                                                     <div class="col-sm-3">
	                                                                           <input type="text" class="form-control input-sm" id="email" name="email">
	                                                                     </div>
	                                                              </div>
	                                                         </div>';
	                                         echo '</div>';
	                                          echo '<div class="row">
	                                                         <div class="col-md-12">
	                                                            <div class="form-group">
	                                                                     <label for="inputEmail" class="control-label col-sm-4">Tanggal lahir</label>
	                                                                     <div class="col-sm-2">
	                                                                           <input type="text" class="form-control input-sm" id="datepicker" name="tanggal_lahir" value="">
	                                                                     </div>
	                                                                     <div class="col-sm-4" style="padding-top:12px !important">
	                                                                      <i><code>Silahkan klik untuk mengisi tanggal lahir</code></i>
	                                                                     </div>
	                                                              </div>
	                                                         </div>';
	                                         echo '</div>';
	                                         echo '<div class="row">
	                                                         <div class="col-md-12">
	                                                            <div class="form-group">
	                                                                     <label for="inputEmail" class="control-label col-sm-4">Jenis kelamin</label>
	                                                                     <div class="col-sm-4">
	                                                                          <select class="form-control input-sm" id="jenis_kelamin" name="jenis_kelamin">
	                                                                          <option value="" selected>Pilih</option><option value="1">Laki-laki</option><option value="1">Perempuan</option>';

	                                                                          echo '</select>
	                                                                     </div>
	                                                              </div>
	                                                         </div>';
	                                         echo '</div>';
	                                         echo '<button type="button" class="btn btn-primary simpan">SIMPAN</button>';
	                    echo '</div>';
	                 echo '</div>';
	             echo '</form>';
   }

   function proses_simpan()
   {
                $data["npm"] = stripslashes($this->db->escape_str($this->input->post("npm")));
                $data["nama"] = stripslashes($this->db->escape_str($this->input->post("nama")));
                $data["alamat"] = stripslashes($this->db->escape_str($this->input->post("alamat")));
                $data["telp"] = $this->db->escape_str($this->input->post("telp"));
                $data["email"] = $this->db->escape_str($this->input->post("email"));
                $tanggal_lahir = $this->input->post("tanggal_lahir");
                $data["jenis_kelamin"] = $this->db->escape_str($this->input->post("jenis_kelamin"));

                        if(empty($data['npm']))
                            {
                                $err="Mohon isi nomor pokok mahasiswa";
                                $klas="#npm";
                                $param="";
                            }
                            else if(empty($data['nama']))
                            {
                                $err="Mohon isi nama peserta sesuai dengan ijazah";
                                $klas="#nama_siswa";
                                $param="";
                            }

                            else if(empty($data['alamat']))
                            {
                                $err="Mohon isi alamat tetap";
                                $klas="#alamat_siswa";
                                $param="";
                            }

                             else if(empty($data['telp']))
                            {
                                $err="Mohon isi telepon siswa";
                                $klas="#telp_siswa";
                                $param="";
                            }
                             else if(empty($data['email']))
                            {
                                $err="Mohon isi alamat email siswa";
                                $klas="#email";
                                $param="";
                            }
                            else  if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                                $err="Email yang anda masukkan tidak valid";
                                $klas="#email";
                                $param="";
                            }

                            else if(empty($tanggal_lahir))
                            {
                                $err="Mohon isi tanggal lahir siswa";
                                $klas="#tanggal_lahir";
                                $param="";
                            }
                            else if(empty($data['jenis_kelamin']))
                            {
                                $err="Mohon pilih status jenis kelamin";
                                $klas="#jenis_kelamin";
                                $param="";
                            }

                            else
                            {
                                $tabel = "mahasiswa";
                                $data['tanggal_lahir'] = $this->tglinsertdata($tanggal_lahir);
                                $result = $this->Model_lib->insert($tabel,$data);
                                $err="s";
                                $klas="";

                           }
           $arr = array('err'=>$err,'klas'=>$klas);
           echo json_encode($arr);
   }
	function tglinsertdata($tgl) {
		$tglex = explode("/", $tgl);
		$tgl = $tglex[2] . "-" . $tglex[1] . "-" . $tglex[0];
		return $tgl;
	}
}
