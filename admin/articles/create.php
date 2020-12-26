<?php include '../_layouts/header.php';
    require '../../config/database.php';
    include '../../helpers/slugger.php';
    include '../../helpers/keyword.php';
    ?>

    <h1 class="mt-4" style="color: #0c5460" ><strong>ADD ARTICLE</strong></h1>
    <hr>

<div class="container col-12">
    <form method="post" action="create.php">
        <div class="form-group">
            <label style="color: #0c5460"><strong>Title</strong></label>
            <input name="title" type="text" class="form-control" placeholder="Article Title" required>

        </div>
        <div class="form-group">
            <label style="color: #0c5460"><strong>Content</strong></label>
            <textarea name="content" type="text" class="form-control" required >
            </textarea>
        </div>
        <div class="form-group">
            <label style="color: #0c5460"><strong>Category</strong></label>
            <select name="category" class="form-control">
                <option disabled selected >Please select category</option>
                <?php
                $categories = $db->query("select * from categories", PDO::FETCH_ASSOC);
                
                 foreach ($categories as $category) { ?>
                     <option value="<?php echo $category['id'] ?>" ><?php echo $category['name']; ?></option>
                 <?php } ?>

               
            </select>
        </div>


        <button type="submit" class="btn btn-info">Add</button>
    </form>
</div>

<?php


if($_POST){

    $title=$_POST["title"];
    $content=$_POST["content"];
    $category_id =$_POST['category'];
  
    $data=array(
        "title"    =>$title,
        "slug"     =>slugger::slugify($title),
        "content"  =>keyword::cut($content),
        "category_id" =>(int)$category_id
    );
    $sql=("INSERT INTO articles SET 
                title   =:title,
                slug    =:slug,
                content =:content,
                category_id =:category_id ");
    $insert=$db->prepare($sql);
    $result=$insert->execute($data);
    if($result){
        echo "<p class='alert alert-success mt-3'>SUCCESSFUL</p>";
    }else{
        echo "<p class='alert alert-success mt-3'>FAILED</p>";
    }
}
?>

<?php include '../_layouts/footer.php' ?>