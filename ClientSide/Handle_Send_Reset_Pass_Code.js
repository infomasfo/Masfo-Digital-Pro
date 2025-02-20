document.getElementById("forgotForm").addEventListener("submit", function(e) {
    e.preventDefault();

    if (!validateInput()) return;

    var submitBtn = document.getElementById("submitBtn");
    submitBtn.innerHTML = "<div class='d-flex align-item-center justify-content-center gap-2'><div class='spinner-border'></div>Requesting...</div>";
    submitBtn.style.fontWeight = 'bold';
    submitBtn.style.backgroundColor = 'lightblue';
    submitBtn.disabled = true;

    var formData = new FormData(this);

    fetch("./ServerSide/Send_Reset_Pass_Code.php", {
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
        if(data.status === true){
            Swal.fire({
                icon: "success",
                title: data.title,
                text: data.message
            })
    }else{
        Swal.fire({
            icon: "error",
            title: data.title,
            text: data.message
        })
    }
        submitBtn.innerHTML = 'SEND OTP';
        submitBtn.disabled = false;
    }).catch(error => {
        console.log(error);
    })
})

function validateInput() {
    let email = document.getElementById("email").value.trim();
    let errorElement = document.querySelector('.error');

    if (!email) {
        errorElement.innerText = "Email field is required!";
        return false;
    }

    // Validate email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorElement.innerText = "Invalid email format!";
        return false;
    }

    errorElement.innerText = ""; // Clear error message
    return true;
}
