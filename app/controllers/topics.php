<?php 
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateTopic.php");


$table = 'topics';

$errors = array();
$id = '';
$name = '';
$description = '';


$topics = selectAll($table);

//CREATE TOPIC FUNCTION
if (isset($_POST['add-category'])) {
    adminOnly();
    $errors = validateTopic($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-category']);
        $topic_id = create($table, $_POST);
        $_SESSION['message'] = 'Category created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/topics/index.php');
    exit();
    }
    else{
        $name = $_POST['name'];
        $description = $_POST['description'];  
    }

}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

//DELETE TOPIC FUNCTION
if (isset($_GET['del_id'])) {
    adminOnly();
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Category deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/topics/index.php');
    exit();
}

//update topic function. When a topic is edited is an update.
if (isset($_POST['update-category'])){
    adminOnly();
    $errors = validateTopic($_POST);
    if (count($errors) === 0) {
    $id = $_POST['id'];
    unset($_POST['update-category'], $_POST['id']);
    $topic_id = update($table, $id, $_POST);
    $_SESSION['message'] = 'Category updated successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/topics/index.php');
    exit(); 
    }
    else{
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];    
    }
}