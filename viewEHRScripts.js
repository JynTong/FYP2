document.addEventListener("DOMContentLoaded", function() {
    fetch('view_ehr.php')
        .then(response => response.json())
        .then(data => {
            let ehrData = document.getElementById('ehrData');
            data.forEach(ehr => {
                let row = document.createElement('tr');

                let ehrIDCell = document.createElement('td');
                ehrIDCell.textContent = ehr.ehrID;
                row.appendChild(ehrIDCell);

                let patientNameCell = document.createElement('td');
                patientNameCell.textContent = ehr.patientName;
                row.appendChild(patientNameCell);

                let patientHistoryCell = document.createElement('td');
                patientHistoryCell.textContent = ehr.patientHistory;
                row.appendChild(patientHistoryCell);

                let patientDiagnosisCell = document.createElement('td');
                patientDiagnosisCell.textContent = ehr.patientDiagnosis;
                row.appendChild(patientDiagnosisCell);

                let patientMedicationCell = document.createElement('td');
                patientMedicationCell.textContent = ehr.patientMedication;
                row.appendChild(patientMedicationCell);

                let patientTreatmentCell = document.createElement('td');
                patientTreatmentCell.textContent = ehr.patientTreatment;
                row.appendChild(patientTreatmentCell);

                let patientTestResultsCell = document.createElement('td');
                patientTestResultsCell.textContent = ehr.patientTestResults;
                row.appendChild(patientTestResultsCell);

                ehrData.appendChild(row);
            });
        });
});
