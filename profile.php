<!DOCTYPE html>
<html lang="en">

<?php include './layouts/head.php'; ?>
<?php include './layouts/navbar.php'; ?>
<?php include './layouts/sidebar.php'; ?>


<body>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Beneficiary Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img id="profile_image" src="./assets/img/profile-img.jpg" class="rounded-circle" alt="Profile Image">
            <h2 id="profile_full_name">--</h2>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>
            </ul>

            <div class="tab-content pt-2">
              <!-- Profile Overview -->
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">No Data</p>

                <h5 class="card-title">Profile Details</h5>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Full Name</div>
                  <div id="profile_fullname" class="col-lg-9 col-md-8">--</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div id="profile_address" class="col-lg-9 col-md-8">--</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div id="profile_number" class="col-lg-9 col-md-8">--</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div id="profile_email" class="col-lg-9 col-md-8">--</div>
                </div>
              </div>

              <!-- Profile Edit -->
              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <form action="insert_profile.php" method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="./assets/img/profile-img.jpg" alt="Profile" id="profilePreview">
                      <div class="pt-2">
                        <input type="file" name="profile_picture" id="profile_Image" class="form-control-file">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>

              <!-- Change Password -->
              <div class="tab-pane fade pt-3" id="profile-change-password">
                <form>
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form>
              </div>
            </div><!-- End Bordered Tabs -->
          </div>
        </div>
      </div>
    </div>
  </section>

  

</main><!-- End #main -->
<?php include './layouts/footer.php'; ?>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="./assets/js/jquery/jquery.min.js"></script>
<script src="./assets/js/sweetalert2@11.js"></script>

<script>
  $(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const email = urlParams.get('link');

    $.ajax({
      url: `<?php echo $url; ?>/auth-file/user_details.php?link=${email}`,
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        const data = response.message[0];
        $("#profile_full_name, #profile_fullname").html(`${data.user_fname} ${data.user_lname}`);
        $("#profile_address").html(data.user_address);
        $("#profile_number").html(data.user_number);
        $("#profile_email").html(data.user_email);
      },
      error: function (xhr, status, error) {
        Swal.fire("Error", "An error occurred: " + error, "error");
      }
    });
  });
</script>

</body>
</html>
