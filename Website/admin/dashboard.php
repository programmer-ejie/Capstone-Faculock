<?php
session_start();
include('../db_connection/conn.php');

// Fetch data for graphs
// Logs count by month
$logsData = [];
$logsQuery = mysqli_query($conn, "SELECT MONTH(notif_date) AS month, COUNT(*) AS count FROM logs GROUP BY MONTH(notif_date)");
while ($row = mysqli_fetch_assoc($logsQuery)) {
    $logsData[(int)$row['month']] = (int)$row['count'];
}

// Notifications count by month
$notificationsData = [];
$notificationsQuery = mysqli_query($conn, "SELECT MONTH(notif_date) AS month, COUNT(*) AS count FROM notifications GROUP BY MONTH(notif_date)");
while ($row = mysqli_fetch_assoc($notificationsQuery)) {
    $notificationsData[(int)$row['month']] = (int)$row['count'];
}

// User registrations by month
$usersData = [];
$usersQuery = mysqli_query($conn, "SELECT MONTH(date_created) AS month, COUNT(*) AS count FROM users GROUP BY MONTH(date_created)");
while ($row = mysqli_fetch_assoc($usersQuery)) {
    $usersData[(int)$row['month']] = (int)$row['count'];
}

// Schedules distribution
$schedulesData = [];
$schedulesQuery = mysqli_query($conn, "SELECT subject_name, COUNT(*) AS count FROM schedules GROUP BY subject_name");
while ($row = mysqli_fetch_assoc($schedulesQuery)) {
    $schedulesData[$row['subject_name']] = (int)$row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Accounts | FacuLock</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <link rel="shortcut icon" type="image/png" href="../template/auth/assets/images/logos/seodashlogo.png" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="../template/admin/dist/assets/fonts/tabler-icons.min.css" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="../template/admin/dist/assets/fonts/feather.css" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="../template/admin/dist/assets/fonts/fontawesome.css" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="../template/admin/dist/assets/fonts/material.css" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="../template/admin/dist/assets/css/style.css" id="main-style-link" >
<link rel="stylesheet" href="../template/admin/dist/assets/css/style-preset.css" >
<link href="https://cdn.jsdelivr.net/npm/@tabler/icons@1.77.0/font/css/tabler-icons.min.css" rel="stylesheet">

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
    <a href="index.html" class="logo d-flex align-items-center me-auto" style="text-decoration: none;">
        <i class="fas fa-lock me-2" style="font-size: 15px;"></i>
        <span class="sitename" style="font-weight: bolder; font-size: 16px; color: grey; padding-right: 10px;">Faculock</span>
        </a>

    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        
      <li class="pc-item">
  <a href="livecamera.php" class="pc-link">
    <span class="pc-micon"><i class="ti ti-camera"></i></span> <!-- Tabler Icons Camera Icon -->
    <span class="pc-mtext">Live Camera</span>
  </a>
</li>

<li class="pc-item">
  <a href="dashboard.php" class="pc-link">
    <span class="pc-micon"><i class="ti ti-dashboard"></i></span> <!-- Icon for Dashboard -->
    <span class="pc-mtext">Dashboard</span>
  </a>
</li>


<li class="pc-item pc-caption">
  <label>System Functions</label>
  <i class="ti ti-settings"></i> <!-- Icon for System Functions -->
</li>
<!-- <li class="pc-item">
  <a href="profile.php" class="pc-link">
    <span class="pc-micon"><i class="ti ti-user"></i></span> 
    <span class="pc-mtext">Profile</span>
  </a>
</li> -->

<li class="pc-item">
  <a href="accounts.php" class="pc-link">
    <span class="pc-micon"><i class="ti ti-users"></i></span> <!-- Icon for Accounts -->
    <span class="pc-mtext">Accounts</span>
  </a>
</li>


<li class="pc-item">
  <a href="schedules.php" class="pc-link">
    <span class="pc-micon"><i class="ti ti-calendar"></i></span> <!-- Icon for Schedules -->
    <span class="pc-mtext">Schedules</span>
  </a>
</li>

<li class="pc-item">
  <a href="notification.php" class="pc-link">
    <span class="pc-micon"><i class="ti ti-bell"></i></span> <!-- Icon for User  Notification -->
    <span class="pc-mtext">User  Notification</span>
  </a>
</li>

<li class="pc-item">
  <a href="logs.php" class="pc-link">
    <span class="pc-micon"><i class="ti ti-file"></i></span> <!-- Icon for Logs -->
    <span class="pc-mtext">Logs</span>
  </a>
</li>


     
      </ul>
    
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <!-- ======= Menu collapse Icon ===== -->
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item d-inline-flex d-md-none">
      <a
        class="pc-head-link dropdown-toggle arrow-none m-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ti ti-search"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3">
          <div class="form-group mb-0 d-flex align-items-center">
            <i data-feather="search"></i>
            <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
          </div>
        </form>
      </div>
    </li>
    <li class="pc-h-item d-none d-md-inline-flex">
      <form class="header-search">
        <i data-feather="search" class="icon-search"></i>
        <input type="search" class="form-control" placeholder="Search here. . .">
      </form>
    </li>
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ti ti-mail"></i>
      </a>
      <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header d-flex align-items-center justify-content-between">
          <h5 class="m-0">Message</h5>
          <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-x text-danger"></i></a>
        </div>
        <div class="dropdown-divider"></div>
        <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
          <div class="list-group list-group-flush w-100">
            <a class="list-group-item list-group-item-action">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="../template/admin/dist/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                </div>
                <div class="flex-grow-1 ms-1">
                  <span class="float-end text-muted">3:00 AM</span>
                  <p class="text-body mb-1">It's <b>Cristina danny's</b> birthday today.</p>
                  <span class="text-muted">2 min ago</span>
                </div>
              </div>
            </a>
            <a class="list-group-item list-group-item-action">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="../template/admin/dist/assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar">
                </div>
                <div class="flex-grow-1 ms-1">
                  <span class="float-end text-muted">6:00 PM</span>
                  <p class="text-body mb-1"><b>Aida Burg</b> commented your post.</p>
                  <span class="text-muted">5 August</span>
                </div>
              </div>
            </a>
            <a class="list-group-item list-group-item-action">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="../template/admin/dist/assets/images/user/avatar-3.jpg" alt="user-image" class="user-avtar">
                </div>
                <div class="flex-grow-1 ms-1">
                  <span class="float-end text-muted">2:45 PM</span>
                  <p class="text-body mb-1"><b>There was a failure to your setup.</b></p>
                  <span class="text-muted">7 hours ago</span>
                </div>
              </div>
            </a>
            <a class="list-group-item list-group-item-action">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="../template/admin/dist/assets/images/user/avatar-4.jpg" alt="user-image" class="user-avtar">
                </div>
                <div class="flex-grow-1 ms-1">
                  <span class="float-end text-muted">9:10 PM</span>
                  <p class="text-body mb-1"><b>Cristina Danny </b> invited to join <b> Meeting.</b></p>
                  <span class="text-muted">Daily scrum meeting time</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="text-center py-2">
          <a href="#!" class="link-primary">View all</a>
        </div>
      </div>
    </li>
    <li class="dropdown pc-h-item header-user-profile">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        data-bs-auto-close="outside"
        aria-expanded="false"
      >
        <img src="../images/admin.webp" alt="user-image" class="user-avtar">
        <span>Administrator</span>
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header">
          <div class="d-flex mb-1">
            <div class="flex-shrink-0">
              <img src="../images/admin.webp" alt="user-image" class="user-avtar wid-35">
            </div>
            <div class="flex-grow-1 ms-3">
              <h6 class="mb-1">Administrator</h6>
              <span>Account</span>
            </div>
            <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></a>
          </div>
        </div>
        <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="drp-t1"
              data-bs-toggle="tab"
              data-bs-target="#drp-tab-1"
              type="button"
              role="tab"
              aria-controls="drp-tab-1"
              aria-selected="true"
              ><i class="ti ti-bolt"></i> Shortcuts
              </button
            >
          </li>
          
        </ul>
        <div class="tab-content" id="mysrpTabContent">
          <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
          <a href="livecamera.php" class="dropdown-item">
                <i class="ti ti-camera"></i>
                <span>Live Camera</span>
                </a>

                <a href="dashboard.php" class="dropdown-item">
                <i class="ti ti-dashboard"></i>
                <span>Dashboard</span>
                </a>

                <a href="accounts.php" class="dropdown-item">
                <i class="ti ti-users"></i>
                <span>Accounts</span>
                </a>

                <a href="schedules.php" class="dropdown-item">
                <i class="ti ti-calendar-event"></i>
                <span>Schedules</span>
                </a>

                <a href="notification.php" class="dropdown-item">
                <i class="ti ti-bell"></i>
                <span>User  Notification</span>
                </a>

                <a href="logs.php" class="dropdown-item">
                <i class="ti ti-file-text"></i>
                <span>Logs</span>
                </a>

            <a href="../index.php" class="dropdown-item">
              <i class="ti ti-power"></i>
              <span>Logout</span>
            </a>
          </div>
          <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
            <a href="#!" class="dropdown-item">
              <i class="ti ti-help"></i>
              <span>Support</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-user"></i>
              <span>Account Settings</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-lock"></i>
              <span>Privacy Center</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-messages"></i>
              <span>Feedback</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-list"></i>
              <span>History</span>
            </a>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
 </div>
</header>
<!-- [ Header ] end -->


<div class="pc-container">
    <div class="pc-content">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Overview Cards -->
      <div class="row">
        <!-- Total Users -->
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Users</h6>
              <?php
              $totalUsers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
              ?>
              <h4 class="mb-3"><?php echo $totalUsers; ?></h4>
            </div>
          </div>
        </div>

        <!-- Total Notifications -->
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Notifications</h6>
              <?php
              $totalNotifications = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM notifications"))['total'];
              ?>
              <h4 class="mb-3"><?php echo $totalNotifications; ?></h4>
            </div>
          </div>
        </div>

        <!-- Total Schedules -->
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Schedules</h6>
              <?php
              $totalSchedules = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM schedules"))['total'];
              ?>
              <h4 class="mb-3"><?php echo $totalSchedules; ?></h4>
            </div>
          </div>
        </div>

        <!-- Total Logs -->
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Logs</h6>
              <?php
              $totalLogs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM logs"))['total'];
              ?>
              <h4 class="mb-3"><?php echo $totalLogs; ?></h4>
            </div>
          </div>
        </div>
      </div>

      <!-- Graph Section -->
      <div class="row">
        <!-- Activity Overview Chart -->
        <div class="col-md-6">
          <h5 class="mb-3">Activity Overview</h5>
          <div class="card">
            <div class="card-body">
              <div id="activity-overview-chart"></div>
            </div>
          </div>
        </div>

        <!-- User Registrations Chart -->
        <div class="col-md-6">
          <h5 class="mb-3">User Registrations</h5>
          <div class="card">
            <div class="card-body">
              <div id="user-registrations-chart"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Notifications Overview Chart -->
        <div class="col-md-6">
          <h5 class="mb-3">Notifications Overview</h5>
          <div class="card">
            <div class="card-body">
              <div id="notifications-overview-chart"></div>
            </div>
          </div>
        </div>

        <!-- Schedules Overview Chart -->
        <div class="col-md-6">
          <h5 class="mb-3">Schedules Overview</h5>
          <div class="card">
            <div class="card-body">
              <div id="schedules-overview-chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- [ Main Content ] end -->
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
        <p class="m-0"
            >Capstone Proect &#9829; By IT301 6 Students</p
          >
        </div>
        <div class="col-auto my-1">
        
        </div>
      </div>
    </div>
  </footer>

  <!-- [Page Specific JS] start -->
  <script src="../template/admin/dist/assets/js/plugins/apexcharts.min.js"></script>
  <script src="../template/admin/dist/assets/js/pages/dashboard-default.js"></script>
  <!-- [Page Specific JS] end -->
  <!-- Required Js -->
  <script src="../template/admin/dist/assets/js/plugins/popper.min.js"></script>
  <script src="../template/admin/dist/assets/js/plugins/simplebar.min.js"></script>
  <script src="../template/admin/dist/assets/js/plugins/bootstrap.min.js"></script>
  <script src="../template/admin/dist/assets/js/fonts/custom-font.js"></script>
  <script src="../template/admin/dist/assets/js/pcoded.js"></script>
  <script src="../template/admin/dist/assets/js/plugins/feather.min.js"></script>

  
  
    <script>
    // Convert PHP arrays to JavaScript
    const logsData = <?php echo json_encode(array_values($logsData)); ?>;
    const notificationsData = <?php echo json_encode(array_values($notificationsData)); ?>;
    const usersData = <?php echo json_encode(array_values($usersData)); ?>;
    const schedulesLabels = <?php echo json_encode(array_keys($schedulesData)); ?>;
    const schedulesData = <?php echo json_encode(array_values($schedulesData)); ?>;
  
    // Activity Overview Chart
    var activityOptions = {
      series: [
        {
          name: 'Logs',
          data: logsData
        },
        {
          name: 'Notifications',
          data: notificationsData
        }
      ],
      chart: {
        type: 'line',
        height: 350
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      }
    };
    var activityChart = new ApexCharts(document.querySelector("#activity-overview-chart"), activityOptions);
    activityChart.render();
  
    // User Registrations Chart
    var userOptions = {
      series: [
        {
          name: 'Users',
          data: usersData
        }
      ],
      chart: {
        type: 'bar',
        height: 350
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      }
    };
    var userChart = new ApexCharts(document.querySelector("#user-registrations-chart"), userOptions);
    userChart.render();
  
    // Notifications Overview Chart
    var notificationsOptions = {
      series: [
        {
          name: 'Notifications',
          data: notificationsData
        }
      ],
      chart: {
        type: 'area',
        height: 350
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      }
    };
    var notificationsChart = new ApexCharts(document.querySelector("#notifications-overview-chart"), notificationsOptions);
    notificationsChart.render();
  
    // Schedules Overview Chart
    var schedulesOptions = {
      series: [
        {
          name: 'Schedules',
          data: schedulesData
        }
      ],
      chart: {
        type: 'pie',
        height: 350
      },
      labels: schedulesLabels
    };
    var schedulesChart = new ApexCharts(document.querySelector("#schedules-overview-chart"), schedulesOptions);
    schedulesChart.render();
  </script>
  
  <script>layout_change('light');</script>
  
  
  
  
  <script>change_box_container('false');</script>
  
  
  
  <script>layout_rtl_change('false');</script>
  
  
  <script>preset_change("preset-1");</script>
  
  
  <script>font_change("Public-Sans");</script>
  
    

</body>
<!-- [Body] end -->

</html>