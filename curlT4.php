<?php
$region = $_GET['region'];
$type = $_GET['type'];



$connection = curl_init();
curl_setopt($connection, CURLOPT_URL,
"https://edward2.solent.ac.uk/~rlocke/Assignment/poiwebserviceT2.php?region=$region&type=$type");
curl_setopt($connection,CURLOPT_RETURNTRANSFER,1);
curl_setopt($connection,CURLOPT_HEADER, 0);
$response = curl_exec($connection);
curl_close($connection);

/*$conn = new PDO ("mysql:host=localhost;dbname=rlocke;", "rlocke", "Icae5je6");
$results = $conn->query("SELECT * FROM pointsofinterest WHERE region='$region' AND type='$type'");
$resultsAsAssocArray = $results->fetchAll(PDO::FETCH_ASSOC);*/
$poi_id = $_GET['ID'];;
$json = $response;
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
           "<a href='poireviewformT4.php?ID=" . $data[$i]["ID"] . "'>Add Review</a>" . "<br/>" . " ";
  }
?>
