<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("config_model","master");
	}
	public function index()
	{
		$this->load->view("auth");
	}
	public function login()
	{
		$input = $this->input->post();
		$cek_user = $this->db->get_where("users",['username'=>$input['username'],'password'=>MD5($input['password'])]);
		if ($cek_user->num_rows() == 0) {
			$this->session->set_flashdata("pesan",$this->master->error("Username atau Password yang anda masukan salah"));
			redirect("auth");
		}else{
			$this->session->set_flashdata("pesan",$this->master->sukses("Anda berhasil login"));
			$row = $cek_user->row();
			$this->session->set_userdata([
				'login'=>TRUE,
				'name'=>$row->name,
				'id'=>$row->id,
				'username'=>$row->username,
				'level'=>$row->level,
			]);
			redirect("home");
		}
	}
}