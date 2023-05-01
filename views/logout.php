<?php
	session_start();
	
	?>
<!DOCTYPE html>
<html>
	<body>
	
	<?php
	
	unset($_SESSION['user']);
	unset($_SESSION['cart_item']);
	session_destroy();
	

?>

	<script type="text/javascript">
		alert('Logged out');
		window.location.href="login.php";	
	</script>
	</body>

</html>