<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
// adminOnly();
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
        <link rel="shortcut icon" href="<?php echo BASE_URL . 'assets/images/iblogo.png'?>" />
        <!--custom styling-->
         <link rel="stylesheet" href="../assets/css/style.css">
         <!--google fonts-->
         <link href="https://fonts.googleapis.com/css?family=Candal&display=swap" rel="stylesheet">
        <title>Register</title>
    </head>
    <body>
        <!--TODO include here-->
        <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

        <!-- // TODO include here-->
        <!--Page Wrapper-->
        <div class="auth-content">
                <h2 class="form-title">Register</h2>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>


            <form action="register.php" method="post">
                     <div>
                        <label for="">Username</label>
                        <input type="text" name="username" value ="<?php echo $username; ?>" class="text-input">
                    </div>
                    <div>
                       <label for="">Email</label>
                       <input type="text" name="email"  value ="<?php echo $email; ?>" class="text-input">
                   </div>
                   <div>
                       <label for="">Password</label>
                       <input type="text" name="password"  value ="<?php echo $password; ?>" class="text-input">
                   </div>
                   <div>
                       <label for="">Password Confirmation</label>
                       <input type="text" name="passwordConf"  value ="<?php echo $passwordConf; ?>" class="text-input">
                   </div>
                   <div>
                       <button type="submit" name="register-btn" class="btn btn-big">Register</button>
                   </div>
                   <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
          </form>
         
         
        </div>
        <!--Page Wrapper-->
        
         
        

     <!--JQuery-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
  

     <!--Custom Click for menu bar-->
     <script src="../assets/js/scripts.js"></script>
    </body>
</html>
