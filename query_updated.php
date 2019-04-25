<?php

$api_key="qNge0HYBBuKUvMe59qTLBylOfo5osudi";

$url_up = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$api_key.'&q={"question":"ใครครับ"}';

$newupdate = json_encode(
	array(
		'$set' => array('answer'=> 'นนท์เองครับ')
		)
	);


$optsu = array(
	'http' => array(
		'method' => "PUT",
		'header' => "Content-type: application/json",
		'content' => $newupdate
	)
);

$contextu = stream_context_create($optsu);
//echo $contextu;
$returnValup = file_get_contents($url_up, false, $contextu);
echo 'Updated: '.$returnValup;
echo '<hr>';
echo '<br>';
	

?>