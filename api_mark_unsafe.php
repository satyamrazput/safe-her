<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$lat = $data['latitude'];
$lng = $data['longitude'];
$review = $data['review'];

$conn->query("INSERT INTO alerts (latitude, longitude, review)
VALUES ('$lat','$lng','$review')");

echo json_encode(["message"=>"Unsafe report submitted successfully"]);
?>