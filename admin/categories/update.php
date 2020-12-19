<?php
include '../_layouts/header.php';
include '../../config/database.php';
include '../../helpers/slugger.php';

//print_r($_POST);
if ($_POST) {
    $query = $db->prepare("UPDATE categories SET
name =:name,
slug=:slug
WHERE id = :id");
    $update = $query->execute(array(
        ":name" => $_POST['name'],
        ":slug"=> slugger::slugify($_POST['name']),
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