function validateForm() {
    // Get form values
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    if (name === "") {
        document.getElementById("pError").innerHTML = "Name is Required";        
        // return false;
    }
    // Validate email
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email === "") {
        document.getElementById("pError2").innerHTML = "Email is Required";
        // return false;
    } else if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        // return false;
    }
    // Validate password
    if (password === "") {
        document.getElementById("pError3").innerHTML = "Email is Required";

        return false;
    } else if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }
    return true;
}