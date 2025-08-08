<?php
  include('../db_connection/conn.php');

  $addStatus = '';
  if (isset($_GET['addStatus'])) {
      $addStatus = $_GET['addStatus'];
  }

  $editStatus = '';
  if(isset($_GET['editStatus'])) {
      $editStatus = $_GET['editStatus'];
  }

  $deleteStatus = '';
  if(isset($_GET['deleteStatus'])) {
      $deleteStatus = $_GET['deleteStatus'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Schedules | FacuLock</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">
  <link href="https://cdn.jsdelivr.net/npm/tabler-icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">


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



  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">:</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Admin</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Schedules</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
                    <!-- start sa code -->
                    <div class="col-xxl-12 col-md-12">
                    <div class="card-header">
                    <h5>Teacher Schedule Table</h5>
                    <small>Manage and organize teacher schedules efficiently using the table below.</small>
        <div class="d-flex justify-content-end">
  
 

        <select id="sort-date" class="form-select form-select-sm me-2" style="width: auto;" onchange="sortByDate()">
          <option value="" <?php echo (!isset($_GET['sort_date']) ? 'selected' : ''); ?>>Sort by Date</option>
          <option value="ASC" <?php echo (isset($_GET['sort_date']) && $_GET['sort_date'] == 'ASC' ? 'selected' : ''); ?>>Oldest First</option>
          <option value="DESC" <?php echo (isset($_GET['sort_date']) && $_GET['sort_date'] == 'DESC' ? 'selected' : ''); ?>>Newest First</option>
        </select>

        <!-- Dropdown for filtering by department -->
        <select id="filter-department" class="form-select form-select-sm me-2" style="width: auto;" onchange="filterByDepartment()">
          <option value="" <?php echo (!isset($_GET['filter_department']) ? 'selected' : ''); ?>>Filter by Department</option>
          <?php
            $dept_sql = "SELECT DISTINCT department FROM schedules";
            $dept_result = mysqli_query($conn, $dept_sql);
            while ($dept_row = mysqli_fetch_assoc($dept_result)) {
              $selected = (isset($_GET['filter_department']) && $_GET['filter_department'] == $dept_row['department']) ? 'selected' : '';
              echo '<option value="' . $dept_row['department'] . '" ' . $selected . '>' . $dept_row['department'] . '</option>';
            }
          ?>
        </select>

        <!-- Add Schedule Button -->
        <button class="btn btn-success btn-sm" style="border-radius: 5px;" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
          Add Schedule
        </button>

        <!-- Add Schedule Modal -->
        <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Use modal-lg for a larger modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addScheduleModalLabel">Add New Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../backend/add_schedule.php" method="POST">
          <div class="row">
            <!-- Course Code and Course Number -->
            <div class="col-md-6 mb-3">
              <label for="course_code" class="form-label">Course Code</label>
              <input type="text" class="form-control" name="course_code" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="course_number" class="form-label">Course Number</label>
              <input type="text" class="form-control" name="course_number" required>
            </div>
          </div>
          <div class="row">
            <!-- Units and Faculty Teacher -->
            <div class="col-md-6 mb-3">
              <label for="units" class="form-label">Units</label>
              <input type="number" class="form-control" name="units" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="faculty_teacher" class="form-label">Faculty Teacher</label>
              <input type="text" class="form-control" name="faculty_teacher" required>
            </div>
          </div>
          <div class="row">
            <!-- Subject Name and Size -->
            <div class="col-md-6 mb-3">
              <label for="subject_name" class="form-label">Subject Name</label>
              <input type="text" class="form-control" name="subject_name" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="size" class="form-label">Size</label>
              <input type="number" class="form-control" name="size" required>
            </div>
          </div>
          <div class="row">
            <!-- Schedule -->
            <div class="col-md-12 mb-3">
              <label for="schedule" class="form-label">Schedule</label>
              <input type="text" class="form-control" name="schedule" required>
            </div>
          </div>
          <div class="row">
            <!-- Department and College -->
            <div class="col-md-6 mb-3">
              <label for="department" class="form-label">Department</label>
              <input type="text" class="form-control" name="department" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="college" class="form-label">College</label>
              <input type="text" class="form-control" name="college" required>
            </div>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Add Schedule</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


</div>
  </div>
</div>

<div class="card-body">
  <table id="left-right-fix" class="table stripe row-border order-column">
    <thead>
      <tr>
        <th>Course Code</th>
        <th>Course Number</th>
        <th>Units</th>
        <th>Faculty Teacher</th>
        <th>Subject Name</th>
        <th>Size</th>
        <th>Schedule</th>
        <th>Department</th>
        <th>College</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody id="schedule-table-body">
      <?php
        $sql = "SELECT * FROM schedules WHERE id IS NOT NULL"; // Base query

        // Filter by department
        if (isset($_GET['filter_department']) && !empty($_GET['filter_department'])) {
          $filter_department = mysqli_real_escape_string($conn, $_GET['filter_department']);
          $sql .= " AND department = '$filter_department'";
        }

        // Sort by schedule
        
        if (isset($_GET['sort_date']) && in_array($_GET['sort_date'], ['ASC', 'DESC'])) {
          $sort_date = $_GET['sort_date'];
          $sql .= " ORDER BY date_created $sort_date"; // Sort by created_at column
        } else {
          $sql .= " ORDER BY schedule ASC"; // Default sorting
        }

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['course_code'] . "</td>";
            echo "<td>" . $row['course_number'] . "</td>";
            echo "<td>" . $row['units'] . "</td>";
            echo "<td>" . $row['faculty_teacher'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "<td>" . $row['size'] . "</td>";
            echo "<td>" . $row['schedule'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
            echo '<td class="text-center">
                    <!-- Edit Button -->
                    <button class="btn btn-primary btn-sm" style="border-radius: 5px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);" data-bs-toggle="modal" data-bs-target="#editModal' . $row['id'] . '">Edit</button>
                    
                    <!-- Delete Button -->
                    <button class="btn btn-danger btn-sm" style="border-radius: 5px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row['id'] . '">Delete</button>
                  </td>';
            echo "</tr>";

            // Edit Modal
            echo '
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal' . $row['id'] . '" tabindex="-1" aria-labelledby="editModalLabel' . $row['id'] . '" aria-hidden="true">
              <div class="modal-dialog modal-lg"> <!-- Use modal-lg for a larger modal -->
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel' . $row['id'] . '">Edit Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="../backend/edit_schedule.php" method="POST">
                      <input type="hidden" name="id" value="' . $row['id'] . '">
                      <div class="row">
                        <!-- Course Code and Course Number -->
                        <div class="col-md-6 mb-3">
                          <label for="course_code" class="form-label">Course Code</label>
                          <input type="text" class="form-control" name="course_code" value="' . $row['course_code'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="course_number" class="form-label">Course Number</label>
                          <input type="text" class="form-control" name="course_number" value="' . $row['course_number'] . '" required>
                        </div>
                      </div>
                      <div class="row">
                        <!-- Units and Faculty Teacher -->
                        <div class="col-md-6 mb-3">
                          <label for="units" class="form-label">Units</label>
                          <input type="number" class="form-control" name="units" value="' . $row['units'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="faculty_teacher" class="form-label">Faculty Teacher</label>
                          <input type="text" class="form-control" name="faculty_teacher" value="' . $row['faculty_teacher'] . '" required>
                        </div>
                      </div>
                      <div class="row">
                        <!-- Subject Name and Size -->
                        <div class="col-md-6 mb-3">
                          <label for="subject_name" class="form-label">Subject Name</label>
                          <input type="text" class="form-control" name="subject_name" value="' . $row['subject_name'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="size" class="form-label">Size</label>
                          <input type="number" class="form-control" name="size" value="' . $row['size'] . '" required>
                        </div>
                      </div>
                      <div class="row">
                        <!-- Schedule -->
                        <div class="col-md-12 mb-3">
                          <label for="schedule" class="form-label">Schedule</label>
                          <input type="text" class="form-control" name="schedule" value="' . $row['schedule'] . '" required>
                        </div>
                      </div>
                      <div class="row">
                        <!-- Department and College -->
                        <div class="col-md-6 mb-3">
                          <label for="department" class="form-label">Department</label>
                          <input type="text" class="form-control" name="department" value="' . $row['department'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="college" class="form-label">College</label>
                          <input type="text" class="form-control" name="college" value="' . $row['college'] . '" required>
                        </div>
                      </div>
                      <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>';

            // Delete modal
            echo '<div class="modal fade" id="deleteModal' . $row['id'] . '" tabindex="-1" aria-labelledby="deleteModalLabel' . $row['id'] . '" aria-hidden="true" style = "margin-top: 25vh;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel' . $row['id'] . '">Delete Schedule</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete the schedule for <strong>' . $row['faculty_teacher'] . '</strong>?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <a href="../backend/delete_schedule.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>';
          }
        } else {
          echo "<tr><td colspan='10'>No schedules found.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</div>

<script>

function sortByDate() {
  const sortOrder = document.getElementById('sort-date').value;
  const urlParams = new URLSearchParams(window.location.search);
  if (sortOrder) {
    urlParams.set('sort_date', sortOrder);
  } else {
    urlParams.delete('sort_date');
  }
  window.location.search = urlParams.toString();
}

function filterByDepartment() {
  const department = document.getElementById('filter-department').value;
  const urlParams = new URLSearchParams(window.location.search);
  if (department) {
    urlParams.set('filter_department', department);
  } else {
    urlParams.delete('filter_department');
  }
  window.location.search = urlParams.toString();
}

function filterByStatus() {
  const status = document.getElementById('filter-status').value;
  const urlParams = new URLSearchParams(window.location.search);
  if (status) {
    urlParams.set('filter_status', status);
  } else {
    urlParams.delete('filter_status');
  }
  window.location.search = urlParams.toString();
}


</script>
          </div>

          
<div class="modal fade" id="approve_success" tabindex="-1" aria-labelledby="failModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-danger" id="failModalLabel">Approval Success</h5>
      </div>
      <div class="modal-body text-danger">
        Account Approved Successfully!
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="approve_failed" tabindex="-1" aria-labelledby="failModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-danger" id="failModalLabel">Approval Failed</h5>
      </div>
      <div class="modal-body text-danger">
        Oops! Error Approving account
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<!-- Add Status Modal -->
<div class="modal fade" id="addStatusModal" tabindex="-1" aria-labelledby="addStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStatusModalLabel">
          <?php
          // Display the appropriate title based on the addStatus value
          if ($addStatus == 'success') {
            echo 'Schedule Added Successfully';
          } elseif ($addStatus == 'fail') {
            echo 'Failed to Add Schedule';
          } elseif ($addStatus == 'uncompleteData') {
            echo 'Incomplete Data';
          }
          ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        // Display the appropriate message based on the addStatus value
        if ($addStatus == 'success') {
          echo 'The schedule has been successfully added to the database.';
        } elseif ($addStatus == 'fail') {
          echo 'There was an error adding the schedule. Please try again.';
        } elseif ($addStatus == 'uncompleteData') {
          echo 'Please fill in all required fields before submitting.';
        }
        ?>
      </div>
      <div class="modal-footer">
        <a href="schedules.php" class="btn btn-success">Close</a>
       
      </div>
    </div>
  </div>
</div>


<!-- editStatus Modal -->
<div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="addStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStatusModalLabel">
          <?php
          // Display the appropriate title based on the addStatus value
          if ($editStatus == 'success') {
            echo 'Schedule Edited Successfully';
          } elseif ($editStatus == 'fail') {
            echo 'Failed to Edit Schedule';
          }
          ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        // Display the appropriate message based on the addStatus value
        if ($editStatus == 'success') {
          echo 'The schedule has been successfully edited in the database.';
        } elseif ($editStatus == 'fail') {
          echo 'There was an error editing a schedule. Please try again.';
        }
        ?>
      </div>
      <div class="modal-footer">
        <a href="schedules.php" class="btn btn-success">Close</a>
       
      </div>
    </div>
  </div>
</div>


<!-- deleteStatus Modal -->
<div class="modal fade" id="deleteStatusModal" tabindex="-1" aria-labelledby="addStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStatusModalLabel">
          <?php
          // Display the appropriate title based on the addStatus value
          if ($deleteStatus == 'success') {
            echo 'Schedule Deleted Successfully';
          } elseif ($deleteStatus == 'fail') {
            echo 'Failed to Delete Schedule';
          }
          ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        // Display the appropriate message based on the addStatus value
        if ($deleteStatus == 'success') {
          echo 'The schedule has been successfully deleted in the database.';
        } elseif ($deleteStatus == 'fail') {
          echo 'There was an error deleting a schedule. Please try again.';
        }
        ?>
      </div>
      <div class="modal-footer">
        <a href="schedules.php" class="btn btn-success">Close</a>
       
      </div>
    </div>
  </div>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Check if the addStatus parameter exists
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('addStatus')) {
      const addStatusModal = new bootstrap.Modal(document.getElementById('addStatusModal'));
      addStatusModal.show();
    }else if(urlParams.has('editStatus')){
      const editStatusModal = new bootstrap.Modal(document.getElementById('editStatusModal'));
      editStatusModal.show();
    }else if(urlParams.has('deleteStatus')){
      const deleteStatusModal = new bootstrap.Modal(document.getElementById('deleteStatusModal'));
      deleteStatusModal.show();
    }
  });

</script>
              <!-- end sa code     -->
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

  
  
  
  
  <script>layout_change('light');</script>
  
  
  
  
  <script>change_box_container('false');</script>
  
  
  
  <script>layout_rtl_change('false');</script>
  
  
  <script>preset_change("preset-1");</script>
  
  
  <script>font_change("Public-Sans");</script>
  
    

</body>
<!-- [Body] end -->

</html>