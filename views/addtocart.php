<?php
include_once'../includes/config2.php';

if(isset($_POST['add']))
{
$user_id=$_POST['user_id'];
$prod_id=$_POST['prod_id'];


$price=$_POST['price'];
$qty=$_POST['qty'];

$address=$_POST['address'];
$available=$_POST['available'];
$weight=$_POST['weight'];



if($qty > $available){
echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('You have exceeded the maximum order for this product!')
	window.location.href='shop.php'
	</SCRIPT>");
}else if($qty == 0){
echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Invalid Quantity')
	window.location.href='shop.php'
	</SCRIPT>");
} 
 

else{
$checkout = mysql_query("SELECT count(prod_id) as total FROM `addcart` where prod_id='$prod_id'") or die(mysql_error());
WHILE($_checkout = mysql_fetch_array($checkout)) {

$total= $_checkout['total'];
}



if ($total > 0){
	
$checkout3 = mysql_query("SELECT sum(`qty`) as total FROM `addcart` where prod_id='$prod_id'") or die(mysql_error());
WHILE($_checkout3 = mysql_fetch_array($checkout3)) {

$prod_idnew= $_checkout3['total'] + $qty ;
}
echo $prod_idnew;
if($prod_idnew > $available){
echo("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('You have exceeded the maximum order for this product!')
	window.location.href='shop.php'
	</SCRIPT>");
}else {

$checkout2 = mysql_query("UPDATE addcart SET qty='$prod_idnew' where prod_id='$prod_id'") or die(mysql_error());

echo("<script language='javascript'>
var r= confirm(' Added To Cart Successfully! Continue Shopping?');
if(r== true){
window.location.href='shop.php'
}else{
window.location.href='checkout.php'
}

</script>
");
}
}else{

$query="INSERT INTO addcart values('','$user_id','$prod_id','$price','$qty','$weight')";
$result=mysql_query($query)or die(mysql_error());

echo("<script language='javascript'>
var r= confirm(' Added To Cart Successfully! Continue Shopping?');
if(r== true){
window.location.href='shop.php'
}else{
window.location.href='checkout.php'
}

</script>
");
}
}

}


?>