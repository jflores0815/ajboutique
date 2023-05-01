<?php
include'header.php';


?>
 	<style>
	
	a.btn_form {
    cursor: pointer;
    border: none;
    outline: none;
    display: inline-block;
    font-size: 0.875em;
    padding: 10px 34px;
    background: #eb5367;
    color: #fff;
    text-transform: uppercase;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
	}
	
	</style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Sales table</h5>
          </div><br><br><form action="report2.php" method="POST">
					<b>From:</b><input type="date" class="btn"  name="from">&nbsp;&nbsp;<b>To:</b>&nbsp;&nbsp;<input class="btn"  type="date" name="to"><button class="btn" type="submit" name="search">Search </button>
                </form>  <br>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                 <thead>
                        <tr>  <th>Transaction ID</th>
						 <th>Client Name</th>
                        <th>address </th>
                          <th>Contact Number</th>
						<th>Email</th><th>Date</th>
                    
                          
						  <th>total Price</th>
			
						   <th>Image</th>
						
						    <th>Status</th>
						
                        </tr>
                      </thead>


                     <tbody>
<?php
include_once'includes/config2.php';
$query="
SELECT *
FROM tbl_customization";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>                     
					 <tr>  <td><?php echo $row['customize_id']; ?></td>
						<td><?php echo $row['fname']; ?> <?php echo $row['fname']; ?></td>
                         <td><?php echo $row['address']; ?></td>
						  <td><?php echo $row['contact_no']; ?></td>
						   <td><?php echo $row['email']; ?></td>
						 	<td><?php echo $row['ngayon']; ?></td>
						
					
							    <td><?php echo $row['total_price']; ?></td>
								
								   <td></td>
								   
								 <td><?php echo $row['statuss']; ?></td>
							
                         </td>
						  
                                              
					   </tr>
                        <?php
						
						}?>
                      </tbody>
            </table><br>
			<a  class="btn_form" href="print_to_pdf/print_pdf3.php">Print TO PDF</a><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include'footer.php';


?>