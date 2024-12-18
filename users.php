<!DOCTYPE html>
<html lang="en">
<?php include './components/users/users-modal.php'; ?>

<?php include './layouts/navbar.php'; ?>
<?php include './layouts/sidebar.php'; ?>
<?php include './layouts/head.php'; ?>


<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Users</a></li>
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto custom-border">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"></h5>

                    <table class="table table-bordered datatable" id="tbl_users">
                        <thead>
                            <tr>
                                <th id="users_application_id" scope="col">APPLICATION ID</th>
                                <th id="users_application_name" scope="col">USERS NAME</th>
                                <th id="users_application_type" scope="col">USERS TYPE</th>
                                <th id="users_application_action" scope="col">ACTION</th> <!-- Add Action column -->
                                
                            </tr>
                        </thead>
                    <tbody>
                        <!-- Table rows will be dynamically added here -->
                    </tbody>
                </table>
                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Column -->

      </div><!-- End Row -->
    </section>
    
    

  </main><!-- End #main -->
  <?php include './layouts/footer.php' ?>
  <!-- ======= Footer ======= -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
 
  <!-- jQuery -->
  <script src="./assets/js/jquery/jquery.min.js"></script>

  <script>
  function FuncEditUser(item) {
    const data = JSON.parse(item);
    console.log(data);

    var user_id = data.user_id
    var user_type    = data.user_type;

    $("#userTypeModal").modal('show');

}

    $(document).ready(function() {
    $.ajax({
        url: `<?php echo $url;?>/auth-file/users_list.php`, 
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $("#tbl_users tbody").html(""); // Clear existing rows
            const data = response.message;

            if (data.length > 0) {
                let rows = '';
                data.forEach(item => {
                    rows += `
                        <tr id="row_${item.user_id}">
                            <td>${item.user_id}</td>
                            <td>${item.user_name}</td>
                            <td>${item.user_type} </td>
                            <td>  
                            <button type="button" class="btn btn-primary btn-sm me-1" onclick="FuncEditUser('${JSON.stringify(item).replace(/"/g, '&quot;')}');">EDIT</button></td>
                        </tr>
                    `;
                });

                $("#tbl_users tbody").append(rows);
            } else {
                $("#tbl_users tbody").append(`
                    <tr>
                        <td colspan="4" class="text-center">No Data Available</td>
                    </tr>
                `);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error fetching data: " + error);
            $("#tbl_users tbody").html(`
                <tr>
                    <td colspan="4" class="text-center">Error loading data</td>
                </tr>
            `);
        }
    });


});

    </script>
</body>

</html>
