<?php
$access_token = 'Z+82Dj/iMhmE3mjr2EKu+0+W5a4O0ZiLT8SiohLjwTwSINQ+Kd/v+FdHPH9vSHriwk3IkO7Kio8GWTum007bD3r8/1BCtayNWvf+cDL8FznI3YyKcJ0OazxuBuzrlvXkpn8mYfi5MwddhMfPi3JvvgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
