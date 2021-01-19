<?php
include "../_layouts/header.php";
require "../../config/database.php";
include '../../helpers/slugger.php';
?>

<h1 class="mt-4" style="color: #0c5460" ><strong>ADD CATEGORIES</strong></h1>


<div class="container col-md-12">
    <form method="post" action="create.php">
        <div class="form-group">
            <label style="color: #0c5460"><strong>Categories</strong></label>
            <input name="name" type="text" class="form-control" placeholder="Categories Name" required>
        </div>
            <button type="submit" class="btn btn-info">Add</button>

    </form>
</div>

<?php
if ($_POST) {

	$name = $_POST["name"];
	$data = array(
		"name" => $name,
		"slug" => slugger::slugify($name),
	);
	$sql = ("INSERT INTO categories SET
                name   =:name,
                slug    =:slug
                ");
	$insert = $db->prepare($sql);
	$result = $insert->execute($data);
	if ($result) {
		echo "<p class='alert alert-success mt-3'>SUCCESSFUL</p>";
	} else {
		echo "<p class='alert alert-success mt-3'>FAILED</p>";
	}
}
?>

<?php include "../_layouts/footer.php";?>

