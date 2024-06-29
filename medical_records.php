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

$sql = "SELECT patientHistory, patientDiagnosis, patientMedication, patientTreatment, patientTestResults FROM ehr";
$result = $conn->query($sql);

$medical = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $medical[] = $row;
    }
}
$conn->close();

echo json_encode($medical);
?>
