<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {

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
		$this->load->view('notif');
	}

     public function open()
     {
          //$this->load->view('notif');
          echo $this->get();
     }

     public function get()
     {
          $table='notifikasi';
          $where=sprintf("WHERE id_kelas in (select id_kelas from jadwal_kelas WHERE email='%s') order by waktu_pembuatan DESC LIMIT 10",$_SESSION["akun"]);
          $result=$this->Model_lib->SelectWhere($table,$where);

          $var="";
          foreach ($result->result() as $row) {
               $var.='
               <a href="#">
                  <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                  <div class="mail-contnet">
                       <h5>'.$row->title.'</h5> <span class="mail-desc">'.$row->komen.'</span> <span class="time">'.$this->makeTime($row->waktu_pembuatan).'</span>
                  </div>
               </a>
               ';
          }
          echo $var;
     }

     public function makeTime($value)
     {
          $dateKirim=date("Y-m-d",strtotime($value));
          if(strcmp($dateKirim,date("Y-m-d"))==0){
               //echo $value" ".$dateKirim." ".date("Y-m-d")."\n";
               $dt = DateTime::createFromFormat("Y-m-d H:i:s",$value);
               return $dt->format("H:i");
          }
          return date("Y-m-d, H:i",strtotime($value));
     }

}
