<?php
OK
header('Content-Type: text/html; charset=utf-8');

ini_set("log_errors", 1);
ini_set("error_log", "php-error.txt");

// for test debug file
require_once('LINEBotTiny.php');


$access_token = 'Z+82Dj/iMhmE3mjr2EKu+0+W5a4O0ZiLT8SiohLjwTwSINQ+Kd/v+FdHPH9vSHriwk3IkO7Kio8GWTum007bD3r8/1BCtayNWvf+cDL8FznI3YyKcJ0OazxuBuzrlvXkpn8mYfi5MwddhMfPi3JvvgdB04t89/1O/w1cDnyilFU=';

$channelAccessToken = 'Z+82Dj/iMhmE3mjr2EKu+0+W5a4O0ZiLT8SiohLjwTwSINQ+Kd/v+FdHPH9vSHriwk3IkO7Kio8GWTum007bD3r8/1BCtayNWvf+cDL8FznI3YyKcJ0OazxuBuzrlvXkpn8mYfi5MwddhMfPi3JvvgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '7f9d9cf64df0b478ed1d2c5775a60c45';


$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$botName = "BOT";


//----------function--114------------//
function get_url($urllink) {
  $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $urllink);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
    //curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}
//---------------------------------//


//	$gid = "Cf76ebe75b61229876514969581ff9fd8";	  // id group GISPWA5

//-----------auto send----push message------------------//

// Example : https://gispwa.herokuapp.com/bot.php?send=answer&text=test
// Example : https://gispwa.herokuapp.com/bot.php?send=answer&text=test&uid=C3959e1e52fb0b16f3f9d08c4ad2b0a97


// Exampleadminline : https://gispwa.herokuapp.com/bot.php?send=answer&text=test&id=C3959e1e52fb0b16f3f9d08c4ad2b0a97
if ( $_GET['send'] == 'answer' )
{
	$text = array(
			'type' => 'text',
			'text' => "BOT>>".$_GET['text']
		);


	if ( $_GET['id'] != null )
	{
		$id = $_GET['id'];
	}
	else{
		//$uid = "U08f8f734c798d00fb72aaaa02dd15da7"; // id nut
		//$gid = "C67c2d145ca7be1b591c50c3b3831ada1";	  // id group GIS
	}

	$client->pushMessage($id, $text);
}
//---------------------------------------------------------//



// Example : https://gispwasys.herokuapp.com/sysbot.php?send=hbd
if ( $_GET['send'] == 'hbd' )
{
	$text = array(
			'type' => 'text',
			'text' => $_GET['text']
		);
	$uid = "U08f8f734c798d00fb72aaaa02dd15da7"; // id nut
	//$gid = "C67c2d145ca7be1b591c50c3b3831ada1";	  // id group GIS
	if ( $_GET['uid'] != null )
	{
		$uid = $_GET['uid'];
	}
	$client->pushMessage($uid, $text);


	$pic = 'https://gispwa.herokuapp.com/image/hbd.jpg';
	// Push image
	$client->pushMessage2(array( 
		'to' => $uid,
		'messages' => array(
			array(
				'type' => 'image',
				'originalContentUrl' => $pic,
				'previewImageUrl' => $pic
			)
		)
	));


}



//push แบบ multi ใช้ pushMessage1 แบบ array มี sub
if ( $_GET['send'] == 'location' )
{
	$text = array(
		            array(
			                'type' => 'sticker',
		                    'packageId' => 2,
		                    'stickerId' => 149
		                ),
		            array(
							"type"=> "location",
							"title"=> "ตำแหน่ง กปภ.",
							"address"=> "กปภ. สำนักงานใหญ่",
							"latitude"=> 13.875844,
							"longitude"=> 100.585318				
						)
			);       
		

	$uid = "U08f8f734c798d00fb72aaaa02dd15da7"; // id nut
	//$gid = "C3959e1e52fb0b16f3f9d08c4ad2b0a97";	  // id group dev
	if ( $_GET['uid'] != null )
	{
		$uid = $_GET['uid'];
	}
	$client->pushMessage1($uid, $text);
}


//https://gispwa.herokuapp.com/bot.php?action=send&name=gis&text=โว้วๆๆๆ20ขอเสียงโหน่ยยย

if ( $_GET['action'] == 'send' )
{

	if($_GET['name'] == 'gispwa5'){
		$id = 'C67c2d145ca7be1b591c50c3b3831ada1';
	}
	if($_GET['name'] == 'gis'){
		$id = 'C67c2d145ca7be1b591c50c3b3831ada1';
	}
	if($_GET['name'] == 'dev'){
		$id = 'C3959e1e52fb0b16f3f9d08c4ad2b0a97';
	}
	if($_GET['name'] == 'ploy'){
		$id = 'C3959e1e52fb0b16f3f9d08c4ad2b0a97';
	}
	if($_GET['name'] == 'new'){
		$id = 'U6d711483fa9f51d6934bac5a15373fb6gid ';
	}	
	if($_GET['name'] == 'nut'){
		$id = 'U08f8f734c798d00fb72aaaa02dd15da7  ';
	}


	$text = array(
				array(
					'type' => 'text',
					'text' => $_GET['text']
				 )
			);       
		

	if ( $_GET['uid'] != null )
	{
		$uid = $_GET['uid'];
	}
	$client->pushMessage1($id, $text);
}






// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data------------------------------------replymessage-----------------//
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent

			$text = $event['message']['text'];
			$uid = $event['source']['userId'];
			$gid = $event['source']['groupId'];
			//$rid = $event['source']['roomId'];

			$timestamp = $event['timestamp'];


			if(preg_match('(ไป กปภ.|ไป การประปา|ไป สาขา|ไป ประปา|ไป )', $text) === 1) {

				$pwacode = substr($text,-7);
				//---------------------------------//
				$urllink = 'https://gisweb1.pwa.co.th/lineservice/pwa_location/get_office_bot.php?pwa_code='.$pwacode; 
				//$urllink = 'https://gisweb1.pwa.co.th/bot_line/service/get_office_bot.php?pwa_code='.$pwacode; 
				$str = get_url($urllink); //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

				$split = explode(",", $str);
				//echo $split[0];
				//echo $split[1];
				//echo $split[2];
				
				if ($split[3]){
					$messages = [
						"type"=> "location",
						"title"=> "ตำแหน่ง",
						"address"=> $split[3]." ".$split[2],
						"latitude"=> $split[0],
						"longitude"=> $split[1]
					];
				}
				else{

				$messages = [
				'type' => 'text',
				//'text' => $text
				'text' => $text_reply
				];


				}

			}


			else if ($text == 'กปภ.') {
				$messages = [
					"type"=> "location",
					"title"=> "ตำแหน่ง กปภ.",
					"address"=> "กปภ. สำนักงานใหญ่",
					"latitude"=> 13.875844,
					"longitude"=> 100.585318
				];
			}


			else if ($text == 'ตรวจสอบพื้นที่ให้บริการ') {
					$messages = [
					'type' => 'text',
					'text' => 'โปรดแชร์ Location เพื่อตรวจสอบพื้นที่ให้บริการ'
					];

			}

			else if ($text == 'งานเกษียณ') {
				$messages = [
					"type"=> "video",
					"originalContentUrl"=> "https://gis4manager.herokuapp.com/video/video.mp4",
					"previewImageUrl"=> "https://gis4manager.herokuapp.com/image/preview.jpg"
				];
			}

			else if ($text == 'id' || $text == 'Id') {

				// Build message to reply back
				if ($gid){
					$messages = [
					'type' => 'text',
					"text" => 'gid='.$gid
					];
				}

				else if ($uid){
					$messages = [
					'type' => 'text',
					"text" => 'uid='.$uid
					];
				}

			}



			else {
				

				/*
				$text_reply = "ยังไม่มีคำตอบ";

				// Build message to reply back
				$messages = [
				'type' => 'text',
				//'text' => $text
				"text" => $text_reply." ".$uid
				//"text" => $text_reply

				];

				*/

			}



			// Get replyToken
			$replyToken = $event['replyToken'];



			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
				//'messages' => ["https://gispwaai.herokuapp.com/golf.jpg"],

			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}


	}
}




echo "OK";





//ชุดตัวอย่างการเขียนแบบของเตย-------------------//

//// Log to file
$t = var_export( $client->parseEvents() , true);
file_put_contents("test.txt", $t );


foreach ($events['events'] as $event) {
	// Reply only when message sent is in 'text' format
	if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
		// Get text sent
		$text = $event['message']['text'];
		$uid = $event['source']['userId'];
		$gid = $event['source']['groupId'];
		$timestamp = $event['timestamp'];

function replyMsg($event, $client)
{
    if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
    	//มีด้วยกัน 2 field คือ type = “text” และ text ส่งได้สูงสุด 2000 ตัวอักษร สามารถใช้ emoticons ได้ตามมาตรฐาน unicode
        $msg = $event['message']['text'];
        if( $msg == 'ทดสอบ'){ 
			$t = 'Test ละสิ'; 	
        	$a = array(
						array(
			                'type' => 'sticker',
		                    'packageId' => 2,
		                    'stickerId' => 149
		                ),
		                array(
							'type' => 'text',
							'text' => $t . ''				
						)
					);
			$client->replyMessage1($event['replyToken'],$a);
		}
		
		else if (preg_match('(ด่า|เลว|ไม่ดี|โดนว่า|น่าเบื่อ|รำคาญ|ชั่ว|สันดาน|บ่น|ถูกว่า)', $msg) === 1) {

			$t = 'การบ่นไม่ใช่การแก้ปัญหา และ การด่าก็ไม่ใช่วิธีการแก้ไข'; 	
        	$a = array(
		                array(
							'type' => 'text',
							'text' => $t . ''				
						)
					);
			$client->replyMessage1($event['replyToken'],$a);

		}
		


    }

    elseif ($event['type'] == 'message' && $event['message']['type'] == 'sticker') {
        $client->replyMessage1($event['replyToken'],array(
				array(
					'type' => 'sticker',
                    'packageId' => 3,
                    'stickerId' => 232
				) )
			);
    }

   elseif ($event['type'] == 'message' && $event['message']['type'] == 'location') {

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


				   $client->replyMessage1($event['replyToken'],array(
							array(
									"type"=> "location",
									"title"=> "ตำแหน่งของท่าน",
									"address"=> $address,
									"latitude"=> $latitude,
									"longitude"=> $longitude
							)
					   )
					);

    }
}



// listen  $client->parseEvents()  ควรเอาไว้ล่างสุด ถ้าเอาไว้ด้านบนจะทำให้ pushMsg ไม่ได้
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
					replyMsg($event, $client);					
                    break;
                case 'image':
					replyMsg($event, $client);					
                    break;
                case 'sticker':
					replyMsg($event, $client);					
                    break;
                case 'location':
					replyMsg($event, $client);					
                    break;
                default:
                    //error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
//ชุดตัวอย่างการเขียนแบบของเตย-------------------//

echo "PASS";

?>