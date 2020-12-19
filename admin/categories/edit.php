<?php
require '../_layouts/header.php';
require '../../config/database.php';
?>


<?php

$id = (int) $_GET['category'];
$query = $db->query("SELECT * FROM categories WHERE id = '{$id}'")
    ->fetch(PDO::FETCH_ASSOC);
if (!$query) {
    echo "Sonuç Yok";
    die();
}

?>

<form action="update.php" method="POST" class="form-group">
    <label for="name">Name</label>
    <input value="<?php echo $query['name'] ?> " name="name" class="form-control">
   
    <input type="hidden" name="id" value="<?php echo $query['id'] ?>">
    <br>
    <button type="submit" class="btn btn-success"> Update</button>
</form>

<?php
require  '../_layouts/footer.php';
?>