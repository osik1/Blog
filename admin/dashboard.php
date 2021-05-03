<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 
adminOnly();


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
         <link rel="stylesheet" href="../assets/css/style.css">
          <!--Admin styling-->
          <link rel="stylesheet" href="../assets/css/admin.css">
         <!--google fonts-->
         <link href="https://fonts.googleapis.com/css?family=Candal&display=swap" rel="stylesheet">
        <title>Admin section- Dashboard</title>
    </head>
    <body>
       <!--ADMIN HEADER -->
       <header>
    <div class="logo">
    <a href="<?php echo BASE_URL . '/index.php'?>"><img src="<?php echo BASE_URL . '/assets/images/iblog.png'?>" alt="" class="header-logo"></a>
    </div>
    <i class="fa fa-bars menu-toggle" ></i>
    <Ul class="nav">

    <?php if (isset($_SESSION['username'])): ?>
        <li>
            <a href="">
                <i class="far fa-user"></i>
                <!-- Osik --> <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>                    <!--creating a dropdown Menu-->
            </a> 
            <ul>
            <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li>   
            </ul>
        </li>
    <?php endif; ?>
        
    </Ul>
        </header>        <!-- Admin Page Wrapper-->
        <div class="admin-wrapper">
          <!--LEFT SIDEBAR--> 
          <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

         <!--// LEFT SIDEBAR-->  
         
         <!--Admin Content-->
         <div class="admin-content">
          
          <div class="content">
                  <h2 class="page-title">Dashboard</h2>

                  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
  
                   
                  <?php echo"views = ".$_SESSION['views']; ?>

          </div>
         </div>
         <!--// Admin Content-->


           
            
        </div>
        <!--Page Wrapper-->


        
     <!--JQuery-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
     <!--ckeditor--> 
     <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
     <!--Custom Click for menu bar-->
     <script src="../assets/js/scripts.js"></script>
    </body>
</html>
