<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('PinterestAPI.php');

$renderPin = function($pin){echo '<div><h2>' . $pin['description'] . '</h2>'; foreach($pin['images'] as $image) echo '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt ="' . $pin['description'] . '"></div>';};

$client_id = '1440917';
$client_secret = 'a6b3c1d5';
$username = 'nplawska'; 
$password = 'zazula62';

$p = new Pinterest_API();
$p->fetch_access_token($client_id, $client_secret, $username, $password);
$resp = json_decode($p->allByUser($username),1);

if($resp['status'] == "success")
{
	foreach($resp['data']['pins'] as $pin)	
		$renderPin($pin);
}

