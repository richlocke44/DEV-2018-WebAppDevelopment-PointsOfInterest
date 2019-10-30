<?php
header("content-type: application/json");

$conn = new PDO ("mysql:host=localhost;dbname=rlocke;", "rlocke", "Icae5je6");
  $type = $_GET['type'];
  $poiID = $_GET['id'];

		$results = $conn->query("SELECT * FROM pointsofinterest WHERE type='$type'");
		$resultsAsAssocArray = $results->fetchAll(PDO::FETCH_ASSOC);

	 	echo json_encode($resultsAsAssocArray);
?>
