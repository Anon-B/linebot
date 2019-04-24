<?
$api_key="qNge0HYBBuKUvMe59qTLBylOfo5osudi";
//$url_get = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$api_key;
echo "hello";	

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





/*$json_get = file_get_contents($url_get);
$get_quest = json_decode($json_get);
echo '<pre>';
	print_r($get_quest);
	exit();
*/






$urllink = 'https://api.mlab.com/api/1/databases/mlab_nosql/collections/leakpoint?apiKey='.$api_key;
	$res = get_url($urllink); 
	echo $res;
	echo '<hr>';
	echo '<br>';







?>