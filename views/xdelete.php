<?php
include_once'../includes/config2.php';


$id=$_GET['id'];
$query="DELETE FROM addcart where idd='$id'";
$result=mysql_query($query)or die(mysql_error());

if ($query)
			{

	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Remove successfully')
	window.location.href='checkout.php'
	</SCRIPT>");

			
			
			
			}
		else
		echo "not inserted";	
		


?>