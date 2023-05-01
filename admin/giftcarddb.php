<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$controlno=$_POST['controlno'];
$dateissue=$_POST['dateissue'];
$validuntil=$_POST['validuntil'];
$branch=$_POST['branch'];
$balance=$_POST['balance'];


$query="INSERT INTO tbl_gc values('','$controlno','$dateissue','$validuntil','$branch','$balance')";
$result=mysql_query($query)or die(mysql_error());


if($result)
{
echo("<script language='javascript'>
window.alert('Added Successfully ')
window.location.href='viewgiftcard.php'
</script>
");
}else{
"nothing";
}
}

?>