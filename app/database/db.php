<?php
session_start();

 

if(isset($_SESSION['views'])) 
	$_SESSION['views'] = $_SESSION['views']+1; 
else
	$_SESSION['views']=1; 
	

require('connect.php');


//will be deleted soon
// function dd($value){
//     echo "<pre>", print_r($value, true), "</pre>";
//     die();
// }






function executeQuery($sql, $data)
{
global $conn;
$stmt= $conn->prepare($sql);
$values= array_values($data);
$types = str_repeat('s', count($values));
$stmt->bind_param($types, ...$values);
if ($stmt->execute()) {
    return $stmt;
}

}


//Select all function
function selectAll($table, $conditions = [])
{
global $conn;
$sql = "SELECT * FROM $table";
if (empty($conditions)){
$stmt= $conn->prepare($sql);
$stmt->execute();
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}
else{
$i = 0;
foreach ($conditions as $key => $value){
if ($i === 0) {
    $sql = $sql . " WHERE $key=?";
 
} else {
    $sql = $sql . " AND $key=?";

}
$i++;
}
$stmt= executeQuery($sql, $conditions);
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;    
}
}
//we also used prepared statement to prevent SQL injections
//Select One function


function selectOne($table, $conditions)
{
global $conn;
$sql = "SELECT * FROM $table";


$i = 0;
foreach ($conditions as $key => $value){
if ($i === 0) {
$sql = $sql . " WHERE $key=?";

} else {
$sql = $sql . " AND $key=?";

}
$i++;
}

//$sql= "SELECT * FROM users WHERE admin=0 AND username='Osik'LIMIT=1"
$sql = $sql . " LIMIT 1";
$stmt= executeQuery($sql, $conditions);
$records = $stmt->get_result()->fetch_assoc();
return $records;    // it used to be 'return records' 
}
///this is also done to prevent sql injections




//the create function
function create($table, $data)
{
global $conn;
//$sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?"
$sql = "INSERT INTO $table SET";

$i = 0;
foreach ($data as $key => $value){
if ($i === 0) {
    $sql = $sql . " $key=?";

} else {
    $sql = $sql . ", $key=?";

}
$i++;
}
$stmt = executeQuery($sql, $data);
$id = $stmt->insert_id;
return $id;

} 

// The update function
function update($table, $id, $data)
{
global $conn;
//$sql = "UPDATE INTO users SET username=?, admin=?, email=?, password=? WHERE id=?"
$sql = "UPDATE $table SET";  //INTO
$i = 0;
foreach ($data as $key => $value){
if ($i === 0) {
   $sql = $sql . " $key=?";
} else {
  $sql = $sql . ", $key=?";

}
$i++;
}

$sql = $sql . " WHERE id=?";
$data['id'] = $id;
$stmt = executeQuery($sql, $data);
return $stmt->affected_rows;
} 


// The Delete function
function delete($table, $id)
{
global $conn;
$sql = "DELETE FROM $table WHERE id=?";

$stmt = executeQuery($sql, ['id' => $id]);
return $stmt->affected_rows;
}

/// this function is to give posts that are being published by a specific user.
function getPublishedPosts(){
    global $conn;
    //select * FROM posts WHERE published=1
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? ORDER BY p.created_at DESC "; 
    $stmt= executeQuery($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records; 
}

function get_posts_with_username(){
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id  ORDER BY p.created_at DESC "; 
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}



// this function list all post under a particular topic
function getPostsByTopicId($topic_id){
    global $conn;
    //select * FROM posts WHERE published=1
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=? ORDER BY p.created_at DESC"; 
    $stmt= executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records; 
}

//search function
function searchPosts($term){
    $match = '%' . $term . '%';
    global $conn;
    //select * FROM posts WHERE published=1
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? 
    AND p.title LIKE ? OR p.body LIKE ? ORDER BY p.created_at DESC"; 
    $stmt= executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records; 


}



?>

