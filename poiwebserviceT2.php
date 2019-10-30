<?php
header("content-type: application/json");


	$region = $_GET['region'];
  $type = $_GET['type'];
  $poi_id = $_GET['ID'];

    $conn = new PDO ("mysql:host=localhost;dbname=rlocke;", "rlocke", "Icae5je6");

		$results = $conn->query("SELECT * FROM pointsofinterest WHERE region='$region' AND  type='$type'");
		$resultsAsAssocArray = $results->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultsAsAssocArray);
?>
