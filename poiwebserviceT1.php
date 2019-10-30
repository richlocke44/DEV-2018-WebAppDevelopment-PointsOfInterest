<?php
header("content-type: application/json");

$conn = new PDO ("mysql:host=localhost;dbname=rlocke;", "rlocke", "Icae5je6");
	$region = $_GET['region'];
  $poiID = $_GET['id'];

		$results = $conn->query("SELECT * FROM pointsofinterest WHERE region='$region'");
		$resultsAsAssocArray = $results->fetchAll(PDO::FETCH_ASSOC);
		
	 	echo json_encode($resultsAsAssocArray);
?>
