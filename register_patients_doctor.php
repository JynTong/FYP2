<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$patientID = $_POST['patientID'];
$patientName = $_POST['patientName'];
$patientPassword = $_POST['patientPassword']; // Remember to hash the password before storing in the database
$patientContact = $_POST['patientContact'];
$patientGender = $_POST['patientGender'];
$patientAge = $_POST['patientAge'];
$patientAddress = $_POST['patientAddress'];
$dateCreated = $_POST['dateCreated'];

$sql_register = "INSERT INTO patient_registration (patientID, patientName, patientPassword, patientContact, patientGender, patientAge, patientAddress, dateCreated) VALUES ('$patientID', '$patientName', '$patientPassword', '$patientContact', '$patientGender', '$patientAge', '$patientAddress', '$dateCreated')";

if ($conn->query($sql_register) === TRUE) {
    echo "<script>
            alert('Patient registered successfully!');
            window.location.href = 'doctor_homepage.html';
        </script>";
} else {
    echo "Error: " . $sql_register . "<br>" . $conn->error;
}

$sql_login = "INSERT INTO patient_login (patientID, patientName, patientPassword) VALUES ('$patientID', '$patientName', '$patientPassword')";
if ($conn->query($sql_login) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql_login . "<br>" . $conn->error;
}

$conn->close();
?>
