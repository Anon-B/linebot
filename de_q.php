<?php
session_start();
$data = array();
require("connect/connect.php");

$datenow = date("Y-m-d H:i:s");

function get_url($url,$request) {

	//$url = 'http://localhost/sample/login_action.php'; // กำหนด URl ของเว็บไวต์ B
	//$request = 'username=guest&password=guest'; // กำหนด HTTP Request โดยระบุ username=guest และ password=เguest (รูปแบบเหมือนการส่งค่า $_GET แต่ข้างหน้าข้อความไม่มีเครื่องหมาย ?  
	$curl = curl_init(); // เริ่มต้นใช้งาน cURL 
	curl_setopt($curl, CURLOPT_URL, $url); // กำหนดค่า URL
	curl_setopt($curl, CURLOPT_POST, 1); // กำหนดรูปแบบการส่งข้อมูลเป็นแบบ $_POST
	curl_setopt($curl, CURLOPT_POSTFIELDS, $request); // กำหนดค่า HTTP Request
	curl_setopt($curl, CURLOPT_HEADER, 0); // กำให้ cURL ไม่มีการตั้งค่า Header
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // กำหนดให้ cURL คืนค่าผลลัพท์

    
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);	
	
	$response = curl_exec($curl); // ประมวลผล cURL
	curl_close($curl); // ปิดการใช้งาน cURL
	//echo $response; // แสดงผลการทำงาน
	return $response;

}


//if (($_SESSION[uid]=="12974"||$_SESSION[uid]=="14518"||$_SESSION[uid]=="14517"||$_SESSION[uid]=="10793")&& $_SESSION[permission]=="21232f297a57a5a743894a0e4a801fc3" && $_SESSION[loginstatus]==1){	
	/*
	if ($_POST['act']=="A"){
		$objQuery = mysqli_query($connect,"INSERT INTO member (uid,permission,update_by) VALUES('".$_POST['a_uid']."','".$_POST['a_rule']."','".$_SESSION[uname]."')");
	}
	*/

	if ($_POST['act']=="D"){
		$objQuery = mysqli_query($connect,"DELETE FROM  question_line WHERE id = '".$_POST['id']."'");
	}
	
	if ($_POST['act']=="E"){

		$objQuery = mysqli_query($connect,"UPDATE question_line SET status='".$_POST['status']."',question='".$_POST['question']."',answer='".$_POST['answer']."',line_id='".$_POST['line_id']."',admin_by='".$_POST['admin_by']."',datetime_ans='".$datenow."' WHERE id = '".$_POST['id']."'");

	}
	
		if ($objQuery){
			array_push($data, array('result' => 'T'));
		}else{
			array_push($data, array('result' => 'F'));
		}
	
	
	mysqli_close($connect);
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($data);
	




		$request = "send=auto&text=ขออภัยที่ให้รอครับ จากคำถาม:".$_POST['question']." ซึ่งถามเมื่อ: ".$_POST['datetime_ques']." เราขอตอบดังนี้ครับ: ".$_POST['answer']; // กำหนด HTTP Request โดยระบุ username=guest และ password=เguest (รูปแบบเหมือนการส่งค่า $_GET แต่ข้างหน้าข้อความไม่มีเครื่องหมาย ?)

		$url = 'https://gispwasys.herokuapp.com/sysbot.php?'.$request; // กำหนด URl ของเว็บไวต์ 


		header('Location: '.$url);


// }
 
 
 

?>