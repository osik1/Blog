<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php");
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
         <link rel="stylesheet" href="../../assets/css/style.css">
          <!--Admin styling-->
          <link rel="stylesheet" href="../../assets/css/admin.css">
         <!--google fonts-->
         <link href="https://fonts.googleapis.com/css?family=Candal&display=swap" rel="stylesheet">
        <title>Admin section- Add Categories</title>
    </head>
    <body>

         <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

        <!-- Admin Page Wrapper-->
        <div class="admin-wrapper">
          <!--LEFT SIDEBAR--> 
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

         <!--// LEFT SIDEBAR-->  
         
         <!--Admin Content-->
         <div class="admin-content">
          <div class="button-group">
              <a href="create.php" class="btn btn-big">Add Category</a>
              <a href="index.php" class="btn btn-big">Manage Categories</a>

              <div class="content">
                  <h2 class="page-title">Edit Category</h2>
                  <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                  <form action="edit.php" method="post">

                  <input type="hidden" name="id" value ="<?php echo $id; ?>">

                      <div>
                          <label>Name</label>
                          <input type="text" name="name" value ="<?php echo $name; ?>"class="text-input">
                      </div>

                      <div>
                        <label>Description</label>
                        <textarea name="description" id="body"><?php echo $description; ?></textarea>
                    </div>

                   <div>
                            <button type="submit" name="update-category" class="btn btn-big">Update Category</button>
                    </div>
                  </form>
              </div>

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
     <script src="../../assets/js/scripts.js"></script>
    </body>
</html>
