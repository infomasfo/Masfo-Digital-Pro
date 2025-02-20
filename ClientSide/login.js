document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    if (!validateInput()) return;

    var submitBtn = document.getElementById("submitBtn");
    submitBtn.innerHTML = "Authenticating...</div>";
    submitBtn.style.fontWeight = 'bold';
    submitBtn.style.backgroundColor = 'lightblue';
    submitBtn.disabled = true;

    var formData = new FormData(this);

    fetch("./ServerSide/login.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if(!response.ok){
            throw new Error("response network was not okey");
        }
        return response.json();
    })
    .then(data => {
        if(data.status){
            Swal.fire({
                icon: "success",
                title: data.title,
                text: data.message
            })
            setTimeout(function(){
            window.location.href = './dashboard.php'
        }, 5000)
    }else{
        let error = data.message;
        let errorElement = document.querySelector('.error');
        errorElement.innerHTML = error;
        Swal.fire({
            icon: "error",
            title: data.title,
            text: data.message
        })
    }
        submitBtn.innerHTML = 'Login';
        submitBtn.disabled = false;
    }).catch(error => {
        console.log(error);
    })
})

function validateInput() {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let errorElement = document.querySelector('.error');

    if (!email || !password) {
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

    errorElement.innerText = ""; // Clear error message
    return true;
}
