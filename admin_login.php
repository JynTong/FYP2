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
    if(isset($_POST['staffID']) && isset($_POST['staffName']) && isset($_POST['staffPassword'])) {
        $staffID = $_POST['staffID'];
        $staffName = $_POST['staffName'];
        $staffPassword = $_POST['staffPassword'];

        // SQL injection prevention
        $staffID = mysqli_real_escape_string($conn, $staffID);
        $staffName = mysqli_real_escape_string($conn, $staffName);
        $staffPassword = mysqli_real_escape_string($conn, $staffPassword);

        $sql = "SELECT * FROM administrator_login WHERE staffID='$staffID' AND staffName='$staffName' AND staffPassword='$staffPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            $_SESSION['staffID'] = $staffID;
            header("Location: admin_homepage.html");
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

