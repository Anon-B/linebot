<?php
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: text/html; charset=utf-8');
//ini_set("log_errors", 1);
//ini_set("error_log", "php-error.txt");
require_once('LINEBotTiny.php');
$access_token = 'Z+82Dj/iMhmE3mjr2EKu+0+W5a4O0ZiLT8SiohLjwTwSINQ+Kd/v+FdHPH9vSHriwk3IkO7Kio8GWTum007bD3r8/1BCtayNWvf+cDL8FznI3YyKcJ0OazxuBuzrlvXkpn8mYfi5MwddhMfPi3JvvgdB04t89/1O/w1cDnyilFU=';
$channelAccessToken = 'Z+82Dj/iMhmE3mjr2EKu+0+W5a4O0ZiLT8SiohLjwTwSINQ+Kd/v+FdHPH9vSHriwk3IkO7Kio8GWTum007bD3r8/1BCtayNWvf+cDL8FznI3YyKcJ0OazxuBuzrlvXkpn8mYfi5MwddhMfPi3JvvgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '7f9d9cf64df0b478ed1d2c5775a60c45';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$botName = "BOT";
//-----------auto send----push message------------------//
// Example : https://gispwaai.herokuapp.com/bot/bot.php?send=auto&text=test&id=R058c5b58c97773c8d032eef585b
//---------------------------------------------------------//
if ($_GET['send'] == 'push')
{
	$text = array(
			'type' => 'text',
			'text' => $_GET['text']
		);
	$uid = $_GET['id']; // id auto
	$client->pushMessage($uid, $text);
}
//---------------------------------------------------------//
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			$uid = $event['source']['userId'];
			$gid = $event['source']['groupId'];
			$timestamp = $event['timestamp'];
			
			if(preg_match('(สวัสดี|หวัดดี|ดีค่ะ|ดีคับ|ดีครับ|ดีคร่า|ดีค่า)', $text) === 1) {
				
				$a1=array("สวัสดี","หวัดดี","ดีค่ะ","ดีคับ","ดีครับ","ดีคร่า","ดีค่า");
				foreach ($a1 as $val) {
					$chk = explode($val,$text);	
						if ($chk[0]==""){
							
							$gid = $event['source']['groupId'];
							$uid = $event['source']['userId'];
							//$url = 'https://api.line.me/v2/bot/group/'.$gid.'/member/'.$uid; //กลุ่ม
							$url = 'https://api.line.me/v2/bot/profile/'.$uid;			//user
							$channelAccessToken2 = 'Z+82Dj/iMhmE3mjr2EKu+0+W5a4O0ZiLT8SiohLjwTwSINQ+Kd/v+FdHPH9vSHriwk3IkO7Kio8GWTum007bD3r8/1BCtayNWvf+cDL8FznI3YyKcJ0OazxuBuzrlvXkpn8mYfi5MwddhMfPi3JvvgdB04t89/1O/w1cDnyilFU=';
							$header = array(
								"Content-Type: application/json",
								'Authorization: Bearer '.$channelAccessToken2,
							);
							$ch = curl_init();
							//curl_setopt($ch, CURLOPT_HTTP_VERSION, 'CURL_HTTP_VERSION_1_1');
							//curl_setopt($ch, CURLOPT_VERBOSE, 1);
							//curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
							//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_FAILONERROR, 0);		;
							//curl_setopt($ch, CURLOPT_HTTPGET, 1);
							//curl_setopt($ch, CURLOPT_USERAGENT, $agent);
							//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
							curl_setopt($ch, CURLOPT_HEADER, 0);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
							curl_setopt($ch, CURLOPT_URL, $url);
							
							$profile =  curl_exec($ch);
							curl_close($ch);
							$obj = json_decode($profile);
							$pathpic = explode("cdn.net/", $obj->pictureUrl);
							$messages = [
									"type" => "text",
									"text" =>  "ดีครับ \n".$obj->displayName
							];	 
								
							break;
						}
						else{
								
						}
				} 
				
					
			}
	
			else if(preg_match('(ขอรูป|ดูรูป|รูป|รูปภาพ)', $text) === 1) {	
					$gid = $event['source']['groupId'];
					$uid = $event['source']['userId'];
					//$url = 'https://api.line.me/v2/bot/group/'.$gid.'/member/'.$uid; //กลุ่ม
					$url = 'https://api.line.me/v2/bot/profile/'.$uid;			//user
					$channelAccessToken2 = 'Z+82Dj/iMhmE3mjr2EKu+0+W5a4O0ZiLT8SiohLjwTwSINQ+Kd/v+FdHPH9vSHriwk3IkO7Kio8GWTum007bD3r8/1BCtayNWvf+cDL8FznI3YyKcJ0OazxuBuzrlvXkpn8mYfi5MwddhMfPi3JvvgdB04t89/1O/w1cDnyilFU=';
					$header = array(
						"Content-Type: application/json",
						'Authorization: Bearer '.$channelAccessToken2,
					);
					$ch = curl_init();
					//curl_setopt($ch, CURLOPT_HTTP_VERSION, 'CURL_HTTP_VERSION_1_1');
					//curl_setopt($ch, CURLOPT_VERBOSE, 1);
					//curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_FAILONERROR, 0);		;
					//curl_setopt($ch, CURLOPT_HTTPGET, 1);
					//curl_setopt($ch, CURLOPT_USERAGENT, $agent);
					//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
					curl_setopt($ch, CURLOPT_URL, $url);
					
					$profile =  curl_exec($ch);
					curl_close($ch);
					$obj = json_decode($profile);
					$pathpic = explode("cdn.net/", $obj->pictureUrl);
					$messages = [
								'type' => 'image',
								'originalContentUrl' => 'https://obs.line-apps.com/'.$pathpic[1],
								'previewImageUrl' => 'https://obs.line-apps.com/'.$pathpic[1].'/large'
					];
			}
			

			else if ($text == 'ที่ทำงาน') {
				$messages = [
					"type"=> "location",
					"title"=> "ตำแหน่ง กปภ.",
					"address"=> "กปภ. สำนักงานใหญ่",
					"latitude"=> 13.875844,
					"longitude"=> 100.585318
				];
			}


			else if (preg_match('(ชื่อ|ชื่อไร)', $text) === 1) {
				$t=array("ลองทายดูสิ","ทายซิ","บอกดีมั้ย");
				$random_keys=array_rand($t,1);
				$txt = $t[$random_keys];
					$messages = [
								'type' => 'text',
								'text' => $txt          
				];
			}

			
			else if (preg_match('(เตือน|ตาราง)', $text) === 1 && preg_match('(นัด)', $text) === 1) {
				$detail = '';
				$memo_=array(

					"23-04-2019"=>"มีนัด (23 เม.ย. 62) ",
					"27-04-2019"=>"มีนัด (27เม.ย. 62) ",
					"29-04-2019"=>"มีนัด (29 เม.ย. 62) "
				);				
				
				$today_ = date("d-m-Y");

				$s7d = date("d-m-Y",strtotime("+7 days",strtotime($today_)));
				$s3d = date("d-m-Y",strtotime("+3 days",strtotime($today_)));
				$s2d = date("d-m-Y",strtotime("+2 days",strtotime($today_)));
				$s1d = date("d-m-Y",strtotime("+1 days",strtotime($today_)));


				if(array_key_exists($s7d, $memo_))  // holiday;
				//else if(in_array($today, $holiday))  // holiday;
				{
					$detail .= "เหลือเวลาอีก 7 วัน: ".$memo_[$s7d]." ";
				}
				if(array_key_exists($s3d, $memo_))  // holiday;
				//else if(in_array($today, $holiday))  // holiday;
				{
					$detail .= "เหลือเวลาอีก 3 วัน: ".$memo_[$s3d]." ";
				}
				if(array_key_exists($s2d, $memo_))  // holiday;
				//else if(in_array($today, $holiday))  // holiday;
				{
					$detail .= "เหลือเวลาอีก 2 วัน: ".$memo_[$s2d]." ";
				}
				if(array_key_exists($s1d, $memo_))  // holiday;
				//else if(in_array($today, $holiday))  // holiday;
				{
					$detail .= "เหลือเวลาอีก 1 วัน: ".$memo_[$s1d]." ";
				}
				
				if(array_key_exists($today_, $memo_))
				{
					$detail .= "อย่าลืมวันนี้นะ : ".$memo_[$today_]." ";
				}				
				
				//$uid1 = 'U93c1d95e7b6d72d2dd3644bbbd35281a';//yl
				//$uid2 = 'Uf8e0fa9ddb37ad7d92989e1b80d855d5'; //nt
				$id_t = $uid;
				if($gid != ""){
					$id_t = $gid;
				}
				else{	
				}
				
				$url_line = 'https://xxxxxxxxxxxxxxxxxxxxxxxx/bot.php?send=push&id='.$id_t .'&text='.urlencode($detail);
				//echo $url_line;
				$chOne = curl_init(); 
					curl_setopt( $chOne, CURLOPT_URL, $url_line); 
					curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 0); 
					curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
					curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
					curl_setopt($chOne, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
					//curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
					//curl_setopt($chOne, CURLOPT_AUTOREFERER , true);
					//curl_setopt($chOne, CURLOPT_CONNECTTIMEOUT, 30);
					//curl_setopt($chl, CURLOPT_CONNECTTIMEOUT, 10);
					//curl_setopt($chl, CURLOPT_TIMEOUT , 10);

				$result = curl_exec( $chOne ); 
				curl_close( $chOne ); 
				
				$t=array("อย่าพลาดนัดสำคัญ","อย่าลืมนะ");
				$random_keys=array_rand($t,1);
				$txt = $t[$random_keys];
					$messages = [
								'type' => 'text',
								'text' => $txt.$today_.$s3d.$s2d.$s1d.$s7d          
					];
			}			
			
			else if (preg_match('(ชอบ)', $text) === 1 && preg_match('(สี)', $text) === 1 && preg_match('(พี่|เธอ|เทอ|คุณ)', $text) === 1) {
				$t=array("ฟ้า");
				$random_keys=array_rand($t,1);
				$txt = $t[$random_keys];
					$messages = [
								'type' => 'text',
								'text' => $txt          
					];
			}

			else if (preg_match('(วันนี้)', $text) === 1) {
				$today = date("Y-m-d");
				//$today = "2018-07-01";
				$txt = "";
				$DayOfWeek = date("w", strtotime($today));
				if($DayOfWeek == 0 )  // 0 = Sunday, 6 = Saturday;
				{
					$txt = "วันนี้วันอาทิตย์";
				}
				else if($DayOfWeek ==6)  // 0 = Sunday, 6 = Saturday;
				{
					$txt = "วันนี้วันเสาร์";
				}
				else{
					$t=array("ทำงานสิทำงาน","วันทำงานอีกละ","ไม่ทำงานหรอไง","ทำงานบ้างเถอะ");
					$random_keys=array_rand($t,1);
					$txt = $t[$random_keys];
					//echo "$today = <font color=blue>No Holiday</font><br>";
				}
				$messages = [
								'type' => 'text',
								'text' => $txt          
							];
			}

			else if ($text == 'id') {
				
				// Build message to reply back
				$messages = [
				'type' => 'text',
				"text" => $uid." ".$gid
				];
			}

			else {
				
				$ta=array("1","2","3","4","5");
				$random=array_rand($ta,1);
				$r = $ta[$random];
				
				if($r == "3"){
					$t=array("ครับ","คะ");
					$random_keys=array_rand($t,1);
					$txt = $t[$random_keys];
					$messages = [
								'type' => 'text',
								'text' => $txt          
					];
				}
				else if($r == "2"){
					$sticker=array("2,23","2,39","2,161","2,170","2,161","2,33");
					$random_keys=array_rand($sticker,1);
					$txt = $sticker[$random_keys];
					$split = explode(",", $txt);
					$p = $split[0];
					$s = $split[1];
					//echo $split[0];
					$messages = [
								'type' => 'sticker',
								'packageId' => $p,
								'stickerId' => $s
					];
				}
				
				
				else{
				}
			}
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
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
?>
