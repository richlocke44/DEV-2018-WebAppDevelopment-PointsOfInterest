<?php
header("content-type: application/json");


	$region = $_GET["region"];
  $type = $_GET["type"];
  //$poi_id = $_GET['ID'];

		$conn = new PDO ("mysql:host=localhost;dbname=rlocke;", "rlocke", "Icae5je6");
		$results = $conn->query("SELECT * FROM pointsofinterest WHERE region='$region' AND type='$type'");
		$resultsAsAssocArray = $results->fetchAll(PDO::FETCH_ASSOC);

    $json = '$resultsAsAssocArray';
    $data = json_decode($json, true);
      for($i=0; $i<count($data); $i++)
			{
		      echo "ID: " . $data[$i]["ID"] . " " . "<br/>" .
		           "Name: " . $data[$i]["name"] . " " . "<br/>" .
		           "Type: " . $data[$i]["type"] . " " . "<br/>" .
		           "Country: " . $data[$i]["country"] . " " . "<br/>" .
		           "Region: " . $data[$i]["region"] . " " . "<br/>" .
		           "Longitude: " . $data[$i]["lon"] . " " . "<br/>" .
		           "Latitude: " . $data[$i]["lat"] . " " . "<br/>" .
		           "Description: " . $data[$i]["description"] . " " . "<br/>" .
		           "<a href='poireviewformT4.php?ID=$poi_id'>Add Review</a>" . "<br/>" . " ";
		  }
//echo ($data);
    //echo json_encode($resultsAsAssocArray);
		//"ID: " . $data[$i]["ID"] . " " . "<br/>" .
?>
