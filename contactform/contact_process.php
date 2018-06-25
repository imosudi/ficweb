<?php
//include 'database.php';

// create a variable
$name=$_POST['name']; //name, email, subject,message
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];


//ContactName , PhoneNumber, ContactEmail & Message


  

//$sql = "INSERT INTO webcontact(ContactName,PhoneNumber,ContactEmail,Message) VALUES ('$ContactName','$PhoneNumber', '$ContactEmail','$Message')";
//}

/*if(mysqli_query($connect, $sql)){
    echo "Records added successfully.";
   // Mosud add a landing page after succesful registration
        echo "<p>Thanks, Your Contact Added</p>";
        $gohere = "../index.html";
        header ("Location: $gohere");
    /**/
/*} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
*/

// The email and send the message
$to = 'imosudi@gmail.com'; //'sbickersteth@live.com';//'imosudi@gmail.com'; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Web Contact:  $ContactName"; //name, email, subject,message
$email_body = "You have received a new message from your website contact us form.\n\n"."Here are the details:\n\nName: $name\n\nContact Email:\n$email\n\nMessage Subject: $subject\n\n Messega/Requests:\n$message\n\n" //Registration Time:\n$TimeStamp";
$headers = "From: noreply@ficplc.com.ng\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";
mail($to,$email_subject,$email_body,$headers);
return true;


// close connection
//mysqli_close($link);



?>
