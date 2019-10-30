<?php
  $poiID = $_GET['ID'];

  echo "<form action='poireviewT4.php' method='post'>
        	<label>Review:</label>
        	<input type='text' name='review' id='review'/>
          <input type='submit' name='submit' value='Add'/>
			<input type='hidden' name='poiID' value='$poiID'/>"
 ?>
