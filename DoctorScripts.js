function validateForm() {
    var id = document.getElementById("doctorID").value;
    var name = document.getElementById("doctorName").value;
    var password = document.getElementById("doctorPassword").value;
    var contact = document.getElementById("doctorContact").value;
    var gender = document.getElementById("doctorGender").value;
    var age = document.getElementById("doctorAge").value;
    var address = document.getElementById("doctorAddress").value;
    var salary = document.getElementById("doctorSalary").value;

    if (id == "" || name == "" || password == "" || contact == "" || gender == "" || age == "" || address == "" || salary == "") {
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
