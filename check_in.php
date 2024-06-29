<?php
// Assuming database connection is established elsewhere
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve patient name from POST request
$patientName = $_POST['patientName'];

// Example SQL query to insert patient into virtual waiting room table
$sql = "INSERT INTO virtual_waiting_room (patientName, checkInTime) VALUES ('$patientName', NOW())";

if ($conn->query($sql) === TRUE) {
  $response = array('success' => true);
} else {
  $response = array('success' => false);
}

// Close connection
$conn->close();

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
