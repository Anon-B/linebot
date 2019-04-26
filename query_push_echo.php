<?php
session_start();
$apiKey = 'qNge0HYBBuKUvMe59qTLBylOfo5osudi';
$url_get = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$apiKey;

$json_get = file_get_contents($url_get);
$get_quest = json_decode($json_get);
$data = array();	
foreach ($get_quest as &$get_quest_each){
	array_push($data, array(
			'id' => $result['id'],
			'address' => $result['question'],	
			'latitude' => $result['answer'],	
			'longitude' => $result['line_id'],	
			'record_time' => $result['status'],	
			'status' => $result['admin_by'],	
			'response_time' => $result['datetime_ques'],	
			'recorder' => $result['datetime_ans']
						)
						);


	

}
echo json_encode($data);

?>
