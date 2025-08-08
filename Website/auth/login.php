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
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-7 col-xl-6 col-xxl-5">
          <div class="card mb-0">
            <div class="card-body">
             
              <p class="text-center fs-2 fw-bold"><b>Faculock System ( LOGIN )</b></p>
              <p class="text-center fs-4">Secure Faculty Login for Academic Access</p>
              <form action = "../backend/login.php" method = "post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label fs-4" style = "color:grey;">Username</label>
                  <input type="email" class="form-control fs-4" name = "faculty_gmail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your gmail">
                </div>
                <div class="mb-4 position-relative">
                  <label for="exampleInputPassword1" class="form-label fs-4" style="color:grey;">Password</label>
                  <input type="password" class="form-control fs-4" name = "faculty_password"  id="exampleInputPassword1" placeholder="Enter your password">
                  <!-- Eye icon to toggle password visibility -->
                  <i class="bi bi-eye-slash position-absolute" id="togglePassword" style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer; margin-top: 17px; font-size: 23px;"></i>
                </div>
              
                <div class="d-flex justify-content-center">
               
                <input type="submit" value = "Sign In" class="btn btn-primary w-50 py-2 fs-5 mb-4">
                </div>

                <div class="d-flex align-items-center justify-content-center">
                  <p class="fs-3 mb-0 fw-bold">New to Faculock System?</p>
                  <a class="text-primary fw-bold ms-2" href="register.php">Create an account</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modals -->

<div class="modal fade" id="noAccount" tabindex="-1" aria-labelledby="failModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-danger" id="failModalLabel">Login Failed</h5>
      </div>
      <div class="modal-body text-danger">
        Oops! No Faculty account has been found
      </div>
      <div class="modal-footer">
        <a href="login.php" class="btn btn-danger">Retry</a>
      </div>
    </div>
  </div>
</div>






<script>
  // Show modal if URL has ?success=true
  window.addEventListener('DOMContentLoaded', (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === "NoAccount") {
      const successModal = new bootstrap.Modal(document.getElementById('noAccount'));
      successModal.show();
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