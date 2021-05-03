<?php 
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");



$table = 'posts';
$username= $_POST['username'];

$topics = selectAll('topics');
$posts = get_posts_with_username();


$errors = array();

$id = "";
// $user_id="";
$title = "";
// $post_url = "";
$body = "";
$topic_id = "";
$published = "";

if (isset($_GET['id'])) {
$post = selectOne($table, ['id' => $_GET['id']]);
$id = $post['id'];
// $user_id = $post['username'];
$title = $post['title'];
// $post_url = php_slug($post['title']);
$body = $post['body'];
$topic_id =$post['topic_id'];
$published = $post['published'];
}


///SLUG URL FUNCTION ////////////////////////////

// function php_slug($text)  
// {  
//      $text = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($text)));
//      $text = trim($text, '-');
//      $text =iconv('utf-8', 'us-ascii//TRANSLIT', $text);

//      $text = strtolower($text);
//      $text =  preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($text)));
//      if (empty($text))
//      {
//         return 'n-a';
//      }
     
//      return $text;  
// }  

///SLUG URL FUNCTION ////////////////////////////


///DELETING POST FUNCTION
if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Post deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/posts/index.php');
    exit();
}

//PUBLISH AND UNPUBLISH FUNCTION
if (isset($_GET['published']) && isset($_GET['p_id'])) {
    adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    //...update published
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = 'Post published state changed';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/posts/index.php');
    exit();
}


//CREATING A POST FUNCTION
if (isset($_POST['add-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image'] ['name'])){
    $image_name = time() . '_' . $_FILES['image'] ['name'];
    $destination = ROOT_PATH . "/assets/images/" .  $image_name;

    $result = move_uploaded_file($_FILES['image'] ['tmp_name'], $destination);

        if ($result) {
          $_POST['image'] = $image_name;
        } else{
          array_push($errors, "Failed to upload image");
       }
    }
    else{
        array_push($errors, "Post image required please");
    }
    
    if (count($errors) === 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_GET['username'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0; //if they do not select, it will publish. 

        $_POST ['body'] =  htmlentities($_POST ['body']); //this will prevent crosssite scripting
        $post_id= create($table, $_POST);
        $_SESSION['message'] = 'Post created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit(); 
    }
    else {
        $title = $_POST['title'];
        // $post_url = php_slug($post['title']);
        $body = $_POST['body'];
        $topic = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;

    }
}



///Here is a function to edit and UPDATE a post.
if (isset($_POST['update-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image'] ['name'])){
        $image_name = time() . '_' . $_FILES['image'] ['name'];
        $destination = ROOT_PATH . "/assets/images/" .  $image_name;
    
        $result = move_uploaded_file($_FILES['image'] ['tmp_name'], $destination);
    
            if ($result) {
              $_POST['image'] = $image_name;
            } else{
              array_push($errors, "Failed to upload image");
           }
        }
        else{
            array_push($errors, "Post image required please");
        }

        if (count($errors) === 0) {
            $id = $_POST['id'];
            unset($_POST['update-post'], $_POST['id'] );
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0; //if they do not select, it will publish. 
            $_POST ['body'] =  htmlentities($_POST ['body']); //this will prevent crosssite scripting
        
            $post_id= update($table, $id, $_POST);
            $_SESSION['message'] = 'Post updated successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/admin/posts/index.php');
            exit(); 

        }
        else {
            $title = $_POST['title'];
            // $post_url = php_slug($post['title']);
            $body = $_POST['body'];
            $topic = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
    
        }

}