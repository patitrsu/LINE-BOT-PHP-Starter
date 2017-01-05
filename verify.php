<?php
$proxy = 'http://fixie:XSPmbLgrvhlfM9U@velodrome.usefixie.com:80';
$proxyauth = 'velodrome:XSPmbLgrvhlfM9U';

$access_token = '5gU8HodUfwdJ7JbvJMYoE5I2CSYdl5G8cB8mfmUXmN4CySTBlf5SkRQtnS54h8h78xZFeY8THKZpv68/u3rEKaiQ/LHuzaUP4iBRqqs/2bUzqFjwQIxNONJ2BpEy2eVNwmeoNadkH7MLzX7aHcAkIAdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>

