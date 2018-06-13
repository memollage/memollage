<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {

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
		$this->load->view('signup');
	}

     public function cekEmail($value)
     {

     }

	function proses_simpan()
     {
		$data["email"] = $this->db->escape_str($this->input->post("email"));
		$data["nama"] = stripslashes($this->db->escape_str($this->input->post("nama")));
		$data["password"] = stripslashes($this->db->escape_str($this->input->post("password")));
		$login = stripslashes($this->db->escape_str($this->input->post("login")));

  		if(empty($data['email']))
	    	{
		    $err="Mohon isi alamat email";
	    	    $klas="#email";
	    	    $param="";
	    	}
	    	 else if(empty($data['nama']))
	    	{

		    $err="Mohon isi nama";
		    $klas="#nama";
		    $param="";
	    	}
	    	else if(empty($login))
	    	{

		    $err="Mohon pilih sebagai apa anda mendaftar";
		    $klas="#nama";
		    $param="";
	    	}
	    	else  if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
	    	    $err="Email yang anda masukkan tidak valid";
	    	    $klas="#email";
	    	    $param="";
	    	}

	    	else if(empty($data["password"]))
	    	{
	    	    $err="Mohon isi password";
	    	    $klas="#password";
	    	    $param="";
	    	}

	    	else
	    	{
               if(strcmp($login,"dosen")==0){
                    $tabel = "dosen";
     			$where=sprintf("WHERE email='%s' AND password='%s'",$data["email"],$data["password"]);
     			$result = $this->Model_lib->Cek($tabel,$where);
                    if($result->num_rows()>0){
                         $tabel = "dosen";
          			$where=sprintf("WHERE email='%s' AND password='%s' AND aktivasi=1",$data["email"],$data["password"]);
          			$result = $this->Model_lib->Cek($tabel,$where);
                              if($result->num_rows()>0){
                                   $err="email telah terdaftar";
                                   $klas="";
                              }else {
                                   $err="email telah terdaftar namun belum terverifikasi";
                                   $klas="";
                              }

                    }else{

                         $data["id_univ"]="1";
                         $data["tanggal_daftar"]=date("Y-m-d");
                         $data["id_akses"]="2";
                         $data["aktivasi"]="0";

                         $tabel = "dosen";

                         $result = $this->Model_lib->insert($tabel,$data);

                         $tabelA = "aktivasi";
                         $dataA["email"]=$data["email"];
                         $dataA["kode"]= hash('sha256',rand());

                         $resultA = $this->Model_lib->insert($tabelA,$dataA);

                         $tabel = "aktivasi";
          			$where=sprintf("WHERE email='%s' AND kode='%s'",$dataA["email"],$dataA["kode"]);
          			$result = $this->Model_lib->Cek($tabel,$where);
                         $id=$result->row();

                         $_SESSION["daftarE"]=$data["email"];
                         $_SESSION["daftarN"]=$data["nama"];
                         $_SESSION["table"]="dosen";
                         $_SESSION["kode"]=$dataA["kode"];
                         $_SESSION["id"]=$id->id;

                         $err="s";
                         $klas="";
                    }
               }
               else {
                    $tabel = "mahasiswa";
     			$where=sprintf("WHERE email='%s' AND password='%s'",$data["email"],$data["password"]);
                    $result = $this->Model_lib->Cek($tabel,$where);

     			$result = $this->Model_lib->Cek($tabel,$where);

                    if($result->num_rows()>0){
                         $tabel = "mahasiswa";
          			$where=sprintf("WHERE email='%s' AND password='%s' AND aktivasi=1",$data["email"],$data["password"]);
          			$result = $this->Model_lib->Cek($tabel,$where);
                              if($result->num_rows()>0){
                                   $err="email telah terdaftar";
                                   $klas="";
                              }else {
                                   $err="email telah terdaftar namun belum terverifikasi";
                                   $klas="";
                              }

                    }else{



                         $data["tanggal_daftar"]=date("Y-m-d");
                         $data["id_akses"]="4";
                         $data["aktivasi"]="0";

                         $tabel = "mahasiswa";

                         $result = $this->Model_lib->insert($tabel,$data);

                         $tabelA = "aktivasi";
                         $dataA["email"]=$data["email"];
                         $dataA["kode"]= hash('sha256',rand());

                         $resultA = $this->Model_lib->insert($tabelA,$dataA);

                         $tabel = "aktivasi";
          			$where=sprintf("WHERE email='%s' AND kode='%s'",$dataA["email"],$dataA["kode"]);
          			$result = $this->Model_lib->Cek($tabel,$where);
                         $id=$result->row();

                         $_SESSION["daftarE"]=$data["email"];
                         $_SESSION["daftarN"]=$data["nama"];
                         $_SESSION["table"]="mahasiswa";
                         $_SESSION["kode"]=$dataA["kode"];
                         $_SESSION["id"]=$id->id;

                         $err="s";
                         $klas="";

                    }
               }

	     }
	    		$arr = array('err'=>$err,'klas'=>$klas);
	    echo json_encode($arr);
     }
}
