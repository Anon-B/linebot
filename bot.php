<?php

// for test debug file
require_once('LINEBotTiny.php');

//ใส่Token ที่ได้จาก Line Messaging API https://developers.line.me
$channelAccessToken = 'Z+82Dj/iMhmE3mjr2EKu+0+W5a4O0ZiLT8SiohLjwTwSINQ+Kd/v+FdHPH9vSHriwk3IkO7Kio8GWTum007bD3r8/1BCtayNWvf+cDL8FznI3YyKcJ0OazxuBuzrlvXkpn8mYfi5MwddhMfPi3JvvgdB04t89/1O/w1cDnyilFU=';

//ใส Channel secret ที่ได้จาก Line Messaging API https://developers.line.me
$channelSecret = '7f9d9cf64df0b478ed1d2c5775a60c45';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$botName = "BOT";


//----------function-Curl------------//
function get_url($urllink) 
{
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



//ส่งแบบข้อความเดียว---push message------------------//
// Example : https://gisbott.herokuapp.com/bot.php?send=answer&text=test
// Example : https://gispwa.herokuapp.com/bot.php?send=answer&text=test&uid=C3959e1e52fb0b16f3f9d08c4ad2b0a97
if ( $_GET['send'] == 'answer' )
{
	$text = array(
			'type' => 'text',
			'text' => "BOT>>".$_GET['text']
		);
	//$id = $_GET['id'];			//กรณีอยากให้ Push ไปยังid line คนอื่นๆได้
	$id = "U08f8f734c798d00fb72aaaa02dd15da24"; // fix id line ที่จะทำการ push
	$client->pushMessage($id, $text);
}
//---------------------------------------------------------//


//ส่งแบบข้อความและรูป-------------------------------------------//
if ( $_GET['send'] == 'txtpic' )
{
	$text = array(
			'type' => 'text',
			'text' => $_GET['text']
		);
	$uid = "U08f8f734c798d00fb72aaaa02dd15da14";	  // id 
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
//---------------------------------------------------------//

//ส่งแบบข้อความแบบ-multi----แบบ array มี sub array-------------//
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
	$uid = "U08f8f734c798d00fb72aaaa02dd15da7";	  // id group GIS	
	//$uid = $_GET['uid'];
	$client->pushMessage1($uid, $text);
}




//ฟังก์ชั่น ReplyMessage-------------------------------------------------------------//
function replyMsg($event, $client)
{
echo "OK";
/*
	//-----ถ้ามีการส่งข้อความText------------------------------------------------------------//
    if ($event['type'] == 'message' && $event['message']['type'] == 'text') {

		//ข้อความtext ที่ได้รับ
        $msg = $event['message']['text'];


        if( $msg == 'ทดสอบ'){ 

			$t = 'ทดสอบๆ'; 	
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


		else if (preg_match('(เหงา)', $msg) === 1) {

			$t=array("เราพร้อมจะเป็นเพื่อนคุณ","เหงาเหมือนกันเลย","ให้เบลช่วยแก้เหงามั้ย");
			$random_keys=array_rand($t,1);
			$txt = $t[$random_keys];
        	$a = array(
		                array(
							'type' => 'text',
							'text' => $txt			
						)
					);
			$client->replyMessage1($event['replyToken'],$a);
		}


    }
	//----------------------------จบเงื่อนไขข้อความtext-----------------------------------//

*/

	//-----ถ้ามีการส่งสติ๊กเกอร์------------------------------------------------------------//
    elseif ($event['type'] == 'message' && $event['message']['type'] == 'sticker') {
        $client->replyMessage1($event['replyToken'],array(
				array(
					'type' => 'sticker',
                    'packageId' => 3,
                    'stickerId' => 232
				) )
			);
    }
	//----------------------------จบเงื่อนไขสติ๊กเกอร์------------------------------------//

/*


   //-----ถ้ามีการแชร์ location-------------------------------------------------------//
   elseif ($event['type'] == 'message' && $event['message']['type'] == 'location') {
		$latitude = $event['message']['latitude'];
		$longitude = $event['message']['longitude'];
		$title = $event['message']['title'];
		$address = $event['message']['address'];

			   $client->replyMessage1($event['replyToken'],array(
						array(
								"type"=> "location",
								"title"=> "ตำแหน่งของท่าน",
								"address"=> $address,
								"latitude"=> $latitude,
								"longitude"=> $longitude
						),
						array(
								'type' => 'text',
								'text' => 'ตำแหน่งของท่านอยู่ในพื้นที่ให้บริการของกปภ.หรือไม่ คงต้องถามใจท่านดูเอาเอง'
						)
				   )
				);
    }
	//----------------------------จบเงื่อนไขแชร์ location------------------------------------//
*/

}
//----------------------------จบฟังก์ชั่น ReplyMessage----------------------------------//




//------listen--$client->parseEvents()----และเข้าฟังก์ชั่น replyMsg--------//
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
//----------------------------------------------------------//



?>