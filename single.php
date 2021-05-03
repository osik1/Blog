<?php include("path.php"); 
 include(ROOT_PATH . "/app/controllers/posts.php");
 
 $posts = array();
 $users = array();


 
//receiving the id from the homepage
if (isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);
}


$topics = selectAll('topics');// this will fetch all post under a topic   

//function to display popular posts
$postss = selectAll('posts', ['published' => 1]);
$page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
$total = count( $postss ); //total items in array    
$limit = 5; //per page    
$totalPages = ceil( $total/ $limit ); //calculate total pages
$page = max($page, 1); //get 1 page when $_GET['page'] <= 0
$page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
$offset = ($page - 1) * $limit;
if( $offset < 0 ) $offset = 0;
$postss = array_slice( $postss, $offset, $limit );//this is where i query the number of post i need from the array

 
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
         
        <title><?php echo $post['title'];?> | I-Blog </title>
    </head>
    <body>

      
        
        <!--TODO include here-->
        <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

        <!-- // TODO include here-->
        <!--Page Wrapper-->
        <div class="page-wrapper">
           
          

            <!--content-->
           
            <div class="content clearfix">
                <!--MAIN CONTENT WRAPPER-->
                <div class="main-content-wrapper">

                    <div class="main-content single">
                        <div>
                  <h2 class="post-title"><?php echo $post['title'];?></h2>
                        </div>
                     
                        <i class="far fa-user">
                        <?php 
                        // if (isset($post['username'])) {
                            // $_POST['user_id'] = $user['username'];
                         echo substr($post['username'], 0, 8) . '...'; 
                        // } 
                         ?>
                        </i>
                         &nbsp;
                        <i class="far fa-calendar" > <?php echo date ('F j, yy', strtotime($post['created_at'])); ?></i>
                        
                        <!-- SHARE BUTTONS -->
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_button_facebook a2a_counter"></a>
                            <a class="a2a_button_twitter a2a_counter"></a>
                            <a class="a2a_button_whatsapp a2a_counter"></a>
                            <a class="a2a_dd a2a_counter" href="https://www.addtoany.com/share"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                        <br>
                        
                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>"class="single-page-image">
                    <div class="post-content">
                         <?php echo html_entity_decode($post['body']); ?>
                         <br>
                         <!-- <p>Author: <p>
                         &nbsp;
                         <i class="far fa-user"> <?php echo $post['username'] ?></i> -->

                         <!-- SHARE BUTTONS -->
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_button_facebook a2a_counter"></a>
                            <a class="a2a_button_twitter a2a_counter"></a>
                            <a class="a2a_button_whatsapp a2a_counter"></a>
                            <a class="a2a_dd a2a_counter" href="https://www.addtoany.com/share"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                
                    </div>
                
                  

                </div>
            </div>
                
                <!--//MAIN CONTENT-->

                <!--SIDEBAR-->
                <div class="sidebar single">
                    <!--Facebook PAGE PLUG IN-->
                <div class="fb-page" data-href="https://web.facebook.com/IProjectBlog-106511667508499/" data-tabs="" data-width="" 
                    data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" 
                    data-show-facepile="true"><blockquote cite="https://web.facebook.com/IProjectBlog-106511667508499/" 
                    class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/IProjectBlog-106511667508499/">IProjectBlog</a></blockquote>
                </div>
                    <!--//Facebook PAGE PLUG IN-->

                    <!--// social media PAGE PLUG IN-->

                    <!-- <div class="section popular">
                    <h2 class="section-title">Related Posts</h2>
                    <?php
                    if (is_array($pop) || is_object($pop))
                    {
                     foreach ($pop as $p): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                            <a href="single.php?id=<?php echo $p['id']; ?>" class="title"><?php echo $p['title']; ?></a>
                        </div>
                    <?php endforeach;  
                    }
                    ?>
                    </div> -->

                    <div class="section popular">
                    <h2 class="section-title">Popular Posts</h2>

                    <?php foreach ($postss as $p): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                            <a href="single.php?id=<?php echo $p['id']; ?>" class="title"><?php echo $p['title']; ?></a>
                        </div>
                    <?php endforeach;  ?>
                    </div>


                    <div class="section topics">
                            <h2 class="section-title">Categories</h2>
                            <ul>
                             <?php foreach ($topics as $key => $topic): ?>
                               <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']?>"><?php echo $topic['name']; ?></a></li>
                             <?php endforeach; ?>
                            </ul>
                    </div>
                </div>
                 <!--//SIDEBAR -->
            </div>



            <!--//content-->


         </div>
        <!--Page Wrapper-->

       <!--//Footer-->

       <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

        <!--//Footer-->

     <!--JQuery-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
     <!--Slick carousel-->
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

     <!--facebookpage cdn-->
     <div id="fb-root"></div>
     <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>

     <!--Custom Click for menu bar-->
     <script src="assets/js/scripts.js"></script>
    </body>
</html>
