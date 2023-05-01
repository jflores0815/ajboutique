<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">File Maintenance</a> <a href="#" class="current">View Users</a> </div>
    <h1>User</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Send Message</h5>
          </div>
          <div class="widget-content nopadding">
               <?php
include_once'includes/config2.php';
$id=$_GET['id'];
$idd=$_GET['idd'];
$iddd=$_GET['iddd'];

$query="SELECT * FROM  tbl_contact where email='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
			?>     <br>
			<form action="replydb.php" method="POST">
			To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" value="<?php echo $row['email']; ?>" name="email" readonly>
		<br>	Subject:&nbsp;&nbsp;&nbsp; <input type="text" value="<?php echo $row['subject']; ?>" name="subject" readonly>
		<br>	Message: 
			<textarea name="message" placeholder="Type Message here..." ></textarea>
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="edit" class="btn btn-success">Reply</button>
		</form>       
	   </div>
        </div>
      </div>
    </div>
  </div>
</div>

 <?php
						
						}?>

<?php
include'footer.php';


?>