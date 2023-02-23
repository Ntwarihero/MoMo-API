<?php
$data = array(
		"applicationId"=>"aac88109eabc84d4fb000000000",
		"username" => "karamerwa@gmail.com",
		"password"=>"Karame@2023!",
		"businessName" => "Karame LTD",
  "firstName" => "KARAME",
  "lastName" => "RWA",
  "telephoneNumber" => "250788716443",
  "email" => "karamerwa@gmail.com",
  "address" => "HUYE",
   "tin" => "0000"
			);	


$url ="https://opay-api.oltranz.com/opay/register";	
	$data = http_build_query($data);
	 $username="karamerwa@gmail.com";
 $password="Karame@2023!";	
	//open connection
	$ch = curl_init();
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
	//execute post
	$result = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	//close connection
	echo $result;
	curl_close($ch);
	json_decode($result);

?>
		
	
	
		
		