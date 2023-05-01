<?php
include_once'../includes/config2.php';


$id=$_GET['id'];
$query="DELETE FROM addcart where user_id=$id";
$result=mysql_query($query)or die(mysql_error());

if ($query)
			{

	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Removed successfully')
	window.location.href='checkout.php'
	</SCRIPT>");

			
			
			
			}
		else
		echo "not inserted";	
		


?>