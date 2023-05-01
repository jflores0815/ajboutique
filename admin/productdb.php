<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$categories=$_POST['categories'];
$prod_name=$_POST['prod_name'];
$weight=$_POST['weight'];

$description=$_POST['description'];
$price=$_POST['price'];
$code=$_POST['code'];


    date_default_timezone_set('Asia/Manila');
        
            $timezone = date('Y/m/d H:i:s');
            
            $action = "Add Product";
            $page = "Product Product";
            $id = $_SESSION['admin_id'];
            $user = $_POST['user'];
        

 $image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
                                $image_name = addslashes($_FILES['images']['name']);
                                $image_size = getimagesize($_FILES['images']['tmp_name']);

                                move_uploaded_file($_FILES["images"]["tmp_name"], "../images/" . $_FILES["images"]["name"]);
                              
                                $location = "../images/" . $_FILES["images"]["name"];

                 
                             
$query25="INSERT INTO products values('','$categories','$code','$prod_name','$description','$price','$weight','$location','0','0')";
$result25=mysql_query($query25)or die(mysql_error());


$query2="INSERT into audittrail(user_id,audit_user,audit_action,audit_page,a_date) VALUES ('$id','$user','$action','$page','$timezone')";
$result=mysql_query($query2)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>
window.alert('Added Successfully')
window.location.href='product.php'
</script>
");
}else{
"nothing";
}
}

?>