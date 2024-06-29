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

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=reports.csv');

$output = fopen('php://output', 'w');
if ($reportType == 'patient_registration') {
    fputcsv($output, array('Patient ID', 'Name', 'Contact', 'Gender', 'Age', 'Address', 'Date Created'));
}
else if ($reportType == 'appointment') {
    fputcsv($output, array('Patient Name', 'Date', 'Time', 'Reason For Appointment', 'Doctor Name', 'Date Created'));
}
else if ($reportType == 'staff') {
    fputcsv($output, array('Staff ID', 'Name', 'Contact', 'Gender', 'Age', 'Address', 'Salary', 'Date Created'));
}
else if ($reportType == 'doctor') {
    fputcsv($output, array('Doctor ID', 'Name', 'Contact', 'Gender', 'Age', 'Address', 'Salary', 'Date Created'));
}
else if ($reportType == 'billing') {
    fputcsv($output, array('Invoice Number', 'Amount', 'Payment Method', 'Reference', 'Patient ID', 'Date Created'));
}
else if ($reportType == 'ehr') {
    fputcsv($output, array('EHR ID', 'Patient Name', 'History', 'Diagnosis', 'Medication', 'Treatment', 'Test Results', 'Date Created'));
}

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$stmt->close();
$conn->close();
?>
