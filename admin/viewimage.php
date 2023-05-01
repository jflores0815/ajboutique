<?php
include'header.php';


?>
<script>
function confirm(){
if
	(confirm('Are you sure you want to confirm?')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}

function confirms(){
if
	(confirm('Are you sure you want to Cancel?')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}

</script> 
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Image </a> </div>
    <h1>View</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Image</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table">
                     <thead>
		  <tr>
						 <th  width="100px;" ><b><font size=2>Client Name</b></font></th>
                       
                      

                        </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$id = $_GET['id'];
$query="SELECT * FROM tbl_upload where upload_id=$id";

$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>                     
					 <tr>
					 	<td>
					 		<center>
							<a href=""><img src="<?php echo $row['upload']?>" width="500px;" height="auto" id="photos" >
						    </a>
						    </center>
						</td>
					</tr>
                        <?php
						
						}?>
                      </tbody>
                    </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include'footer.php';


?>