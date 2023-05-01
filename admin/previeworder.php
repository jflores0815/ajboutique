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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Preview </a> </div>
    <h1>Preview</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Preview table</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
		  <tr>
					    <th width="10" align="center"><center>Image</center></th>
              <th align="center" width="120"><font size=3>Product Name</font></th>
              <th align="center" width="120"><font size=3>Payable</font></th>
			        <th align="center" width="120"><font size=3>Quantity</font></th>
               <th align="center" width="120"><font size=3>Size</font></th>
              <th align="center" width="120"><font size=3>Status</font></th>
              <th align="center" width="120"><font size=3>confirmation</font></th>
              <th  width="120"><font size=3>Transaction_id</font></th>
              <th align="center" width="120"><font size=3>Date Serve</font></th>
                        </tr>
                      </thead>


                     <tbody>
<?php
$id=$_GET['id'];
$confirmation= $_checkout['confirmation'];
   
$checkout = mysql_query("SELECT * FROM `reservation`LEFT JOIN tbl_product ON tbl_product.ID=reservation.prod_id where reservation.confirmation='$id'") or die(mysql_error());
WHILE($_checkout = mysql_fetch_array($checkout)) {

$transaction=$_checkout['transaction_id'];
?>

<tr class="order<?php echo $_checkout['prod_id'] ?>">

<td width="150" ><center><img src="<?php echo $_checkout['images']?>" alt="product_image" width="70px" /></center></td>

<td><center>
<input name="roomNo" type="hidden" class="form-control" value="<?php echo $_checkout['roomNo']?>" id="title" readonly>
<?php echo $_checkout['prod_name']?></center></td>
<td><center>Php <?php echo number_format($_checkout['payable'],2);  ?></center></td>
<td><center><?php echo $_checkout['quantities']?></center></td>
<td><center><?php echo $_checkout['size']?></center></td>
<td><center><?php echo $_checkout['status']?></center></td>
<td><center><?php echo $_checkout['confirmation']?></center></td>
<td><center><?php echo $_checkout['transaction_id'] ; ?></center></td>
<td><center><?php echo $_checkout['Now'] ; ?></center></td>

<div  id="price" class="price<?php echo $_checkout['roomNo'] ?> sum"><input id="des" type="hidden" class="sum" value="<?php echo $_checkout['qty'] * $_checkout['price']; ?>" /></div>

</tr>

<?php

} ?>


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