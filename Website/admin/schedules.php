<?php
include('../db_connection/conn.php');

$addStatus = '';
if (isset($_GET['addStatus'])) {
    $addStatus = $_GET['addStatus'];
}
$editStatus = '';
if (isset($_GET['editStatus'])) {
    $editStatus = $_GET['editStatus'];
}
$deleteStatus = '';
if (isset($_GET['deleteStatus'])) {
    $deleteStatus = $_GET['deleteStatus'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Schedules | FacuLock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">
  <link href="https://cdn.jsdelivr.net/npm/tabler-icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="../template/admin/dist/assets/images/web_logo.png" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  <link rel="stylesheet" href="../template/admin/dist/assets/fonts/tabler-icons.min.css" >
  <link rel="stylesheet" href="../template/admin/dist/assets/fonts/feather.css" >
  <link rel="stylesheet" href="../template/admin/dist/assets/fonts/fontawesome.css" >
  <link rel="stylesheet" href="../template/admin/dist/assets/fonts/material.css" >
  <link rel="stylesheet" href="../template/admin/dist/assets/css/style.css" id="main-style-link" >
  <link rel="stylesheet" href="../template/admin/dist/assets/css/style-preset.css" >
  <link href="https://cdn.jsdelivr.net/npm/@tabler/icons@1.77.0/font/css/tabler-icons.min.css" rel="stylesheet">

</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
     <div class="m-header">
      <a href="livecamera.php" class="logo d-flex align-items-center me-auto" style="text-decoration: none;">
        <img src="../template/admin/dist/assets/images/web_logo.png" alt="Faculock Logo" style="height: 30px; margin-right: 8px;">
        <span style = "font-size: 16px; font-weight: bolder; color: grey;" ><strong> | </strong> FacuLock System</span><hr>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
      <li class="pc-item">
        <a href="livecamera.php" class="pc-link">
          <span class="pc-micon"><i class="ti ti-camera"></i></span>
          <span class="pc-mtext">Live Camera</span>
        </a>
      </li>
      <li class="pc-item">
        <a href="dashboard.php" class="pc-link">
          <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
          <span class="pc-mtext">Dashboard</span>
        </a>
      </li>
      <li class="pc-item pc-caption">
        <label>System Functions</label>
        <i class="ti ti-settings"></i>
      </li>
      <li class="pc-item">
        <a href="accounts.php" class="pc-link">
          <span class="pc-micon"><i class="ti ti-users"></i></span>
          <span class="pc-mtext">Accounts</span>
        </a>
      </li>
      <li class="pc-item">
        <a href="schedules.php" class="pc-link">
          <span class="pc-micon"><i class="ti ti-calendar"></i></span>
          <span class="pc-mtext">Schedules</span>
        </a>
      </li>
      <li class="pc-item">
        <a href="notification.php" class="pc-link">
          <span class="pc-micon"><i class="ti ti-bell"></i></span>
          <span class="pc-mtext">User  Notification</span>
        </a>
      </li>
      <li class="pc-item">
        <a href="logs.php" class="pc-link">
          <span class="pc-micon"><i class="ti ti-file"></i></span>
          <span class="pc-mtext">Logs</span>
        </a>
      </li>
      </ul>
    </div>
  </div>
</nav>
<header class="pc-header">
  <div class="header-wrapper">
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
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
  <!-- Mobile search -->
    <li class="dropdown pc-h-item d-inline-flex d-md-none">
      <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <i class="ti ti-search"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <div class="px-3">
          <div class="form-group mb-0 d-flex align-items-center">
            <i data-feather="search"></i>
            <input type="search" name="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
          </div>
        </div>
      </div>
    </li>

    <!-- Desktop search -->
    <li class="pc-h-item d-none d-md-inline-flex">
      <div class="header-search">
        <i data-feather="search" class="icon-search"></i>
        <input type="search" name="search" class="form-control" placeholder="Search here. . ." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
      </div>
    </li>
  </ul>
</div>
<div class="ms-auto">
  <ul class="list-unstyled">
    <li class="dropdown pc-h-item">
      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
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
      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
        <img src="../template/admin/dist/assets/images/it.jpg" alt="user-image" class="user-avtar">
        <span>Administrator</span>
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header">
          <div class="d-flex mb-1">
            <div class="flex-shrink-0">
              <img src="../template/admin/dist/assets/images/it.jpg" alt="user-image" class="user-avtar wid-35">
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
            <button class="nav-link active" id="drp-t1" data-bs-toggle="tab" data-bs-target="#drp-tab-1" type="button" role="tab" aria-controls="drp-tab-1" aria-selected="true"><i class="ti ti-bolt"></i> Shortcuts</button>
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
<div class="pc-container">
  <div class="pc-content">
    <div class="row">
      <div class="col-xxl-12 col-md-12">
        <div class="card">
          <div class="card-header">
              <h5>Teacher Schedule Table</h5>
              <small>Manage and organize teacher schedules efficiently using the table below.</small>
              <div class="row g-2 justify-content-end align-items-center mt-2">
                <div class="col-12 col-sm-auto">
                  <select id="sort-date" class="form-select " style="width: 100%;" onchange="sortByDate()">
                    <option value="" <?php echo (!isset($_GET['sort_date']) ? 'selected' : ''); ?>>Sort by Date</option>
                    <option value="ASC" <?php echo (isset($_GET['sort_date']) && $_GET['sort_date'] == 'ASC' ? 'selected' : ''); ?>>Oldest First</option>
                    <option value="DESC" <?php echo (isset($_GET['sort_date']) && $_GET['sort_date'] == 'DESC' ? 'selected' : ''); ?>>Newest First</option>
                  </select>
                </div>
                <div class="col-12 col-sm-auto">
                  <select id="filter-department" class="form-select " style="width: 100%;" onchange="filterByDepartment()">
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
                </div>
                <script>
                  function filterByDepartment() {
                    const dept = document.getElementById('filter-department').value;
                    const params = new URLSearchParams(window.location.search);
                    params.set('filter_department', dept);
                    params.set('page', 1);
                    window.location.search = params.toString();
                  }
                  function sortByDate() {
                    const sort = document.getElementById('sort-date').value;
                    const params = new URLSearchParams(window.location.search);
                    params.set('sort_date', sort);
                    params.set('page', 1);
                    window.location.search = params.toString();
                  }
                </script>
                <div class="col-12 col-sm-auto">
                  <button class="btn btn-success w-100" style="border-radius: 5px; padding: 10px 10px;" data-bs-toggle="offcanvas" data-bs-target="#addScheduleOffcanvas">
                    Add Schedule
                  </button>
                </div>
              </div>
            </div>
          <div class="card-body">
            <style>
              #left-right-fix {
                table-layout: auto;
                width: 100%;
              }
              #left-right-fix th, #left-right-fix td {
                white-space: nowrap;
                vertical-align: middle;
              }
              .card-body {
                overflow-x: auto;
              }
            </style>
            <?php
              $limit = 5;
              $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
              $offset = ($page - 1) * $limit;
              $count_sql = "SELECT COUNT(*) as total FROM schedules WHERE id IS NOT NULL";
              $sql = "SELECT * FROM schedules WHERE id IS NOT NULL";
              if (isset($_GET['filter_department']) && !empty($_GET['filter_department'])) {
                $filter_department = mysqli_real_escape_string($conn, $_GET['filter_department']);
                $count_sql .= " AND department = '$filter_department'";
                $sql .= " AND department = '$filter_department'";
              }
              if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = mysqli_real_escape_string($conn, $_GET['search']);
                $search_sql = " AND (
                  course_code LIKE '%$search%' OR
                  course_number LIKE '%$search%' OR
                  faculty_teacher LIKE '%$search%' OR
                  subject_name LIKE '%$search%' OR
                  department LIKE '%$search%' OR
                  college LIKE '%$search%'
                )";
                $count_sql .= $search_sql;
                $sql .= $search_sql;
              }
              if (isset($_GET['sort_date']) && in_array($_GET['sort_date'], ['ASC', 'DESC'])) {
                $sort_date = $_GET['sort_date'];
                $sql .= " ORDER BY date_created $sort_date";
              } else {
                $sql .= " ORDER BY schedule ASC";
              }
              $sql .= " LIMIT $limit OFFSET $offset";
              $result = mysqli_query($conn, $sql);
              $count_result = mysqli_query($conn, $count_sql);
              $total_rows = mysqli_fetch_assoc($count_result)['total'];
              $total_pages = ceil($total_rows / $limit);
            ?>
            <div class="card-body">
              <style>
                #left-right-fix {
                  table-layout: auto;
                  width: 100%;
                }
                #left-right-fix th, #left-right-fix td {
                  white-space: nowrap;
                  vertical-align: middle;
                }
                .card-body {
                  overflow-x: auto;
                }
              </style>
              <div class="d-flex flex-wrap align-items-center mb-3">
                <nav aria-label="Page navigation example" class="me-auto">
                  <ul class="pagination mb-0">
                    <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
                      <a class="page-link"
                        href="?<?php
                          $params = $_GET;
                          $params['page'] = $page - 1;
                          echo http_build_query($params);
                        ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                      <li class="page-item <?php if($i == $page) echo 'active'; ?>">
                        <a class="page-link"
                          href="?<?php
                            $params = $_GET;
                            $params['page'] = $i;
                            echo http_build_query($params);
                          ?>">
                          <?php echo $i; ?>
                        </a>
                      </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>">
                      <a class="page-link"
                        href="?<?php
                          $params = $_GET;
                          $params['page'] = $page + 1;
                          echo http_build_query($params);
                        ?>"
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
              <table id="left-right-fix" class="table stripe row-border order-column">
                <thead class="table-secondary">
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
                                <button class="btn btn-primary btn-sm" style="border-radius: 5px;" data-bs-toggle="offcanvas" data-bs-target="#editScheduleOffcanvas' . $row['id'] . '">Edit</button>
                                <button class="btn btn-danger btn-sm" style="border-radius: 5px;" data-bs-toggle="offcanvas" data-bs-target="#deleteScheduleOffcanvas' . $row['id'] . '">Delete</button>
                              </td>';
                        echo "</tr>";
                        echo '
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="editScheduleOffcanvas' . $row['id'] . '" aria-labelledby="editScheduleOffcanvasLabel' . $row['id'] . '">
                          <div class="offcanvas-header border-bottom">
                            <h5 class="offcanvas-title" id="editScheduleOffcanvasLabel' . $row['id'] . '">
                              <i class="ti ti-edit me-2 text-primary"></i> Edit Schedule
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body px-4 py-3">
                            <form action="../backend/edit_schedule.php" method="POST" novalidate>
                              <input type="hidden" name="id" value="' . $row['id'] . '">
                              <input type="hidden" name="filter_department" value="' . (isset($_GET['filter_department']) ? $_GET['filter_department'] : '') . '">
                              <input type="hidden" name="sort_date" value="' . (isset($_GET['sort_date']) ? $_GET['sort_date'] : '') . '">
                              <input type="hidden" name="page" value="' . $page . '">
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label class="form-label fw-semibold">Course Code</label>
                                  <input type="text" class="form-control" name="course_code" value="' . $row['course_code'] . '" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label class="form-label fw-semibold">Course Number</label>
                                  <input type="text" class="form-control" name="course_number" value="' . $row['course_number'] . '" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label class="form-label fw-semibold">Units</label>
                                  <input type="number" class="form-control" name="units" value="' . $row['units'] . '" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label class="form-label fw-semibold">Faculty Teacher</label>
                                  <input type="text" class="form-control" name="faculty_teacher" value="' . $row['faculty_teacher'] . '" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label class="form-label fw-semibold">Subject Name</label>
                                  <input type="text" class="form-control" name="subject_name" value="' . $row['subject_name'] . '" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label class="form-label fw-semibold">Size</label>
                                  <input type="number" class="form-control" name="size" value="' . $row['size'] . '" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12 mb-3">
                                  <label class="form-label fw-semibold">Schedule</label>
                                  <input type="text" class="form-control" name="schedule" value="' . $row['schedule'] . '" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label class="form-label fw-semibold">Department</label>
                                  <input type="text" class="form-control" name="department" value="' . $row['department'] . '" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label class="form-label fw-semibold">College</label>
                                  <input type="text" class="form-control" name="college" value="' . $row['college'] . '" required>
                                </div>
                              </div>
                              <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                  <i class="ti ti-check me-1"></i> Save Changes
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>';
                        echo '
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="deleteScheduleOffcanvas' . $row['id'] . '" aria-labelledby="deleteScheduleOffcanvasLabel' . $row['id'] . '">
                          <div class="offcanvas-header border-bottom">
                            <h5 class="offcanvas-title text-danger" id="deleteScheduleOffcanvasLabel' . $row['id'] . '">
                              <i class="ti ti-trash me-2"></i> Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body d-flex flex-column justify-content-center text-center" style="min-height: 300px;">
                            <div class="mb-4">
                              <div class="text-danger mb-2">
                                <i class="ti ti-alert-triangle" style="font-size: 3rem;"></i>
                              </div>
                              <p class="fs-5 mb-1">Are you sure you want to delete this schedule?</p>
                              <h6 class="fw-bold text-dark">"' . $row['faculty_teacher'] . '"</h6>
                              <p class="text-muted small">This action cannot be undone.</p>
                            </div>
                            <div class="d-grid gap-2">
                              <a href="../backend/delete_schedule.php?id=' . $row['id'] . '&filter_department=' . (isset($_GET['filter_department']) ? $_GET['filter_department'] : '') . '&sort_date=' . (isset($_GET['sort_date']) ? $_GET['sort_date'] : '') . '&page=' . $page . '" class="btn btn-danger">
                                <i class="ti ti-trash me-1"></i> Yes, Delete Permanently
                              </a>
                              <button type="button" class="btn btn-light border" data-bs-dismiss="offcanvas">
                                Cancel
                              </button>
                            </div>
                          </div>
                        </div>';
                      }
                    } else {
                      echo "<tr><td colspan='10' class='text-center text-danger'>No available data based on your search result.</td></tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addScheduleOffcanvas" aria-labelledby="addScheduleOffcanvasLabel">
      <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="addScheduleOffcanvasLabel">
          <i class="ti ti-calendar-plus me-2 text-success"></i> Add New Schedule
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body px-4 py-3">
        <form action="../backend/add_schedule.php" method="POST" novalidate>
          <input type="hidden" name="filter_department" value="<?php echo isset($_GET['filter_department']) ? $_GET['filter_department'] : ''; ?>">
          <input type="hidden" name="sort_date" value="<?php echo isset($_GET['sort_date']) ? $_GET['sort_date'] : ''; ?>">
          <input type="hidden" name="page" value="<?php echo $page; ?>">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Course Code</label>
              <input type="text" class="form-control" name="course_code" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Course Number</label>
              <input type="text" class="form-control" name="course_number" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Units</label>
              <input type="number" class="form-control" name="units" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Faculty Teacher</label>
              <input type="text" class="form-control" name="faculty_teacher" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Subject Name</label>
              <input type="text" class="form-control" name="subject_name" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Size</label>
              <input type="number" class="form-control" name="size" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label fw-semibold">Schedule</label>
              <input type="text" class="form-control" name="schedule" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Department</label>
              <input type="text" class="form-control" name="department" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">College</label>
              <input type="text" class="form-control" name="college" required>
            </div>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-success">
              <i class="ti ti-check me-1"></i> Add Schedule
            </button>
          </div>
        </form>
      </div>
    </div>
    <footer class="pc-footer" style=" padding: 15px 0;">
      <div class="footer-wrapper container-fluid">
        <div class="row align-items-center text-center text-sm-start">
          <div class="col-sm d-flex align-items-center justify-content-center justify-content-sm-start mb-2 mb-sm-0" style="gap: 10px;">
            <img src="../template/admin/dist/assets/images/web_logo.png" alt="SLSU Logo" style="height: 26px; width: 26px; object-fit: contain;">
            <img src="../template/admin/dist/assets/images/it.jpg" alt="IT Logo" style="height: 26px; width: 26px; object-fit: cover; border-radius: 50%;">
            <span class="fw-bold" style="font-size: 0.95rem;">SLSU - Tomas Oppus</span>
          </div>
          <div class="col-sm-auto d-none d-sm-flex justify-content-center">
            <span style="color: #777;">|</span>
          </div>
          <div class="col-sm d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-end" style="gap: 8px;">
            <span>&copy; <?php echo date('Y'); ?> - Capstone Project @ 2025</span>
            <span class="text-muted" style="font-size: 0.9rem;">Republic Act 10931</span>
          </div>
        </div>
      </div>
    </footer>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
        var searchInputs = document.querySelectorAll('input[name="search"]');
        var debounceTimer;
        searchInputs.forEach(function(input) {
          input.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function() {
              const params = new URLSearchParams(window.location.search);
              params.set('search', input.value);
              params.set('page', 1);
              fetch('../backend/search_schedule.php?' + params.toString())
                .then(response => response.text())
                .then(html => {
                  document.getElementById('schedule-table-body').innerHTML = html;
                });
            }, 300);
          });
        });
      });
      </script>
    <script src="../template/admin/dist/assets/js/plugins/apexcharts.min.js"></script>
    <script src="../template/admin/dist/assets/js/pages/dashboard-default.js"></script>
    <script src="../template/admin/dist/assets/js/plugins/popper.min.js"></script>
    <script src="../template/admin/dist/assets/js/plugins/simplebar.min.js"></script>
    <script src="../template/admin/dist/assets/js/plugins/bootstrap.min.js"></script>
    <script src="../template/admin/dist/assets/js/fonts/custom-font.js"></script>
    <script src="../template/admin/dist/assets/js/pcoded.js"></script>
    <script src="../template/admin/dist/assets/js/plugins/feather.min.js"></script>
    <script>layout_change('light');</script>