<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		key_exfert();
	}
	public function reff()
	{
		$data = [
			'row'=>$this->db->get_where('members',['phone'=>$this->uri->segment(2)])->row(),
		];
		$this->load->view('reff',$data);
	}
	function hp($nohp) {
	     $nohp = str_replace(" ","",$nohp);
	     $nohp = str_replace("(","",$nohp);
	     $nohp = str_replace(")","",$nohp);
	     $nohp = str_replace(".","",$nohp);
	     if(!preg_match('/[^+0-9]/',trim($nohp))){
	         if(substr(trim($nohp), 0, 3)=='+62'){
	             $hp = trim($nohp);
	         }
	         elseif(substr(trim($nohp), 0, 1)=='0'){
	             $hp = '62'.substr(trim($nohp), 1);
	         }
	     }
	     return $hp;
	 }
	 public function CodeMembers(){
	    $this->db->select('RIGHT(members.code,5) as kode_member', FALSE);
	    $this->db->order_by('kode_member','DESC');    
	    $this->db->limit(1);    
	    $query = $this->db->get('members');
	        if($query->num_rows() <> 0){      
	             $data = $query->row();
	             $kode = intval($data->kode_member) + 1; 
	        }
	        else{      
	             $kode = 1;  
	        }
	    $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
	    $kodetampil = "913".$batas;
	    return $kodetampil;  
	}
	public function save()
	{
		$post = $this->input->post();
		$cek = $this->db->get_where('members',['phone'=>$this->hp($post['phone'])])->num_rows();
		if ($cek == 0) {
			$data = [
				'code'=>$this->CodeMembers(),
				'name'=>$post['name'],
				'phone'=>$this->hp($post['phone']),
				'address'=>$post['address'],
				'upline'=>$post['upline'],
				'ttl'=>$post['ttl'],
				'ibu_kandung'=>$post['ibu_kandung'],
				'date'=>date('Y-m-d')
			];
			$save = $this->db->insert('members',$data);
			if ($save) {
				$pesan = "Yth, ".$post['name'].", selamat bergabung di 913Pay.Download aplikasi 913Pay di link berikut
https://play.google.com/store/apps/details?id=com.masterweb.pay913";
				send_sms($this->hp($post['phone']),$pesan);
				echo '<script type="text/javascript">
				window.top.location.href = "https://play.google.com/store/apps/details?id=com.masterweb.pay913"; 
				</script>';
				//redirect('https://play.google.com/store/apps/details?id=com.masterweb.pay913');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal disimpan</div>');
				redirect('reff/'.$post['upline']);
			}
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">No. Handphone sudah terdaftar</div>');
			echo '<script type="text/javascript">
				window.top.location.href = "https://play.google.com/store/apps/details?id=com.masterweb.pay913"; 
				</script>';
		}
	}
	public function coba()
	{
		$this->load->view('coba');
	}
	public function order_pulsa()
	{
		if (isset($_POST['cst']) && isset($_POST['produk']) && isset($_POST['code']) && $_POST['members']) {
			$m = $this->db->get_where('members',['phone'=>$_POST['members']])->row();
			$saldo = saldo($_POST['members']);
			$p = $this->db->get_where('product_prabayar',['product_id'=>$_POST['produk']])->row();
			$harga = $p->price+setting()->pulsa;
			if ($saldo > $harga) {
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'https://api.serpul.co.id/prabayar/order',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS => 'destination='.$_POST['cst'].'&product_id='.$_POST['produk'].'&ref_id='.$_POST['code'],
				  CURLOPT_HTTPHEADER => array(
				    'Accept: application/json',
				    'Authorization: 83533154e78768f1f8b46a63541353d0'
				  ),
				));
				$response = curl_exec($curl);
				curl_close($curl);
				date_default_timezone_set("Asia/Jakarta");
				$trx = [
					'members'=>$m->code,
					'reff'=>$_POST['code'],
					'code_produk'=>$_POST['produk'],
					'produk'=>$p->operator_name." ".$p->product_name,
					'price'=>$harga,
					'sale'=>$_POST['jual'],
					'desc'=>$response,
					'status'=>0,
					'type'=>1,
					'date'=>date("Y-m-d"),
				];
				$this->db->insert('transaksi',$trx);
				if ($m->upline != "") {
					$u1 = $this->db->get_where('members',['code'=>$m->upline])->row();
						if ($u1) {
							$up1 = [
								'trx'=>$this->CodeUpgrade(),
								'amount'=>setting()->trx_l1,
								'desc'=> "Bonus Transaksi Pulsa ".$m->name,
								'members'=>$u1->code,
							];
							$this->db->insert('bonus',$up1);
							if ($u1->upline != "") {
								$u2 = $this->db->get_where('members',['code'=>$u1->upline])->row();
								if ($u2) {
									$up2 = [
										'trx'=>$this->CodeUpgrade(),
										'amount'=>setting()->trx_l2,
										'desc'=> "Bonus Transaksi Pulsa ".$u1->name,
										'members'=>$u2->code,
									];
									$this->db->insert('bonus',$up2);
								}
							}
						}
					
				}
				$hasil = [
					'value'=>1,
					'message'=>$_POST['code']
				];
			}else{
				$hasil = [
				'value'=>0,
				'message'=>"Saldo anda tidak mencukupi"
			];
			}
		}else{
			$hasil = [
				'value'=>0,
				'message'=>"Anda tidak memiliki akses ke halaman ini"
			];
		}
		redirect('api/struk_pulsa/?nota='.$_POST['code']);
	}
	public function beli()
	{
		$username   = "081316441418";
		$apiKey   = "7305e9b4067c4603730";
		$ref_id  = uniqid('');
		$code = 'linkaja10';
		$signature  = md5($username.$apiKey.$ref_id);

		$json = '{
		          "commands"    : "topup",
		          "username"    : "081316441418",
		          "ref_id"      : "'.$ref_id.'",
		          "hp"          : "081220729369",
		          "pulsa_code"  : "'.$code.'",
		          "sign"        : "'.md5($username.$apiKey.$ref_id).'"
		        }';

		$url = "https://api.mobilepulsa.net/v1/legacy/index";

		$ch  = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$data = curl_exec($ch);
		curl_close($ch);

		print_r($data);
	}
	public function notif($id)
	{
		$data['data'] = $this->db->get_where("broadcats",['slug'=>$id])->row();
		$this->load->view("notif_view",$data);
	}
}
