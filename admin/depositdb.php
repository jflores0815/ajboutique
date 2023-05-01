<?php
include_once'includes/config2.php';

if(isset($_POST['update']))
{
$service_id=$_GET['service_id'];
$transaction_no=$_POST['transaction_no'];
$deposit=$_POST['deposit'];


$query="UPDATE  tbl_service SET deposit='$deposit' where service_id='$service_id'";
$result=mysql_query($query)or die(mysql_error());

if ($query)
			{

	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Update successfully')
	window.location.href='service.php'
	</SCRIPT>");
			
			}
		else
		echo "not inserted";	
		

}
?>
