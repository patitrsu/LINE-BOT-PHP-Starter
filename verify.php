<?php
$access_token = ' O7gesutFtoTWet1OutGY1PCTKsqXh12y76TAUGV5HXjGSMYd7sj6nm0vOr/Cdgyl8xZFeY8THKZpv68/u3rEKaiQ/LHuzaUP4iBRqqs/2bXm5jhkGCqitD/1han0Ev8XIXCqk4fiVZoO55mnRiuXSgdB04t89/1O/w1cDnyilFU=';

$url = 'https://notify­api.line.me/api/revoke';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>