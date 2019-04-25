<?php

$api_key="qNge0HYBBuKUvMe59qTLBylOfo5osudi";

$url_up = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$api_key.'&q={"question":"ใครครับ"}';

$json_query = file_get_contents($url_up);
$get_query = json_decode($json_query);



$_id = '';





foreach ($get_query as &$get_query_each){
		//get id
	$id = $get_query_each->_id;
	foreach ($id as $key => $value){
	
		if ($key === '$oid'){
			echo $value . ": ";
			$_id = $value;
			/* $url_id = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint/'.$_id.'?apiKey='.$api_key;
			$newupdate = json_encode(
			array(
				'$set' => array('answer'=> 'ฉันไง')
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
			$returnValup = file_get_contents($url_id, false, $contextu);
			echo 'Updated: '.$returnValup; 
			///$returnValup ถ้าอัพเดทสำเร็จ Updated: { "n" : 1}
			echo '<hr>';
			echo '<br>';  */
			
			
			
		}
		
		
	}

		// get question and answer
		echo $get_query_each->question . '-' . $get_query_each->answer;
		echo '<hr>';
		
		//echo "lll".$value[0];
	
	}

//echo 'result --' .$json_query;


/

echo '<br>';
/* $newupdate = json_encode(
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
///$returnValup ถ้าอัพเดทสำเร็จ Updated: { "n" : 1}
echo '<hr>';
echo '<br>';  */

///
	

?>