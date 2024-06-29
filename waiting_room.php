<?php
// Assuming database connection is established elsewhere
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

// Example SQL query to fetch all patients in the virtual waiting room
$sql = "SELECT vrID, patientName, checkInTime FROM virtual_waiting_room ORDER BY checkInTime ASC";
$result = $conn->query($sql);

$buttonText = "Home";
$hrefLocation = "patient_homepage.html";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Waiting Room - Status</title>
  <link rel="stylesheet" href="virtual.css">
</head>
<body>
  <div class="container">
    <h1>Virtual Waiting Room - Status</h1>
    <div id="waitingRoomStatus">
      <h2>Current Waiting Room Status</h2>
      <?php
      if ($result->num_rows > 0) {
        echo '<ul>';
        while($row = $result->fetch_assoc()) {
          echo '<li>' . $row['patientName'] . ' (' . $row['checkInTime'] . ')</li>';
        }
        echo '</ul>';
        // Echoing a div with a class and a link inside it
        echo '<div class="button-container">';
        echo '<a href="' . $hrefLocation . '" class="btn">' . $buttonText . '</a>';
        echo '</div>';
      } else {
        echo '<p>No patients currently in the waiting room.</p>';
      }
      ?>
    </div>
  </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
