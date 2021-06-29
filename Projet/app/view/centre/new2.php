<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<?php
include $root . '/app/view/fragment/fragmentMenu.html';
?>
  <?php
  if ($results !== -1) {
      echo ("<div class='container mt-3'>");
      echo("<h3>Le nouveau centre " . $_GET['label'] . " a été ajouté </h3>");
      echo("<div class='card mt-3' style='width: 18rem;'>");
      echo("<ul class='list-group list-group-flush'>");
      echo("<li class='list-group-item'>Label = " . $_GET['label']  . "</li>");
      echo("<li class='list-group-item'>Adresse = " . $_GET['adresse'] . "</li>");
      echo("</ul>");
      echo ("</div>");
      echo ("</div>");
  } else {
      echo("<h3 class='mt-3'>Problème d'insertion du centre</h3>");
  }
  ?>


  <div class="container mt-3">
      <a href="router2.php?action=centreReadAll">
    <button type="button" class="btn btn-primary">
    Liste des centres
    </button>
    </a>
</div>

<div class="container mt-3">
  <h3>Localisation</h3>
  <?php
if($results !== -1){

    // get latitude, longitude and formatted address
    $data_arr = geocode($_GET['adresse']);

    // if able to geocode the address
    if($data_arr){

        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
    ?>

    <!-- google map will be shown here -->
    <div id="gmap_canvas">Loading map...</div>
    <div id='map-label'>Map shows approximate location.</div>

    <!-- JavaScript to show google map -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBgW6t8sdngKsNjJc3737bWL74AdWJ8ZSQ"></script>
    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>

    <?php

    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}
?>
</div>

<?php
// function to geocode address, it will return false if unable to geocode address
function geocode($address){

    // url encode the address
    $address = urlencode($address);

    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=YOUR_API_KEY";

    // get the json response
    $resp_json = file_get_contents($url);

    // decode the json
    $resp = json_decode($resp_json, true);

    // response status will be 'OK', if able to geocode given address
    if($resp['status']=='OK'){

        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";

        // verify if data is complete
        if($lati && $longi && $formatted_address){

            // put the data in the array
            $data_arr = array();

            array_push(
                $data_arr,
                    $lati,
                    $longi,
                    $formatted_address
                );

            return $data_arr;

        }else{
            return false;
        }

    }

    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}
?>

<?php
include $root . '/app/view/fragment/fragmentFooter.html';
?>
