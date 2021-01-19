<?php
require '../../config/cors.php';
require '../../config/database.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	// all article sql query
	$sql = ("SELECT
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
	where f.id = '{$id}'
	");

//all article sql query exec

	$articles = $db->query($sql, PDO::FETCH_ASSOC);

	$response = [];

	foreach ($articles as $article) {
		//response array push article
		array_push($response, $article);

	}

//array to json
	echo json_encode($response);
} else {
	$message = [['status' => 404, 'message' => 'id parameterisi göndermelisiniz']];
	echo json_encode($message);
}