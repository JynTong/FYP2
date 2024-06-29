<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$staffID = $_POST['staffID'];
$staffName = $_POST['staffName'];
$staffPassword = $_POST['staffPassword']; // Remember to hash the password before storing in the database
$staffContact = $_POST['staffContact'];
$staffGender = $_POST['staffGender'];
$staffAge = $_POST['staffAge'];
$staffAddress = $_POST['staffAddress'];
$staffSalary = $_POST['staffSalary'];
$dateCreated = $_POST['dateCreated'];

$sql_register = "INSERT INTO staff (staffID, staffName, staffPassword, staffContact, staffGender, staffAge, staffAddress, staffSalary, dateCreated) VALUES ('$staffID', '$staffName', '$staffPassword', '$staffContact', '$staffGender', '$staffAge', '$staffAddress', '$staffSalary', '$dateCreated')";

if ($conn->query($sql_register) === TRUE) {
    echo "<script>
            alert('Staff Registered successfully!');
            window.location.href = 'admin_homepage.html';
        </script>";
} else {
    echo "Error: " . $sql_register . "<br>" . $conn->error;
}

$sql_login = "INSERT INTO administrator_login (staffID, staffName, staffPassword) VALUES ('$staffID', '$staffName', '$staffPassword')";
if ($conn->query($sql_login) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql_login . "<br>" . $conn->error;
}

$conn->close();
?>
