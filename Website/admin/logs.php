<?php
session_start();
include('../db_connection/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Logs | FacuLock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link rel="shortcut icon" type="image/png" href="../template/auth/assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="../template/admin/dist/assets/fonts/tabler-icons.min.css">
  <link rel="stylesheet" href="../template/admin/dist/assets/fonts/feather.css">
  <link rel="stylesheet" href="../template/admin/dist/assets/fonts/fontawesome.css">
  <link rel="stylesheet" href="../template/admin/dist/assets/fonts/material.css">
  <link rel="stylesheet" href="../template/admin/dist/assets/css/style.css">
  <link rel="stylesheet" href="../template/admin/dist/assets/css/style-preset.css">
</head>

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
              <span class="pc-mtext">User Notification</span>
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
  <!-- [ Sidebar Menu ] end -->

  <!-- [ Header Topbar ] start -->
  <header class="pc-header">
    <div class="header-wrapper">
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item header-user-profile">
            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button">
              <img src="../images/admin.webp" alt="user-image" class="user-avtar">
              <span>Administrator</span>
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <a href="../index.php" class="dropdown-item">
                <i class="ti ti-power"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <!-- [ Header Topbar ] end -->

  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Admin</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Logs</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <?php
        $sql = "SELECT * FROM logs ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $sqlUser = "SELECT * FROM users WHERE id = {$row['user_id']}";
            $resultUser = mysqli_query($conn, $sqlUser);
            $user = mysqli_fetch_assoc($resultUser);

            $notifDate = date("F j, Y, g:i a", strtotime($row['notif_date']));
        ?>
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <?php
                  if ($row['user_id'] == 0) {
                    echo '<img src="../images/admin.webp" alt="user-image" class="user-avtar" style = "width: 50px; height: 50px; border-radius: 50%; border: 1px solid grey;">';
                  } else {
                    if (empty($user['profile_pic']) || $user['profile_pic'] == "") {
                      echo '<img src="../images/user.avif" alt="user-image" class="user-avtar" style = "width: 50px; height: 50px; border-radius: 50%; border: 1px solid grey;">';
                    } else {
                      echo '<img src="../images/' . $user['profile_pic'] . '" alt="user-image" class="user-avtar" style = "width: 50px; height: 50px; border-radius: 50%; border: 1px solid grey;">';
                    }
                  }
                  ?>
                  <h6 class="mb-0" style = "margin-left: 20px;"><?php echo $row['header_title']; ?></h6>
                </div>
                <small class="text-muted"><?php echo $notifDate; ?></small>
              </div>
              <div class="card-body btn-page">
                <p><?php echo $row['message']; ?></p>
                <br>
                <small class="text-muted">- <?php echo ($row['user_id'] == 0) ? "Administrator Account" : $user['faculty_name']; ?></small>
              </div>
            </div>
        <?php
          }
        } else {
          echo '<p>No logs found.</p>';
        }
        ?>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
          <p class="m-0">Capstone Project &#9829; By IT301 6 Students</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="../template/admin/dist/assets/js/plugins/bootstrap.min.js"></script>
</body>

</html>