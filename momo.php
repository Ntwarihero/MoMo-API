<?php

if (isset($_POST["pay"])) {
	
$phone=$_POST['phone'];
$amount=$_POST['amount'];
$id=$_POST['id'];

$dates=date('Y-m-d');
$trans=date("YmdHis");


$datess = date('Y-m-d');
$newDatess = date('F', strtotime($datess));

$con=new PDO("mysql:host=localhost;dbname=hreps_db","root","");


	$data = array(
  "telephoneNumber" =>"25".$phone,
  "amount" => $amount,
  "Firstname"=>"Eric",
  "Lastname"=>"BURASANZWE",
  "organizationId" => "f5d59c35-489e-4e93-8d73-ab3f5375eb53",
  "description" => "Order Payed Successfully",
  "callbackUrl" => "https://opay-api.oltranz.com/opay/paymentrequest",
  "transactionId" => $trans);	
$url ="https://opay-api.oltranz.com/opay/paymentrequest";	
	$data = http_build_query($data);
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
	$result = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	// echo $result;
	curl_close($ch);
	$final=json_decode($result);

$ins=$con->prepare("INSERT INTO payment(book_id,payment_date,payed_month,	amount,transmission_id) VALUES(?,?,?,?,?)");
$ins->execute(array($id,$dates,$newDatess,$amount,$trans));
if($ins){
$query=$con->prepare("UPDATE booking SET status=? WHERE id=?");
$query->execute(array("Processed",$id));
if ($query) {

	?>
<script>
       setTimeout(function() {
        swal({
            title: "Your Payment Done ",
            text: "",
            type: "success", timer: 3000,showConfirmButton: true
        }, function() {
window.location = "momo.php";
        });
    }, 1000);
</script>

	<?php
}
}
}


?>
		
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">	
		