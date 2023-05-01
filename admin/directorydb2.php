<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{

$name=$_POST['name'];
$price=$_POST['price'];
$servicetype=$_POST['servicetype'];

$employeetype=$_POST['employeetype'];


$query="INSERT INTO tbl_serviceproduct values('','$name','$price','$servicetype','$employeetype')";
$result=mysql_query($query)or die(mysql_error());



if($result)
{
echo("<script language='javascript'>
window.alert('Added Successfully')
window.location.href='viewservices.php'
</script>
");
}else{
"nothing";
}
}

?>