<?php session_start();
require_once('../../include/dbConnect.php');

if(isset($_POST['transaction_no'])){
	
	
	  	 $fetchOrderedItems = "SELECT * FROM orders WHERE transaction_no = '$_POST[transaction_no]'";
  		 $total = 0;
                            $resultOrderedItems = mysqli_query($conn, $fetchOrderedItems);
  while ($rowOrderedItems = mysqli_fetch_assoc($resultOrderedItems)) {
	  
	$order_id = $rowOrderedItems["id"];
	$product_id = $rowOrderedItems["product_id"];
	$post_order_id = $_POST["order_id$order_id"];
	$post_quantity = $_POST["quantity$order_id"];
	 
	$fetchProductDetails = "SELECT * FROM products WHERE id = '$product_id'";
                              $resultProductDetails = mysqli_query($conn, $fetchProductDetails);
                              while ($rowProducts = mysqli_fetch_assoc($resultProductDetails)) {

                                $product_price = $rowProducts["price"];
							  }
							  
						  
	 
	if(isset($post_quantity) && $post_quantity >=1) {
		
			 $total += $post_quantity * $product_price;
	 $total_nf = number_format($total, 2, '.','');
		
	$sql = "UPDATE orders SET quantity ='$post_quantity' WHERE id='$post_order_id'";
	$res=mysqli_query($conn,$sql);	
		
	}else{
		die ("<script> alert('Please try again.');
		window.location.href='../../admin/pending.php';		
		</script> ");
	}
	 
	 

	


  }
	$sql = "UPDATE transactions SET total ='$total_nf', remarks='$_POST[remarks]' WHERE transaction_no='$_POST[transaction_no]'";
	$res=mysqli_query($conn,$sql);
	
die ("<script> alert('Updated.');
window.location.href='../../admin/pending.php';		
</script> ");
}
		 
?>