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

#sidebar > ul > li:nth-child(6) > a
{
  color: #ffffff !important;
    text-decoration: none !important;

    background-color: #27a9e3 !important;
    border-bottom: 1px solid #27a9e3 !important;
    border-top: 1px solid #27a9e3 !important;
  
}
</style>
                    <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT * FROM tbl_admin where admin_id='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
  $fname=$row['fname'];
   $lname=$row['lname'];
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Report </a> </div>
    
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
<br><form method="POST" action="reservationreport2.php"> 
From: <input type="date" name="from"> To: <input type="date" name="to">
<button  class="btn btn-danger" name="search" style="margin-top: -10px;">Search</button>
<br></form>
 <div style="float: right;margin-right: 20px;">
 
           </div>

          <div class="widget-title">
          </div><br>

           <?php 
      $admin_id=$row['admin_id'];
      $position2=$row['position'];
       
       if($position2=='Super-Admin'){ 
       ?>
       <button type="button" onclick="printDiv('printableArea')"  class="btn btn-primary pull-left">PRINT </button><br><br>
       <?php
      }else{?>

  <button type="button" onclick="printDiv('printableArea')" disabled="disabled" class="btn btn-primary pull-left">PRINT </button><br><br>
      <?php
      }
      
       ?>
           

       <?php
            
            }?> 
           


          <div class="widget-content nopadding">
          <div id="printableArea">

     <br>
            <center>

              <img src="../images/ajlogo2.jpg" width="100px;">
              <div style="font:bold 25px 'Aleo';">Sales Report</div><br>
A & J Boutique<br>
tel:+63917 506 3986<br>
mailto:ajboutiquestore@gmail.com<br>
<br>
  </center>
            <table class="table table-bordered ">
                     <thead>
                        <tr>
              <th>Product Name</th>
                <th>Qty Sold</th>
                <th>Unit Price</th>
           
          
            <th>Sub Tota</th>
               <th>Total Sales</th>
           
               </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$from=$_POST['from'];
$to=$_POST['to'];

$query="SELECT product_name, qty_sold, unit_price, sub_total FROM(select b.name as product_name, sum(a.quantity) as qty_sold, b.price as unit_price, (sum(a.quantity)*b.price) as sub_total from orders a, products b, transactions c where a.transaction_no = c.transaction_no and b.id = a.product_id and (date BETWEEN '$from' AND '$to') group by b.name) as derived_table order by qty_sold desc";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
  $prodName = $row['product_name'];



        $qtySold = $row['qty_sold'];



        $unitPrice = $row['unit_price'];



        $subTotal = $row['sub_total'];



        $totalSales = $qtySold * $subTotal;



        $totals = $totals + $totalSales;

?>                     
           <tr>
            <td><?php echo $row['product_name']; ?></td>
                         <td><?php echo $row['qty_sold']; ?></td>
              <td><?php echo $row['unit_price']; ?></td>
              <td><?php echo $row['sub_total']; ?></td>
          
              <td><center>
            <?php echo number_format($totalSales,2);  ?></center>
              
              </td>
              
                       
            </tr>
                        <?php
            
            }?>
                      </tbody>
                    </table>

                    <div style="float: right;margin-right: 80px;">
  <h5>Total Sales: <br><?php echo number_format($totals,2);  ?></h5>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
     
     function printDiv(printableArea) {
     var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

     </script>
<?php
include'footer.php';


?>