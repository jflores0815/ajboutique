<?php
include'includes/config2.php';







if(isset($_POST['edit'])){


$user_id=$_POST['user_id'];



$user_id=$_POST['user_id'];
$id=$_GET['id'];

	/**
	 * To send a text message.
	 *
	 */


$query="UPDATE  reservation SET status2='confirm' where confirmation='$id' AND user_id=$user_id";
$result=mysql_query($query)or die(mysql_error());

$query="UPDATE  tbl_refno SET status='confirm' where confirmation='$id' AND guest_id=$user_id";
$result=mysql_query($query)or die(mysql_error());


if($result)
{
echo
("
<script language='javascript'>
window.alert('Updated Successfully And Send Email Notification Successfully')
window.location.href='pickup.php'
</script>
");

}else{

"nothing";
}
}

?>