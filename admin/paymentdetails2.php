
<?php
Include'header2.php';

?>

<style>
.header {
	background: none;
}

</style>
<?php 
		$guestid = $_SESSION['user_id'];
		$id = $_GET['id'];
		$title = mysql_query("SELECT *,lname FROM tbl_user gu,  tbl_service ts WHERE  gu.user_id=ts.user_id AND ts.user_id='$guestid' And ts.service_id=$id") or die(mysql_error());
	$_title = mysql_fetch_array($title);
		?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Payment Details</h2>
		</div>
	</div>
	<!-- grow -->
<div class="container">
	<div class="check">	 
			
		 
		 <div class="col-md-2 cart-items">

		 </div>
		 <div class="col-md-8 cart-items">
		 <form class=form-signin name='get_state' action="add.php" method='POST' enctype="multipart/form-data">
	
															 
															   <input type="hidden" name="guest_name" class="form-control" value="<?php echo $_title['fname']; ?>  <?php echo $_title['lname']; ?>"  >
																<input type="hidden" name="guest_id" class="form-control" value="<?php echo $_title['user_id']; ?>"  >
																<input type="hidden" name="contact_no" class="form-control" value="<?php echo $_title['contact_no']; ?>"  >
															<input type="hidden" name="email_add" class="form-control" value="<?php echo $_title['email']; ?>"  >
															<input type="hidden" name="address" class="form-control" value="<?php echo $_title['address']; ?>"  >
															<input type="hidden" name="prod_id" class="form-control" value="<?php echo $_title['prod_id']; ?>"  >
															
															
															
															<input type="hidden" name="rooms" class="form-control" value="<?php echo $_title['prod_name']; ?>"  >

																<input type="hidden" name="confirmation" class="form-control" value="<?php echo $_title['confirmation']; ?>" >

																<input type="hidden" name="transaction_no" class="form-control" value="<?php echo $_title['transaction_id']; ?>" >
																
														
														<h2><center><?php echo $_title['fname']; ?>,<?php echo $_title['lname']; ?></center></h2>
														
<br><br>
Choose Payment type:<select name="type" class="form-control" required>
<option value="BPI Family Bank">BPI Family Bank</option>
<option value="Cebuana Lhuillier">Cebuana Lhuillier</option>
<option value="Smart Padala">Smart Padala</option>
<option value="Western Union">Western Union</option>

</select>
<br>
Enter Your Bank Account Reference number or control number for Cebuana:	<input type="text" name="refno" class="form-control"  ><br>
Add an attachment<input type="file" name="image" class="form-control"  >	
<br>															
 <div class="col-md-3 ">
<button type="submit" class="form-control btn-success" align="right" name="save">Send</button>				
					</div>
 <div class="col-md-3 ">
 <a href="myreservation.php" class="form-control btn-success"><span class="icon_close_alt2"></span> <center>Back</center></a> 
<br><br><br><br><br><br><br><br>
					</div>
 
    
                                                                           
                                                            </form>
</div>
</font>

</ul>
              </form>

			
		 </div>
	
		 
		
<script type="text/javascript">
$(document).ready( function() {


	


 $('#des').attr("disabled", true); 
	calculateSum();

	$(".delete").click( function() {
	
	if(confirm("Are you sure you want to delete order? "))
		{
			var id = $(this).attr('id');
		
				$.ajax({
				type: "POST",
				url: "delete.php",
				data: ({id: id}),
				success: function(response){
					
					
					$(".order" + id).hide('slow', function()
						
						{  $(this).remove();
						calculateSum();
					});
					
					
				}
				});
				
			
		}

		return false;

		});

	
	$(".update").click( function() {
		var id = $(this).attr('id')
		
	
			var id = $(this).attr('id');
			var qty = $('.qty' + id).val();
			
			
				 $.ajax({
				type: "POST",
				url: "update.php",
				data: ({id: id, qty: qty}),
				success: function(response){
				$(".message").fadeIn().html("Your Cart is Successfully Updated");	
				$(".price" + id).html(response);
					
				calculateSum();

				
				}
				}); 
		
	});
	function calculateSum() {
 
        var sum = 0;
     
        $(".sum").each(function() {
 
       
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
     
        $("#sum").html("&nbsp;Php "+sum.toFixed(2));
    }
})
</script>
			<div class="clearfix"> </div>
	 </div>
	 </div>

<!--//content-->

<script type="text/javascript">
$(document).ready( function() {
	$('.resulta').hide();
	jQuery('.reserve_me').hide()
	$('.send').attr('disabled', 'disabled');
	$("#dpayment").keyup( function(event){
		var dpay = $(this).val();
		var total = $('.total').val();
		
		total =  parseInt(total);
		dpay =  parseInt(dpay);
		
		if ( (total < dpay) ) {
		$('.resulta').fadeIn().html('error');
		$('.send').attr('disabled', 'disabled');
		}else if ( (dpay < 10000) ) {
		$('.resulta').fadeIn().html('error');
		$('.send').attr('disabled', 'disabled');
		}else{
		$('.resulta').fadeIn().html('success');
		$('.send').removeAttr('disabled');
		}
		
	});
	
	jQuery('.reserve').click( function() {
		jQuery('.reserve_me').toggle()
		jQuery('.paypal').toggle()
	})

	
	
	$(".proceed").click( function() {
		
			var dpayment = $("#dpayment").val();
			
			var paypal = $("#paypal").val();
			
			var tran = $("#tran").val();
			
		if( dpayment == "" ){
		
			$('#dpayment').css("border-color", "red");
		
			return false;
		
		}else if( paypal == "" ){
		
			$('#paypal').css("border-color", "red");
		
			return false;
		
		
		}else{
			
			$.ajax({
			
			type: "POST",
			
			url: "reserve_this.php",
			
			data: ({dpayment: dpayment, paypal: paypal, tran: tran}),
			
			success: function(response){ 
			$(".form2").fadeOut();
			$(".form3").fadeIn();
			
			$(".message").html("<font color=#0000><hr><font size=4>Congratulation!</font> You Successfully Reserved an Item! You can go to the Shop to verify your order.<p>We are eagerly anticipating your arrival and would like to advise you of the following in order to help you with your trip planning.<br>You can see your reservation details and specially your reservation code in <a> My Reservation</a><br>Should there be a concern with your reservation, a customer service representative will contact you. Otherwise, consider your reservation confirmed.</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Function Room rate is Php 500.00 for first four hours and Php 100.00 for each succeeding hours.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No pets allowed.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Outside foods are allowed inside the guest house.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check in time is 1pm and Check out time is 12 noon.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guest arriving before 1 pm shall be accommodated if rooms are vacant and ready.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Free WIFI access.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Room rates inclusive of government tax and service charge.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rates are subject to change without prior notice.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancellation notification must be made at least 10 days prior to arrival for refund of deposits. Cancellation received within the 10 days period will result to forfeiture of full deposits.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We serve Breakfast, Lunch and Dinner upon request with 2 hours notice.<br><strong>I have agreed that I will present the following documents upon check in:</strong><br/><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copy of BPI Family bank Payment.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorization letter issued by BPI Family bank payer for guest/s whose transactions were paid for in his/ her behalf.<br>If you have any questions, please email at justinesguesthouse.com or call (034) 4713 – 135<br/><br/>Thank you for choosing<i> Boso-Boso Highland Resort</i><br/><br/>Respectfully your,<br/><br/><strong>Boso-Boso Highland Resort</strong><br/><br/><br/></span><div id=divButtons name=divButtons><input type=button value=Print onclick=tablePrint(); class='button'></div></font>");
			}
			});
		
		}
		
	});
});
</script>
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>
	
<script type="text/javascript">

       function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=595,height=842,location=no,left=200px');

        popupWin.document.open();
    popupWin.document.write('<html><head></head>');
              popupWin.document.write('<body>');
               popupWin.document.write('<p  align="center"><img src="avo.jpg"></p>');
              popupWin.document.write('<p align="center">#117 F. Sevilla St., ');
             popupWin.document.write('<br/> Brgy. Pedro Cruz, San Juan City 1500</p>');
              popupWin.document.write('<h2 align="center"><strong>Log Reports</strong></h2>');
          
              popupWin.document.write('<br/>');
        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script>
	<?php
Include'footer.php';

?>