<?php

$api_key="qNge0HYBBuKUvMe59qTLBylOfo5osudi";
$url = ('https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$api_key;

$new = json_encode(array(
	'question' => 'ทำอะไรได้บ้าง',
	'answer' => 'ทำได้ทุกอย่าง'
));

$opts = array(
	'http' => array(
		'method' => "POST",
		'header' => "Content-type: application/json",
		'content' => $new
	)
);

$context = stream_context_create($opts);
$returnVal = file_get_contents($url, false, $context);
echo 'Added: '.$returnVal;
echo '<hr>';
echo '<br>';
?>