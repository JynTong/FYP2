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

$sql = "SELECT staffID, staffName, staffContact, staffGender, staffAge, staffAddress, staffSalary FROM staff";
$result = $conn->query($sql);

$staff = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $staff[] = $row;
    }
}
$conn->close();

echo json_encode($staff);
?>
