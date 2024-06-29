document.addEventListener("DOMContentLoaded", function() {
    fetch('view_patients.php')
        .then(response => response.json())
        .then(data => {
            let patientData = document.getElementById('patientData');
            data.forEach(patients => {
                let row = document.createElement('tr');

                let patientIDCell = document.createElement('td');
                patientIDCell.textContent = patients.patientID;
                row.appendChild(patientIDCell);

                let patientNameCell = document.createElement('td');
                patientNameCell.textContent = patients.patientName;
                row.appendChild(patientNameCell);

                let patientContactCell = document.createElement('td');
                patientContactCell.textContent = patients.patientContact;
                row.appendChild(patientContactCell);

                let patientGenderCell = document.createElement('td');
                patientGenderCell.textContent = patients.patientGender;
                row.appendChild(patientGenderCell);

                let patientAgeCell = document.createElement('td');
                patientAgeCell.textContent = patients.patientAge;
                row.appendChild(patientAgeCell);

                let patientAddressCell = document.createElement('td');
                patientAddressCell.textContent = patients.patientAddress;
                row.appendChild(patientAddressCell);

                patientData.appendChild(row);
            });
        });
});
