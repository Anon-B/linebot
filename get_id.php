<?php	
$apiKey = 'qNge0HYBBuKUvMe59qTLBylOfo5osudi';
$url_get = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$apiKey;


$json_get = file_get_contents($url_get);
$get_quest = json_decode($json_get);


foreach ($get_quest as &$get_quest_each){
		//get id
	$id = $get_quest_each->_id;
	foreach ($id as $key => $value){
		if ($key === '$oid'){
			echo $value . ": ";
		}
	}

		// get question and answer
		echo $get_quest_each->question . '-' . $get_quest_each->answer;
		echo '<hr>';

	}
	exit();
	
?>