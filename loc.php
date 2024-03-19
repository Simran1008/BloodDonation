<?php
include('C:\xampp\htdocs\blooddon\php-opencage-geocode-master/src/AbstractGeocoder.php');
include('C:\xampp\htdocs\blooddon\php-opencage-geocode-master/src/Geocoder.php');
use OpenCage\Geocoder;
$geocoder = new \OpenCage\Geocoder\Geocoder('763504b6a5ac4662808f488bab8dc58e');
session_start();
$conn = new mysqli("localhost", "root", "", "blooddonation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result1 = mysqli_query($conn, "select * from donors");
?>
<!DOCTYPE html> 
<html> 
<head> 
<title>Map</title> 
<meta charset="utf-8" /> 
<meta name="viewport"
	content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	crossorigin="" /> 
</head> 
<body> 
<h2 style="text-align: center;font-family=helvetica;">Global Heroes</h2>
<h3 style="text-align: center;font-family=helvetica;">Find a hero near you!</h3>
<div id="map" style="width: 1650px; height: 700px"></div> 
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
	integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
	crossorigin=""></script> 
<script> 
	const map = L.map('map') 
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {  
	maxZoom: 19, 
	attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' 
	}).addTo(map); 

	map.locate({setView: true, maxZoom: 16});
    <?php
        while($rows=$result1->fetch_assoc()){
            $add=$rows['Location'];
            $result = $geocoder->geocode($add);
            if ($result && $result['total_results'] > 0){
                $first = $result['results'][0];
                $lng = $first['geometry']['lng'] ; 
                $lat = $first['geometry']['lat'] ;
        ?>
 
	var m1= L.marker([<?php echo $lat ?>,<?php echo $lng ?>]).addTo(map); 
    <?php
        }
    }
    ?>
</script> 
</body> 
</html> 