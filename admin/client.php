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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">File Maintenance </a> </div>
    <h1>Clients Information</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>	List of Clients</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
		<tr>
						 <th style="font-size: 14px;">Client Details</th>
                        <th style="font-size: 14px;">Created At</th>
                        <th style="font-size: 14px;">Action</th>
                      </tr>
                      </thead>


                      <tbody><tr>
<?php
include_once'includes/config2.php';
$query4="SELECT * FROM clients ORDER BY id DESC ";

$result4=mysql_query($query4)or die(mysql_error());
while ($row4=mysql_fetch_array($result4)){
   						


   						$transaction_no = $row4["transaction_no"];

                          $date = date("F d, Y h:i A", strtotime($row4["date"]));

                          $id = $row4["id"];

                          $name = $row4["name"];

                          $nickname = $row4["nickname"];

                          $username = $row4["username"];

                          $email = $row4["email"];

                          $contact_number = $row4["contact_number"];

                          $address = $row4["address"];


                          $birthday = $row4["birthday"];

                          $status = $row4["status"];
                        
                   

	
?>                     
					
					 <td style="font-size: 16px;line-height: 2">

                          <strong>Client ID:</strong><?php $id = isset($_POST['']) ? $_POST['id'] : ''; ?><br/>



                        <strong>Name:</strong> <?php echo $row4['last_name']; ?>,<?php echo $row4['first_name']; ?> <br/>



                        <strong>Nickname:</strong> <?php echo $row4['nickname']; ?><br/>



                        <strong>Username:</strong> <?php echo $row4['username']; ?><br/>



                        <strong>Email:</strong> <?php echo $row4['email']; ?><br/>



                        <strong>Contact Number:</strong> <?php echo $row4['contact_number']; ?><br/>



                        <strong>Address:</strong> <?php echo $row4['address']; ?><br/>



                        <strong>Birthday:</strong> <?php echo $row4['birthday']; ?><br/>



                        <strong>Status:</strong> <?php if($row4['status'] == 1){echo "Member";} else if($row4['status'] == 0){echo "New Member";}  ?>
                        
                        </td>



                        <td style="width:30%;">
   <?php echo $row4['created_at']; ?>

                        </td>
					         <td style="width: 30%">
                

                         <button style="background: #c6e2ed;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-view btn-block" class="btn-send btn-block" data-toggle="modal" data-target="#sendMessageModal<?php echo $row4['id']; ?>"><i class="fa fa-fw fa-envelope"></i>Send Message</button> 



                        <button style="background: #ee9d92;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-view btn-block" class="btn-delete btn-block" data-toggle="modal" data-target="#deleteClientModal<?php echo $row4['id']; ?>" ><i class="icon-trash"></i> Delete</button>

                         <!-- DELETE CLIENT MODAL -->



         
                            <!-- Send Message Modal -->

                    <div class="modal fade" id="sendMessageModal<?php echo $row4['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="sendMessageModal" aria-hidden="true">



                      <div class="modal-dialog" role="document">



                        <div class="modal-content">



                          <div class="modal-header">

                               <button class="close" type="button" data-dismiss="modal" aria-label="Close">



                              <span aria-hidden="true">×</span>



                            </button>

                            <h5 class="modal-title" id="sendMessageModal"><i class="fa fa-fw fa-envelope"> </i>Send Message</h5>



                           



                          </div>



                        <div class="modal-body">



                          <form method="POST" action="../views/form_message.php" enctype="multipart/form-data">



                            <div class="form-group" style="padding: 10px 30px 10px 30px;">



                              <label for="name">Client Name</label>


                              <input type="HIDDEN"name="username"  value="<?php echo $row4['username'];?>">

                              <input name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Client Name" value="<?php echo $row4['last_name']; ?>,<?php echo $row4['first_name']; ?>" required style="width: 100%" readonly>





                            </div>





                             <div class="form-group" style="padding: 10px 40px 10px 30px;">



                              <label for="message">Send Message to Client</label>

                              <textarea style="width: 100%" name="message" class="form-control" id="message"  placeholder="Enter Message" required></textarea>  

                            







                            </div>







                            



                            <button type="submit" name="submit" class="btn btn-primary btn-block">Send Message</button>



                          </form>



                        </div>



                          <div class="modal-footer">



                          </div>



                        </div>



                      </div>



                    </div>                
        



         <div class="modal fade" id="deleteClientModal<?php echo $row4['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteClientModalLabel" aria-hidden="true">







                      <div class="modal-dialog" role="document">


                        <div class="modal-content">



                          <div class="modal-header">

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          </button>
                            <h5 class="modal-title" id="deletePRoductModalLabel"><i class="icon-edit"> </i>Delete Client</h5>
           </div>







                        <div class="modal-body">







                          <form method="POST" action="deleteclient.php">







                            <input type="hidden" value="<?php echo $row4['id']; ?>" name="delete_id">







                            <p>Do you want to delete this client? <br/> <strong> <?php echo $row4['last_name']; ?>,<?php echo $row4['first_name']; ?> </strong></p>







                            







                        </div>







                          <div class="modal-footer">







                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>







                            <button class="btn btn-primary" type="submit" name="delete">Delete</button> 







                          </form>







                            







                          </div>







                        </div>







                      </div>







                    </div>
     
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