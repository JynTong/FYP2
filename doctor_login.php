<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    if(isset($_POST['doctorID']) && isset($_POST['doctorName']) && isset($_POST['doctorPassword'])) {
        $doctorID = $_POST['doctorID'];
        $doctorName = $_POST['doctorName'];
        $doctorPassword = $_POST['doctorPassword'];

        // SQL injection prevention
        $doctorID = mysqli_real_escape_string($conn, $doctorID);
        $doctorName = mysqli_real_escape_string($conn, $doctorName);
        $doctorPassword = mysqli_real_escape_string($conn, $doctorPassword);

        $sql = "SELECT * FROM doctor_login WHERE doctorID='$doctorID' AND doctorName='$doctorName' AND doctorPassword='$doctorPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            $_SESSION['doctorID'] = $doctorID;
            header("Location: doctor_homepage.html");
            exit(); // Exit to prevent further execution
        } else {
            // Login failed
            echo "Invalid credentials";
        }
    } else {
        echo "All fields are required.";
    }
}

$conn->close();
?>