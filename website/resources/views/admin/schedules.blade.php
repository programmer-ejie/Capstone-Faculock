<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>FacuLock | Live Camera</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">
  <style>
    /* Sticky horizontal scrollbar at the top */
        .sticky-scrollbar-wrapper {
            position: sticky;
            top: 0;
            background: #f8f9fa;
            z-index: 10;
            padding-bottom: 2px;
        }
        .sticky-scrollbar {
            overflow-x: auto;
            overflow-y: hidden;
            width: 100%;
            height: 16px;
        }
        .sticky-scrollbar::-webkit-scrollbar {
            height: 12px;
        }
        .table-responsive {
            overflow-x: auto;
            white-space: nowrap;
        }
        .table th, .table td {
            white-space: nowrap;
            vertical-align: middle;
        }
  </style>

  <link rel="icon" href="{{ asset('template/admin/dist/assets/images/web_logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('landing_page/assets/img/apple-touch-icon.png') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<link rel="stylesheet" href="{{ asset('template/admin/dist/assets/fonts/tabler-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/admin/dist/assets/fonts/feather.css') }}">
<link rel="stylesheet" href="{{ asset('template/admin/dist/assets/fonts/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('template/admin/dist/assets/fonts/material.css') }}">
<link rel="stylesheet" href="{{ asset('template/admin/dist/assets/css/style.css') }}" id="main-style-link">
<link rel="stylesheet" href="{{ asset('template/admin/dist/assets/css/style-preset.css') }}">

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
      <a href="../dashboard/index.html" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="{{ asset('web_logo.png') }}" class="" style="width: 30px; height: 30px;"><span style = "color: black; font-weight: bolder; margin-left: 10px;">|  FacuLock System</span>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
            <a href="../dashboard/index.html" class="pc-link">
                <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                <span class="pc-mtext">Dashboard</span>
            </a>
            </li>

            <li class="pc-item pc-caption">
            <label>Function</label>
            <i class="ti ti-settings"></i>
            </li>
            <li class="pc-item">
            <a href="{{route('admin.livecamera')}}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-camera"></i></span> <!-- Camera icon -->
                <span class="pc-mtext">Live Camera</span>
            </a>
            </li>
            <li class="pc-item">
            <a href="{{route('admin.schedules')}}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-calendar"></i></span> <!-- Calendar icon -->
                <span class="pc-mtext">Schedules</span>
            </a>
            </li>
            <li class="pc-item">
            <a href="../elements/users.html" class="pc-link">
                <span class="pc-micon"><i class="ti ti-users"></i></span> <!-- Users icon -->
                <span class="pc-mtext">Users</span>
            </a>
            </li>
            <li class="pc-item">
            <a href="../elements/reports.html" class="pc-link">
                <span class="pc-micon"><i class="ti ti-report"></i></span> <!-- Reports icon -->
                <span class="pc-mtext">Reports</span>
            </a>
            </li>
            <li class="pc-item">
            <a href="../elements/settings.html" class="pc-link">
                <span class="pc-micon"><i class="ti ti-settings"></i></span> <!-- Settings icon -->
                <span class="pc-mtext">Settings</span>
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
      {{-- <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ti ti-mail"></i>
      </a> --}}
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
                  <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
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
                  <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar">
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
                  <img src="../assets/images/user/avatar-3.jpg" alt="user-image" class="user-avtar">
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
                  <img src="../assets/images/user/avatar-4.jpg" alt="user-image" class="user-avtar">
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
        <img src="{{ asset("admin_logo.jpeg") }}" alt="user-image" class="user-avtar">
        <span>Administrator</span>
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header">
          <div class="d-flex mb-1">
            <div class="flex-shrink-0">
              <img src="{{ asset("admin_logo.jpeg") }}" alt="user-image" class="user-avtar wid-35">
            </div>
            <div class="flex-grow-1 ms-3">
              <h6 class="mb-1">Administrator</h6>
              <span>Faculty Head</span>
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
              ><i class="ti ti-user"></i> Profile</button
            >
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="drp-t2"
              data-bs-toggle="tab"
              data-bs-target="#drp-tab-2"
              type="button"
              role="tab"
              aria-controls="drp-tab-2"
              aria-selected="false"
              ><i class="ti ti-settings"></i> Setting</button
            >
          </li>
        </ul>
        <div class="tab-content" id="mysrpTabContent">
          <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
            <a href="#!" class="dropdown-item">
              <i class="ti ti-edit-circle"></i>
              <span>Edit Profile</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-user"></i>
              <span>View Profile</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-clipboard-list"></i>
              <span>Social Profile</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-wallet"></i>
              <span>Billing</span>
            </a>
            <a href="#!" class="dropdown-item">
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
          
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Admin</a></li>
                <li class="breadcrumb-item" aria-current="page">Manage Schedules</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->




      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card">
           <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Manage Schedules</h5>
               <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addScheduleOffcanvas">
                    <i class="ti ti-plus"></i> Add Schedule
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="addScheduleOffcanvas" aria-labelledby="addScheduleOffcanvasLabel">
                    <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title fw-bold text-primary" id="addScheduleOffcanvasLabel">
                            <i class="ti ti-calendar-event me-2"></i> Add Schedule
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body px-4 py-3">
                        <form method="POST" action="{{ route('admin.schedules.store') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="course_code" class="form-label fw-semibold">Course Code</label>
                                <input type="text" class="form-control shadow-sm" id="course_code" name="course_code" required>
                                <div class="invalid-feedback">Please enter the course code.</div>
                            </div>
                            <div class="mb-3">
                                <label for="course_number" class="form-label fw-semibold">Course Number</label>
                                <input type="text" class="form-control shadow-sm" id="course_number" name="course_number" required>
                                <div class="invalid-feedback">Please enter the course number.</div>
                            </div>
                            <div class="mb-3">
                                <label for="units" class="form-label fw-semibold">Units</label>
                                <input type="number" class="form-control shadow-sm" id="units" name="units" min="1" required>
                                <div class="invalid-feedback">Please enter the number of units.</div>
                            </div>
                            <div class="mb-3">
                                <label for="faculty_teacher" class="form-label fw-semibold">Faculty Teacher</label>
                                <input type="text" class="form-control shadow-sm" id="faculty_teacher" name="faculty_teacher" required>
                                <div class="invalid-feedback">Please enter the faculty teacher's name.</div>
                            </div>
                            <div class="mb-3">
                                <label for="subject_name" class="form-label fw-semibold">Subject Name</label>
                                <input type="text" class="form-control shadow-sm" id="subject_name" name="subject_name" required>
                                <div class="invalid-feedback">Please enter the subject name.</div>
                            </div>
                            <div class="mb-3">
                                <label for="size" class="form-label fw-semibold">Class Size</label>
                                <input type="number" class="form-control shadow-sm" id="size" name="size" min="1" required>
                                <div class="invalid-feedback">Please enter the class size.</div>
                            </div>
                            <div class="mb-3">
                                <label for="schedule" class="form-label fw-semibold">Schedule</label>
                                <input type="text" class="form-control shadow-sm" id="schedule" name="schedule" required>
                                <div class="invalid-feedback">Please enter the schedule.</div>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label fw-semibold">Department</label>
                                <input type="text" class="form-control shadow-sm" id="department" name="department" required>
                                <div class="invalid-feedback">Please enter the department.</div>
                            </div>
                            <div class="mb-3">
                                <label for="college" class="form-label fw-semibold">College</label>
                                <input type="text" class="form-control shadow-sm" id="college" name="college" required>
                                <div class="invalid-feedback">Please enter the college.</div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-m shadow">
                                    <i class="ti ti-plus me-1"></i> Submit Schedule
                                </button>
                            </div>
                        </form>
                        <div class="alert alert-info mt-4" style="font-size: 0.95rem;">
                            <i class="ti ti-info-circle me-2"></i>
                            <b>Tip:</b> Please ensure all schedule details are correct before submitting.
                        </div>
                    </div>
                </div>
            </div>
           
              <div class="card-body">
                    <div class="table-responsive" id="main-table-scroll">
                        <table class="table table-hover table-borderless mb-0" style="font-size: 10px;" >
                            <thead class="table-secondary" class = "font-weight: bold;">
                                <tr>        
                                    <th>Course No.</th>
                                    <th>Descriptive Title</th>
                                    <th>Faculty</th>
                                    <th>Units</th>
                                    <th>Course Code</th>                                 
                                    <th>Schedule</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->course_number }}</td>
                                        <td>{{ $schedule->subject_name }}</td>
                                        <td>{{ $schedule->faculty_teacher }}</td>
                                        <td>{{ number_format($schedule->units, 1) }}</td>
                                        <td>{{ $schedule->course_code }}</td>
                                        <td>{{ $schedule->schedule }}</td>
                                                                    
                                       <td class="text-center">
                                            <!-- View Button -->
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="offcanvas" data-bs-target="#viewSchedule{{ $schedule->id }}" title="View">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <!-- Edit Button -->
                                            <a href="#" class="btn btn-success btn-sm" data-bs-toggle="offcanvas" data-bs-target="#editSchedule{{ $schedule->id }}" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="offcanvas" data-bs-target="#deleteSchedule{{ $schedule->id }}" title="Delete">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- View Schedule Offcanvas -->
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="viewSchedule{{ $schedule->id }}" aria-labelledby="viewScheduleLabel{{ $schedule->id }}">
                                        <div class="offcanvas-header border-bottom">
                                            <h5 class="offcanvas-title text-primary" id="viewScheduleLabel{{ $schedule->id }}">
                                                <i class="ti ti-eye me-2"></i> View Schedule
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body px-4 py-3">
                                            <form>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">Course Code</label>
                                                    <input type="text" class="form-control" value="{{ $schedule->course_code }}" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">Course Number</label>
                                                    <input type="text" class="form-control" value="{{ $schedule->course_number }}" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">Units</label>
                                                    <input type="text" class="form-control" value="{{ number_format($schedule->units, 1) }}" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">Faculty Teacher</label>
                                                    <input type="text" class="form-control" value="{{ $schedule->faculty_teacher }}" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">Subject Name</label>
                                                    <input type="text" class="form-control" value="{{ $schedule->subject_name }}" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">Class Size</label>
                                                    <input type="text" class="form-control" value="{{ $schedule->size }}" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">Schedule</label>
                                                    <input type="text" class="form-control" value="{{ $schedule->schedule }}" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">Department</label>
                                                    <input type="text" class="form-control" value="{{ $schedule->department }}" disabled>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label fw-semibold">College</label>
                                                    <input type="text" class="form-control" value="{{ $schedule->college }}" disabled>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Edit Schedule Offcanvas -->
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="editSchedule{{ $schedule->id }}" aria-labelledby="editScheduleLabel{{ $schedule->id }}">
                                        <div class="offcanvas-header border-bottom">
                                            <h5 class="offcanvas-title text-success" id="editScheduleLabel{{ $schedule->id }}">
                                                <i class="ti ti-edit me-2"></i> Edit Schedule
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body px-4 py-3">
                                            <form method="POST" action="{{ route('admin.schedules.update', $schedule->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Course Code</label>
                                                    <input type="text" class="form-control" name="course_code" value="{{ $schedule->course_code }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Course Number</label>
                                                    <input type="text" class="form-control" name="course_number" value="{{ $schedule->course_number }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Units</label>
                                                    <input type="number" class="form-control" name="units" value="{{ $schedule->units }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Faculty Teacher</label>
                                                    <input type="text" class="form-control" name="faculty_teacher" value="{{ $schedule->faculty_teacher }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Subject Name</label>
                                                    <input type="text" class="form-control" name="subject_name" value="{{ $schedule->subject_name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Class Size</label>
                                                    <input type="number" class="form-control" name="size" value="{{ $schedule->size }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Schedule</label>
                                                    <input type="text" class="form-control" name="schedule" value="{{ $schedule->schedule }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Department</label>
                                                    <input type="text" class="form-control" name="department" value="{{ $schedule->department }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">College</label>
                                                    <input type="text" class="form-control" name="college" value="{{ $schedule->college }}" required>
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="ti ti-check me-1"></i> Save Changes
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="alert alert-info mt-4" style="font-size: 0.95rem;">
                                                <i class="ti ti-info-circle me-2"></i>
                                                <b>Edit Tip:</b> Update schedule details and save changes.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Schedule Offcanvas -->
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="deleteSchedule{{ $schedule->id }}" aria-labelledby="deleteScheduleLabel{{ $schedule->id }}">
                                        <div class="offcanvas-header border-bottom">
                                            <h5 class="offcanvas-title text-danger" id="deleteScheduleLabel{{ $schedule->id }}">
                                                <i class="ti ti-trash me-2"></i> Confirm Schedule Deletion
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body d-flex flex-column justify-content-center text-center" style="min-height: 300px;">
                                            <div class="mb-4">
                                                <div class="text-danger mb-2">
                                                    <i class="ti ti-alert-triangle" style="font-size: 3rem;"></i>
                                                </div>
                                                <p class="fs-5 mb-1">Are you sure you want to delete this schedule?</p>
                                                <p class="text-muted small">This action cannot be undone.</p>
                                            </div>
                                            <form method="POST" action="{{ route('admin.schedules.delete', $schedule->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="ti ti-trash me-1"></i> Yes, Delete Schedule
                                                    </button>
                                                    <button type="button" class="btn btn-light border" data-bs-dismiss="offcanvas">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-danger fw-bold">No Schedule Data found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                          
                                                
                    </div>
                      <nav aria-label="Page navigation example" class="mt-3">
                                {{ $schedules->links('pagination::bootstrap-4') }}
                            </nav>
                </div>
            </div>
          </div>
        
        <!-- [ sample-page ] end -->
      </div>





      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->
 <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col-sm my-1">
                <p class="m-0 d-flex align-items-center" style="gap: 8px;">
                    <img src="{{ asset('template/admin/dist/assets/images/web_logo.png') }}" alt="SLSU Logo" style="height: 22px; width: 22px; object-fit: contain;">
                       <img src="{{ asset('template/admin/dist/assets/images/it.jpg') }}" alt="SLSU Logo" style="height: 22px; width: 22px; object-fit: contain; border-radius: 50%;">
                    <span class="fw-bold">SLSU - Tomas Oppus</span>
                    <span class="mx-2">|</span>
                    <span>&copy; {{ date('Y') }} - FacuLock System</span>
                    <span class="text-muted ms-2" style="font-size: 0.95rem;"> | Republic Act 10931</span>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- [Page Specific JS] start -->
<script src="{{ asset('template/admin/dist/assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/admin/dist/assets/js/pages/dashboard-default.js') }}"></script>
<!-- [Page Specific JS] end -->

<!-- Required Js -->
<script src="{{ asset('template/admin/dist/assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('template/admin/dist/assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('template/admin/dist/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/admin/dist/assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('template/admin/dist/assets/js/pcoded.js') }}"></script>
<script src="{{ asset('template/admin/dist/assets/js/plugins/feather.min.js') }}"></script>





<script>layout_change('light');</script>




<script>change_box_container('false');</script>



<script>layout_rtl_change('false');</script>


<script>preset_change("preset-1");</script>


<script>font_change("Public-Sans");</script>

    

  
</body>
<!-- [Body] end -->

</html>