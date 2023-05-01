<?php
error_reporting(0);

$con=mysql_connect('localhost','root','');

if($con){
mysql_select_db("u435243053_aj",$con)or die(mysql_error());
}




?>