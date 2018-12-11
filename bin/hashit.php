<?php 

/*
		Ultra Hash
	Author : Brilly4n
	   { IndoSec }

*/
function hashit($hash, $type)
{
	$files = file_get_contents('bin/wordlist.txt');
	$file  = explode("\n", $files);

	if ($type == 32) {
		$array = array(
			'md5', 'md4', 'md2', 'ripemd128'
		);
		$type_hash = '';
		$data = '';
		$a = 0;
		for($a; $a <= count($array) - 1; $a++){
			
			if ($array[$a] == 'md5') {
				foreach ($file as $key) {
					$hash_asli = md5($key);

					if ($hash_asli == $hash) {
						$data .= $key;
						$type_hash .= $array[$a];
					}else{
						$data .= '';
						$type_hash .= '';
					}
				}
				
			}else{
				foreach ($file as $key) {
					$hash_asli = hash($array[$a], $key);

					if ($hash_asli == $hash) {
						$data .= $key;
						$type_hash .= $array[$a];
					}else{
						$data .= '';
						$type_hash .= '';
					}
				}
			}
		}
		
		$res = array('data' => $data, 'type' => $type_hash, 'hash' => $hash);
		echo "\n[+] Password : $data | Type : $type_hash | Hash : $hash";
	}elseif($type == 40){
		$array = array(
			'sha1', 'ripemd160'
		);
		$type_hash = '';
		$data = '';
		$a = 0;
		for($a; $a <= count($array) - 1; $a++){
			
			if ($array[$a] == 'sha1') {
				foreach ($file as $key) {
					$hash_asli = sha1($key);

					if ($hash_asli == $hash) {
						$data .= $key;
						$type_hash .= $array[$a];
					}else{
						$data .= '';
						$type_hash .= '';
					}
				}
			}else{
				foreach ($file as $key) {
					$hash_asli = hash($array[$a], $key);

					if ($hash_asli == $hash) {
						$data .= $key;
						$type_hash .= $array[$a];
					}else{
						$data .= '';
						$type_hash .= '';
					}
				}
			}
		}
		
		$res = array('data' => $data, 'type' => $type_hash, 'hash' => $hash);
		echo "\n[+] Password : $data | Type : $type_hash | Hash : $hash";
	}elseif($type == 64){
		$array = array(
			'sha256', 'ripemd256', 'snefru', 'gost'
		);
		$type_hash = '';
		$data = '';
		$a = 0;
		for($a; $a <= count($array) - 1; $a++){
			
			if ($array[$a] == 'sha1') {
				foreach ($file as $key) {
					$hash_asli = sha1($key);

					if ($hash_asli == $hash) {
						$data .= $key;
						$type_hash .= $array[$a];
					}else{
						$data .= '';
						$type_hash .= '';
					}
				}
			}else{
				foreach ($file as $key) {
					$hash_asli = hash($array[$a], $key);

					if ($hash_asli == $hash) {
						$data .= $key;
						$type_hash .= $array[$a];
					}else{
						$data .= '';
						$type_hash .= '';
					}
				}
			}
		}
		
		$res = array('data' => $data, 'type' => $type_hash, 'hash' => $hash);
		echo "\n[+] Password : $data | Type : $type_hash | Hash : $hash";
	}elseif($type == 96){
		$array = array(
			'sha384'
		);
		$type_hash = '';
		$data = '';
		$a = 0;
		foreach ($file as $key) {
			$hash_asli = hash('sha384', $key);

			if ($hash_asli == $hash) {
				$data .= $key;
				$type_hash .= 'sha384';
			}else{
				$data .= '';
				$type_hash .= '';
			}
		}
		$res = array('data' => $data, 'type' => $type_hash, 'hash' => $hash);
		echo "\n[+] Password : $data | Type : $type_hash | Hash : $hash";
	}elseif($type == 128){
		$array = array(
			'sha512', 'whirlpool'
		);
		$type_hash = '';
		$data = '';
		$a = 0;
		for($a; $a <= count($array) - 1; $a++){
			
			foreach ($file as $key) {
				$hash_asli = hash($array[$a], $key);

				if ($hash_asli == $hash) {
					$data .= $key;
					$type_hash .= $array[$a];
				}else{
					$data .= '';
					$type_hash .= '';
				}
			}
		
		}
		
		$res = array('data' => $data, 'type' => $type_hash, 'hash' => $hash);
		echo "\n[+] Password : $data | Type : $type_hash | Hash : $hash";
	}elseif($type == 8){
		$array = array(
			'adler32', 'crc32', 'crc32b'
		);
		$type_hash = '';
		$data = '';
		$a = 0;
		for($a; $a <= count($array) - 1; $a++){
			
			foreach ($file as $key) {
				$hash_asli = hash($array[$a], $key);

				if ($hash_asli == $hash) {
					$data .= $key;
					$type_hash .= $array[$a];
				}else{
					$data .= '';
					$type_hash .= '';
				}
			}
		
		}
		
		$res = array('data' => $data, 'type' => $type_hash, 'hash' => $hash);
		echo "\n[+] Password : $data | Type : $type_hash | Hash : $hash";
	}else{

		$res = array('data' => 'Tidak Ditemukan', 'type' => 'Tidak Ditemukan', 'hash' => $hash);
		echo "\n[+] Password : - | Type : - | Hash : $hash";
	}
}


?>