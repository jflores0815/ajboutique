<?php
include'includes/config2.php';








if(isset($_POST['delete'])){


$prod_id=$_POST['prod_id'];
$quantities=$_POST['quantities'];
$qty=$_POST['qty'];
$user_id=$_POST['user_id'];
$total= $qty + $quantities;








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
echo
("
<script language='javascript'>
window.alert('Cancel Successfully!')
window.location.href='delivery.php'
</script>
");

}else{

"nothing";
}
}

?>