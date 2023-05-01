<?php
include_once'includes/config2.php';

$query="DELETE FROM sales_order where invoice='RS-242282'";
$result=mysql_query($query)or die(mysql_error());

if ($query)
			{

	echo ("<SCRIPT LANGUAGE='JavaScript'>
	
	window.location.href='../brunosPOS/main/sales.php?id=cash&invoice=RS-242282'
	</SCRIPT>");

			
			
			
			}
		else
		echo "not inserted";	
		


?>