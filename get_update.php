<?php

$_id = '59fc45f1bd966f6a2c713766';
$url_up = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$_id.'?apiKey='.$apiKey;

$newupdate = json_encode(
	array(
		'$set' => array('answer'=> 'lol hahaha')
	)
);

	
	//$newupdate = json_encode(array(
	//		'answer' => 'ขอคิดดูก่อน'
	//));
	

$optsu = array(
	'http' => array(
		'method' => "PUT",
		'header' => "Content-type: application/json",
		'content' => $newupdate
	)
);

$contextu = stream_context_create($optsu);
$returnValup = file_get_contents($url_up, false, $contextu);
echo 'Updated: '.$returnValup;
echo '<hr>';
echo '<br>';

?>