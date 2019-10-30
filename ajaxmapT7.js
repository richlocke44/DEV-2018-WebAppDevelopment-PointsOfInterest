var map;
function init() {

  map = L.map ("map1");

   var attrib="Map data copyright OpenStreetMap contributors, Open Database Licence";

   L.tileLayer
       ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
           { attribution: attrib } ).addTo(map);

   // default set view
   map.setView([50.9097,-1.4044], 12);



    if(navigator.geolocation)
   {
       navigator.geolocation.watchPosition (processPosition, handleError,
                   {enableHighAccuracy:true, maximumAge: 5000 }
                                       );
   }
   else
   {
       alert("Sorry, geolocation not supported in this browser");
   }

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
          var pos = [curRegion.lon,curRegion.lat];



            L.marker(pos).addTo(map);
		        var marker = L.marker(pos).addTo(map);
		        marker.bindPopup(`"ID: ${curRegion.ID}<br/>
            Name: ${curRegion.name}<br/>
            Type: ${curRegion.type}<br/>
            Country: ${curRegion.country}<br/>
            Region: ${curRegion.region}<br/>
            Longitude: ${curRegion.lon}<br/>
            Latitude: ${curRegion.lat}<br/>
            Description: ${curRegion.description} <br/>"`);

            map.setView(pos, 2);

					document.getElementById('results').innerHTML = output;
				});

			ajaxConnection.open("GET" , `https://edward2.solent.ac.uk/~rlocke/Assignment/poiwebserviceT1.php?region=${r}`);

			ajaxConnection.send();
}
