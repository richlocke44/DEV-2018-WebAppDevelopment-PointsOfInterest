var map;
function geo()
{
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition (processPosition, handleError);
    }
    else
    {
        alert("Sorry, geolocation not supported in this browser");
    }
}
function processPosition(gpspos)
{
		var info = 'Lat: ' + gpspos.coords.latitude + ' lon: ' + gpspos.coords.longitude;
		console.log(info); // show on the console
}

function handleError(err)
{
		alert('An error occurred: ' + err.code);
}
		function init()
		{
      map = L.map ("map");

    var attrib="Map data copyright OpenStreetMap contributors, Open Database Licence";

        L.tileLayer
        ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            { attribution: attrib } ).addTo(map);

            

      var r = document.getElementById('region').value;

      var ajaxConnection = new XMLHttpRequest();

		    ajaxConnection.addEventListener ("load",  e =>
                {
                    var output = "";

                    if(e.target.status==400){
                    	output = output + 'Invalid input. Please try again!';
                    }
                    else if(e.target.status==404){
                    	output = output + 'No region matching input. Try another region!';
                    }
                    else if(e.target.status==200){
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

			        		var pos = [curRegion.lon,curRegion.lat];

                  L.marker(pos).addTo(map)
	                .bindPopup(`ID: ${curRegion.ID}<br/>
                  Name: ${curRegion.name}<br/>
                  Type: ${curRegion.type}<br/>
                  Country: ${curRegion.country}<br/>
                  Region: ${curRegion.region}<br/>
                  Longitude: ${curRegion.lon}<br/>
                  Latitude: ${curRegion.lat}<br/>
                  Description: ${curRegion.description} <br/>`);
	                map.setView(pos, 2);
	                    }

                    else{
	                    output = output + 'Something went wrong, please try again!';
                	}
                })
                    document.getElementById('results').innerHTML = output;



		    ajaxConnection.open("GET" , `https://edward2.solent.ac.uk/~rlocke/Assignment/poiwebserviceT1.php?region=${r}`);

		    ajaxConnection.send();
		}
