<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
		$data=array('page_content' => 'beranda');
		$this->load->view($this->_public_view,$data);
	}
	public function open()
	{
		$jam=date("H:i:s");
		$tabel = "kelas";
		$where=sprintf("WHERE id_kelas in (select id_kelas from jadwal_kelas where email='%s') and hari='%s' and jam_mulai > '%s' ORDER BY jam_mulai",$_SESSION["akun"], date("l"),$jam);
		$resultROW=$this->Model_lib->SelectWhere($tabel,$where)->num_rows();
		if($resultROW>0){

			$result=$this->Model_lib->SelectWhere($tabel,$where)->row();
			$data = array('result' => $result);
			$this->load->view('beranda',$data);
		}else {
			$this->load->view('berandaNull');
		}
	}
	public function getTime()
	{
		$jam=date("H:i:s");
		$tabel = "kelas";
		$where=sprintf("WHERE id_kelas in (select id_kelas from jadwal_kelas where email='%s') and hari='%s' and jam_mulai > '%s' ORDER BY jam_mulai",$_SESSION["akun"], date("l"),$jam);
		$result=$this->Model_lib->SelectWhere($tabel,$where)->row();
		$str_time = $result->jam_mulai;

		$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);


		sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
		//echo $hours."\n";echo $minutes."\n";echo $seconds."\n";
		$time_seconds1 = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;


		sscanf($jam, "%d:%d:%d", $hours, $minutes, $seconds);
		//echo $hours."\n";echo $minutes."\n";echo $seconds."\n";
		$time_seconds2 = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
		$var=$time_seconds1-$time_seconds2;
		echo $var;
	}
}
