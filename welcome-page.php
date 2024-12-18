<!DOCTYPE html>
<html lang="en">
<?php include './assets/js/loginchecker.php'; ?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>welcome</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/favicon.png" rel="icon">
  <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Main Content -->
  <main>
    <div class="container">
      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        
        <h2>You Are Successfully Registered.</h2>
        <a class="btn btn-primary" href="index.php">Go to Dashboard</a>
        <img src="./assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
      </section>
    </div>
  </main>

  <!-- Back-to-Top Button -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>
  
  <script src="./assets/js/jquery/jquery.min.js"></script>   
  <!-- Template Main JS File -->
  <script src="./assets/js/main.js"></script>
</body>

</html>

<script>

const jwt = LoginChecker();
    console.log(jwt)
    if(jwt.status=="valid"){
        window.location.href = 'index.php';
    }
  
     $(document).ready(function() {
        // Prevent the form from submitting the traditional way

            // Collect form data
            const formData = {
                user_email: $('#txt_username').val(),
                user_password: $('#txt_password').val()
            };

            const urlParams = new URLSearchParams(window.location.search);

            // Get the value of the 'id' parameter
            const link = urlParams.get('link');

            $.ajax({
                url: `<?php echo $url;?>/auth-file/user_details.php?link=`+link,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    const data = response.message[0];
                    console.log(data)
                    var fname = data.user_fname;
                    var lname = data.user_lname; 
                  $("#welcome_user").html('welcome' + fname + " " + lname)
                },
                error: function(xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            });
    });
</script>