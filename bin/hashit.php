<?php 

/*
		Ultra Hash
	Author : Brilly4n
	   { IndoSec }

*/
function hashit($hash, $email, $type, $nama_file)
{

	if ($type == 32) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://md5.pinasthika.com/api/decrypt?value='.$hash);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$x = curl_exec($ch);
		$z = json_decode($x);
		if ($z->status->code == 200) {

			$o = fopen($nama_file, 'a');
			fwrite($o, $email."|".$z->result."\n");
			fclose($o);

			$res = array('data' => $z->result, 'hash' => $hash);
			echo "\n[+] Password : $z->result | Hash : $type";	
			
		}else{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://mytools.mohona.tv/api/ultra_hash/'.$hash);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$x = curl_exec($ch);
			$z = json_decode($x);

			$o = fopen($nama_file, 'a');
			fwrite($o, $email."|".$z->data."\n");
			fclose($o);

			$res = array('data' => $z->data, 'type' => $z->type, 'hash' => $hash);
			echo "\n[+] Password : $z->data | Type : $z->type | Hash : $type";		
		}
	}else{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://mytools.mohona.tv/api/ultra_hash/'.$hash);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$x = curl_exec($ch);
		$z = json_decode($x);

		$o = fopen($nama_file, 'a');
		fwrite($o, $email."|".$z->data."\n");
		fclose($o);

		$res = array('data' => $z->data, 'type' => $z->type, 'hash' => $hash);
		echo "\n[+] Password : $z->data | Type : $z->type | Hash : $type";
	}
}


?>