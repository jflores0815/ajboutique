<?php
include_once'includes/config2.php';

if(isset($_POST['delete'])){

$id=$_GET['id'];
$query="DELETE FROM tbl_employee where employee_id=$id";
$result=mysql_query($query)or die(mysql_error());

if ($query)
			{

	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Deleted successfully')
	window.location.href='viewemployee.php'
	</SCRIPT>");

			
			
			
			}
		else
		echo "not inserted";	
		
}

?>