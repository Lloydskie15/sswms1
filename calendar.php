<!DOCTYPE html>
<html lang="en">

<?php include './components/users/users-modal.php'; ?>
<?php include './layouts/navbar.php'; ?>
<?php include './layouts/sidebar.php'; ?>
<?php include './layouts/head.php'; ?>

<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Calendar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">calendar</li>
          <li class="breadcrumb-item active">Rescheduling</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-10">
          <div class="row">

            <!-- Calendar Section -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">User Calendar</h5>
                  <!-- Calendar Container -->
                  <div id="calendar"></div>
                </div>
              </div>
            </div><!-- End Calendar Section -->

          </div>
        </div><!-- End Column -->

      </div><!-- End Row -->
    </section>

   

  </main><!-- End #main -->

  <!-- ======= Footer  <?php include './layouts/footer.php'; ?>======= -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="./assets/js/jquery/jquery.min.js"></script>

  <!-- FullCalendar CSS and JS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
          {
            title: 'Meeting with John',
            start: '2024-12-01T10:00:00',
            end: '2024-12-01T12:00:00'
          },
          {
            title: 'Conference',
            start: '2024-12-05T09:00:00',
            end: '2024-12-05T17:00:00'
          },
          {
            title: 'Doctor Appointment',
            start: '2024-12-10T14:00:00',
            end: '2024-12-10T15:00:00'
          }
        ]
      });

      // Render the calendar
      calendar.render();
    });
  </script>

</body>

</html>
