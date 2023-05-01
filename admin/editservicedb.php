<?php
include_once'includes/config2.php';

$id=$_POST['id'];	
$name=$_POST['name'];
$price=$_POST['price'];
$servicetype=$_POST['servicetype'];
$employeetype=$_POST['employeetype'];



$query="UPDATE tbl_serviceproduct SET valuename='$name', price='$price', service_type='$servicetype', employee_type='$employeetype'where serviceproduct_id= $id";
$result=mysql_query($query)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>
window.alert('Edit Successfully')
window.location.href='viewservices.php'
</script>
");
}else{
"nothing";
}


?>