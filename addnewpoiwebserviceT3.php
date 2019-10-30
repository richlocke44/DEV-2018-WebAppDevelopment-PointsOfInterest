<?php
header("content-type: application/json");

    $ID = $_POST['ID'];
    $n = $_POST['name'];
    $t = $_POST['type'];
    $c = $_POST['country'];
    $r = $_POST['region'];
    $lo = $_POST['lon'];
    $la = $_POST['lat'];
  	$d = $_POST['description'];

    $conn = new PDO ("mysql:host=localhost;dbname=rlocke;", "rlocke", "Icae5je6");
		$results = $conn->query("INSERT INTO pointsofinterest
      (name, type, country, region, lon, lat, description) VALUES ('$n', '$t', '$c', '$r', $lo, $la, '$d')");

    if ($results != false){
      header("HTTP/1.1 200 OK");
      echo "Point of interest added";
    }

    if($results == false) {
      header("HTTP/1.1 400 Bad Request");
      echo "Something went wrong, try agian!";
    }



    //echo "SQL:INSERT INTO pointsofinterest (name, type, country, region, lon, lat, description)
    //VALUES ('$n', '$t', '$c', '$r', $lo, $la, '$d')";
    //echo json_encode($results);
		/*$resultsAsAssocArray = $results->fetchAll(PDO::FETCH_ASSOC);
    if ($results != false){
      header("HTTP/1.1 200 OK");
    }
    if($results == false) {
      header("HTTP/1.1 400 Bad Request");
    }

//echo json_encode($results);*/
?>
