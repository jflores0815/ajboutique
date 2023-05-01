<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$id=$_POST['id'];	
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$contact_no=$_POST['contact_no'];
$gender=$_POST['gender'];
$age=$_POST['age'];	
$position=$_POST['position'];	


$query="UPDATE tbl_employee SET firstname='$firstname',lastname='$lastname',address='$address' ,contact_no='$contact_no' ,gender='$gender',age='$age',position='$position' WHERE employee_id='$id'";
$result=mysql_query($query)or die(mysql_error());




if($result)
{
echo("<script language='javascript'>
window.alert('Edit Successfully')
window.location.href='singleemployee.php?id=$id'
</script>
");
}else{
"nothing";
}
}

?>