<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$position=$_POST['position'];
$username=$_POST['username'];
$pass=$_POST['pass'];
	
	date_default_timezone_set('Asia/Manila');
		
			$timezone = date('Y/m/d H:i:s');
			
			$action = "Add User";
			$page = "User";
			$id = $_SESSION['admin_id'];
			$user = $_POST['user'];
		

 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "user/" . $_FILES["image"]["name"]);
                                $location = "user/" . $_FILES["image"]["name"];


$query="INSERT INTO tbl_admin values('','$lname','$fname','$position','$username','$pass','$location')";
$result=mysql_query($query)or die(mysql_error());



$query2="INSERT into audittrail(user_id,audit_user,audit_action,audit_page,a_date) VALUES ('$id','$user','$action','$page','$timezone')";
$result=mysql_query($query2)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>
window.alert('User Added Successfully')
window.location.href='user.php'
</script>
");
}else{
"nothing";
}
}

?>