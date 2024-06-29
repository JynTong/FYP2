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
    if(isset($_POST['patientID']) && isset($_POST['patientName']) && isset($_POST['patientPassword'])) {
        $patientID = $_POST['patientID'];
        $patientName = $_POST['patientName'];
        $patientPassword = $_POST['patientPassword'];

        // SQL injection prevention
        $patientID = mysqli_real_escape_string($conn, $patientID);
        $patientName = mysqli_real_escape_string($conn, $patientName);
        $patientPassword = mysqli_real_escape_string($conn, $patientPassword);

        $sql = "SELECT * FROM patient_login WHERE patientID='$patientID' AND patientName='$patientName' AND patientPassword='$patientPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            $_SESSION['patientID'] = $patientID;
            header("Location: patient_homepage.html");
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

