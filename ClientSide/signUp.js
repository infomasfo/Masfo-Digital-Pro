document.addEventListener("DOMContentLoaded", function(e) {
    e.preventDefault();
    
document.getElementById("signUpForm").addEventListener("submit", function(e){
    e.preventDefault();
    if (!validateInput()) return;

    var submitBtn = document.getElementById("submitBtn");
    submitBtn.innerHTML = "<div class='d-flex align-item-center justify-content-center gap-2'><div class='spinner-border'></div>Processing...</div>";
    submitBtn.style.fontWeight = 'bold';
    submitBtn.style.backgroundColor = 'lightblue';
    submitBtn.disabled = true;

    var formData = new FormData(this);

    fetch("./ServerSide/signUp.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if(!response.ok){
            throw new Error("Network response was not ok");
        }
    return response.json();
    })
    .then(data => {
        if(data.success){
            Swal.fire({
                icon: "success",
                title: "Successful",
                text: data.message
        })
        }else{
            Swal.fire({
                icon: "error",
                title: "Failed",
                text: data.message
            })
        }
        submitBtn.innerHTML = 'Sign up';
        submitBtn.disabled = false;
    })
    .catch(error => {
    console.log("There was a problem with the response operation: ",error);
    })
})
})

function validateInput() {

    let fullname = document.getElementById("fullname").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirmPassword = document.getElementById("confirmPassword").value.trim();
    let errorElement = document.querySelector('.error');

    if (!fullname || !email || !password) {
        errorElement.innerText = "All fields are required!";
        return false;
    }

    // Validate email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorElement.innerText = "Invalid email format!";
        return false;
    }

    // Check password strength
    if (password.length < 6) {
        errorElement.innerText = "Password must be at least 6 characters!";
        return false;
    }

    if (password !== confirmPassword) {
        errorElement.innerText = "Password and Confirm Password must be the same!";
        return false;
    }

    errorElement.innerText = ""; // Clear error message
    return true;
}
