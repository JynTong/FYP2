<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$appointmentID = $_POST['appointmentID'];
$patientName = $_POST['patientName'];
$appointmentDate = $_POST['appointmentDate'];
$appointmentTime = $_POST['appointmentTime'];
$appointmentReason = $_POST['appointmentReason'];
$doctorName = $_POST['doctorName'];
$dateCreated = $_POST['dateCreated'];

$sql = "INSERT INTO appointment (appointmentID, patientName, appointmentDate, appointmentTime, appointmentReason, doctorName, dateCreated) VALUES ('$appointmentID', '$patientName', '$appointmentDate', '$appointmentTime', '$appointmentReason', '$doctorName', '$dateCreated')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Booking Successful!');
            window.location.href = 'patient_homepage.html';
        </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
