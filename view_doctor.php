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

$sql = "SELECT doctorID, doctorName, doctorContact, doctorGender, doctorAge, doctorAddress, doctorSalary FROM doctor";
$result = $conn->query($sql);

$doctors = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
}
$conn->close();

echo json_encode($doctors);
?>
