<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<h1>New Point Of Interest</h1>

<div id="newpoiform">
  <?php
  $conn = new PDO ("mysql:host=localhost;dbname=rlocke;", "rlocke", "Icae5je6");

    echo "<form class='form2' action='addnewpoiwebserviceT3.php' method='post'>";
    echo "<label for='name'>Enter the name:</label><br/>";
    echo "<input id='name' type='text' name='name' value='". $row["name"] . "'><br/>";
    echo "<label for='type'>Enter a type of point:</label><br/>";
    echo "<input id='type' type='text' name='type' value='". $row["type"] . "'><br/>";
    echo "<label for='country'>Enter the country:</label><br/>";
    echo "<input id='country' type='text' name='country' value='". $row["country"] . "'><br/>";
    echo "<label for='region'>Enter the region:</label><br/>";
    echo "<input id='region' type='text' name='region' value='". $row["region"] . "'><br/>";
    echo "<label for='lon'>Enter the longitude:</label><br/>";
    echo "<input id='lon' type='number' name='lon' value='". $row["lon"] . "'><br/>";
    echo "<label for='lat'>Enter the latitude:</label><br/>";
    echo "<input id='lat' type='number' name='lat' value='". $row["lat"] . "'><br/>";
    echo "<label for='description'>Enter a description:</label><br/>";
    echo "<input id='description' type='text' name='description' value='". $row["description"] . "'><br/>";
    echo "<input type='submit' name='submit' value='submit'><br/>";
    echo "</form>";
  ?>
</div>
</body>
</html>
