<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$upload_id=$_POST['upload_id'];
$user_id=$_POST['user_id'];
$price=$_POST['price'];
$size=$_POST['size'];
	$prod_name='Upload Image';
$prod_type='uploaded';
	
	$query4="SELECT max(ID)as maxid FROM tbl_product";
		$result4=mysql_query($query4)or die(mysql_error());
		while ($row4=mysql_fetch_array($result4)){
$prod_id=$row4['maxid']+1;
} 

$query3="SELECT * FROM tbl_upload tt , tbl_user tu  where tt.user_id=tu.user_id AND tt.status='pending' AND tt.user_id=$user_id AND tt.upload_id=$upload_id  ORDER by tt.user_id DESC";

$result3=mysql_query($query3)or die(mysql_error());
while ($row3=mysql_fetch_array($result3)){

$dateadded=$row3['dateadded'];
$qty=$row3['qty'];

$image=$row3['upload'];

}	


$query="INSERT INTO addcart values('','$user_id','$prod_id','$price','$qty','','','$size')";
$result=mysql_query($query)or die(mysql_error());



$query2="INSERT INTO tbl_product values('','$prod_name','$prod_name','$qty','$dateadded','$prod_type','$price','$image')";
$result2=mysql_query($query2)or die(mysql_error());

if($result2){


$query22="UPDATE  tbl_upload SET status='confirm',price='$price' where upload_id='$upload_id'";

$result22=mysql_query($query22)or die(mysql_error());


echo("<script language='javascript'>
window.alert(' Successfully Accepted.')
window.location.href='uploadconfirmed.php'
</script>
");

}else{
"nothing";
}
}

?>