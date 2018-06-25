<?php
include 'database.php';

// create a variable
$ChildName=$_POST['ChildName'];
$ParentNumber=$_POST['PhoneNumber'];
$ContactEmail=$_POST['ContactEmail'];
$Location=$_POST['Location'];
$PaymentRef=$_POST['PaymentRef'];
$Teller=$_FILES['PaymentUpload']["Teller"];
$Message=$_POST['Message'];
$captcha;

//Name,ParentNumber,ParentEmail,Location,PaymentRef,Teller,Comment 

//DEFINE MY FILE UPLOAD
$uploads_dir = 'uploads';
$tmp_name = $_FILES["PaymentUpload"]["tmp_name"][$key];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["PaymentUpload"]["name"][$key]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");



//for captcha
 /*  if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
         // echo '<h2>Please check the the captcha form.</h2>';
	
	$gohere1 = "../error.html1";
    	header ("Location: $gohere1");
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfp-CYTAAAAAGKJ0fBIAsCnpFje7RWotIyMm9cYresponse=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {  //start initial code***
          //echo '<h2>Thanks for posting comment.</h2>';
        //}
*/




$sql = "INSERT INTO subscribe(ChildName,ParentNumber,ContactEmail,Location,PaymentRef,Teller,Message ) VALUES ('$ChildName', '$ParentNumber','$ContactEmail','$Location', '$PaymentRef','$Teller','$Message' )";
//}

if(mysqli_query($connect, $sql)){
    echo "Records added successfully.";
   // Mosud add a landing page after succesful registration
    	echo "<p>Thanks, Your Contact Added</p>";
	$gohere = "../thank_you.html";
    	header ("Location: $gohere");
    /**/
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}

//$sql = 'SELECT TimeStamp FROM subscribe WHERE ChildName = "$Childname" AND  ParentNumber = "$ParentNumber"';
//$RegTimeStamp = mysql_query($sql);

// Create the email and send the message
$to = 'sbickersteth@live.com';//'imosudi@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "New Kit Order Request:  $ChildName";
$email_body = "You have received a new message from your website kit request form.\n\n"."Here are the details:\n\nName: $ChildName\n\nContact Phone Number:\n$ParentNumber\n\nContact Email:\n$ContactEmail\n\nLocation:\n$Location\n\nPayment Reference: \n$PaymentRef\n\nTeller: \n$Teller \n\nOrder Time: \n$TimeStamp \n$tmp_name";

//$regTimeStamp = mysql_query("SELECT TimeStamp FROM subscribe WHERE ChildName = '$Childname' AND  ParentNumber = '$ParentNumber'");
//$email_body .= "\n$RegTimeStamp";

$headers = "From: noreply@kool.ng\n"; // This is the email address the generated message will be from.
$headers .= "Reply-To: $ParentEmail";	
mail($to,$email_subject,$email_body,$headers);
return true;		

 
// close connection
mysqli_close($link);



?>

