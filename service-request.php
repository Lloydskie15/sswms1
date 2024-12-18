<!DOCTYPE html>
<html lang="en">

<?php include './layouts/navbar.php'; ?>
<?php include './layouts/sidebar.php'; ?>
<?php include './layouts/head.php'; ?>

<body>

    <?php include './components/service-request/service-request-modal.php'; ?>
    <?php include './components/service-request/service-request-edit.php'; ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <nav>
                <h1> Request <S></S>chedule</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="col-lg-12">
                <div class="row">
                    <div class="card recent-sales overflow-auto">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Action</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Add</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Schedules</span></h5>
                            <button id="btn_reschedule" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceRequestModal">
                            Request Schedule
                            </button>

                            <table class="table table-bordered datatable" id="table-service">
                                <thead>
                                    <tr>
                                        <th>Application ID</th>
                                        <th>Beneficiary Name</th>
                                        <th>Description</th>
                                        <th>Rescheduling Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table data will be dynamically added here -->
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <?php include './layouts/footer.php'; ?>

    <!-- ======= Footer ======= -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <script>

function funcEditService(item) {
    //  console.log(status); // Verify the value passed
   
console.log(item);

    $("#txt_modal_edit_request_id").val(item.request_id)
    $("#service-request-status").val(item.status.toLowerCase());
    $("#edit_modal_service").modal('show');
}

        $(document).ready(function() {

            $.ajax({
                url: `<?php echo $url;?>/service-request/list.php`, // URL to your PHP script
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Clear the existing table body
                    $("#table-service tbody").html("");

                    const data = response.message;

                    // Check if data is available
                    if (data.length > 0) {
                        let rows = ''; // Initialize an empty string for rows

                        // Loop through each item in the data array
                        data.forEach(item => {
                            rows += `
                            <tr id="row_${item.request_id}">
                                <td>${item.request_id}</td>
                                <td>${item.beneficiary_name}</td>
                                <td>${item.description}</td>
                                <td>${item.calendar}</td> 
                                <td> ${item.status}

                         ${(user_type.toUpperCase() === "ADMIN" || user_type.toUpperCase() === "SOCIAL WORKERS") ? 
                       `<button id="funcEditService" type="button" class="btn btn-primary btn-sm me-1" 
                        onclick="funcEditService(${JSON.stringify(item).replace(/"/g, '&quot;')});">
                        
                        EDIT
                     </button>` 
                : ''} 
                            </tr>
                            
                            
                        `;
                        });

                        // Append the rows to the table body
                        $("#table-service tbody").append(rows);
                    } else {
                        // If no data, display a message in the table
                        $("#table-service tbody").append(`
                        <tr>
                            <td colspan="4" class="text-center">NO DATA</td>
                        </tr>
                    `);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data: " + error);
                    // Optionally handle errors
                    $("#table-service tbody").html(`
                    <tr>
                        <td colspan="4" class="text-center">Error loading data</td>
                    </tr>
                `);
                }
            });
        });
    </script>

<script>
if (user_type.toUpperCase() == "ADMIN") {
    $("#btn_reschedule").addClass('d-none');
    
} else if (user_type.toUpperCase() == "SOCIAL WORKER") {

    

} else if (user_type.toUpperCase() == "USER") {
    

}
</script>



</body>

</html>