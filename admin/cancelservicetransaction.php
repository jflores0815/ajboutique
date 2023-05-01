<?php
include'includes/config2.php';

if(isset($_POST['delete'])){


$user_id=$_POST['user_id'];
$id=$_GET['id'];



$query="UPDATE  tbl_service SET status='cancel' where service_id=$id AND user_id=$user_id";
$result=mysql_query($query)or die(mysql_error());


if($result)
{
echo
("
<script language='javascript'>
window.alert('Cancel Successfully')
window.location.href='cancelservice.php'
</script>
");

}else{

"nothing";
}
}

?>