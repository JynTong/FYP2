function validateForm() {
    var bid = document.getElementById("billingID").value;
    var amount = document.getElementById("billingAmount").value;
    var method = document.getElementById("billingMethod").value;
    var reference = document.getElementById("billingReference").value;
    var pid = document.getElementById("patientID").value;

    if (bid == "" || amount == "" || method == "" || reference == "" || pid == "") {
        alert("All fields must be filled out");
        return false;
    }

    return true;
}

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('paymentForm');

    form.addEventListener('submit', function() {
        const dateCreatedField = document.getElementById('dateCreated');
        const currentDate = new Date().toISOString().split('T')[0];
        dateCreatedField.value = currentDate;
    });
});
