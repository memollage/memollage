<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn extends CI_Controller {

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
	/*
	public function index()
	{
		$data=array('page_content' => 'landingApp');
		$this->load->view($this->_public_view,$data);
	}*/
	public function index()
	{
		$this->load->view('signin');
	}

	function login()
     {

		$data["email"] = $this->db->escape_str($this->input->post("email"));
		$data["password"] = stripslashes($this->db->escape_str($this->input->post("password")));
          $tabel = stripslashes($this->db->escape_str($this->input->post("login")));

  		if(empty($data['email']))
	    	{
		    $err="Mohon isi alamat email";
	    	    $klas="#email";
	    	    $param="";
	    	}
	    	else  if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
	    	    $err="Email yang anda masukkan tidak valid";
	    	    $klas="#email";
	    	    $param="";
          }
          else if(empty($tabel))
          {
               $err="Mohon pilih akses login anda";
               $klas="#nama";
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
               if(strcmp($tabel,"dosen")==0){
                    $where=sprintf("WHERE email='%s' AND password='%s'",$data["email"],$data["password"]);
     			$result = $this->Model_lib->Cek($tabel,$where);
                    if($result->num_rows()>0){
          			$where=sprintf("WHERE email='%s' AND password='%s' AND aktivasi=1",$data["email"],$data["password"]);
          			$result = $this->Model_lib->Cek($tabel,$where);
                              if($result->num_rows()>0){
                                   $_SESSION["akun"]=$data["email"];
                                   $_SESSION["table"]=$tabel;
                                   $err="s";
                                   $klas="";
                              }else {
                                   $err="email belum terverifikasi";
                                   $klas="";
                              }

                    }else{
                         $err="email belum terdaftar";
                         $klas="";
                    }
               }
			else{
                    $where=sprintf("WHERE email='%s' AND password='%s'",$data["email"],$data["password"]);
     			$result = $this->Model_lib->Cek($tabel,$where);
                    if($result->num_rows()>0){
          			$where=sprintf("WHERE email='%s' AND password='%s' AND aktivasi=1",$data["email"],$data["password"]);
          			$result = $this->Model_lib->Cek($tabel,$where);
                              if($result->num_rows()>0){
                                   $_SESSION["akun"]=$data["email"];
                                   $_SESSION["table"]=$tabel;
                                   $err="s";
                                   $klas="";
                              }else {
                                   $err="email belum terverifikasi";
                                   $klas="";
                              }

                    }else{
                         $err="email belum terdaftar";
                         $klas="";
                    }
               }

	     }
	    		$arr = array('err'=>$err,'klas'=>$klas);
	    echo json_encode($arr);
     }
}
