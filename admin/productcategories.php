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
							<th>Category Name</th>
        				  <th>Category Description</th>
        				  <th>Date Added</th>
						
						   <th>Action</th>
							  </tr>
						  </thead>  
              <tbody>
			  
			   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_categories Order by categories_id DESC";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     

             			<tr>
								<td><center><?php echo $row['category_name']; ?></center></td>
							
								<td><center><?php echo $row['category_description']; ?></center></td>
					<td><center><?php echo $row['date_added']; ?></center></td>
							
					
								 <td class="center"><center>
						
							
							
						  </form><br><center>
						   <form action="categorydelete.php?id=<?php echo $row['categories_id']; ?>" method="POST" onsubmit='return deletethis()'>
								  <button type="submit" name="delete" class="btn btn-danger" >Delete</button>
							
							</center>
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