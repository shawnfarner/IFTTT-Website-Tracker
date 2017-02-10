<?php

$ip = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REQUEST_URI'];

$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$city = $details->city;
$state = $details->region;

if	($city="") { goto a; }

else {

$url = 'https://maker.ifttt.com/trigger/[trigger name]/with/key/[key]';

$data = array(
   "value1" => $city,
   "value2" => $state,
   "value3" => $page,
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch); }


a:
exit;

?>