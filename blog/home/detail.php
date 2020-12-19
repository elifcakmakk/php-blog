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
    
        <!-- article post -->
        <?php 
        
        $slug = $_GET['slug'];

        $query = $db->query("SELECT * FROM articles WHERE slug = '{$slug}'")
            ->fetch(PDO::FETCH_ASSOC);
        if(!$query)
        {
            echo "<p class='alert alert-danger '>Not Found!</p>";
            die();
        }

      ?>
       <h1> <?php echo $query['title'] ?></h1>
       <br>
       <p>
       <?php echo $query['content'] ?>
       </p>
    
    <!-- article post end -->
    <hr>

</div> <!-- /container -->



<?php
include '../_layouts/footer.php';

?>