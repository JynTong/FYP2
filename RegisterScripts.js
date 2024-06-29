function validateForm() {
    var id = document.getElementById("patientID").value;
    var name = document.getElementById("patientName").value;
    var password = document.getElementById("patientPassword").value;
    var contact = document.getElementById("patientContact").value;
    var gender = document.getElementById("patientGender").value;
    var age = document.getElementById("patientAge").value;
    var address = document.getElementById("patientAddress").value;

    if (id == "" || name == "" || password == "" || contact == "" || gender == "" || age == "" || address == "") {
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

