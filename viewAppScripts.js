document.addEventListener("DOMContentLoaded", function() {
    fetch('view_appointment.php')
        .then(response => response.json())
        .then(data => {
            let appointmentData = document.getElementById('appointmentData');
            data.forEach(appointment => {
                let row = document.createElement('tr');

                let patientNameCell = document.createElement('td');
                patientNameCell.textContent = appointment.patientName;
                row.appendChild(patientNameCell);

                let appointmentDateCell = document.createElement('td');
                appointmentDateCell.textContent = appointment.appointmentDate;
                row.appendChild(appointmentDateCell);

                let appointmentTimeCell = document.createElement('td');
                appointmentTimeCell.textContent = appointment.appointmentTime;
                row.appendChild(appointmentTimeCell);

                let appointmentReasonCell = document.createElement('td');
                appointmentReasonCell.textContent = appointment.appointmentReason;
                row.appendChild(appointmentReasonCell);

                let doctorNameCell = document.createElement('td');
                doctorNameCell.textContent = appointment.doctorName;
                row.appendChild(doctorNameCell);

                appointmentData.appendChild(row);
            });
        });
});
