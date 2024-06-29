<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$billingID = $_POST['billingID'];
$billingAmount = $_POST['billingAmount'];
$billingMethod = $_POST['billingMethod']; // Remember to hash the password before storing in the database
$billingReference = $_POST['billingReference'];
$patientID = $_POST['patientID'];
$dateCreated = $_POST['dateCreated'];

$sql = "INSERT INTO billing (billingID, billingAmount, billingMethod, billingReference, patientID, dateCreated) VALUES ('$billingID', '$billingAmount', '$billingMethod', '$billingReference', '$patientID', '$dateCreated')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
