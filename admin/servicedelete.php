<?php
include_once'includes/config2.php';



$id=$_GET['id'];
$query="DELETE FROM tbl_serviceproduct where serviceproduct_id=$id";
$result=mysql_query($query)or die(mysql_error());

if ($query)
			{

	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Deleted successfully')
	window.location.href='viewservices.php'
	</SCRIPT>");

			
			
			
			}
		else
		echo "not inserted";	
		


?>