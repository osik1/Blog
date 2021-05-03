<?php 
include("path.php"); 
include(ROOT_PATH . "/app/controllers/topics.php");


$posts = array();


//The Recent post heading
$postsTitle = 'Recent Posts';

//Listing Post under the related topic
if (isset($_GET['t_id'])){
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = " Posts under '" . $_GET['name']. "'";
}
// search-box form submission recieval
else if (isset($_POST['search-term'])){
    $postsTitle = "You searched for '" . $_POST['search-term']. "'";
    $posts = searchPosts($_POST['search-term']);//this will search the search term from all the post
}
else{
    $posts = getpublishedPosts();

}

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




//PAGINATION//
$page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
$total = count( $posts ); //total items in array    
$limit = 5; //per page    
$totalPages = ceil( $total/ $limit ); //calculate total pages
$page = max($page, 1); //get 1 page when $_GET['page'] <= 0
$page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
$offset = ($page - 1) * $limit;
if( $offset < 0 ) $offset = 0;

$posts = array_slice( $posts, $offset, $limit );//this is where i query the number of post i need from the array

$link = 'index.php?page=%d';
$pagerContainer = '<div style="width: 300px;">';   
if( $totalPages != 0 ) 
{
if( $page == 1 ) 
{ 
$pagerContainer .= ''; 
} 
else 
{ 
$pagerContainer .= sprintf( '<a href="' . $link . '" style="color: #fc5604"> &#171; prev page</a>', $page - 1 ); 
}
$pagerContainer .= ' <span> page <strong>' . $page . '</strong> of ' . $totalPages . '</span>'; 
if( $page == $totalPages ) 
{ 
$pagerContainer .= ''; 
}
else 
{ 
$pagerContainer .= sprintf( '<a href="' . $link . '" style="color: #fc5604"> next page &#187; </a>', $page + 1 ); 
}           
}                   
$pagerContainer .= ' </div>';




//PAGINATION//

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
        


        <title>Welcome-to-IprojectBlog. Visit-learn-explore - IprojectBlog</title>
    </head>
    <body> 

       
      <!--TODO include here-->
      <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

      <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>


      <!-- // TODO include here-->
     
        
        <!--Page Wrapper-->
        <div class="page-wrapper">
            <!--Post Slider-->
            <div class="post-slider">
                <!--<h1 class="slider-title">Trending Posts</h1>-->
                <i class="fas fa-chevron-left prev"></i>     
                <i class="fas fa-chevron-right next"></i>

                <div class="post-wrapper">

                        <?php foreach ($posts as $post): ?>
                        <div class="post">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image">
                            <div class="post-info">
                                <h3><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
                                <i class="far fa-user"> <?php echo substr($post['username'], 0, 8) . '...'; ?></i>
                                &nbsp;
                                <i class="far fa-calendar" > <?php echo date ('F j, yy', strtotime($post['created_at'])); ?></i>
                            </div>
                       </div>
                        <?php endforeach; ?>
                </div>
            </div>
            <!--//Post Slider-->
          

            <!--content-->
            <!--MAIN CONTENT-->
            

               <div class="content clearfix">
                   <div class="main-content">
                    <h1 class="recent-post-title"><?php echo($postsTitle) ?></h1>
                    <!-- THIS IS THE BLOG POST -->
                    <?php foreach ($posts as $post): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
                            <div class="post-preview">
                                <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                                <i class="far fa-user"> <?php echo substr($post['username'], 0, 8) . '...'; ?></i>
                                &nbsp;
                                <i class="far fa-calendar"> <?php echo date ('F j, yy', strtotime($post['created_at'])); ?></i>
                                <p class="preview-text">
                                       <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...') ?>  
                                </p>
                                <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- //pagination buttons // -->
                <?php echo $pagerContainer; ?>

                    </div>

               
        

                <!--//MAIN CONTENT-->




                <div class="sidebar">
                     

                    <div class="search section">
                        <h2 class="section-title">Search</h2>
                        <form action="index.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search...">
                        </form>
                    </div>

                    <div class="section popular">
                        <h2 class="section-title">Popular Post</h2>
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


             </div>



            <!--//content-->
        <!--    <ul class="pagination"> -->
        
      


        </div>
        <!-- Page Wrapper-->

    <!--Footer-->

        
        <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


    <!--//Footer-->

     <!--JQuery-->
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
      <!--Pagination purpose-->
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
     
     <!--Slick carousel-->
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

     <!--Custom Click for menu bar-->
     <script type="text/javascript" src="assets/JS/scripts.js"></script>
    <!-- <script src="assets/js/scripts.js"></script> -->

    </body>
</html>
