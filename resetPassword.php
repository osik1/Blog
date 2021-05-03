<?php include("path.php"); ?>
<?php 
include(ROOT_PATH . "/app/controllers/users.php"); 
// UsersOnly();


 //Reset function -->
$errors = array();

if(isset($_POST['reset-pwd'])){
    // $errors = validateResetPassword($_POST);
    $email = $_POST['email'];
    $curpwd = $_POST['curpwd'];
    $newpwd = $_POST['newpwd'];
    $user_id = $_SESSION['id'];
    if($email != '' && $curpwd != '' && $newpwd != ''){
        if ($curpwd != $newpwd){
            $hash = sha1($curpwd);
            $newhashpwd = sha1($newpwd);
            // $_POST['newpwd'] = password_hash($_POST['newpwd'], PASSWORD_DEFAULT);  //this is to encrypt the password in the database
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hash '  ";
            $query = mysqli_query($conn, $sql) or die('error');
            if(mysqli_num_rows($query) > 0){
                update($users, $user_id, $newhashpwd);
                // $update = "UPDATE users SET password = '$newhashpwd' WHERE id = $user_id ";

                if($conn->query($update )){
                    $_SESSION['message'] = "Password updated successfully";
                    $_SESSION['type'] = "success";
                }
                else{
                    array_push($errors, "Failed to update password!");     
                }
            } 
            else{
                array_push($errors, "Credentials not found!");   
            }

        }
        else{
            array_push($errors, "Both passwords are the same!");  
        }
    }
    else{
        array_push($errors, "Please fill all the details");
        // $msg = "Please fill all the details";
    } 

}


?>
<!-- //Reset function // -->



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
        <!--custom styling-->
         <link rel="stylesheet" href="assets/css/style.css">
         <!--google fonts-->
         <link href="https://fonts.googleapis.com/css?family=Candal&display=swap" rel="stylesheet">
        <title>Reset Password | IProjectBlog</title>
    </head>
    <body>
        <!--TODO include here-->
        <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

        <!-- // TODO include here-->
        <!--Page Wrapper-->
        <div class="auth-content">
                <h2 class="form-title">Reset Password</h2>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
 

            <form action="resetPassword.php" method="post">
                    <div>
                       <label for="">Email</label>
                       <input type="text" name="email"  value ="<?php echo $email; ?>" class="text-input">
                   </div>
                     
                   <div>
                       <label for="">Current Password</label>
                       <input type="text" name="curpwd"  value ="<?php echo $curpwd; ?>" class="text-input">
                   </div>
                   <div>
                       <label for="">New Password</label>
                       <input type="text" name="newpwd"  value ="<?php echo $newpwd; ?>" class="text-input">
                   </div>
                   <div>
                       <button type="submit" name="reset-pwd" class="btn btn-big">Reset Password</button>
                   </div>
                   <p> Or <a href="<?php echo BASE_URL . '/index.php' ?>">Cancel</a></p>

          </form>
         
         
        </div>
        <!--Page Wrapper-->
        
         
        

     <!--JQuery-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
  

     <!--Custom Click for menu bar-->
     <script src="assets/js/scripts.js"></script>
    </body>
</html>

