<?php
require './_layouts/header.php';
require '../config/database.php';
?>


    <h1 class="mt-4">Articles</h1>
    <hr>

    <a href="" class="btn btn-info mb-3">Add Article</a>

    <table class="table">
        <thead class="thead-dark">
        <th>#</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Content</th>
        </thead>
        <tbody>

        <?php

        $articles = $db->query("select * from articles",PDO::FETCH_ASSOC);
        foreach($articles as $article){
            //print_r($article);
            echo "
            <tr>
                <td>" .$article['id'] ."</td>
                <td>".$article['title'] ."</td>
                <td>".$article['slug'] ."</td>
                <td>".$article['content'] ."</td>
             </tr>
        ";
        }

        ?>

        </tbody>
    </table>





<?php require './_layouts/footer.php' ?>