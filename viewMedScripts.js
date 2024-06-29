document.addEventListener("DOMContentLoaded", function() {
    fetch('medical_records.php')
        .then(response => response.json())
        .then(data => {
            let medicalData = document.getElementById('medicalData');
            data.forEach(medical => {
                let row = document.createElement('tr');

                let patientHistoryCell = document.createElement('td');
                patientHistoryCell.textContent = medical.patientHistory;
                row.appendChild(patientHistoryCell);

                let patientDiagnosisCell = document.createElement('td');
                patientDiagnosisCell.textContent = medical.patientDiagnosis;
                row.appendChild(patientDiagnosisCell);

                let patientMedicationCell = document.createElement('td');
                patientMedicationCell.textContent = medical.patientMedication;
                row.appendChild(patientMedicationCell);

                let patientTreatmentCell = document.createElement('td');
                patientTreatmentCell.textContent = medical.patientTreatment;
                row.appendChild(patientTreatmentCell);

                let patientTestResultsCell = document.createElement('td');
                patientTestResultsCell.textContent = medical.patientTestResults;
                row.appendChild(patientTestResultsCell);

                medicalData.appendChild(row);
            });
        });
});
