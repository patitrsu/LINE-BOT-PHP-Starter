<?php
$access_token = 'RZ1r4Q9oSx8PfqfpR+ZPMaiRUg9IZesij7t6Vz10LPO4ODUyJJ+a/I/6l9wx/aYb8xZFeY8THKZpv68/u3rEKaiQ/LHuzaUP4iBRqqs/2bVAowFli+8pwR/bMzudjr+UotuGXVZgEh0F0T7qjO3obAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v2/bot/group/{groupId}/leave';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>