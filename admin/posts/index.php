<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();

// search-box form submission recieval
if (isset($_POST['search-term'])){
    $postsTitle = "You searched for '" . $_POST['search-term']. "'";
    $posts = searchPosts($_POST['search-term']);//this will search the search term from all the post
}
else{
    $posts = getpublishedPosts();
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
         <link rel="stylesheet" href="../../assets/css/style.css">
          <!--Admin styling-->
          <link rel="stylesheet" href="../../assets/css/admin.css">
         <!--google fonts-->
         <link href="https://fonts.googleapis.com/css?family=Candal&display=swap" rel="stylesheet">
        <title>Admin section- Manage Posts</title>
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
              <a href="create.php" class="btn btn-big">Add Posts</a>
              <a href="index.php" class="btn btn-big">Manage Posts</a>

              <div class="search section">
                        <h2 class="section-title">Search</h2>
                        <form action="index.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search...">
                        </form>
                 </div>
            

              <div class="content">
                  <h2 class="page-title">Manage Posts</h2>
                  
                  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>


                  <table>
                      <thead>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Author</th>
                          <th colspan="3">Action</th>
                          
                          <tbody>
                          <?php foreach ($posts as $key => $post): ?>
                              <tr>
                                  <td><?php echo $key + 1; ?></td>
                                  <td><?php echo $post ['title'] ?></td>
                                  <td><?php echo $post['username']; ?></td>
                                  <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                                  <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>

                                  <?php if ($post['published']): ?>
                                    <td><a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">unpublish</a></td>
                                  <?php else: ?>
                                    <td><a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="publish">publish</a></td>
                                  <?php endif; ?>


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
