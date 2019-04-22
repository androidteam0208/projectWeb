<?php
class dulieu
{
	var $link = NULL;
	var $result = null;
	var $price = 0;
	
	function getdulieu()
	{
		$data = file_get_contents($this->link);
		$this->result = json_decode($data, true);
	}
	function getdulieudon()
	{
		$data = file_get_contents($this->link);
		$this->result = json_decode($data);
	}
	function connect($ip,$loai)
	{
		$this->link = $ip.$loai;
	}
	
	function price($data)
	{
		$this->price = number_format ( $data , 2 ,"." , "," );
	}

}
function price($data){
		 $price = number_format ( $data , 2 ,"." , "," );
		 return $price;
	}
	
?>

<?php
 if(isset($_POST["btn_Dathang"])){
//	//API Url
//	$url = $ip."/themdonhang";
//	 
//	//Initiate cURL.
//	$ch = curl_init($url);
//	 
//	//The JSON data.14512qw31
//	$jsonData = array(
//		'TenKH' => 'Minh Huy',
//		'DiaChi' => 'Go Den'
//	);
//	 
//	//Encode the array into JSON.
//	$jsonDataEncoded = json_encode($jsonData);
//	 
//	//Tell cURL that we want to send a POST request.
//	curl_setopt($ch, CURLOPT_POST, 1);
//	 
//	//Attach our encoded JSON string to the POST fields.
//	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//	 
//	//Set the content type to application/json
//	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
//	 
//	//Execute the request
//	$result = curl_exec($ch);
	
	header('Location: index.php');
 }
 
 ?>
