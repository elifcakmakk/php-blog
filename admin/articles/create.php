<?php include '../_layouts/header.php';
    require '../../config/database.php';
    include '../../helpers/slugger.php';
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
            <textarea name="content" type="text" class="form-control" >
            </textarea>

        </div>


        <button type="submit" class="btn btn-info">Add</button>
    </form>
</div>

<?php
if($_POST){

    $title=$_POST["title"];
    $content=$_POST["content"];
  
    $data=array(
        "title"    =>$title,
        "slug"     =>slugger::slugify($title),
        "content"  =>$content
    );
    $sql=("INSERT INTO articles SET 
                title   =:title,
                slug    =:slug,
                content =:content");
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