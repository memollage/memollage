<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view("login");
	}
	/*public function index()
	{
		$this->load->view('beranda');
	}*/
	function proseslogin() {
       $data['user'] =  $this->db->escape_str($this->input->post("user"));
       $data['password'] = md5($this->db->escape_str($this->input->post("password")));
       $data['key'] =$this->input->post("keylog");
       $captcha = $this->session->userdata("captcha");
       $data['captcha'] = $this->input->post("captcha");
       $key = $this->session->userdata("akses_key_log");
       if(!empty($key))
       {
            if($key==$data['key'])
            {
                     if(empty($data['user']))
                     {
                         $err="Mohon isi nama user";
                         $klas="#user";
                     }
                     else if(empty($data['password']))
                     {
                         $err="Mohon isi password";
                         $klas="#password";
                     }
                     else if (empty($captcha) || $captcha !=  $data['captcha'])
                     {
                          $err="Mohon isi kode keamanan dengan benar";
                          $klas="#captcha";
                     }
                     else
                     {

                          $cek = $this->Model_lib->SelectQuery("select *from administrator where userpengguna='".$data['user']."' "
                                  . "and password='".$data['password']."'");

                            if($cek->num_rows()>0)
                             {
                                 // masukkan tanggal login pertama kali user
                                    $row = $cek->row();
                                    // get jenis ps
                                   // $kategori_bayar = substr($row->pin_pin, -1);
                                    $session = array(
                                                 'user' => $row->userpengguna,
                                                 'nama' => $row->nama
                                             );

                                   $this->session->set_userdata($session);


                                   $err="s";
                             }
                             else
                             {
                                 $err="User dan password anda tidak dikenal";
                             }

                     }
            }
             else {
                $err="Akses aplikasi ditolak, mohon refresh halaman website anda";
            }
       }
    else {
            $err="Akses aplikasi tidak diizinkan";
       }
      $arr = array ('err'=>$err);
          echo json_encode($arr);
   }
    function keluar(){}
}
