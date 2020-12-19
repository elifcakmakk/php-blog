<?php
include '../_layouts/header.php';
include '../../config/database.php';
include '../../helpers/slugger.php';

if ($_POST) {
    $name=$_POST['name'];

    $sql=("UPDATE categories SET
                    name =:name,
                    slug=:slug,
                WHERE id = :id");
    $query = $db->prepare($sql);
