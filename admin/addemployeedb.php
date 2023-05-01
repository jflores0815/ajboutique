<?php
include_once'includes/config2.php';
include ( "../sms/NexmoMessage.php" );
if(isset($_POST['add']))
{
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$contactno=$_POST['contactno'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$position=$_POST['position'];
$position=$_POST['position'];


function createRandomPassword() {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;

}

function createRandomPassword2() {

    $chars2 = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars2, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;

}
 $confirmation1 = createRandomPassword();
 $password = createRandomPassword2();
	date_default_timezone_set('Asia/Manila');
		
			$timezone = date('Y/m/d H:i:s');
			
			$action = "Add Member";
			$page = "Employee Information";
			$id = $_SESSION['admin_id'];
			$user = $_POST['user'];
			
			
		
$message2="
Hi Good day your password is $confirmation1 . 
thanks,
Brunos Barbershop
";
$from="Brunos Barbershop";

 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "user/" . $_FILES["image"]["name"]);
                                $location = "user/" . $_FILES["image"]["name"];

	
	
	$nexmo_sms = new NexmoMessage('c41deb10', '2805a1d9');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( $contactno, $from, $message2 );
	
	
$query="INSERT INTO tbl_employee values('','$firstname','$lastname','$address','$contactno','$gender','$age','$position','$location',' $confirmation1',' $password')";
$result=mysql_query($query)or die(mysql_error());



$query2="INSERT into audittrail(user_id,audit_user,audit_action,audit_page,a_date) VALUES ('$id','$user','$action','$page','$timezone')";
$result=mysql_query($query2)or die(mysql_error());

if($result)
{
echo("<script language='javascript'>
window.alert('Member Added Successfully. The Credentials is successfully send in this number $contactno ')
window.location.href='viewemployee.php'
</script>
");
}else{
"nothing";
}
}

?>