<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$access_token = '5gU8HodUfwdJ7JbvJMYoE5I2CSYdl5G8cB8mfmUXmN4CySTBlf5SkRQtnS54h8h78xZFeY8THKZpv68/u3rEKaiQ/LHuzaUP4iBRqqs/2bUzqFjwQIxNONJ2BpEy2eVNwmeoNadkH7MLzX7aHcAkIAdB04t89/1O/w1cDnyilFU=';
$proxy = 'http://fixie:XSPmbLgrvhlfM9U@velodrome.usefixie.com:80';
$proxyauth = 'velodrome:XSPmbLgrvhlfM9U';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
echo $events;
// Validate parsed JSON data
if (!is_null($events['events'])) {
  // Loop through each event
  foreach ($events['events'] as $event) {
    // Reply only when message sent is in 'text' format
    if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
      // Get text sent
      $text = $event['message']['text'];
      // Get replyToken
      $replyToken = $event['replyToken'];

      $user = $event['source']['userId'];

      // Build message to reply back
      $messages = [
        'type' => 'text',
        'text' => $user
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/reply';
      $data = [
        'replyToken' => $replyToken,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

       $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
      curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $post . "\r\n";

    }
  }
}
echo "OK";
?>