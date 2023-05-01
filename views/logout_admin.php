<?php
	session_start();
	
	?>
<!DOCTYPE html>
<html>
	<body>
	
	<?php
	
	unset($_SESSION['admin']);
	session_destroy();
	

?>

	<script type="text/javascript">
		alert('Logged out');
		window.location.href="admin_login.php";	
	</script>
	</body>

</html>