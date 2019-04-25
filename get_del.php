<?php
$api_key="qNge0HYBBuKUvMe59qTLBylOfo5osudi";
$id_del = '59fc45f1bd966f6a2c713744';
$url_del = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint/'.$id_del.'?apiKey='.$api_key;

$optsd = array(
	'http' => array(
		'method' => "DELETE",
		'header' => "Content-type: application/json",
		)
	);

$contextd = stream_context_create($optsd);
$returnValdel = file_get_contents($url_del, false, $contextd);
echo 'Deleted: '.$returnValdel;
echo '<hr>';
echo '<br>';
	
	
?>