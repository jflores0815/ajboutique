<?php
include'includes/config2.php';


include ( "../sms/NexmoMessage.php" );





if(isset($_POST['edit'])){


$user_id=$_POST['user_id'];
$query2="SELECT * FROM tbl_user where user_id='$user_id'";
$result2=mysql_query($query2)or die(mysql_error());
while ($row2=mysql_fetch_array($result2)){
$email=$row2['email'];
$contact_no=$row2['contact_no'];
$message2="
Hi Good day I want to inform you that your reservation was accepted. 
thanks,
Brunos Barbershop
";
$from="Brunos Barbershop";
}

$to = $email;
   $subject = "Reservation(Brunos Barbershop)";
   $message = "Good day, I want you to say that your reservation at Brunos Barbershop is Accepted.";
   $header = "From:brunosdb@gmail.com\r\n";
   $retval = mail ($to,$subject,$message,$header);
   if( $retval == true )  
   {
   }
   else
   { echo "Message could not be sent...";
   }



$user_id=$_POST['user_id'];
$id=$_GET['id'];

   // Step 1: Declare new NexmoMessage.
   $nexmo_sms = new NexmoMessage('c41deb10', '2805a1d9');

   // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
   $info = $nexmo_sms->sendText( $contact_no, $from, $message2 );
   

$query="UPDATE  tbl_service SET status='confirm' where service_id='$id' AND user_id=$user_id";
$result=mysql_query($query)or die(mysql_error());


if($result)
{
echo
("
<script language='javascript'>
window.alert('Confirmed Successfully And Send Email Notification Successfully')
window.location.href='confirmservice.php'
</script>
");

}else{

"nothing";
}
}

?>