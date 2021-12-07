<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("config_model","master");
		$this->master->cek_session();
		date_default_timezone_set("Asia/jakarta");
	}
	public function index()
	{
		$data = [
			'header'=>"Kurir App",
			'subheader'=>"Aplikasi Kurir Basis Website",
			'menu'=>"home",
			'submenu'=>'',
		];
		$this->template->load("template","home",$data);
	}
	public function kurir()
	{
		$data = [
			'header'=>"Master Data",
			'subheader'=>"Kurir",
			'menu'=>"master",
			'submenu'=>'master-kurir',
			'kurir'=>$this->db->get_where("users",['level'=>3])->result(),
		];
		$this->template->load("template","kurir",$data);
	}
	public function owner()
	{
		$data = [
			'header'=>"Master Data",
			'subheader'=>"Owner",
			'menu'=>"master",
			'submenu'=>'master-owner',
			'kurir'=>$this->db->get_where("users",['level'=>2])->result(),
		];
		$this->template->load("template","owner",$data);
	}
	public function save_kurir()
	{
		$input = $this->input->post();
		$input['password'] = md5($input['password']);
		$input['level'] = 3;
		if ($input['id'] != "") {
			$save = $this->db->update('users',$input,['id'=>$input['id']]);
		}else{
			$save = $this->db->insert('users',$input);
		}
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Kurir Berhasil Disimpan"));
			redirect("home/kurir");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Kurir Gagal Disimpan"));
			redirect("home/kurir");
		}
	}
	public function save_owner()
	{
		$input = $this->input->post();
		$input['password'] = md5($input['password']);
		$input['level'] = 2;
		if ($input['id'] != "") {
			$save = $this->db->update('users',$input,['id'=>$input['id']]);
		}else{
			$save = $this->db->insert('users',$input);
		}
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Owner Berhasil Disimpan"));
			redirect("home/owner");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Owner Gagal Disimpan"));
			redirect("home/owner");
		}
	}
	public function outlite()
	{
		$data = [
			'header'=>"Master Data",
			'subheader'=>"Outlite",
			'menu'=>"master",
			'submenu'=>'master-outlite',
			'kurir'=>$this->db->get("outlite",)->result(),
		];
		$this->template->load("template","outlite",$data);
	}
	public function save_outlite()
	{
		$input = $this->input->post();
		if ($input['id'] != "") {
			$save = $this->db->update('outlite',$input,['id'=>$input['id']]);
		}else{
			$save = $this->db->insert('outlite',$input);
		}
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Outlite Berhasil Disimpan"));
			redirect("home/outlite");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Outlite Gagal Disimpan"));
			redirect("home/outlite");
		}
	}
	public function invoice(){
	    $this->db->select('RIGHT(permintaan.code,5) as kode_member', FALSE);
	    $this->db->order_by('kode_member','DESC');    
	    $this->db->limit(1);    
	    $query = $this->db->get('permintaan');
	        if($query->num_rows() <> 0){      
	             $data = $query->row();
	             $kode = $data->kode_member + 1; 
	        }
	        else{      
	             $kode = 1;  
	        }
	    $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
	    $kodetampil = "INV-".date("dmy")."-".$batas;
	    return $kodetampil;  
	}
	public function permintaan()
	{
		$data = [
			'header'=>"Permintaan",
			'subheader'=>"Outlite",
			'menu'=>"permintaan",
			'submenu'=>'permintaan',
			'outlite'=>$this->db->get("outlite",)->result(),
			'invoice'=>$this->invoice(),
		];
		$this->template->load("template","permintaan",$data);
	}
	public function pengambilan()
	{

		$data = [
			'header'=>"Pengambilan",
			'subheader'=>"Kurir",
			'menu'=>"pengambilan",
			'submenu'=>'pengambilan',
			'kurir'=>$this->db->get_where("permintaan",['kurir'=>$this->session->userdata('id')])->result(),
		];
		$this->template->load("template","pengambilan",$data);
	}
	public function cetak()
	{

		$data = [
			'header'=>"Cetak",
			'subheader'=>"Berkas",
			'menu'=>"cetak",
			'submenu'=>'',
		];
		$this->template->load("template","cetak",$data);
	}
	public function perusahaan()
	{

		$data = [
			'header'=>"Master",
			'subheader'=>"Perusahaan",
			'menu'=>"master",
			'submenu'=>'master-perusahaan',
			'data'=>$this->db->get("company")->row()
		];
		$this->template->load("template","perusahaan",$data);
	}
	public function laporan_permintaan()
	{
		$data = [
			'header'=>"Laporan",
			'subheader'=>"Permintaan",
			'menu'=>"laporan",
			'submenu'=>'laporan-permintaan',
			'kurir'=>$this->db->get("permintaan")->result(),
		];
		$this->template->load("template","laporan_permintaan",$data);
	}
	public function review($id)
	{
		$data = [
			'header'=>"Laporan",
			'subheader'=>"Permintaan",
			'menu'=>"laporan",
			'submenu'=>'laporan-permintaan',
			'outlite'=>$this->db->get("outlite",)->result(),
			'data'=>$this->db->get_where("permintaan",['code'=>$id])->row(),
		];
		$this->template->load("template","review_permintaan",$data);
	}
	public function laporan_pengambilan()
	{
		$data = [
			'header'=>"Laporan",
			'subheader'=>"Pengambilan",
			'menu'=>"laporan",
			'submenu'=>'laporan-pengambilan',
			'kurir'=>$this->db->get_where("permintaan",['status >'=>1])->result(),
		];
		$this->template->load("template","laporan_pengambilan",$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("home");
	}
	public function save_permintaan()
	{
		$input = $this->input->post();
		$save = $this->db->insert('permintaan',$input);
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Permintaan Berhasil Disimpan"));
			redirect("home/permintaan");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Permintaan Gagal Disimpan"));
			redirect("home/permintaan");
		}
	}
	public function update_permintaan()
	{
		$input = $this->input->post();
		$save = $this->db->update('permintaan',['code'=>$input['code']],$input);
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Permintaan Berhasil Disimpan"));
			redirect("home/laporan_permintaan");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Permintaan Gagal Disimpan"));
			redirect("home/laporan_permintaan");
		}
	}
	public function aksi_permintaan($id)
	{
		$save = $this->db->update("permintaan",['status'=>1],['code'=>$id]);
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Permintaan Berhasil Disetujui"));
			redirect("home/laporan_permintaan");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Permintaan Gagal Disetujui"));
			redirect("home/laporan_permintaan");
		}
	}
	public function hapus_permintaan($id)
	{
		$save = $this->db->update("permintaan",['status'=>3],['code'=>$id]);
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Permintaan Berhasil Disetujui"));
			redirect("home/laporan_permintaan");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Permintaan Gagal Disetujui"));
			redirect("home/laporan_permintaan");
		}
	}
	public function antar($id)
	{
		$save = $this->db->update("permintaan",['status'=>2,'tgl_terima'=>date("Y-m-d H:i:s")],['code'=>$id]);
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Permintaan Berhasil Disetujui"));
			redirect("home/pengambilan");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Permintaan Gagal Disetujui"));
			redirect("home/pengambilan");
		}
	}
	public function perubahan($id)
	{
		$save = $this->db->update("permintaan",['status'=>0,'tgl_terima'=>"0000-00-00 00:00:00"],['code'=>$id]);
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Permintaan Berhasil Disetujui"));
			redirect("home/pengambilan");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Permintaan Gagal Disetujui"));
			redirect("home/pengambilan");
		}
	}
	public function catatan()
	{
		$save = $this->db->update("permintaan",['note'=>$this->input->post("note")],['code'=>$this->input->post("code")]);
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Catatan Berhasil Disimpan"));
			redirect("home/pengambilan");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Catatan Gagal Disimpan"));
			redirect("home/pengambilan");
		}
	}
	public function hapus($id)
	{
		$save = $this->db->delete("permintaan",['code'=>$id]);
		if ($save) {
			$this->session->set_flashdata("pesan",$this->master->sukses("Data Permintaan Berhasil Disetujui"));
			redirect("home/laporan_permintaan");
		}else{
			$this->session->set_flashdata("pesan",$this->master->error("Data Permintaan Gagal Disetujui"));
			redirect("home/laporan_permintaan");
		}
	}
}