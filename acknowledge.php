<?php
// $message = '';
// $headers = '';
if(isset($_POST['send'])) {
$email_to = "osiknewton9@gmail.com";
$email_subject = "Feedback from IprojectBlog";
//Errors to show if there is a problem in form fields.
function died($error) {
echo "We are sorry that we can't procceed your request due to error(s)";
echo "Below is the error(s) list <br /><br />";
echo $error."<br /><br />";
echo "Please go back and fix these errors.<br /><br />";
die();
}
// validation expected data exists
if(!isset($_POST['name']) ||
!isset($_POST['email']) ||
!isset($_POST['message'])) {
died('We are sorry to proceed your request due to error within form entries');   
}
$name = $_POST['name']; // required
$email = $_POST['email']; // required
$message = $_POST['message']; // required
$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if(!preg_match($email_exp,$email)) {
$error_message .= 'You entered an invalid email<br />';
}
$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($string_exp,$name)) {
$error_message .= 'Invalid name<br />';
}
// //  if(!preg_match($string_exp,$email)) {
// // $error_message .= 'Invalid email<br />';
//  }
if(strlen($message) < 2) {
$error_message .= 'Invalid message<br />';
}
if(strlen($error_message) > 0) {
died($error_message);
}
$email_message = "Form details below.\n\n";
function clean_string($string) {
$bad = array("content-type","bcc:","to:","cc:","href");
return str_replace($bad,"",$string);
}
$email_message .= "Name: ".clean_string($name)."\n";
$email_message .= "Email: ".clean_string($email)."\n";
$email_message .= "Message: ".clean_string($message)."\n";
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
$success= mail($email, $email_subject, $message, $headers);
?>
<!-- include your own success html here -->
<!-- Thank you for contacting us. We will be in touch with you very soon. -->
<?php 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans+Condensed:300|Oswald|Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
        <!--font awesome-->
        <script src="https://kit.fontawesome.com/bd832a5ee6.js" crossorigin="anonymous"></script>
        <!-- title icon  -->
        <link rel="shortcut icon" href="<?php echo BASE_URL . '/assets/images/iblogo.png'?>" />
        <!--custom styling-->
         <link rel="stylesheet" href="assets/css/style.css">
         <!--google fonts-->
         <link href="https://fonts.googleapis.com/css?family=Candal&display=swap" rel="stylesheet">
        <title>Email feedback</title>
    </head>
    <body>
        <!--TODO include here-->

       <!-- // TODO include here-->
        <!--Page Wrapper-->
        <div class="auth-content">
       <?php if (isset($success) && $success){?>
        <h1>Thank You</h1>
       Your message has been sent.   
       <?php } else {?>
        <h1>Oops!</h1>
       Sorry, there was a problem sending your message.
       <?php } ;
       
       ?>  
      

      



             
         
        </div>

        <!--Page Wrapper-->
        
         
        

     <!--JQuery-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
  

     <!--Custom Click for menu bar-->
     <script src="assets/js/scripts.js"></script>
    </body>
</html>
