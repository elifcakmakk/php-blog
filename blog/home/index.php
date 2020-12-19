<?php
include '../_layouts/header.php';
require '../../config/database.php';
?>


<!-- Main jumbotron for a primary marketing message or call to action -->
<!-- <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div> -->
<div class="col-12">
    <h1>Php Blog</h1>

</div>

<div class="container mt-5">
    <!-- Example row of columns -->
    <div class="row">
    
        <!-- article post -->
        <?php $articles = $db->query("select * from articles", PDO::FETCH_ASSOC);
      foreach ($articles as $article) {
          ?>
        <div class="col-md-3">
            <h2><?php echo $article['title'] ?></h2>
            <p> <?php echo $article['content'] ?> </p>
            <p class="text-muted"> <?php echo $article['article_date'] ?> </p>
            <p><a class="btn btn-warning" href="detail.php?slug=<?php echo $article['slug'] ?>" role="button">Article
                    details &raquo;</a></p>
        </div>

        <?php
      } ?>
       
    </div>
    <!-- article post end -->
    <hr>

</div> <!-- /container -->



<?php
include '../_layouts/footer.php';

?>