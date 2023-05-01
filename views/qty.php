
<?php
include_once'../includes/config2.php';


$id=$_POST['id'];
$prod_id=$_POST['prod_id'];
$qty=$_POST['qty'];
$totalstock=$_POST['totalstock'];
$firstqty=$_POST['firstqty'];


 if($qty == 0 || $qty < 0){
echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Invalid Quantity')
	window.location.href='checkout.php?'
	</SCRIPT>");
} else if ($qty > $firstqty) {

echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Invalid Quantity')
	window.location.href='checkout.php?'
	</SCRIPT>");
	
}else{
$query="UPDATE  addcart SET qty='$qty' where user_id=$id AND prod_id=$prod_id";

$result=mysql_query($query)or die(mysql_error());

echo("<script language='javascript'>
window.alert(' Update successfully')
window.location.href='checkout.php'
</script>
");


}






?>