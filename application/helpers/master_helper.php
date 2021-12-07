<?php
if (!function_exists("GenratePass")) {
	function key_exfert()
	{
		$auth = "Basic ".base64_encode("live_8224c92b83977fb513517daea7e58f4c:b755e019-82fa-4d14-a481-bac5b234b8fb");
    		$url = "https://id.xfers.com/api/v4/payment_methods/qris";
    		$request_headers = [
    			'content-type: application/vnd.api+json',
    			'Authorization: '.$auth
    		    
    		];
    		
    		$json = '{
                        "data": {
                          "attributes": {
											      "referenceId": "qris1407211937",
											      "displayName": "913Pays"
											    }
                        }
                      }';
    		$ch  = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    		$datas = curl_exec($ch);
		echo $datas;
	}
}
if (!function_exists("notifikasi")) {
	function notifikasi($title,$messages)
	{
	$url = "https://fcm.googleapis.com/fcm/send";            
    $header = [
        'authorization: key=AAAAtI961RA:APA91bH7hiVJc8RN_t2icSnz3rhdwRtEMN4BhKRzgyYyeAyluAPdlEexvARVtq5uNWrUlDC0y6ovb-QpSB6KjhrLVLk_nkpaXZ8ZSeLTDYOvAlnl-zKGQOMrOfPez6mEP2W2Q-GxDFhP',
        'content-type: application/json'
    ];
    $notification = [
        'title' =>$title,
        'body' =>  $messages,
    ];
    $extraNotificationData = ["message" => $notification,"id" =>"1988"];
 
    $fcmNotification = [
        'to'        => "fVYP55DqRNaNS9RIBtEUJR:APA91bHn0kyxqpGUlam7VbBzV81hWSEX93sGZsfc-W1QNlNNEGxktn9f8SzD4xsktxRmeGmjQOT2YQZAGzQr7utwvEjahzsSNhlRnQmDwA1Hw3N886O322RatqHibte5d8Rv7jwuoQt0",
        'notification' => $notification,
        'data' => $extraNotificationData
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
 
    $result = curl_exec($ch);    
    curl_close($ch);
    return $result;
	}
}
if (!function_exists("alfa")) {
	function alfa($code,$amount)
	{
		$auth = "Basic ".base64_encode("live_8224c92b83977fb513517daea7e58f4c:b755e019-82fa-4d14-a481-bac5b234b8fb");
    		$url = "https://id.xfers.com/api/v4/payments";
    		$request_headers = [
    			'content-type: application/vnd.api+json',
    			'Authorization: '.$auth
    		    
    		];
    		
    		$json = '{
								   "data": {
								     "attributes": {
								       "paymentMethodType": "retail_outlet",
								       "amount": '.$amount.',
								       "referenceId": "'.$code.'",
								       "description": "'.$code.' TOPUP ALFAMART",
								       "paymentMethodOptions": {
								         "retailOutletName": "ALFAMART"
								       }
								     }
								   }
								 }';
    		$ch  = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    		$datas = curl_exec($ch);
		return $datas;
	}
}
if (!function_exists("cek_alfa")) {
	function cek_alfa($code)
	{
		$auth = "Basic ".base64_encode("live_8224c92b83977fb513517daea7e58f4c:b755e019-82fa-4d14-a481-bac5b234b8fb");
    		$url = "https://id.xfers.com/api/v4/payments/".$code;
    		$request_headers = [
    			'content-type: application/vnd.api+json',
    			'Authorization: '.$auth
    		    
    		];
    		$ch  = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    		$datas = curl_exec($ch);
		return $datas;
	}
}
if (!function_exists("cek_deporek")) {
	function cek_deporek($code)
	{
		$auth = "Basic ".base64_encode("live_8224c92b83977fb513517daea7e58f4c:b755e019-82fa-4d14-a481-bac5b234b8fb");
    		$url = "https://id.xfers.com/api/v4/payment_methods/virtual_bank_accounts/".$code."/payments";
    		$request_headers = [
    			'content-type: application/vnd.api+json',
    			'Authorization: '.$auth
    		    
    		];
    		$ch  = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    		$datas = curl_exec($ch);
		return $datas;
	}
}
if (!function_exists("cek_trf")) {
	function cek_trf()
	{
		$auth = "Basic ".base64_encode("live_8224c92b83977fb513517daea7e58f4c:b755e019-82fa-4d14-a481-bac5b234b8fb");
    		$url = "https://id.xfers.com/api/v4/disbursements";
    		$request_headers = [
    			'content-type: application/vnd.api+json',
    			'Authorization: '.$auth
    		    
    		];
    		$ch  = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    		$datas = curl_exec($ch);
		return $datas;
	}
}
if (!function_exists("send_wa")) {
	function send_wa($phone,$pesan)
	{
		$data = [
		    'api_key' => 'aec3c13bb82cda83244b0f53b72ffb757269779b',
		    'sender'  => '6288214479284',
		    'number'  => $phone,
		    'message' => $pesan
		];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://whatsapp.913pay.xyz/api/send-message.php",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($data))
		);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
}
if (!function_exists("Rupiah")) {
	function Rupiah($uang)
	{
		$cek = number_format($uang,0,',','.');
		return "Rp. ".$cek;
	}
}
if (!function_exists("actives")) {
	function actives($menu,$link)
	{
		if ($menu == $link) {
			$active = "active";
		}else{
			$active = "";
		}
		return $active;
	}
}
if (!function_exists("saldo")) {
	function saldo($phone)
	{
		$app =& get_instance();
		$m = $app->db->get_where('members',['phone'=>$phone])->row();
		$d = $app->db->select_sum('amount','deposit')->get_where('deposit',['members'=>$m->code,'status'=>1])->row();
		$t = $app->db->select_sum('price','transaksi')->get_where('transaksi',['members'=>$m->code,'status'=>1,'type <'=>6])->row();
		$saldo = $d->deposit-$t->transaksi;
		return $saldo;
		
	}
}
if (!function_exists("setting")) {
	function setting()
	{
		$app =& get_instance();
		$m = $app->db->get('setting')->row();
		return $m;
		
	}
}
if (!function_exists("bonus")) {
	function bonus($phone)
	{
		$app =& get_instance();
		$m = $app->db->get_where('members',['phone'=>$phone])->row();
		$d = $app->db->select_sum('amount','bonus')->get_where('bonus',['members'=>$m->code,'status'=>1])->row();
		$t = $app->db->select_sum('price','transaksi')->get_where('transaksi',['members'=>$m->code,'type'=>6])->row();
		$saldo = $d->bonus-$t->transaksi;
		return $saldo;
		
	}
}

if (!function_exists("Bulan")) {
	function Bulan($bulan)
	{
		$app =& get_instance();
		switch ($bulan) {
			case '01':
				$bln = "Januari";
				break;
			case '02':
				$bln = "Februari";
				break;
			case '03':
				$bln = "Maret";
				break;
			case '04':
				$bln = "April";
				break;
			case '05':
				$bln = "Mei";
				break;
			case '06':
				$bln = "Juni";
				break;
			case '07':
				$bln = "Juli";
				break;
			case '08':
				$bln = "Agustus";
				break;
			case '09':
				$bln = "September";
				break;
			case '10':
				$bln = "Oktober";
				break;
			case '11':
				$bln = "November";
				break;
			case '12':
				$bln = "Desember";
				break;
			
		}
		return $bln;
	}
}
if (!function_exists("Bulan_hjr")) {
	function Bulan_hjr($bulan)
	{
		$app =& get_instance();
		switch ($bulan) {
			case '01':
				$bln = "Muharram";
				break;
			case '02':
				$bln = "Safar";
				break;
			case '03':
				$bln = "Rabi'ul Awwal";
				break;
			case '04':
				$bln = "RRabi'ul Tsani";
				break;
			case '05':
				$bln = "Jumaada Ula";
				break;
			case '06':
				$bln = "Jumaadal Tsaniyah";
				break;
			case '07':
				$bln = "Rajab";
				break;
			case '08':
				$bln = "Sya'ban";
				break;
			case '09':
				$bln = "Ramadhan";
				break;
			case '10':
				$bln = "Shawwal";
				break;
			case '11':
				$bln = "Dzulqa'dah";
				break;
			case '12':
				$bln = "Dzulhijjah";
				break;
			
		}
		return $bln;
	}
}
if (!function_exists("hari")) {
	function hari(){
		switch (date("l")) {
			case 'Monday':
				$hari = "Senin";
				break;
			case 'Tuesday':
				$hari = "Selasa";
				break;
			case 'Wednesday':
				$hari = "Rabu";
				break;
			case 'Thursday':
				$hari = "Kamis";
				break;
			case 'Friday':
				$hari = "Jumat";
				break;
			case 'Saturday':
				$hari = "Sabtu";
				break;
			case 'Sunday':
				$hari = "Minggu";
				break;
			
		}
		return $hari;
	}
}
if (!function_exists("date_indo")) {
	function date_indo($date){
		$pisah = explode(" ", $date);
		$tgl = explode("-", $pisah[0]);
		$tahun = $tgl[0];
		$bulan = $tgl[1];
		$tanggal = $tgl[2];
		$tgl_indo = hari().", ".$tanggal." ".Bulan($bulan)." ".$tahun;
		$now = $tgl_indo." ".$pisah[1];
		return $now;
	}
}
if (!function_exists("tgl_indo")) {
	function tgl_indo($date){
		$pisah = explode(" ", $date);
		$tgl = explode("-", $pisah[0]);
		$tahun = $tgl[0];
		$bulan = $tgl[1];
		$tanggal = $tgl[2];
		$tgl_indo = $tanggal." ".Bulan($bulan)." ".$tahun;
		$now = $tgl_indo;
		return $now;
	}
}
if (!function_exists("token_support")) {
	function token_support()
	{
		$url = "http://hosts.913pay.xyz:1988/api/913WhatsAppspays/BismillahMasterWhatsApp2021/generate-token";
		$request_headers = [
			'Accept: application/json',
			'Content-Type: application/json',
		];
		$row=[];
		$ch  = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$row);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		$data = curl_exec($ch);
		//echo $data;
		$t = json_decode($data);
		return $t->full;
	}
}

if (!function_exists("QrCode")) {
	function QrCode()
	{
		$url = "http://hosts.913pay.xyz:1988/api/".token_support()."/start-session";
		$request_headers = [
			'Accept: application/json',
			'Content-Type: application/json',
		];
		$data=[];
		$ch  = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		$datas = curl_exec($ch);
		$t = json_decode($datas);
		//return $t->qrcode;
		return $datas;
	}
}

if (!function_exists("send_sms")) {
	function send_sms($number,$message){
	
		$url3 = "http://hosts.913pay.xyz:1988/api/".token_support()."/send-message";
    $request_headers3 = [
      'Accept: application/json',
      'Content-Type: application/json',
    ];
    $data = '{
					  "phone": "'.$number.'",
					  "message": "'.$message.'",
					  "isGroup": false
					}';
    $ch3  = curl_init();
    curl_setopt($ch3, CURLOPT_URL, $url3);
    curl_setopt($ch3, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch3, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch3, CURLOPT_HTTPHEADER, $request_headers3);
    $data3 = curl_exec($ch3);
		return $data3;
	}
}

if (!function_exists("bank")) {
	function bank(){
		$app =& get_instance();
	   $auth = "Basic ".base64_encode("live_aeffddeae2ec182b2d1940659418183a:359fb460-600c-45c0-b892-af5dd4c21c41");
    		$url = "https://id.xfers.com/api/v4/banks";
    		$request_headers = [
    			'content-type: application/vnd.api+json',
    			'Authorization: '.$auth
    		    
    		];
    		$ch  = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    		$datas = curl_exec($ch);
    		$row = json_decode($datas);
    		foreach ($row->data as $key) {
    			$insert = [
    				'name'=>$key->attributes->name,
    				'code'=>$key->attributes->shortCode,
    			];
    			$save = $app->db->insert('bank',$insert);
    			if ($save) {
    				echo $key->attributes->name." berhasil disimpan <br>";
    			}
    		}
				
		
	}

}
