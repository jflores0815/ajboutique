<?php
include_once'includes/config2.php';

if(isset($_POST['add']))
{
$number=$_POST['number'];

$checkout = mysql_query("SELECT * FROM tbl_employee WHERE employee_number='$number' ") or die(mysql_error());
if (mysql_num_rows($checkout) > 0){

WHILE($_checkout = mysql_fetch_array($checkout)) {


$employee_id = $_checkout['employee_id'];
}

 date_default_timezone_set('Asia/Manila');
$hour = date('H:i:s');
 $date = date('Y-m-d');


 
 $checkout = mysql_query("SELECT * FROM tbl_employee WHERE employee_number='$number' ") or die(mysql_error());
if (mysql_num_rows($checkout) > 0){

WHILE($_checkout = mysql_fetch_array($checkout)) {


$employee_id = $_checkout['employee_id'];
}


$checkout3 = mysql_query("SELECT * FROM `tbl_attendance` WHERE employee_id='$employee_id' ORDER BY attendance_id desc LIMIT 1 ") or die(mysql_error());
if (mysql_num_rows($checkout3) > 0){

WHILE($_checkout3 = mysql_fetch_array($checkout3)) {



$status = $_checkout3['status'];
echo $status;
if($status == 'Timein'){
$query="INSERT INTO tbl_attendance values('','$employee_id','$date','$hour','Timeout')";
$result=mysql_query($query)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>

window.location.href='attendancepage.php'
</script>
");
}else{
"nothing";
}

}else{


$query="INSERT INTO tbl_attendance values('','$employee_id','$date','$hour','Timein')";
$result=mysql_query($query)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>

window.location.href='attendancepage.php'
</script>
");
}else{
"nothing";
}

}


}



}else{

$query="INSERT INTO tbl_attendance values('','$employee_id','$date','$hour','Timein')";
$result=mysql_query($query)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>

window.location.href='attendancepage.php'
</script>
");
}else{
"nothing";
}
}
}
}else{


echo
("
<script language='javascript'>
window.alert('Invalid Employee Number')
window.location.href='attendance.php'
</script>
");

}
}
?>