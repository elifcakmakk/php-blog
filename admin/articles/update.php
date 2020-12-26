<?php
include '../_layouts/header.php';
include '../../config/database.php';
include '../../helpers/slugger.php';

//print_r($_POST);
if ($_POST) {
    $query = $db->prepare("UPDATE articles SET
title =:title,
slug=:slug,
content =:content,
category_id =:category_id
WHERE id = :id");
    $update = $query->execute(array(
        ":title" => $_POST['title'],
        ":slug"=> slugger::slugify($_POST['title']),
        ":content" => $_POST['content'],
        ":category_id"=> (int) $_POST['category'],
        ":id"=>(int) $_POST['id']
        
    ));
    if ($update) {
        echo "<p class='alert alert-success'>Update Successful </p>";
        header("Location: index.php");
    }
    else{
        echo "<p class='alert alert-danger'>Update Failed </p>";
    }
}

