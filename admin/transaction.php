<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Traansaction</a> <a href="#" class="current">Tables</a> </div>
    <h1>Transaction Table</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Transaction table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
               <thead>
                        <tr>  <th>Transaction ID</th>
						 <th>Client Name</th>
                        <th>address </th>
                          <th>Contact Number</th>
						<th>Email</th>
                          <th>total Inch</th>
                          
						  <th>total Price</th>
						   <th>deminsion</th>
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
						 	
						
						    <td><?php echo $row['total_inch']; ?></td>
							    <td><?php echo $row['total_price']; ?></td>
								   <td>
								   
								   width1:<?php echo $row['width1']; ?>" ,
								  width2: <?php echo $row['width2']; ?>" ,
								  height1:<?php echo $row['height1']; ?>" ,
								   height2:<?php echo $row['height2']; ?>" ,
								 length1:  <?php echo $row['length1']; ?>" ,
								 length2 : <?php echo $row['length2']; ?>
								   
								   
								   </td> <td>
								      <?php 
									$type=$row['type'];
									$image=$row['width1'];
									if ($type=='box'){
									echo' <a href="../img/box2.png">  <img  src="../img/box2.png" class="img-responsiveresponsive" width="200px"></a>';
									}else if($type=='envelop'){
									echo' <a href="../img/3.png">  <img  src="../img/3.png" class="img-responsiveresponsive" width="200px"></a>';
									}else if($type=='notebook'){
									echo' <a href="../img/1.png">  <img  src="../img/1.png" class="img-responsiveresponsive" width="200px"></a>';
									}else if($type=='request'){
									echo' <a href="../'.$image.'">  <img  src="../'.$image.'" class="img-responsiveresponsive" width="200px"></a>';
									}else {
									echo' <a href="../img/4.png">  <img  src="../img/4.png" class="img-responsiveresponsive" width="200px"></a>';
									}

									?></td>
								 <td><?php echo $row['statuss']; ?></td>
							
                         
						  
                                              
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