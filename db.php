<?php
$conn = new mysqli("localhost", "root", "", "safeher");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>