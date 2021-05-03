<?php include("../../path.php"); ?>
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
         <link rel="stylesheet" href="../../assets/css/style.css">
          <!--Admin styling-->
          <link rel="stylesheet" href="../../assets/css/admin.css">
         <!--google fonts-->
         <link href="https://fonts.googleapis.com/css?family=Candal&display=swap" rel="stylesheet">
        <title>Admin section- Edit Posts</title>
    </head>
    <body>
       <!--ADMIN HEADER -->
       <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
        <!-- Admin Page Wrapper-->
        <div class="admin-wrapper">
          <!--LEFT SIDEBAR--> 
          <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

         <!--// LEFT SIDEBAR-->  
         
         <!--Admin Content-->
         <div class="admin-content">
          <div class="button-group">
              <a href="create.php" class="btn btn-big">Add Posts</a>
              <a href="index.php" class="btn btn-big">Manage Posts</a>

              <div class="content">
                  <h2 class="page-title">Edit Posts</h2>
                  
                  <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                  <form action="edit.php" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="id" value ="<?php echo $id; ?>">

                  <div>
                          <label>Title</label>
                          <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                      </div>

                      <div>
                        <label>Body</label>
                        <textarea name="body" id="body"><?php echo $body ?></textarea>
                    </div>

                    <div>
                        <label>Image</label>
                          <input type="file" name="image" class="text-input">
                    </div>

                    <div>                        
                        <label>Category</label>
                          <select name="topic_id" class="text-input">
                          <option value=""></option>

                          <?php foreach ($topics as $key => $topic):    ?>
                             <?php if (!empty($topic_id) && $topic_id == $topic['id'] ):  ?>

                             <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>


                               <?php else: ?>
                               <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>

                              <?php endif;?>



                          <?php endforeach; ?>
                         
                        </select>
                    </div>

                    <div>
                      <?php if (empty($published) && $published == 0): ?>
                        <label>
                          <input type="checkbox" name="published">
                          publish
                        </label>
                      <?php else: ?>
                      <label>
                          <input type="checkbox" name="published" checked>
                          publish
                        </label>
                      <?php endif; ?>


                    </div>

                
                    <div>
                            <button type="submit" name="update-post" class="btn btn-big">Update Post</button>
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
