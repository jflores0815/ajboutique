<?php
include'includes/config2.php';

if(isset($_POST['edit'])){


$user_id=$_POST['user_id'];
$id=$_GET['id'];

$query="UPDATE  tbl_customization SET statuss='cancel' where customize_id='$id'";

$result=mysql_query($query)or die(mysql_error());




if($result)
{
echo
("
<script language='javascript'>
window.alert('Updated Successfully')
window.location.href='requestcancel.php'
</script>
");

}else{

"nothing";
}
}

?>