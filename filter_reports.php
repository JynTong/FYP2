<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];
$reportType = $_GET['reportType'];

if ($reportType == 'patient_registration') {
    $sql = "SELECT patientID, patientName, patientContact, patientGender, patientAge, patientAddress, dateCreated
            FROM patient_registration WHERE dateCreated BETWEEN ? AND ?";
}
else if ($reportType == 'appointment') {
    $sql = "SELECT patientName, appointmentDate, appointmentTime, appointmentReason, doctorName, dateCreated
            FROM appointment WHERE dateCreated BETWEEN ? AND ?";
}
else if ($reportType == 'staff') {
    $sql = "SELECT staffID, staffName, staffContact, staffGender, staffAge, staffAddress, staffSalary, dateCreated
            FROM staff WHERE dateCreated BETWEEN ? AND ?";
}
else if ($reportType == 'doctor') {
    $sql = "SELECT doctorID, doctorName, doctorContact, doctorGender, doctorAge, doctorAddress, doctorSalary, dateCreated
            FROM doctor WHERE dateCreated BETWEEN ? AND ?";
}
else if ($reportType == 'billing') {
    $sql = "SELECT billingID, billingAmount, billingMethod, billingReference, patientID, dateCreated
            FROM billing WHERE dateCreated BETWEEN ? AND ?";
}
else if ($reportType == 'ehr') {
    $sql = "SELECT ehrID, patientName, patientHistory, patientDiagnosis, patientMedication, patientTreatment, patientTestResults, dateCreated
            FROM ehr WHERE dateCreated BETWEEN ? AND ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $startDate, $endDate);
$stmt->execute();
$result = $stmt->get_result();

if ($reportType == 'patient_registration') {
    echo "<table border='1'>
    <tr>
    <th>Patient ID</th>
    <th>Name</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Address</th>
    <th>Date Created</th>
    </tr>";
}
else if ($reportType == 'appointment') {
    echo "<table border='1'>
    <tr>
    <th>Patient Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Reason For Appointment</th>
    <th>Doctor Name</th>
    <th>Date Created</th>
    </tr>";
}
else if ($reportType == 'staff') {
    echo "<table border='1'>
    <tr>
    <th>Staff ID</th>
    <th>Name</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Address</th>
    <th>Salary</th>
    <th>Date Created</th>
    </tr>";
}
else if ($reportType == 'doctor') {
    echo "<table border='1'>
    <tr>
    <th>Doctor ID</th>
    <th>Name</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Address</th>
    <th>Salary</th>
    <th>Date Created</th>
    </tr>";
}
else if ($reportType == 'billing') {
    echo "<table border='1'>
    <tr>
    <th>Invoice Number</th>
    <th>Amount</th>
    <th>Payment Method</th>
    <th>Reference</th>
    <th>Patient ID</th>
    <th>Date Created</th>
    </tr>";
}
else if ($reportType == 'ehr') {
    echo "<table border='1'>
    <tr>
    <th>EHR ID</th>
    <th>Patient Name</th>
    <th>History</th>
    <th>Diagnosis</th>
    <th>Medication</th>
    <th>Treatment</th>
    <th>Test Results</th>
    <th>Date Created</th>
    </tr>";
}

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>$cell</td>";
    }
    echo "</tr>";
}

echo "</table>";

$stmt->close();
$conn->close();
?>
