<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="tip-bottom">Product</a> <a href="#" class="current">View Receipt</a> </div>
    <h1>View Receipt</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          
          </div>
          <div class="widget-content nopadding">
            
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                    <th>Image Receipt</th>
                      
                        </tr>
                      </thead>


                      <tbody>
					  <?php
include_once'includes/config2.php';
$id=$_GET['id'];
$query="SELECT * FROM tbl_refno where transaction_no='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>       
                        <tr>
						  
							
						
                       <td><center>

                       <img src="../<?php echo $row['imagess']?>" width="400px;" height="340px;" id="photos" ></center></td>
                       
                                              
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