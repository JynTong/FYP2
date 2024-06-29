<?php
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

$sql = "SELECT * FROM ehr";
$result = $conn->query($sql);

$ehr = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ehr[] = $row;
    }
}
$conn->close();

echo json_encode($ehr);
?>
