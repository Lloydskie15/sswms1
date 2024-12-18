<?php include './url.php'; ?>


<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=5">

    <?php include './layouts/navbar.php'; ?>
    <?php include './layouts/sidebar.php'; ?>
    <?php include './layouts/head.php'; ?>

    <link rel="stylesheet" href="./assets/css/style.css">

    <body>

        <?php include './components/benefeciary/add_appointment_modal.php'; ?>
        <?php include './components/benefeciary/edit_benefeciary_modal.php'; ?>
        <?php include './components/benefeciary/view_benefeciary_modal.php'; ?>

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Request Appointment</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                    <div class="col-lg-10">
                        <div class="row">

                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                        <h5 class="card-title">Total Reqest</h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi-person-circle"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 id="feedback_approved">0</h6>
                                                <span class="text-muted small pt-2 ps-1">beneficiary</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Revenue Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card revenue-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                        <h5 class="card-title">Beneficiary<span></span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi-person-lines-fill"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 id="feedback_pending">0</h6>
                                                <span class="text-muted small pt-2 ps-1">Beneficiary</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->

                            <!-- Customers Card -->
                            <div class="col-xxl-4 col-xl-12">

                                <div class="card info-card customers-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                        <h5 class="card-title">Client Information <span></span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi-person-check"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 id="feedback_declined">0</h6>
                                                <span class="text-muted small pt-2 ps-1">Client Information</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!-- End Customers Card -->


                            <!-- Recent Sales -->
                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                        <h5 class="card-title">Benefeciary Info</h5>

                                        <table class="table table-bordered datatable" id="tbl_apoointments">
                                            <thead>
                                                <tr>
                                                    <th scope="col">APPLICATION ID</th>
                                                    <th scope="col">APPLICATION FOR</th>
                                                    <th scope="col">NAME</th>
                                                    <th scope="col">ADDRESS</th>
                                                    <th scope="col">ACTIONS</th>
                                                    <button id="benefeciary_modal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_appointments">
                                                        Request Appointment
                                                    </button>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Table data will be dynamically added here -->
                                            </tbody>
                                        </table>


                                    </div>

                                </div>
                            </div><!-- End Recent Sales -->


                        </div>
                    </div>


                    <div class="col-lg-4">


                        <div id="admin_benefeciary_news" class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                                <div class="news">
                                    <div class="post-item clearfix">
                                        <img src="./assets/img/news-1.jpg" alt="">
                                        <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                        <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="./assets/img/news-2.jpg" alt="">
                                        <h4><a href="#">Quidem autem et impedit</a></h4>
                                        <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="./assets/img/news-3.jpg" alt="">
                                        <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                        <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="./assets/img/news-4.jpg" alt="">
                                        <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                        <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="./assets/img/news-5.jpg" alt="">
                                        <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                        <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                                    </div>

                                </div><!-- End sidebar recent posts-->

                            </div>
                        </div><!-- End News & Updates -->
                    </div>

                    <div class="row">

                    </div>



                </div>
            </section>

        </main><!-- End #main -->

        <?php include './layouts/footer.php' ?>
        <!-- ======= Footer ======= -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="./assets/js/sweetalert2@11.js"></script>
    </body>

</html>

<!-- jQuery -->
<script src="./assets/js/jquery/jquery.min.js"></script>


<script>
function funcEditAppointment(item) {
    const data = JSON.parse(item);
    console.log(data);

    var lname               = data.beneficiary_lastname;
    var mname               = data.beneficiary_middlename;
    var fname               = data.beneficiary_firstname;
    var suffix              = data.beneficiary_suffix;
    var application_type    = data.application_type;
    var relationship        = data.relationship;
    var address             = data.beneficiary_address;
    var muni                = data.beneficiary_city_mun;
    var district            = data.beneficiary_district;
    var barangay            = data.beneficiary_barangay;
    var status              = data.beneficiary_civil_status;
    var gender              = data.beneficiary_gender;
    var number              = data.contact_num;
    var gmail               = data.gmail;
    var edit_application_id = data.application_id




    $("#edit_application_id").html(edit_application_id);
    $("#edit_beneficiary_lastname").val(lname);
    $("#edit_beneficiary_middlename").val(mname);
    $("#edit_beneficiary_firstname").val(fname);
    $("#edit_beneficiary_suffix").val(suffix);
    $("#edit_beneficiary_address").val(address);
    $("#edit_beneficiary_city_mun").val(muni);
    $("#edit_beneficiary_district").val(district);
    $("#edit_beneficiary_barangay").val(barangay);
    $("#edit_beneficiary_civil_status").val(status);
    $("#edit_beneficiary_gender").val(gender);
    $("#edit_contact_number").val(number);
    $("#edit_beneficiary_email").val(gmail);
    $("#edit_application_type").val(application_type)
    $("#edit_relationship").val(relationship)
    $("#edit_modal_appointments").modal('show');

}

function funcviewAppointment(item) {
    const data = JSON.parse(item);
    console.log(data);

    var lname = data.beneficiary_lastname;
        var mname = data.beneficiary_middlename;
        var fname = data.beneficiary_firstname;
        var suffix = data.beneficiary_suffix;
        var application_type = data.application_type;
        var relationship = data.relationship;
        var address = data.beneficiary_address;
        var muni = data.beneficiary_city_mun;
        var district = data.beneficiary_district;
        var barangay = data.beneficiary_barangay;
        var status = data.beneficiary_civil_status;
        var gender = data.beneficiary_gender;
        var number = data.contact_num;
        var gmail = data.gmail;
        var view_application_id = data.application_id;
        var application_for = data.application_for;
        var relationship = data.relationship;
        var client_lastname = data.client_lastname;
        var client_firstname = data.client_firstname;
        var client_middlename = data.client_middlename;
        var client_suffix = data.client_suffix;
        var client_gender = data.client_gender;
        var client_address = data.client_address;


        $("#view_application_id").html(view_application_id);
        $("#view_beneficiary_lastname").html(lname);
        $("#view_beneficiary_middlename").html(mname);
        $("#view_beneficiary_firstname").html(fname);
        $("#view_beneficiary_suffix").html(suffix);
        $("#view_beneficiary_address").html(address);
        $("#view_beneficiary_city_mun").html(muni);
        $("#view_beneficiary_district").html(district);
        $("#view_beneficiary_barangay").html(barangay);
        $("#view_beneficiary_civil_status").html(status);
        $("#view_beneficiary_gender").html(gender);
        $("#view_contact_number").html(number);
        $("#view_beneficiary_email").html(gmail);
        $("#view_application_type").html(application_type);
        $("#application_for").html(application_for);
        $("#view_relationship").html(relationship);
        $("#view_client_lastname").html(client_lastname);
        $("#view_client_firstname").html(client_firstname);
        $("#view_client_middlename").html(client_middlename);
        $("#view_client_suffix").html(client_suffix);
        $("#view_client_gender").html(client_gender);
        $("#view_client_address").html(client_address);
        
        if (application_for.toUpperCase() == "SELF") {

    $("#div_view_client_information").addClass('d-none');
    } else {

    $("#div_view_client_information").removeClass('d-none');

    }

        $("#view_modal_appointments").modal('show');

    }
function funcDeleteAppointment(application_id) {


    Swal.fire({
        title: 'Delete Item',
        html: 'Are you sure you want to <strong>DELETE</strong>  ?', // Custom HTML content
        icon: 'info',
        showCancelButton: true, // Adds a cancel button
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, proceed!',
        cancelButtonText: 'No, cancel!'
    }).then((result) => {
        if (result.isConfirmed) {

            const formData = {
                application_id: application_id,
                action: "delete",
            };
            
            $.ajax({
                url: `<?php echo $url;?>/appointment/add_appointment.php`,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(formData),
                dataType: 'json',
                success: function(response) {
                    const status = response.status;
                    const message = response.message;

                    if (status === 1) {
                        $(`#row_${application_id}`).remove();
                    }
                },
                error: function(xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            });
        }
    });

}
$(document).ready(function() {
    $.ajax({
                url: `<?php echo $url;?>/appointment/list.php`,

        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $("#tbl_apoointments > tbody").html("");
            const data = response.message;

            if (data.length > 0) {



                var rows = '';
                for (var i = 0; i < data.length; i++) {
                    var item = data[i];
                    rows += `
  <tr id="row_${item.application_id || ''}">
      <td scope="row"><a href="#">#${item.application_id}</a></td>
                            <td><a href="#" class="text-primary">${item.application_for}</a></td>
                            <td>${item.beneficiary_lastname} ${item.beneficiary_firstname} ${item.beneficiary_middlename}</td>
                            <td>${item.gmail}</td>
                          
                   
<td>
  <button type="button" class="btn btn-primary btn-sm me-1" onclick="funcEditAppointment('${JSON.stringify(item).replace(/"/g, '&quot;')}');">EDIT</button>
  <button type="button" class="btn btn-primary btn-sm me-1" onclick="funcviewAppointment('${JSON.stringify(item).replace(/"/g, '&quot;')}');">VIEW</button>

            ${(user_type.toUpperCase() === "ADMIN" || user_type.toUpperCase() === "SOCIAL WORKER" || user_type.toUpperCase() === "USER") ? 
            `<button type="button" class="btn btn-danger btn-sm" 
                        onclick="funcDeleteAppointment('${item.application_id || ''}');">
                DELETE
                </button>` 
                : ''}
</td>
  </tr>
`;
                }

                $("#tbl_apoointments > tbody").prepend(rows);

            } else {
                $("#tbl_apoointments > tbody").append(`
                          <tr>
                            <td scope="row">NO DATA</td>
                          </tr>
                       `);
            }
        },
    });

});
</script>

<script>
            if(user_type.toUpperCase()=="ADMIN"){

            $("#admin_benefeciary_news").addClass("d-none");
            $("#benefeciary_modal").addClass("d-none");
           

            }
            else if(user_type.toUpperCase()=="USER"){
                $("#website").addClass("d-none");
                $("#admin_benefeciary_news").addClass("d-none");

            }
            else if(user_type.toUpperCase()=="SOCIAL WORKER"){
                $("#admin_benefeciary_news").addClass("d-none");
s
            }
</script>
