<?php
include '../_layouts/header.php';
require '../../config/database.php';
include '../../helpers/keyword.php';

?>


<h1 class="mt-4">Articles</h1>
<hr>

<a href="create.php" class="btn btn-info mb-3">Add Article</a>

<table class="table">
    <thead class="thead-dark">
        <th>#</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Content</th>
        <th>Category Name</th> <th></th>    
        <th>Category Slug</th> <th><th>
        <th>Process</th>
 </thead>
    <tbody>

        <?php
$sql=("SELECT
f.id,
f.title as 'title',
f.slug,
f.content,
f.article_date,
c.name as category,
c.slug as category_slug
FROM articles as f
left join categories as c
on c.id = f.category_id
");
$articles = $db->query($sql, PDO::FETCH_ASSOC);
foreach ($articles as $article) { ?>
             <tr>
                <td><?php echo $article["id"] ?></td>
                <td><?php echo $article["title"] ?></td>
                <td><?php echo $article["slug"] ?></td>
                <td><?php echo keyword::cut($article["content"])?></td>
                <td><?php echo $article["category"]?><td>
                <td><?php echo $article["category_slug"]?><td>
                <td><a href="edit.php?article=<?php echo $article["id"] ?>"
                class='btn btn-warning'> Edit </a> <td>
            </tr>
<?php } ?>
 </tbody>
</table>

<?php require '../_layouts/footer.php' ?>