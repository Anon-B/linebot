<?php

$api_key="qNge0HYBBuKUvMe59qTLBylOfo5osudi";
$url_get = ('https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$api_key.'&q={"_id":{"$oid":"59fc45f1bd966f6a2c713792"},"question":"สวัสดี"}');


$json_get = file_get_contents($url_get);
$get_quest = json_decode($json_get);
echo '<pre>';
	print_r($get_quest);
	exit();


?>