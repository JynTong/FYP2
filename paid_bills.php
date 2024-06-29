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

$sql = "SELECT * FROM billing";
$result = $conn->query($sql);

$payment = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $payment[] = $row;
    }
}
$conn->close();

echo json_encode($payment);
?>
