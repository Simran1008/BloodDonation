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
echo "Connected successfully";
$result1 = mysqli_query($conn, "select * from donors");
while($rows=$result1->fetch_assoc()){
    $add=$rows['Location'];
    echo $add;
    $result = $geocoder->geocode($add);
    if ($result && $result['total_results'] > 0){
        echo 'success';
        $first = $result['results'][0];
        $lat = $first['geometry']['lng'] ; 
        $lng = $first['geometry']['lat'] ;
        echo $lat;
        echo $lng;
    }
}
?>