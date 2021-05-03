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
        <title>Admin section- Manage Topics</title>
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
                  <h2 class="page-title">Manage Categories</h2>

                  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                  <table>
                      <thead>
                          <th>ID</th>
                          <th>Name</th>
                          <th colspan="2">Action</th>
                          
                          <tbody>

                                <?php foreach ($topics as $key => $topic): ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $topic['name']; ?></td>
                                            <td><a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">edit</a></td>
                                            <td><a href="index.php?del_id=<?php echo $topic['id']; ?>" class="delete">delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                            </tbody>
                      </thead>
                  </table>
              </div>

          </div>
         </div>
         <!--// Admin Content-->

       
           
            
        </div>
        <!--Page Wrapper-->


        
     <!--JQuery-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       

     <!--Custom Click for menu bar-->
     <script src="../../assets/js/scripts.js"></script>
    </body>
</html>
