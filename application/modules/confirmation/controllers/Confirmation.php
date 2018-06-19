<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmation extends CI_Controller {

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
		$this->load->view('confirmation');
	}

     public function confirm($status)
     {
          $this->load->view('emailconfirmation');
     }
     public function emailconf($id,$kode,$tableS){

          $tabel = "aktivasi";
          $where=sprintf("WHERE id='%s' AND kode='%s'",$id,$kode);
          $result = $this->Model_lib->Cek($tabel,$where);
          if($result->num_rows()>0){
               $dataE=$result->row();
               $data["email"]=$dataE->email;

               $where=sprintf("email='%s'",$data["email"]);
               $dataA["aktivasi"]=1;
               $result = $this->Model_lib->Update($tableS,$dataA,$where);

               $tabel = "aktivasi";
               $where=sprintf("WHERE email='%s' AND kode='%s'",$data["email"],$kode);
               $result = $this->Model_lib->Delete($tabel,$where);

               $data["id_foto"]="memollage_user.png";
               $data["tanggal_perubahan"]=date("Y-m-d H:i:s");
               $result=$this->Model_lib->insert("data_foto_profile",$data);

               $dataAKUN["email"]=$data["email"];
               $dataAKUN["profile"]="Lets Change your profile information";
               $dataAKUN["bio"]="I'm Not 'user'";
               $result=$this->Model_lib->insert("akun",$dataAKUN);

               $this->confirm("success");
          }
          else {
               $this->confirm("failed");
          }
     }
}
