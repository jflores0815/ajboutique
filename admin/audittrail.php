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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="tip-bottom">File Maintenance</a> <a href="#" class="current">Audit Trail</a> </div>
    <h1>Audit Trail</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Audit Trail table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>User Name</th>
                  <th>Action</th>
                  <th>Audit Page</th>
                  <th>date</th>
                </tr>
              </thead>
              <tbody>
			  	   <?php
include_once'includes/config2.php';
$query="SELECT * FROM audittrail";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     

                <tr class="gradeX">
             
								<td><center><?php echo $row['audit_user']; ?></center></td>
								<td><center><?php echo $row['audit_action']; ?></center></td>
								<td><center><?php echo $row['audit_page']; ?></center></td>
								<td><center><?php echo $row['a_date']; ?></center></td>
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