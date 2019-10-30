<?php
  $poiID = $_POST['poiID'];
  $review = $_POST['review'];



$conn = new PDO ("mysql:host=localhost;dbname=rlocke;", "rlocke", "Icae5je6");

$results = $conn->query("INSERT INTO poi_reviews
  (poi_id, review) VALUES ($poiID, '$review')");

  if ($results != false){
    header("HTTP/1.1 200 OK");
    echo "review submitted";
  }

  if($review == false) {
    header("HTTP/1.1 400 Bad Request");
    echo "Something went wrong, try again!";
  }
 ?>
