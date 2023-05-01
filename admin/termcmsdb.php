<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
	
$title=addslashes($_POST['title']);
$subtitle=addslashes($_POST['subtitle']);
$message=addslashes($_POST['message']);
	


$query="UPDATE tbl_cms SET title='$title',subtitle='$subtitle',message='$message' WHERE cms_id='1'";
$result=mysql_query($query)or die(mysql_error());




if($result)
{
echo("<script language='javascript'>
window.alert('Edit Successfully')
window.location.href='termscms.php'
</script>
");
}else{
"nothing";
}
}

?>