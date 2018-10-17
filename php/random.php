
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>My Google Map</title>
   <style>
   #map{
       height : 400px;
       width:100%
   }
</style>
</head>
<body>
   <h1>My Google Map</h1>
   <div id="map"> </div>
   <script>
       function initMap(){
           var options = {
               zoom:8,
               center:{lat:42.3061,lng : -71.0589}

       }
           var map = new google.maps.Map(document.getElementById('map'),options);
           /*
           var marker = new google.maps.Marker({
               position:{lat:42.3061,lng:-71.0589},
               map:map,
               icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'

           });

           var infoWindow = new google.maps.InfoWindow({
               content : '<h1> Lynn MA </h1>'
           });

           marker.addListener('click',function(){
               infoWindow.open(map,marker);
           });

              */
              //Add marker function
               addMarker({lat:42.3061,lng:-71.0589});
              function addMarker(coords){
                  var marker =  new google.maps.Marker({
                      position:coords,
                      map:map,
                      icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
                  });
              }

       }
   </script>

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSTXRBqsavLIweLaoHBJmHjm1sBdkC2oY&callback=initMap" /*use you own api key */
   async defer></script>
</body>
</html>



