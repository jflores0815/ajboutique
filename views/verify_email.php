<?php session_start();
require_once('../include/dbConnect.php');

if($_GET['verification_code']){
	
	$sql="SELECT * FROM clients WHERE verification_code='$_GET[verification_code]' AND account_status='2'";
    $res=mysqli_query($conn,$sql);
 
    if(mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_assoc($res);
	
	//$_SESSION['client']['id'] =$row['id'];
	//$_SESSION["user"] = $row['username'];
	
	$sql = "UPDATE clients SET account_status ='1' WHERE verification_code='$_GET[verification_code]' AND account_status='2'";
	$res=mysqli_query($conn,$sql);
	
	echo "<script ='text/javascript'> alert('You are now registered! You can now log in.'); window.location.href = 'login.php'; </script>";
    http_redirect('login.php', [], TRUE);	
	
	}else{
	echo "<script ='text/javascript'> alert('Invalid Transaction.'); window.location.href = 'login.php'; </script>";
    http_redirect('login.php', [], TRUE);	
	}
}
		 
?>