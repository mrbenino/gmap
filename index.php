<?php 
  
  include('config.php');
  
  $result = mysqli_query($conn, "SELECT * FROM markers");
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $locations[] = $row;
    }
  }
  $locations = json_encode($locations);
  $rand = rand(0,999);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        locations = <?=$locations?>;
        console.log(locations);
        for (let i = 0; i < locations.length; i++) {
            locations[i].lat = Number(locations[i].lat);
            locations[i].lng = Number(locations[i].lng);
        }
    </script>
</head>
<body>

    <h1>oops!</h1>

    <form>
      <input type="text" name="lat" placeholder="lat">
      <input type="text" name="lng" placeholder="lng">
      <input type="text" name="lab" placeholder="lab">
      <input type="text" name="info" placeholder="info">
      <input type="submit" name="save" value="push data">
    </form>
    <div id="res"></div>

    <div id="map"></div>
    <script src="gmamm.js?ver=<?=$rand?>"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=APIKEY&callback=initMap"></script>
</body>
</html>