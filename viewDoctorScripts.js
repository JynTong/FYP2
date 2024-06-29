document.addEventListener("DOMContentLoaded", function() {
    fetch('view_doctor.php')
        .then(response => response.json())
        .then(data => {
            let doctorData = document.getElementById('doctorData');
            data.forEach(doctors => {
                let row = document.createElement('tr');

                let doctorIDCell = document.createElement('td');
                doctorIDCell.textContent = doctors.doctorID;
                row.appendChild(doctorIDCell);

                let doctorNameCell = document.createElement('td');
                doctorNameCell.textContent = doctors.doctorName;
                row.appendChild(doctorNameCell);

                let doctorContactCell = document.createElement('td');
                doctorContactCell.textContent = doctors.doctorContact;
                row.appendChild(doctorContactCell);

                let doctorGenderCell = document.createElement('td');
                doctorGenderCell.textContent = doctors.doctorGender;
                row.appendChild(doctorGenderCell);

                let doctorAgeCell = document.createElement('td');
                doctorAgeCell.textContent = doctors.doctorAge;
                row.appendChild(doctorAgeCell);

                let doctorAddressCell = document.createElement('td');
                doctorAddressCell.textContent = doctors.doctorAddress;
                row.appendChild(doctorAddressCell);

                let doctorSalaryCell = document.createElement('td');
                doctorSalaryCell.textContent = doctors.doctorSalary;
                row.appendChild(doctorSalaryCell);

                doctorData.appendChild(row);
            });
        });
});
