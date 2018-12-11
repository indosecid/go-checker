<?php 
	
	if (empty($argv[1])) {
		echo "\n[-] Example: php set.php YOUR_TOKEN\n";
	}else{

		$tokens = $argv[1];
		
		$output = '
<?php 
	// YOUR TOKEN
	$token = "'.$tokens.'";
	return $token; 
?>';

		touch('token.php');
		$o = fopen('token.php', 'w');
		fwrite($o, $output);
		fclose($o);

		echo "\n\n[+] Berhasil Membuat Token \n";
	}
?>