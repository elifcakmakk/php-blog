<?php
require '../_layouts/header.php';
require '../../config/database.php';
?>


<?php

$id = (int) $_GET['article'];
$query = $db->query("SELECT * FROM articles WHERE id = '{$id}'")
    ->fetch(PDO::FETCH_ASSOC);
if (!$query) {
    echo "Sonuç Yok";
    die();
}



?>

<form action="update.php" method="POST" class="form-group">
    <label for="title">Title</label>
    <input value="<?php echo $query['title'] ?> " name="title" class="form-control" >
    <label for="content">Content</label>
    <textarea name="content" class="form-control" ><?php echo $query['content'] ?>
    </textarea>
    <input type="hidden" name="id" value="<?php echo $query['id'] ?>">
    <br>
     <label for="title">Category</label>
     <select  name="category" class="form-control mb-3">
                <option disabled >Please select category</option>
               
                <?php
                $categories = $db->query("select * from categories", PDO::FETCH_ASSOC);
                
                 foreach ($categories as $category) { ?>
                     <option 

                     <?php
                     if($query['category_id'] == $category['id']){
                        echo "selected";
                     }
                     ?>

                     value="<?php echo $category['id'] ?>" >
                     <?php echo $category['name']; ?>
                     </option>
                 <?php } ?>

            </select>
    <button type="submit" class="btn btn-success" > Update</button>
    <?php // TODO 1 select option categoris option
    /*
    <select name="category_id" id="category_id">
    
    <option value="1">Elif</option>
    <option value="2">Hamdi</option>
    <option value="3">First Category</option>
  
   </select>
    */
    ?>
</form>

<?php
require  '../_layouts/footer.php';
?>