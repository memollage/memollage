<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifBoard extends CI_Controller {

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
		$this->load->view('notifBoard');
	}

     public function open()
     {
          $this->load->view('notifBoard');
     }

     public function insertNotif($kelas)
     {
          $tabel="notifikasi";
          $data["email"] =$_SESSION["akun"];
          $data["id_kelas"] =$kelas;
		$data["title"] = stripslashes($this->db->escape_str($this->input->post("title")));
		$data["komen"] = stripslashes($this->db->escape_str($this->input->post("komen")));
		$data["status"] = stripslashes($this->db->escape_str($this->input->post("status")));
		$data["waktu_pembuatan"] = date("Y-m-d H:i:s");

          $result = $this->Model_lib->insert($tabel,$data);
          if($result){
               $err="s";
               $arr = array('err'=>$err,'klas'=>$data);
          }else{
               $err="s";
               $arr = array('err'=>$err,'klas'=>$data);
          }
          echo json_encode($arr);
     }
}
