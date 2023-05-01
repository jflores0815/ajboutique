<?php
include'header.php';


?>

<!--Header-part-->

<!--close-Header-part--> 


<!--top-Header-menu-->

<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->

<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb span3"> <a href="index.php"> <i class="icon-dashboard"></i>  My Dashboard </a> </li>
        <li class="bg_lg span3"> <a href="user.php"> <i class="icon-user"></i> <span class="label label-important">
    
                <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(lname) as total from tbl_admin";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
<?php echo $row['total']; ?>        
        <?php
}
?>
    
    </span>Users</a> </li>

  <li class="bg_lo span3"> <a href="product.php"> <i class="icon-gift"></i><span class="label label-important">
          <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(id) as total from products ";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
<?php echo $row['total']; ?>        
        <?php
}
?>
  
  </span> Products </a> </li>
  
  <li class="bg_lg span3"> <a href="pending.php" > <i class="icon-table"></i>
<span class="label label-important">
<?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(id) as total from transactions where status='0' or status ='1' ";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
<?php echo $row['total']; ?>        
        <?php
}
?>
</span>
  New Orders</a> </li>       
  
        <li class="bg_lo span3"> <a href="confirm.php"> <i class="icon-table"></i><span class="label label-important">
    
<?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(id) as total from transactions where status='2'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
<?php echo $row['total']; ?>        
        <?php
}
?>
    
    </span>Paid Order</a> </li>
        <li class="bg_lb span3"> <a href="cancel.php"> <i class="icon-table"></i><span class="label label-important">
    
<?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(id) as total from transactions where status='3' or status = '6'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
<?php echo $row['total']; ?>        
        <?php
}
?>
    </span>Shipped Orders</a> </li>

      <li class="bg_lb span3"> <a href="cancel.php"> <i class="icon-table"></i><span class="label label-important">
    
<?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT count(id) as total from transactions where status='5'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
<?php echo $row['total']; ?>        
        <?php
}
?>
    </span>Cancelled Orders</a> </li>
  <li class="bg_lg span3"> <a href="pending.php" > <i class="icon-phone"></i>

  Messages</a> </li> 
    
      <li class="bg_lo span3"> <a href="confirm.php"> <i class="icon-list"></i>Report</a> </li>
      </ul>
    </div>
<!--End-Action boxes-->    

<!--Chart-box-->    
   
<!--End-Chart-box--> 
    <hr/>
   
  </div>
<!--Action boxes-->
 
</div>

<!--end-main-container-part-->

<!--Footer-part-->


<!--end-Footer-part-->

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>