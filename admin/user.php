<?php
include'header.php';


?>
<style type="text/css">
  
  #sidebar > ul > li.active{

  color: #939da8 !important;  
  border-top: 1px solid #37414b !important;
    border-bottom: 1px solid #1f262d !important;
    background-color: #2E363F !important;
}

#sidebar > ul > li:nth-child(2) > a
{
  color: #ffffff !important;
    text-decoration: none !important;

    background-color: #27a9e3 !important;
    border-bottom: 1px solid #27a9e3 !important;
    border-top: 1px solid #27a9e3 !important;
  
}
</style>

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
            <h5>User table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th >User Name</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Position</th>
				
                </tr>
              </thead>
              <tbody>
			    <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_admin";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     
                <tr class="gradeX">
                	<td><center><?php echo $row['username']; ?></center></td>
								<td class="center"><center><?php echo $row['lname']; ?></center></td>
								<td class="center"><center><?php echo $row['fname']; ?></center></td>
								<td class="center"><center><?php  

                $position = $row['position'];
                if ($position == 'Super-Admin') {

                  echo 'Administrator';
                  # code...
                }else{
                  echo "Staff";
                }
                 ?></center></td>
              
					
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