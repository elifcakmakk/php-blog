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
    <button type="submit" class="btn btn-success" > Update</button>
</form>

<?php
require  '../_layouts/footer.php';
?>