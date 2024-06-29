function validateForm() {
    var id = document.getElementById("staffID").value;
    var name = document.getElementById("staffName").value;
    var password = document.getElementById("staffPassword").value;
    var contact = document.getElementById("staffContact").value;
    var gender = document.getElementById("staffGender").value;
    var age = document.getElementById("staffAge").value;
    var address = document.getElementById("staffAddress").value;
    var salary = document.getElementById("staffSalary").value;

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