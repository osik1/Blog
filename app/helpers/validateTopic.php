<?php

function validateTopic($topic)
{
$errors = array();

if (empty($topic['name'])){
    array_push($errors, 'Name is required please!' );
}

$existingTopic = selectOne('topics', ['name' => $topic['name']]);
if ($existingTopic){
    if (isset($post['update-category']) && $existingTopic['id'] != $post['id']) {
        array_push($errors, 'Name already exist!');
    }

    if (isset($post['add-category'])){
        array_push($errors, 'Name already exist!');
    }
}
    return $errors;
}






?>  