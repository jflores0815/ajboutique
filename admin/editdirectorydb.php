<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$id=$_POST['id'];	
$quantity=$_POST['quantity'];
$prod_name=$_POST['prod_name'];
$prod_desc=$_POST['prod_desc'];
$date_added=$_POST['date_added'];
$prod_type=$_POST['prod_type'];
$price=$_POST['price'];	


$query="UPDATE tbl_product SET prod_name='$prod_name',quantity='$quantity',prod_desc='$prod_desc' ,prod_type='$prod_type' ,price='$price',date_added='$date_added'WHERE ID='$id'";
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