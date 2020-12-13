<?php
 if($_POST){
     $title=$_POST["title"];
     $slug=$_POST["slug"];
     $content=$_POST["content"];

     $host= "localhost";
     $dbuser = "root";
     $dbpsw= "";
     $dbname="php_blog";

     require '../config/database.php';
     $data=array(
     "title"    =>$title,
     "slug"     =>$slug,
     "content"  =>$content
 );
     $sql=("INSERT INTO articles SET 
                title   =:title,
                slug    =:slug,
                content =:content");
     $insert=$db->prepare($sql);
     $result=$insert->execute($data);
     if($result){
         echo "Successful";
     }else{
         echo "Failed";
     }
 }
