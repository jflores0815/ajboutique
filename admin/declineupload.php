<?php
include'includes/config2.php';



$id=$_GET['id'];

$query="UPDATE  tbl_upload SET status='cancel' where upload_id='$id'";

$result=mysql_query($query)or die(mysql_error());




if($result)
{
echo
("
<script language='javascript'>
window.alert('Updated Successfully')
window.location.href='uploaddesign.php'
</script>
");

}else{

"nothing";
}


?>