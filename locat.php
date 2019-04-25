<?php


function replyMsg($event, $client){
	if ($event['type'] == 'message' && $event['message']['type'] == 'location') {

		$latitude = $event['message']['latitude'];
		$longitude = $event['message']['longitude'];
		$title = $event['message']['title'];
		$address = $event['message']['address'];
		$uid = $event['source']['userId'];
		$gid = $event['source']['groupId'];


















				if ($gid){
					$t = 'กำลังตรวจสอบตำแหน่งของท่าน โปรดรอสักครู่ ...';	
					$client->pushMessage1($gid,array(
								array(
									'type' => 'text',
									'text' => $t 
								) 
							)
					);
				}

				else if ($uid){
					$t = 'กำลังตรวจสอบตำแหน่งของท่าน โปรดรอสักครู่ ...';	
					$client->pushMessage1($uid,array(
								array(
									'type' => 'text',
									'text' => $t 
								) 
							)
					);
				}
				$api_key="qNge0HYBBuKUvMe59qTLBylOfo5osudi";
				$url = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$api_key;

				$new = json_encode(array(
					'address' => '$address',
					'latitude' => '$latitude',
					'longitude'=> $longitude
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







/* 
				   $client->replyMessage1($event['replyToken'],array(
							array(
									"type"=> "location",
									"title"=> "ตำแหน่งของท่าน",
									"address"=> $address,
									"latitude"=> $latitude,
									"longitude"=> $longitude
							)
					   )
					); */

    }
}
















?>