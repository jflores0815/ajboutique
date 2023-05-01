<?php
include'includes/config2.php';








if(isset($_POST['edit'])){


$user_id=$_POST['user_id'];
$query2="SELECT * FROM tbl_user where user_id='$user_id'";
$result2=mysql_query($query2)or die(mysql_error());
while ($row2=mysql_fetch_array($result2)){
$email=$row2['email'];
$contact_no=$row2['contact_no'];

}




$user_id=$_POST['user_id'];
$id=$_GET['id'];

	/**
	 * To send a text message.
	 *
	 */
 
	// Step 1: Declare new NexmoMessage.
	
$query="UPDATE  reservation SET status2='confirm' where confirmation='$id' AND user_id=$user_id";
$result=mysql_query($query)or die(mysql_error());

$query="UPDATE  tbl_refno SET status='confirm' where confirmation='$id' AND guest_id=$user_id";
$result=mysql_query($query)or die(mysql_error());


if($result)
{
	$to = $email;
   $subject = "Reservation(Mans Mind)";
   $message = "Good day, I want you to say that your reservation at Mans Mind is Accepted.";
   $header = "From:mansmind@gmail.com\r\n";
   

    mail($email, $subject , $message, 'From: mansmind@gmail.com');

echo
("
<script language='javascript'>
window.alert('Updated Successfully And Send Email Notification Successfully')
window.location.href='confirm.php'
</script>
");

}else{

"nothing";
}
}

?>