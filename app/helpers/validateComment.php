<?php

function validateComment($comments)
{
$errors = array();

if (empty($comments['comment'])){
    array_push($errors, 'Comment is required!' );
}
if(!isset($_SESSION['username'])){     
    array_push($errors, "Sign UP first!");
}
    return $errors; 
}

?> 