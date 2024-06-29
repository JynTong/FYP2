<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$doctorID = $_POST['doctorID'];
$doctorName = $_POST['doctorName'];
$doctorPassword = $_POST['doctorPassword']; // Remember to hash the password before storing in the database
$doctorContact = $_POST['doctorContact'];
$doctorGender = $_POST['doctorGender'];
$doctorAge = $_POST['doctorAge'];
$doctorAddress = $_POST['doctorAddress'];
$doctorSalary = $_POST['doctorSalary'];
$dateCreated = $_POST['dateCreated'];

$sql_register = "INSERT INTO doctor (doctorID, doctorName, doctorPassword, doctorContact, doctorGender, doctorAge, doctorAddress, doctorSalary, dateCreated) VALUES ('$doctorID', '$doctorName', '$doctorPassword', '$doctorContact', '$doctorGender', '$doctorAge', '$doctorAddress', '$doctorSalary', '$dateCreated')";

if ($conn->query($sql_register) === TRUE) {
    echo "<script>
            alert('Doctor Registered successfully!');
            window.location.href = 'admin_homepage.html';
        </script>";
} else {
    echo "Error: " . $sql_register . "<br>" . $conn->error;
}

$sql_login = "INSERT INTO doctor_login (doctorID, doctorName, doctorPassword) VALUES ('$doctorID', '$doctorName', '$doctorPassword')";
if ($conn->query($sql_login) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql_login . "<br>" . $conn->error;
}

$conn->close();
?>
