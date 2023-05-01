<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$id=$_POST['idd'];	
$categories=$_POST['categories'];
$prod_name=$_POST['prod_name'];
$weight=$_POST['weight'];
$description=$_POST['description'];
$code=$_POST['code'];
$price=$_POST['price'];	
$images=$_POST['images'];	
$oldimage=$_POST['oldimage'];



 $image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
                                $image_name = addslashes($_FILES['images']['name']);
                                $image_size = getimagesize($_FILES['images']['tmp_name']);

                                move_uploaded_file($_FILES["images"]["tmp_name"], "../images/" . $_FILES["images"]["name"]);
                              
                                $location = "../images/" . $_FILES["images"]["name"];

if ($location =='../images/') {
	$image=$_POST['oldimage'];
}else{
	$image = "../images/" . $_FILES["images"]["name"];
}


$query="UPDATE products SET category_id='$categories',code='$code',name='$prod_name' ,description='$description' ,price='$price',weight='$weight' ,image='$image' WHERE id='$id'";
$result=mysql_query($query)or die(mysql_error());




if($result)
{
echo("<script language='javascript'>
window.alert('Edit Successfully')
window.location.href='product.php'
</script>
");
}else{
"nothing";
}
}

?>