<?php

include_once'includes/config2.php';

if(isset($_POST['btn-restock']))
{
  $input_restock_num = $_POST['input-restock-num'];
  $id = $_POST['product-id-restock'];


$query="UPDATE products SET  stock = stock+$input_restock_num   WHERE   id = '$id'";
$result=mysql_query($query)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>
window.alert('Product has been restocked')
window.location.href='product.php'
</script>
");
}else{
"nothing";
}
}

?>