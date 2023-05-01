<?php
include'includes/config2.php';








if(isset($_POST['edit'])){




$id=$_GET['id'];

$query="UPDATE  tbl_customization SET statuss='confirm' where customize_id='$id'";
$result=mysql_query($query)or die(mysql_error());



if($result)
{
echo
("
<script language='javascript'>
window.alert('Confirmed Successfully And Send Email Notification Successfully')
window.location.href='request.php'
</script>
");

}else{

"nothing";
}
}

?>