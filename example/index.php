<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../src/Pinterest/PinterestAPI.php');

$renderPin = function($pin){echo '<div><h4>' . $pin['description'] . '</h4>'; foreach($pin['images'] as $image) echo '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt ="' . $pin['description'] . '"></div>';};

$client_id = 'YOUR_PINTEREST_APP_CLIENT_ID';
$client_secret = 'YOUR_PINTEREST_APP_CLIENT_SECRET';
$username = 'YOUR_PINTEREST_USERNAME'; 
$password = 'YOUR_PINTEREST_PASSWORD';

$p = new PinterestAPI();
$p->fetch_access_token($client_id, $client_secret, $username, $password);
$resp = json_decode($p->allByUser($username),1);

if($resp['status'] == "success")
{
	foreach($resp['data']['pins'] as $pin)	
		$renderPin($pin);
}

