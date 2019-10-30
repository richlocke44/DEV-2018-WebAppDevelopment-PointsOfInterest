// JavaScript file, ajaxjsT5.js
function init() {

	document.getElementById("searchbtn").addEventListener("click", sendAjax);
}

function sendAjax() {

        var r = document.getElementById('region').value;

       	var ajaxConnection = new XMLHttpRequest();

		        ajaxConnection.addEventListener ("load",e =>
            {
                 var output = "";
                 var allRegions = JSON.parse(e.target.responseText);

				         allRegions.forEach( curRegion =>
								  {
        					output = output +
        						`ID: ${curRegion.ID}<br/>
        						Name: ${curRegion.name}<br/>
        						Type: ${curRegion.type}<br/>
        						Country: ${curRegion.country}<br/>
        						Region: ${curRegion.region}<br/>
        						Longitude: ${curRegion.lon}<br/>
        						Latitude: ${curRegion.lat}<br/>
                    Description: ${curRegion.description} <br/>`;
          });


					document.getElementById('results').innerHTML = output;
				});

			ajaxConnection.open("GET" , `https://edward2.solent.ac.uk/~rlocke/Assignment/poiwebserviceT1.php?region=${r}`);

			ajaxConnection.send();
}
