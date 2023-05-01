<?php
include'includes/config2.php';

if(isset($_POST['edit'])){


$user_id=$_POST['user_id'];
$id=$_GET['id'];



$query="UPDATE  reservation SET status2='cancel' where prod_id=$id AND user_id=$user_id";
$result=mysql_query($query)or die(mysql_error());


if($result)
{
echo
("
<script language='javascript'>
window.alert('Updated Successfully')
window.location.href='cancel.php'
</script>
");

}else{

"nothing";
}
}

?>