<?php

$host = "localhost";
$dbuser = "root";
$dbpsw = "database";
$dbname = "php_blog";
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpsw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "#ConnectionSuccess";
    echo "<p class='alert alert-success mt-3'>#ConnectionSuccess</p>";

} catch (PDOException $e) {
    echo "<p class='alert alert-danger mt-3'>#ConnectionSuccess" . $e->getMessage() . "</p>";
}
