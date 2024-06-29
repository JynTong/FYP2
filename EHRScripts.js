function validateForm() {
    var id = document.getElementById("ehrID").value;
    var name = document.getElementById("patientName").value;
    var history = document.getElementById("patientHistory").value;
    var diagnosis = document.getElementById("patientDiagnosis").value;
    var medication = document.getElementById("patientMedication").value;
    var treatment = document.getElementById("patientTreatment").value;
    var results = document.getElementById("patientTestResults").value;

    if (id == "" || name == "" || history == "" || diagnosis == "" || medication == "" || treatment == "" || results == "") {
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