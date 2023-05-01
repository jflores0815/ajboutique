
<?php
require("includes/config.php");
//load basic functions next so that everything after can use them
require("includes/functions.php");
//later here where we are going to put our class session
require("includes/session.php");	
require("includes/member.php");
require("includes/pagination.php");
require("includes/paginsubject.php");
require("includes/roomtype.php");
require("includes/guest.php");
require("includes/reserve.php");
//Load Core objects
require_once("includes/database.php");
?>
<?php if(isset($_SESSION['admin_id'])){

			
					
							
							
							}else{ 
redirect(WEB_ROOT ."login.php");
							
			}
						?>	













<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | AJ Boutique </title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
<h2 style="padding: 20px;">AJ Boutique</h2>
  <h1><a href="index.php">Admin | Man's Mind</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown " id="profile-messages" style="margin-top:10px;"><i class="icon icon-user"></i>  <span class="text " style="font-size:16px;color:white;" >
	 <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT * FROM tbl_admin where admin_id=$id";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>           	


							<?php echo ucfirst($row['fname']) ?>  <?php echo ucfirst($row['lname']) ?>
						
<?php
						
						}?>  
	
</span>
      
    </li>
      <li class="" ><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text" style="font-size:16px;color:white;"><b>Logout</b></span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->

<!--sidebar-menu-->
<div id="sidebar"><a href="index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
	 <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>File Maintenance</span> </a>
      <ul>
        <li><a href="user.php">View User</a></li>
        <li><a href="adduser.php">Add User</a></li>
        <li><a href="client.php">Client</a></li>
        <li><a href="audittrail.php">Audit Trail</a></li>
      </ul>
    </li>

	


<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> </a>
      <ul>
     <li><a href="product.php">View Products</a></li>
        <li><a href="addproduct.php">Add Product </a></li>
   
    
      </ul>
</li>



	
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Transaction</span>
     <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(name) as total from tbl_countorder where type != 'message' ";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$totalorder = $row['total'];

}
?>
<?php
if($totalorder > 0){


?>
<span class="label label-important">
     
  <?php echo $totalorder; ?>
  </span> 
<?php
}else{

}
?>
 </a>
      <ul>
	       <li><a href="pending.php">New Orders
 <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(name) as total from tbl_countorder where type = '0'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$totalorder = $row['total'];

}
?>
<?php
if($totalorder > 0){


?>
<span class="label label-important">
     
  <?php echo $totalorder; ?>
  </span> 
<?php
}else{
  
}
?>
         </a></li>
        <li><a href="confirm.php">Paid Orders
         <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(name) as total from tbl_countorder where type = '1'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$totalorder = $row['total'];

}
?>
<?php
if($totalorder > 0){


?>
<span class="label label-important">
     
  <?php echo $totalorder; ?>
  </span> 
<?php
}else{
  
}
?></a></li>
        <li><a href="cancel.php">Shipping Orders</a></li> 
         <li><a href="delivery.php">Cancelled Orders
          <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(name) as total from tbl_countorder where type = '5'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$totalorder = $row['total'];

}
?>
<?php
if($totalorder > 0){


?>
<span class="label label-important">
     
  <?php echo $totalorder; ?>
  </span> 
<?php
}else{
  
}
?></a></li>
      
 
         <li><a href="lost_item.php">Lost Items
          <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(name) as total from tbl_countorder where type = '7'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$totalorder = $row['total'];

}
?>
<?php
if($totalorder > 0){


?>
<span class="label label-important">
     
  <?php echo $totalorder; ?>
  </span> 
<?php
}else{
  
}
?></a></li>
          
	 </ul>
    </li>
	



	
		<li class="submenu"> <a href=""><i class="icon icon-th-list"></i> <span>Messages</span>
 <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(name) as total from tbl_countorder where type = 'message' ";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$totalorder = $row['total'];

}
?>
<?php
if($totalorder > 0){


?>
<span class="label label-important">
     
  <?php echo $totalorder; ?>
  </span> 
<?php
}else{

}
?>
     </a>
      <ul>
        <li><a href="message.php">View Message <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(name) as total, name from tbl_countorder where type = 'message' ";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$totalorder = $row['total'];
$name = $row['name'];
}
?>
<?php
if($totalorder > 0){


?>
<span class="label label-important">
     
  <?php echo $totalorder; ?>
  (<?php echo $name; ?>)
  </span> 
<?php
}else{

}
?> </a></li>
		 
  </ul>
    </li>
	
	 <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Reports</span> </a>
      <ul>
      
         <li><a href="reservationreport.php">Sales  Report</a></li> 	
      
	 
		 
	 </ul> 
    </li>	
	
	
 
  </ul>
</div>
<!--sidebar-menu-->
