<?php
 include'includes/config2.php';
 session_start();
    

if(isset($_POST['edit']))
{
$email=$_POST['email'];
		
$subject=$_POST['subject'];
$fname=$_POST['fname'];
$message=$_POST['message'];
								


        
                mail($email, $subject, $message, 'From: EMCdiecutting2017@gmail.com');

              
				    echo
("
<script language='javascript'>
window.alert('Send Message Successfully')
window.location.href='message.php'
</script>
");


			

}
?>