<?php
include'includes/config2.php';

if(isset($_POST['edit'])){


$emc_details=$_POST['emc_details'];

$mission=$_POST['mission'];
$vission=$_POST['vission'];

$query="UPDATE  tbl_cms SET emc_details='$emc_details',mission='$mission',vission='$vission' where cms_id='1'";
$result=mysql_query($query)or die(mysql_error());


if($result)
{
echo
("
<script language='javascript'>
window.alert('Updated Successfully')
window.location.href='cms.php'
</script>
");

}else{

"nothing";
}
}

?>