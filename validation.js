function validateForm() {
    var staffID = document.forms["loginForm"]["staffID"].value;
    var staffName = document.forms["loginForm"]["staffName"].value;
    var staffPassword = document.forms["loginForm"]["staffPassword"].value;

    if (staffID == "" || staffName == "" || staffPassword == "") {
        alert("All fields must be filled out");
        return false;
    }
}
