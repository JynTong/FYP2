<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ehrID = $_POST['ehrID'];
$patientName = $_POST['patientName'];
$patientHistory = $_POST['patientHistory'];
$patientDiagnosis = $_POST['patientDiagnosis'];
$patientMedication = $_POST['patientMedication'];
$patientTreatment = $_POST['patientTreatment'];
$patientTestResults = $_POST['patientTestResults'];
$dateCreated = $_POST['dateCreated'];

$sql = "INSERT INTO ehr (ehrID, patientName, patientHistory, patientDiagnosis, patientMedication, patientTreatment, patientTestResults, dateCreated) VALUES ('$ehrID', '$patientName', '$patientHistory', '$patientDiagnosis', '$patientMedication', '$patientTreatment', '$patientTestResults', '$dateCreated')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('New record created successfully!');
            window.location.href = 'doctor_homepage.html';
        </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
