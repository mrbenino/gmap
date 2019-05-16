<?php
$data = $_POST['data'];
// print_r($data);
include('config.php');
if($data){
    $lat = $data['lat'];
    $lng = $data['lng'];
    $lab = $data['lab'];
    $info = $data['info'];

    $sql = "INSERT INTO `markers` (`lat`, `lng`, `lab`, `info`) 
    VALUES ('$lat', '$lng', '$lab', '$info')"; 

    $result = mysqli_query($conn, $sql);
    print_r($result);
  }