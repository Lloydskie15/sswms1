<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <?php include './url.php'; ?>

    <?php include './layouts/head.php'; ?>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
body {
    background: none; /* No background */
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.register-form {
    max-width: 500px;
    width: 100%;
    padding: 20px;
    background-color: transparent; /* No background */
    border-radius: 10px;
    box-shadow: none; /* Remove shadow */
}

.register-form h1 {
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 20px;
}

.register-form .form-control {
    height: 45px;
    font-size: 16px;
    padding-left: 10px;
    border-radius: 5px;
    border: 1px solid #ced4da; /* Optional border for input fields */
}

.register-form button {
    height: 45px;
    font-size: 16px;
    border-radius: 5px;
    border: none; /* No border for button */
    background-color: #007bff; /* Button color */
    color: white;
}

.register-form img {
    max-width: 100%;
    border-radius: 10px;
}

.register-form a {
    color: #007bff;
    text-decoration: none;
}

.container-fluid {
    display: flex; /* Enable Flexbox */
    justify-content: center; /* Center items horizontally */
    align-items: center; /* Center items vertically */
    height: 100vh; /* Full viewport height */
    padding: 0;
    margin: 0;
    background-color: transparent; /* No background */
}

@media (max-width: 768px) {
    .register-form {
        padding: 15px;
        box-shadow: none;
    }
}

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
                <img src="./assets/img/oo.png" alt="Illustration">
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="register-form text-center">
                    <h1 class="mb-4">Create an Account</h1>
                    <div id="alertMessage" class="alert alert-danger d-none" role="alert"></div>
                    <form class="row g-3 needs-validation" id="registerForm" novalidate>
                        <div class="col-12">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name">
                            <div class="invalid-feedback">Please enter your first name.</div>
                        </div>
                        <div class="col-12">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name">
                            <div class="invalid-feedback">Please enter your last name.</div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <div class="col-12">
                            <label for="Address" class="form-label">Address</label>
                            <input type="email" name="email" class="form-control" id="text_address">
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <div class="col-12">
                            <label for="txt_register_phone" class="form-label">Phone</label>
                            <input type="number" name="txt_register_phone" class="form-control" id="txt_register_phone">
                            <div class="invalid-feedback">Please enter a valid number.</div>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                        <div class="col-12">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                            <div class="invalid-feedback">Please confirm your password!</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-4">Register</button>
                        <p>Already have an account? <a href="login.php" class="text-decoration-none">Login Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/jquery/jquery.min.js"></script>
    <script>
$(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
        event.preventDefault(); 

        // Correct field IDs
        const username = $('#first_name').val();
        const lastname = $('#last_name').val();
        const email = $('#email').val();
        const address = $('#text_address').val();
        const number = $('#txt_register_phone').val();
        const password = $('#password').val();
        const confirmPassword = $('#confirm_password').val();

        // Basic validation
        if (!username || !lastname || !email || !password || !confirmPassword) {
            $("#span_error").removeClass('d-none').text("All fields are required.");
            return;
        }

        // Check if passwords match
        if (password !== confirmPassword) {
            $("#span_error").removeClass('d-none').text("Passwords do not match.");
            return;
        } else {
            $("#span_error").addClass('d-none');
        }

        // Collect form data
        const formData = {
            user_fname: username,
            user_lname: lastname,
            user_email: email,
            user_number: number,
            user_address: address,
            user_password: password,
        };

        // AJAX request
        $.ajax({
            url: `<?php echo $url;?>/auth-file/create-user.php`,
            type: 'POST',
        data: JSON.stringify(formData),
        contentType: 'application/json',
        dataType: 'json',
            success: function(response) {
                const status = response.status;
                const message = response.message;

                if (status === 1) {
                    alert(message);
                    window.location.href = 'login.php'; // Redirect to login page
                } else {
                    $("#span_error").removeClass('').text(message);
                    $("#first_name, #last_name, #email, #address, #number, #password, #confirm_password").addClass('border border-danger');
                }
            },
            error: function(xhr, status, error) {
                alert("An error occurred: " + error);
            }
        });
    });
});
</script>
</body>
</html>
