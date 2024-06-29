function validateForm() {
    var aid = document.getElementById("appointmentID").value;
    var pname = document.getElementById("patientName").value;
    var date = document.getElementById("appointmentDate").value;
    var time = document.getElementById("appointmentTime").value;
    var reason = document.getElementById("appointmentReason").value;
    var did = document.getElementById("doctorName").value;

    if (aid == "" || pname == "" || date == "" || time == "" || reason == "" || did == "") {
        alert("All fields must be filled out");
        return false;
    }

    return true;
}

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('registerForm');

    form.addEventListener('submit', function() {
        const dateCreatedField = document.getElementById('dateCreated');
        const currentDate = new Date().toISOString().split('T')[0];
        dateCreatedField.value = currentDate;
    });
});