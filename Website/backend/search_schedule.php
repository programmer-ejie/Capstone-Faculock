<?php
include('../db_connection/conn.php');
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

$output = '';
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<tr>";
    $output .= "<td>" . $row['course_code'] . "</td>";
    $output .= "<td>" . $row['course_number'] . "</td>";
    $output .= "<td>" . $row['units'] . "</td>";
    $output .= "<td>" . $row['faculty_teacher'] . "</td>";
    $output .= "<td>" . $row['subject_name'] . "</td>";
    $output .= "<td>" . $row['size'] . "</td>";
    $output .= "<td>" . $row['schedule'] . "</td>";
    $output .= "<td>" . $row['department'] . "</td>";
    $output .= "<td>" . $row['college'] . "</td>";
    $output .= '<td class="text-center">
      <button class="btn btn-primary btn-sm" style="border-radius: 5px;" data-bs-toggle="offcanvas" data-bs-target="#editScheduleOffcanvas' . $row['id'] . '">Edit</button>
      <button class="btn btn-danger btn-sm" style="border-radius: 5px;" data-bs-toggle="offcanvas" data-bs-target="#deleteScheduleOffcanvas' . $row['id'] . '">Delete</button>
    </td>';
    $output .= "</tr>";

    // Edit Offcanvas
    $output .= '
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

    // Delete Offcanvas
    $output .= '
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
  $output .= "<tr><td colspan='10' class='text-center' style = 'background-color: #e0414c; color: white; font-weight: bolder;'>No available data based on your search result.</td></tr>";
}
echo $output;

