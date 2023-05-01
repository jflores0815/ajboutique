<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$returnedby=$_POST['returnedby'];
$dateofpurchase=$_POST['dateofpurchase'];
$returnedate=$_POST['returnedate'];
$productreturn=$_POST['productreturn'];
$remarks=$_POST['remarks'];


$query="INSERT INTO tbl_return values('','$returnedby','$dateofpurchase','$returnedate','$productreturn','$remarks')";
$result=mysql_query($query)or die(mysql_error());


if($result)
{
echo("<script language='javascript'>
window.alert('Added Successfully ')
window.location.href='addreturn.php'
</script>
");
}else{
"nothing";
}
}

?>