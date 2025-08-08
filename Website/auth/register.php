<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FacuLock</title>
  <link rel="shortcut icon" type="image/png" href="../template/auth/assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../template/auth/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <form action="../backend/register.php" method = "post">
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-7 col-xl-6 col-xxl-5">
          <div class="card mb-0">
            <div class="card-body">
             
              <p class="text-center fs-2 fw-bold"><b>Faculock System ( SIGN UP )</b></p>
              <p class="text-center fs-4">Secure Faculty Signup for Academic Access</p>
              <form>
                <!-- Faculty Name field -->
                <div class="mb-3">
                  <label for="facultyName" class="form-label fs-4" style="color:grey;">Faculty Name</label>
                  <input type="text" class="form-control fs-4" name = "facultyName" id="facultyName" placeholder="Enter your Faculty Name">
                </div>

                <!-- Email (Gmail) input field -->
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label fs-4" style="color:grey;">Email Address</label>
                  <input type="email" class="form-control fs-4" name = "facultyGmail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Gmail address">
                </div>

                <!-- Password field with eye icon -->
                <div class="mb-4 position-relative">
                  <label for="exampleInputPassword1" class="form-label fs-4" style="color:grey;">Password</label>
                  <input type="password" class="form-control fs-5" name = "facultyPassoword"  id="exampleInputPassword1" placeholder="Enter your password">
                  <!-- Eye icon to toggle password visibility -->
                  <i class="bi bi-eye-slash position-absolute" id="togglePassword" style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer; margin-top: 17px; font-size: 23px;"></i>
                </div>
              
                <!-- Sign up button -->
                <div class="d-flex justify-content-center">
                  <input type="submit" value = "Sign Up" class="btn btn-primary w-50 py-2 fs-5 mb-4">
                </div>

                <!-- Already have an account -->
                <div class="d-flex align-items-center justify-content-center">
                  <p class="fs-3 mb-0 fw-bold">Already have an account?</p>
                  <a class="text-primary fw-bold ms-2" href="login.php">Log in</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </form>

  <!-- modals -->
    <!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-success" id="successModalLabel">Success!</h5>
      </div>
      <div class="modal-body">
        Faculty account created successfully.
      </div>
      <div class="modal-footer">
        <a href="login.php" class="btn btn-success">Proceed to Login</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="failModal" tabindex="-1" aria-labelledby="failModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-danger" id="failModalLabel">Registration Failed</h5>
      </div>
      <div class="modal-body text-danger">
        Oops! Faculty account could not be created. Please try again.
      </div>
      <div class="modal-footer">
        <a href="register.php" class="btn btn-danger">Retry</a>
      </div>
    </div>
  </div>
</div>


<script>
  // Show modal if URL has ?success=true
  window.addEventListener('DOMContentLoaded', (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('modelStatus') === 'true') {
      const successModal = new bootstrap.Modal(document.getElementById('successModal'));
      successModal.show();
    }else if(urlParams.get('modelStatus') === 'false'){
        const failModal = new bootstrap.Modal(document.getElementById('failModal'));
        failModal.show();
    }
  });
</script>

  <!-- end sa modals -->

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Toggle password visibility
  const togglePassword = document.getElementById('togglePassword');
  const passwordField = document.getElementById('exampleInputPassword1');

  togglePassword.addEventListener('click', function () {
    // Toggle the eye icon between open and closed
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;
    togglePassword.classList.toggle('bi-eye');
    togglePassword.classList.toggle('bi-eye-slash');
  });
</script>



  <script src="../template/auth/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../template/auth/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>