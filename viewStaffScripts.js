document.addEventListener("DOMContentLoaded", function() {
    fetch('view_staff.php')
        .then(response => response.json())
        .then(data => {
            let staffData = document.getElementById('staffData');
            data.forEach(staff => {
                let row = document.createElement('tr');

                let staffIDCell = document.createElement('td');
                staffIDCell.textContent = staff.staffID;
                row.appendChild(staffIDCell);

                let staffNameCell = document.createElement('td');
                staffNameCell.textContent = staff.staffName;
                row.appendChild(staffNameCell);

                let staffContactCell = document.createElement('td');
                staffContactCell.textContent = staff.staffContact;
                row.appendChild(staffContactCell);

                let staffGenderCell = document.createElement('td');
                staffGenderCell.textContent = staff.staffGender;
                row.appendChild(staffGenderCell);

                let staffAgeCell = document.createElement('td');
                staffAgeCell.textContent = staff.staffAge;
                row.appendChild(staffAgeCell);

                let staffAddressCell = document.createElement('td');
                staffAddressCell.textContent = staff.staffAddress;
                row.appendChild(staffAddressCell);

                let staffSalaryCell = document.createElement('td');
                staffSalaryCell.textContent = staff.staffSalary;
                row.appendChild(staffSalaryCell);

                staffData.appendChild(row);
            });
        });
});
