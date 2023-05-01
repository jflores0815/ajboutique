<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$name=$_POST['name'];
$desc=$_POST['desc'];

    
    date_default_timezone_set('Asia/Manila');
        
            $timezone = date('Y/m/d H:i:s');
            
            $action = "Add Categories";
            $page = "Product Categories";
            $id = $_SESSION['admin_id'];
            $user = $_POST['user'];
        




$query="INSERT INTO tbl_categories values('','$name','$desc','$timezone')";
$result=mysql_query($query)or die(mysql_error());



$query2="INSERT into audittrail(user_id,audit_user,audit_action,audit_page,a_date) VALUES ('$id','$user','$action','$page','$timezone')";
$result=mysql_query($query2)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>
window.alert('Category Added Successfully')
window.location.href='productcategories.php'
</script>
");
}else{
"nothing";
}
}

?>