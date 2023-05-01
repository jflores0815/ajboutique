<?php session_start();
require_once('../include/dbConnect.php');

if (isSet($_POST['message'])) {
		if (isSet($_POST['message']) && $_POST['message'] != '') {
			$username = $_POST['username'];
			$message = $_POST['message'];
	 		
			//$time=date('G:i', strtotime($row["time"]));
			$q = mysqli_query($conn, "INSERT INTO messages (client_id, sender, receiver, message) VALUES ('0','ayadlc', '$username', '$message')") or die(mysql_error());
			if ($q) {

					mysql_query("INSERT INTO tbl_notification  VALUES ('', '$message', 'message','pending')") or die(mysql_error());

		    echo "<script ='text/javascript'>";
			echo "alert('Message Sent!');";
			echo "window.location.href = '../admin/client.php';";
			echo "</script/>";
	
			}else
		    echo "<script ='text/javascript'>";
			echo "alert('Failed to Send Message!');";
        	echo "window.location.href = '../admin/client.php';";
        	echo "</script/>";
				http_redirect('../admin/client.php', [], TRUE);
		}
	}
		 
?>