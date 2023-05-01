<?php
include'includes/config2.php';








if(isset($_POST['delete'])){


$prod_id=$_POST['prod_id'];
$quantities=$_POST['quantities'];
$qty=$_POST['qty'];
$user_id=$_POST['user_id'];
$total= $qty + $quantities;


$query2="SELECT * FROM tbl_user where user_id='$user_id'";
$result2=mysql_query($query2)or die(mysql_error());
while ($row2=mysql_fetch_array($result2)){
$email=$row2['email'];
$contact_no=$row2['contact_no'];


}




$user_id=$_POST['user_id'];
$id=$_GET['id'];




$query="UPDATE tbl_product SET qty='$total' where ID='$prod_id'";
$result=mysql_query($query)or die(mysql_error());

	
$query="UPDATE  reservation SET status2='cancel' where confirmation='$id' AND user_id=$user_id";
$result=mysql_query($query)or die(mysql_error());

$query2="UPDATE  tbl_refno SET status='cancel' where confirmation='$id' AND guest_id=$user_id";
$result2=mysql_query($query2)or die(mysql_error());


if($result)
{

	$to = $email;
   $subject = "Reservation(Mans Mind)";
   $message = "Good day, I want you to say that your reservation at Mans Minds is Declined.";
   $header = "From:mansmind@gmail.com\r\n";
   

    mail($email, $subject , $message, 'From: mansmind@gmail.com');


echo
("
<script language='javascript'>
window.alert('Cancel Successfully!')
window.location.href='cancel.php'
</script>
");

}else{

"nothing";
}
}

?>