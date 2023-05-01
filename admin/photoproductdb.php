<?php
include'includes/config2.php';

if(isset($_POST['edit'])){


$user_id=$_POST['user_id'];

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "user/" . $_FILES["image"]["name"]);
                                $location = "user/" . $_FILES["image"]["name"];

$query="UPDATE  tbl_product SET images='$location' where ID=$user_id";
$result=mysql_query($query)or die(mysql_error());

if($result)
{
echo
("
<script language='javascript'>
window.alert('Updated Successfully')
window.location.href='product.php'
</script>
");

}else{

"nothing";
}
}

?>