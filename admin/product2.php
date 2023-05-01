<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="tip-bottom">Product</a> <a href="#" class="current">View Product</a> </div>
    <h1>View Product</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Product table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
            <table class="table table-bordered data-table">
        	   <thead>
							  <tr>
										  <th>Product Name</th>
        				  <th>Product Description</th>
						  <th>Date Added</th>
						  <th>Product Type</th>
						  <th>Price</th>
						  <th>Image</th>
						   <th>Action</th>
							  </tr>
						  </thead>  
              <tbody>
			  
			   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_product";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     

             			<tr>
								<td><?php echo $row['prod_name']; ?></td>
								<td><?php echo $row['prod_desc']; ?></td>
								<td><?php echo $row['date_added']; ?></td>
								<td><?php echo $row['prod_type']; ?></td>
								<td><?php echo number_format($row['price'],2)."<br>";  ?></td>
								
									<td  class="center"> 	 <a href="photoproduct.php?id=<?php echo $row['ID']; ?>"><img src="<?php echo $row['images']; ?>" width="100px;" height="100px;"id="photos" ></a>
						 </td>
									
								 <td class="center"><center>
						 <form action="directoryedit.php?id=<?php echo $row['ID']; ?>" method="POST" onsubmit='return deletethis()'>
								  <button type="submit" name="delete" class="btn btn-success" >Edit&nbsp;&nbsp;&nbsp;&nbsp;</button>
							
							
						  </form><br>
						   <form action="directorydelete.php?id=<?php echo $row['ID']; ?>" method="POST" onsubmit='return deletethis()'>
								  <button type="submit" name="delete" class="btn btn-danger" >Delete</button>
							
							
						  </form>
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