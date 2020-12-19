<?php
include '../_layouts/header.php';
require '../../config/database.php';
include '../../helpers/slugger.php';
?>


<h1 class="mt-4">Categories</h1>
<hr>
<a href="create.php" class="btn btn-info mb-3">Add Categories</a> <!-- ask hamdi how can ı add an icon?-->
<table class="table">
    <thead class="thead-dark">

        <th>#</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Process</th>
    </thead>
    <tbody>
        <?php
    $categories=$db->query("SELECT * FROM categories",PDO::FETCH_ASSOC);
    foreach ($categories as $category){?>
        <tr>
            <td><?php echo $category["id"];?></td>
            <td><?php echo $category["name"];?></td>
            <td><?php echo $category["slug"];?></td>
            <td><a href="edit.php?category=<?php echo $category["id"] ?>" class="btn btn-warning">Edit</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../_layouts/footer.php' ?>