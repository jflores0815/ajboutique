<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#"class="current"> Feedback</a>  </div>
    <h1>Feedback</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Feedback table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><b>User Name</b></th>
                  <th><b>Date Added</b></th>
                  <th><b>Feedback</b></th>
               
                </tr>
              </thead>
              <tbody>
			    <?php
include_once'includes/config2.php';
$query="SELECT * FROM  tbl_feedback";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     
                <tr class="gradeX">
                	
								<td class="center"><center><?php echo $row['name']; ?></center></td>
								<td class="center"><center><?php echo $row['dated_added']; ?></center></td>
								<td class="center"><center><?php echo $row['feedback']; ?></center></td>
										
					
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