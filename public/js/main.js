function saveData() {
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var gender = document.getElementById("Gender");
    var date = document.getElementById("birthday");
    var status = document.getElementById("status");
    var msg = document.getElementById("success");

    if (name.value !== '' && email.value !== '' && password.value !== '' && gender.value !== '' && date.value !== '' && status.value !== '') {
        // All fields are filled out, display success message
        msg.style.display = 'block';

        // Hide the message after 3 seconds
        setTimeout(function() {
            msg.style.display = 'none';
        }, 3000);
    } else {
        // At least one field is empty, hide success message
        msg.style.display = 'none';
    }

}