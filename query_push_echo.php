<?php
session_start();
$apiKey = 'qNge0HYBBuKUvMe59qTLBylOfo5osudi';
$url_get = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$apiKey;

$json_get = file_get_contents($url_get);
$get_quest = json_decode($json_get);
$data = array();	
foreach ($get_quest as &$get_quest_each){
	array_push($data, array(
			'id' => $get_quest_each->id,
			'address' =>  $get_quest_each->address,	
			'latitude' => $get_quest_each->latitude,	
			'longitude' => $get_quest_each->longitude,	
			'record_time' => $get_quest_each->record_time,	
			'status' => $get_quest_each->status,	
			'response_time' => $get_quest_each->response_time,	
			'recorder' => $get_quest_each->recorder
			));


	

}
echo json_encode($data);

?>
