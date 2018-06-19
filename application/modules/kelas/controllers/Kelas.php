<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

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
		$data=array('page_content' => 'kelas');
		$this->load->view($this->_public_view,$data);
	}

	public function open()
	{
		$data["akun"]=$_SESSION["table"];
		$this->load->view('kelas',$data);
	}



	public function loadKelas($pos)
	{
		$tabel="kelas";
		$email=$_SESSION["akun"];

		//$where="WHERE email_dosen=";
		//$where=sprintf("WHERE email_dosen='%s'","muammar.clasic@gmail.com");
		//$where=sprintf("WHERE email_dosen='%s'",$email);
		$where=sprintf("WHERE id_kelas in (select id_kelas from jadwal_kelas where email='%s')",$_SESSION["akun"]);

		$result = $this->Model_lib->SelectWhere($tabel,$where);

		//$this->orderResult($result)->result() as $row)
		$data=$this->orderResult($result);
		$return=$this->loadPage($data,$pos);

		echo $return;

	}

	public function dayNumCmp($value1,$value2)
	{
		if(date('N', strtotime($value1))>date('N', strtotime($value2))){
			return 1;
		}
		if (date('N', strtotime($value1))==date('N', strtotime($value2))) {
			return 0;
		}
		return -1;
	}
	public function dayTimeCmp($value1,$value2)
	{
		if(strtotime($value1)>strtotime($value2)){
			return 1;
		}
		return -1;
	}

	public function orderResult($data)
	{
		$array= array( 'id_kelas'=>array(),'email_dosen'=>array(),'nama_matakuliah'=>array(),'nama_kelas'=>array(),'hari'=>array(),'jam_mulai'=>array(),'jam_akhir'=>array(),'tanggal_pembuatan'=>array());
		$hari = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");

		$idx=0;
		foreach($data->result() as $row){
			$idx++;
			array_push($array['id_kelas'],$row->id_kelas);
			array_push($array['email_dosen'],$row->email_dosen);
			array_push($array['nama_matakuliah'],$row->nama_matakuliah);
			array_push($array['nama_kelas'],$row->nama_kelas);
			array_push($array['hari'],$row->hari);
			array_push($array['jam_mulai'],$row->jam_mulai);
			array_push($array['jam_akhir'],$row->jam_akhir);
			array_push($array['tanggal_pembuatan'],$row->tanggal_pembuatan);
		}

			for ($i=0; $i < $idx-1; $i++) {
				$min_idx = $i;
				//echo $array['hari'][$min_idx]."\n";
				for ($j=$i+1; $j <$idx ; $j++) {
					if ($this->dayNumCmp($array['hari'][$min_idx],$array['hari'][$j])==1) {
						//echo $array['hari'][$min_idx]." > ".$array['hari'][$j]." \n";
						$min_idx=$j;
						continue;
					}
					if($this->dayNumCmp($array['hari'][$min_idx],$array['hari'][$j])==0 and $this->dayTimeCmp($array['jam_mulai'][$min_idx],$array['jam_mulai'][$j])==1){
						$min_idx=$j;
						continue;
					}
				}
				$temp= array( 'id_kelas'=>array(),'email_dosen'=>array(),'nama_matakuliah'=>array(),'nama_kelas'=>array(),'hari'=>array(),'jam_mulai'=>array(),'jam_akhir'=>array(),'tanggal_pembuatan'=>array());
				array_push($temp['id_kelas'],$array['id_kelas'][$i]);
				array_push($temp['email_dosen'],$array['email_dosen'][$i]);
				array_push($temp['nama_matakuliah'],$array['nama_matakuliah'][$i]);
				array_push($temp['nama_kelas'],$array['nama_kelas'][$i]);
				array_push($temp['hari'],$array['hari'][$i]);
				array_push($temp['jam_mulai'],$array['jam_mulai'][$i]);
				array_push($temp['jam_akhir'],$array['jam_akhir'][$i]);
				array_push($temp['tanggal_pembuatan'],$array['tanggal_pembuatan'][$min_idx]);

				$array['id_kelas'][$i]=$array['id_kelas'][$min_idx];
				$array['email_dosen'][$i]=$array['email_dosen'][$min_idx];
				$array['nama_matakuliah'][$i]=$array['nama_matakuliah'][$min_idx];
				$array['nama_kelas'][$i]=$array['nama_kelas'][$min_idx];
				$array['hari'][$i]=$array['hari'][$min_idx];
				$array['jam_mulai'][$i]=$array['jam_mulai'][$min_idx];
				$array['jam_akhir'][$i]=$array['jam_akhir'][$min_idx];
				$array['tanggal_pembuatan'][$i]=$array['tanggal_pembuatan'][$min_idx];

				$array['id_kelas'][$min_idx]=$temp['id_kelas'][0];
				$array['email_dosen'][$min_idx]=$temp['email_dosen'][0];
				$array['nama_matakuliah'][$min_idx]=$temp['nama_matakuliah'][0];
				$array['nama_kelas'][$min_idx]=$temp['nama_kelas'][0];
				$array['hari'][$min_idx]=$temp['hari'][0];
				$array['jam_mulai'][$min_idx]=$temp['jam_mulai'][0];
				$array['jam_akhir'][$min_idx]=$temp['jam_akhir'][0];
				$array['tanggal_pembuatan'][$min_idx]=$temp['tanggal_pembuatan'][0];

			}

		//$tabel="kelas";
		$email=$_SESSION["akun"];
		//$where=sprintf("select hari,count(*) as jumlah from %s WHERE email_dosen='%s' group by hari",$tabel,$email);
		$where=sprintf("select hari,count(*) as jumlah from kelas inner join jadwal_kelas on kelas.id_kelas=jadwal_kelas.id_kelas where jadwal_kelas.email='%s' group by kelas.hari",$email);

		$result = $this->Model_lib->SelectQuery($where);

		$idx=0;
		$kelas= array('hari' => array(),'jumlah_Kelas'=>array());
		foreach($result->result() as $row){
			$idx++;
			array_push($kelas['hari'],$row->hari);
			array_push($kelas['jumlah_Kelas'],$row->jumlah);
		}

		for ($i=0; $i < $idx-1; $i++) {
			$min_idx = $i;
			//echo $array['hari'][$min_idx]."\n";
			for ($j=$i+1; $j <$idx ; $j++) {
				if ($this->dayNumCmp($kelas['hari'][$min_idx],$kelas['hari'][$j])==1) {
					//echo $array['hari'][$min_idx]." > ".$array['hari'][$j]." \n";
					$min_idx=$j;
					continue;
				}
			}
			$temp= array( 'hari'=>array(),'jumlah_Kelas'=>array());
			array_push($temp['hari'],$kelas['hari'][$i]);
			array_push($temp['jumlah_Kelas'],$kelas['jumlah_Kelas'][$i]);

			$kelas['hari'][$i]=$kelas['hari'][$min_idx];
			$kelas['jumlah_Kelas'][$i]=$kelas['jumlah_Kelas'][$min_idx];


			$kelas['hari'][$min_idx]=$temp['hari'][0];
			$kelas['jumlah_Kelas'][$min_idx]=$temp['jumlah_Kelas'][0];

		}
		/*for($a=0;$a<$idx;$a++){
			echo
			$kelas['hari'][$a]." ".
			$kelas['jumlah_Kelas'][$a]." \n";
		}*/
		$kelasR= array('hari' => $hari,'jumlah_Kelas'=>array());
		$b=0;
		//echo $idx;
		for($a=0;$a<7;$a++){
			$b=0;
			for(;$b<$idx;$b++){
				if($this->dayNumCmp($kelasR["hari"][$a],$kelas["hari"][$b])==0){
					$kelasR['jumlah_Kelas'][$a]=$kelas['jumlah_Kelas'][$b];
					break;
				}
			}
			if($b==$idx){
				$kelasR['jumlah_Kelas'][$a]=0;
			}
		}
		/*for($a=0;$a<7;$a++){
			echo
			$kelasR['hari'][$a]." ".
			$kelasR['jumlah_Kelas'][$a]." \n";
		}*/
		$data=array("banyak_kelas"=>$kelasR,"kelas"=>$array);
		return $data;
	}

	public function loadPage($data,$pos)
	{
		$var="";
		$idx=0;
		for ($i=0; $i <7; $i++) {
			$show="";
			if(strcmp(strtolower($pos),strtolower($data["banyak_kelas"]["hari"][$i]))==0){
				$show="active show";
			}
			$var.='<div class="TabAddKelas tab-pane '.$show.'" id="'.$data["banyak_kelas"]["hari"][$i].'" role="tabpanel">
			<div class="row jadwal-hari" style="margin:0px;">';

			if($data["banyak_kelas"]["jumlah_Kelas"][$i]!=0){
				for($j=0;$j<$data["banyak_kelas"]["jumlah_Kelas"][$i];$j++){
					$var.='<div id="'.$data["kelas"]["id_kelas"][$idx].'" class="col-lg-4 kelas myBtn" data-value="!del" onclick="kelas(this);" >
							<input class="data" type="hidden" name="" value="!del">
							 <div class="card kelasc">
								  <div class="card-body">
									  <div class="card-content container-in-flex">
									  	<div class="header-kelas">
										 <img class="logo" src="'.base_url().'asset/theme/img/Logo.png" width="60">
									 	</div>
									 	<div class="content-data-kelas">
										 <p class="nama-kelas text-kelas">'.$data["kelas"]["nama_matakuliah"][$idx].'<br>
										 	 '.$data["kelas"]["nama_kelas"][$idx].'<br>
											 <span style="color:red">'.substr($data["kelas"]["jam_mulai"][$idx],0,-3).' - '.substr($data["kelas"]["jam_akhir"][$idx++],0,-3).'</span></p>
									 	 </div>
									  </div>
								  </div>
								  <div class="hidden-trash">
									  <i class="fa fa-trash" aria-hidden="true"></i>
								  </div>
							  </div>
					   	  </div>';
				}
			}else{
				$var.='<div class="col-lg-4 ">
						 <div class="card">
							  <div class="card-body">
								  <div class="card-content container-in-flex">
									  <h1>belum ada kelas</h1>
								  </div>
							  </div>
						  </div>
				   	  </div>';
			}
			$var.='</div>
			    		</div>';
		}
		return $var;
	}

	public function add()
	{
		$tabel="kelas";
		$data["email_dosen"] =$_SESSION["akun"];
		$data["nama_matakuliah"] = stripslashes($this->db->escape_str($this->input->post("nama_matakuliah")));
		$data["nama_kelas"] = stripslashes($this->db->escape_str($this->input->post("nama_kelas")));
		$data["hari"] = stripslashes($this->db->escape_str($this->input->post("hari")));
		$data["jam_mulai"] = stripslashes($this->db->escape_str($this->input->post("jam_mulai")));
		$data["jam_akhir"] = stripslashes($this->db->escape_str($this->input->post("jam_akhir")));
		$data["tanggal_pembuatan"] = date("Y-m-d H:i:s");

		$result = $this->Model_lib->insert($tabel,$data);
		if($result){
			$err="s";
			$arr = array('err'=>$err,'klas'=>$data);
		}else{
			$err="s";
			$arr = array('err'=>$err,'klas'=>$data);
		}

		$tabelKelas="kelas";
		$whereJadwal=sprintf("WHERE email_dosen='%s' AND tanggal_pembuatan='%s'",$_SESSION["akun"],$data["tanggal_pembuatan"]);
		$dataInsert["id_kelas"]=$this->Model_lib->Cek($tabelKelas,$whereJadwal)->row()->id_kelas;
		$dataInsert["email"]=$_SESSION["akun"];
		//$result=0;
		$tabelKelas="jadwal_kelas";
		$dataInsert["id_akses"]= "2";
		$dataInsert["tanggal_penambahan"]=date("Y-m-d");
		$result=$this->Model_lib->insert($tabelKelas,$dataInsert);

    		echo json_encode($arr);
	}
	public function del()
	{
		$data=$_POST["data"];
		$tabel="kelas";
		$stringData = implode("','", $data);
		$where=sprintf("where id_kelas in ('%s') AND email_dosen='%s'",$stringData,$_SESSION["akun"]);
		$result = $this->Model_lib->Delete($tabel,$where);
		if($result){

			$err="s";
			$arr = array('err'=>$err,'klas'=>$data);
		}else {
			$err="error";
			$arr = array('err'=>$err,'klas'=>$data);
		}
    		echo json_encode($arr);
	}

	public function member($value)
	{

		$tabel="jadwal_kelas";
		$where=sprintf("WHERE id_kelas='%s' order by tanggal_penambahan DESC",$value);
		$result=$this->Model_lib->SelectWhere($tabel,$where);


		$var='<div class="card">
			<div class="recent-comment">';
		if ($result->num_rows()>0) {

			/*foreach($result->result() as $row){
				$idx++;
				array_push($kelas['hari'],$row->hari);
				array_push($kelas['jumlah_Kelas'],$row->jumlah);
			}*/
			foreach($result->result() as $row){

				$whereAkses=sprintf("WHERE id_akses='%s'",$row->id_akses);
				$resultAkses=$this->Model_lib->SelectWhere("hak_akses",$whereAkses)->row();
				//print_r($resultAkses);

				$whereAkun=sprintf("WHERE email='%s'",$row->email);
				$resultAkun=$this->Model_lib->SelectWhere($resultAkses->akses,$whereAkun)->row();
				//print_r($resultAkun);
				$tabelF="data_foto_profile";
		          $whereF=sprintf("WHERE email='%s' order by tanggal_perubahan DESC",$row->email);
				$resultF = $this->Model_lib->SelectWhere($tabelF,$whereF)->row();

			$var.='<div class="media">
					<div class="media-left">
						<a href="#" onclick="profileUserML(this)" data-value="'.$resultAkun->email.'"><img alt="..." src="'.base_url().'asset/images/'.$resultF->id_foto.'" class="media-object"></a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">'.$resultAkun->nama.'</h4>
						<p class="email-text">'.$resultAkun->email.'</p>
						<p class="comment-date" style="top:90%;">'.date("d F Y",strtotime($row->tanggal_penambahan)).'</p>
					</div>
				</div>';
			}
		}else {
			$var.='<div class="media">

					<div class="media-body">
						<h4 class="media-heading">Belum ada member kelas</h4>
					</div>
				</div>';
		}

		$var.='</div>
			</div>';
		echo $var;
	}

	public function aturMember($value)
	{
		$tabel="jadwal_kelas";
		$where=sprintf("WHERE id_kelas='%s' order by tanggal_penambahan DESC",$value);
		$result=$this->Model_lib->SelectWhere($tabel,$where);

		$var='<div class="card" style="margin-left: auto;margin-right: auto;">';
			$var.='<div class="">
				<button style="right: 10px;float: initial;position: absolute;top: 10px;z-index:10;" type="button" id=add-member-kelas class="btn btn-success btn-flat btn-addon m-b-10 m-l-5" onclick="addMemberKelas()"><i id=add-btn class="ti-plus"></i>ADD</button>
			';
			$var.='</div>';
		if ($result->num_rows()>0) {
				$var.='<div class="">
					<button style="right: 10px;float: initial;position: absolute;bottom: 0;z-index:10;" type="button" id=del-member-kelas class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5" onclick="deleteMemberKelas()"><i id=add-btn class="ti-close"></i>DEL</button>
					</div>';
		}
				$var.='<div class="row">';

		if ($result->num_rows()>0) {
			foreach($result->result() as $row){
				$whereAkses=sprintf("WHERE id_akses='%s'",$row->id_akses);
				$resultAkses=$this->Model_lib->SelectWhere("hak_akses",$whereAkses)->row();
				//print_r($resultAkses);

				$whereAkun=sprintf("WHERE email='%s'",$row->email);
				$resultAkun=$this->Model_lib->SelectWhere($resultAkses->akses,$whereAkun)->row();

				$tabelF="data_foto_profile";
		          $whereF=sprintf("WHERE email='%s' order by tanggal_perubahan DESC",$resultAkun->email);
				$resultF = $this->Model_lib->SelectWhere($tabelF,$whereF)->row();

				$var.='<div id="img-'.$row->id.'" class="card-img-kelas" data-value="close" onclick="hapusAnggota(this)">
						<a  href="#"><div class="fade-img "></div><img class="masterTooltip" title="'.$resultAkun->email.'" style="border-radius: 100px;height: 50px !important;width: 50px !important;margin: 0 auto;" alt="..." src="'.base_url().'asset/images/'.$resultF->id_foto.'"></a>
						<p>'.$resultAkun->nama.'</p>
					</div>';
			}
		}else{
			$var.='<h4>Belum ada anggota yang ditambahkan</h4>';
		}
		$var.='</div>
		</div>';
		echo $var;
	}
	public function deleteMemberKelas()
	{
		$data=$_POST["data"];
		$data = implode(',', $data);

		$tabel="jadwal_kelas";
		$where=sprintf("where id in ('%s')",$data);
		$result = $this->Model_lib->Delete($tabel,$where);
		if($result){
			$err="s";
			$arr = array('err'=>$err,'klas'=>$data);
		}else {
			$err="error";
			$arr = array('err'=>$err,'klas'=>$data);
		}
    		echo json_encode($data);
	}
	public function addMemberKelas($value)
	{
		$data=$_POST["data"];
		for ($i=0; $i <sizeof($data); $i++){
			$dataInsert["id_kelas"]=$value;
			$dataInsert["email"]=$data[$i];

			$tabel="universitas";
			$atEmail=$this->trimEmail($dataInsert["email"]);

			$where=sprintf("where email_at='%s'",$atEmail);
			$result = $this->Model_lib->Cek($tabel,$where)->num_rows();
			//$result=0;
			$dataInsert["id_akses"]= $result==0 ? "4" : "2";
			$dataInsert["tanggal_penambahan"]=date("Y-m-d");

			$tabel="jadwal_kelas";
			$result=$this->Model_lib->insert($tabel,$dataInsert);
		}

		//$tabel="jadwal_kelas";
		//$where=sprintf("where id in ('%s')",$data);
		//$result = $this->Model_lib->insert($tabel,$data);

		$err="s";
		$arr = array('err'=>$err,'dataCall'=>sizeof($data),'kelas'=>$value,'dataSend'=>$data);

    		echo json_encode($arr);
		/*
		$tabel="universitas";
		$atEmail=$this->trimEmail($kelas);
		$where=sprintf("where email_at='%s'",$atEmail);
		$result = $this->Model_lib->Cek($tabel,$where)->num_rows();
		echo $result;
		*/
	}

	public function searchMemberKelas($kelas,$value=null)
	{
		$stringSearch="";
		$dataKelas=null;
		$dataKelas=sprintf("email not in (select email from jadwal_kelas where id_kelas='%s')",$kelas);
		if($this->isEmail($value)==1){
			$stringSearch="email";

		}
		else{
			$stringSearch="nama";
		}

		$data=$_POST['data'];
		if($data!=null){
			$data = implode("','", $data);
			$whereSearch=sprintf("email NOT IN ('%s')",$data);
		}
		else {
			$whereSearch=sprintf("1=1");
		}

		//$where=sprintf("SELECT * from dosen WHERE email<>'%s' AND %s AND %s like '%s'",$_SESSION["akun"],$whereSearch,$stringSearch,"%".$value."%");
		$where=sprintf("SELECT * from dosen WHERE %s AND %s like '%s' AND %s",$whereSearch,$stringSearch,"%".$value."%",$dataKelas);
		$result = $this->Model_lib->SelectQuery($where);
		$var="";
		foreach($result->result() as $row){
			$tabelF="data_foto_profile";
			$whereF=sprintf("WHERE email='%s' order by tanggal_perubahan DESC",$row->email);
			$resultF = $this->Model_lib->SelectWhere($tabelF,$whereF)->row();

			$var.='
			<div class="card-img-kelas" data-value="close" onclick="move(this)">
				<input class="id_user" type="hidden" name="" value="'.$row->email.'">
				<a  href="#"><div class="fade-img "></div><img class="masterTooltip" title="'.$row->email.'" style="border-radius: 100px;height: 50px !important;width: 50px !important;margin: 0 auto;" src="'.base_url().'asset/images/'.$resultF->id_foto.'"></a>
				<p>'.$row->nama.'</p>
			</div>';
		}
		$where=sprintf("SELECT * from mahasiswa WHERE %s AND %s like '%s' AND %s",$whereSearch,$stringSearch,"%".$value."%",$dataKelas);
		$result = $this->Model_lib->SelectQuery($where);
		foreach($result->result() as $row){
			$tabelF="data_foto_profile";
			$whereF=sprintf("WHERE email='%s' order by tanggal_perubahan DESC",$row->email);
			$resultF = $this->Model_lib->SelectWhere($tabelF,$whereF)->row();

			$var.='
			<div class="card-img-kelas" data-value="close" onclick="move(this)">
				<input class="id_user" type="hidden" name="" value="'.$row->email.'">
				<a  href="#"><div class="fade-img "></div><img class="masterTooltip" title="'.$row->email.'" style="border-radius: 100px;height: 50px !important;width: 50px !important;margin: 0 auto;" src="'.base_url().'asset/images/'.$resultF->id_foto.'"></a>
				<p>'.$row->nama.'</p>
			</div>';
		}

			$err="s";
			$arr = array('err'=>$err,'data'=>$var,'dataCall'=>$data);

		echo json_encode($arr);
	}

	public function trimEmail($value)
	{
		$i=0;
		for (; $i<strlen($value); $i++) {
			if($value[$i]=='@'){
				break;
			}
		}
		return substr($value,$i+1);
	}
	public function isEmail($value)
	{
		$i=0;
		for (; $i<strlen($value); $i++) {
			if($value[$i]=='@'){
				return 1;
			}
		}
		return 0;
	}

	public function getChat($value=null)
	{
		$table='chat_kelas';
		$where=sprintf("WHERE id_kelas='%s' order by waktu_pembuatan LIMIT 10",$value);
		$result=$this->Model_lib->SelectWhere($table,$where);

		$var="";
		foreach ($result->result() as $row) {
			$tabelF="data_foto_profile";
			$whereF=sprintf("WHERE email='%s' order by tanggal_perubahan DESC",$row->email);
			$resultF = $this->Model_lib->SelectWhere($tabelF,$whereF)->row();

			$tabelU=$_SESSION["table"];
			$whereU=sprintf("WHERE email='%s'",$row->email);
			$resultU = $this->Model_lib->SelectWhere($tabelU,$whereU)->row();

			$var.='
			<div class="media">
				<div class="media-left">
					<a onclick="profileUserML(this)" data-value="'.$resultU->email.'"><img alt="..." src="'.base_url().'asset/images/'.$resultF->id_foto.'" class="media-object"></a>
				</div>
				<div class="media-body">
					<h4 class="media-heading" style="width: 220px !important;">'.$resultU->nama.'</h4>
					<p style="width: 220px !important;">'.$row->pesan.'</p>
					<p class="comment-date" style="top:90%;">'.$this->makeTime($row->waktu_pembuatan).'</p>
				</div>
			</div>
			';
		}
		echo $var;
	}

	public function sendChat($kelas){
		$tabel="chat_kelas";
          $data["email"] =$_SESSION["akun"];
          $data["id_kelas"] =$kelas;
		$data["pesan"] = stripslashes($this->db->escape_str($this->input->post("pesan")));
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
