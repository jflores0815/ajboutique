<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{

$prod_qty=$_POST['prod_qty'];
$prod_name=$_POST['prod_name'];
$prod_desc=$_POST['prod_desc'];

$date_added=$_POST['date_added'];
$prod_type=$_POST['prod_type'];
$price=$_POST['price'];	
$qty=$_POST['qty'];	


$expirydate=$_POST['expirydate'];	
$sellingprice=$_POST['sellingprice'];	




	date_default_timezone_set('Asia/Manila');
		
			$timezone = date('Y/m/d H:i:s');
			
			$action = "Add Directory";
			$page = "Directory CMS";
			$id = $_SESSION['user_id'];
			$user = $_POST['user'];
		

 $image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
                                $image_name = addslashes($_FILES['images']['name']);
                                $image_size = getimagesize($_FILES['images']['tmp_name']);

                                move_uploaded_file($_FILES["images"]["tmp_name"], "directory/" . $_FILES["images"]["name"]);
                                $location = "directory/" . $_FILES["images"]["name"];


$query="INSERT INTO tbl_product values('','$prod_name','$prod_desc','$supplier','$qty','$date_added','$expirydate','','','$price','$sellingprice','','$location')";
$result=mysql_query($query)or die(mysql_error());



$query2="INSERT into audittrail(user_id,audit_user,audit_action,audit_page,a_date) VALUES ('$id','$user','$action','$page','$timezone')";
$result=mysql_query($query2)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>
window.alert('Added Successfully')
window.location.href='viewproduct.php'
</script>
");
}else{
"nothing";
}
}

?>