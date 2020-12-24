<?php
include '../_layouts/header.php';
require '../../config/database.php';
include '../../helpers/keyword.php';
?>

<div class="col-12">
    <h1>Php Blog</h1>

</div>

<div class="container mt-5">

    <div class="row">
      

        <?php
        if($_GET){
$slug = $_GET["slug"];

$sql = ("SELECT
         f.id,
         f.title as 'title',
         f.slug,
         f.content,
         f.article_date,
         c.name as category,
         c.slug as category_slug
         FROM articles as f
         inner join categories as c
         on c.id = f.category_id
         where c.slug= '{$slug}' ");

//$articles = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
$articles = $db->query($sql, PDO::FETCH_ASSOC);

if (!$articles) {
    echo "<p class='alert alert-danger '>Not Found!</p>";
    die();
}
        
?>
        <?php foreach ($articles as $article) {?>
        <div class="col-md-3">
            <h2><?php echo $article['title'] ?></h2>
            <p> <?php echo keyword::cut($article['content']) ?> </p>
            <p class="text-muted"> <?php echo $article['article_date'] ?> </p>
            <p><a class="btn btn-warning" href="../home/detail.php?slug=<?php echo $article['slug'] ?>" role="button">Article
                    details &raquo;</a></p>
        </div>
        <?php } }?>
        </div>


    </div>

    <hr>

</div>


<?php
include '../_layouts/footer.php';

?>