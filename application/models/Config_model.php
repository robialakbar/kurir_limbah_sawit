<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Config_model extends CI_Model {

	public function cek_session()
	{
		if ($this->session->userdata('login') == TRUE) {
			return TRUE;
		}else{
			redirect("auth");
		}
	}
	public function sukses($msg)
	{
		$alert = "<div class='alert alert-success'>".$msg."</div>";
		return $alert;
	}
	public function error($msg)
	{
		$alert = "<div class='alert alert-danger'>".$msg."</div>";
		return $alert;
	}
}