<?php
require '../../config/database.php';
$categories=$db->query("SELECT * FROM categories",PDO::FETCH_ASSOC);

?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="../home/index.php">PHP BLOG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

        <?php
      
            foreach ($categories as $category){?>
          
        <li class="nav-item active">
                <a class="nav-link" href="../category/index.php?slug=<?php echo $category['slug']?> "> <?php echo $category["name"];?>
                    
                    <span class="sr-only">(current)</span></a>
            </li>

          
            
        
        
        <?php } ?>
    



        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

