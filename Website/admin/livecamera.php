<?php
  include('../db_connection/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Live Camera | FacuLock</title>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


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
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Admin</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Live Camera</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- Start Live Camera Section -->
        <div class="col-xxl-12">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Live Camera Face Recognition</h5>

              <!-- Camera source dropdown -->
              <select id="cameraSource" class="form-select" style="width: auto;">
                <option value="builtin" selected>Built-in Camera</option>
                <option value="esp32">ESP32 Camera</option>
              </select>
            </div>
         <div class="card-body pc-component">
                  <div class="row align-items-center">

                  <!-- Left Side: Camera -->
                <div class="col-6 d-flex justify-content-center align-items-center">
                  <div class="d-flex flex-column align-items-center justify-content-center"
                      style="background: #ffffff;
                              border-radius: 10px; 
                              padding: 10px; 
                              box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                              width: 100%;
                              height: 100%;">

                    <div style="max-width: 320px; width: 100%;">
                      <!-- Built-in Camera -->
                      <video id="builtinCamera" autoplay playsinline
                            style="border: 1px solid #ddd; transform: scaleX(-1); width: 100%; height: auto; display: none;"></video>

                      <!-- ESP32 Camera -->
                      <img id="esp32Camera"
                          crossorigin="anonymous"
                          style="border: 1px solid #ddd; transform: scaleX(-1); width: 100%; height: auto; display: none;" />
                    </div>

                    <style>
                      #esp32Camera {
                            min-height: 200px; 
                            min-width: 200px;
                            background-color: #f0f0f0; 
                            display: block; 
                          }

                        #builtinCamera {
                            min-height: 200px; 
                            min-width: 200px;
                            background-color: #f0f0f0; 
                            display: block; 
                          }
                    </style>

                    <p class="text-muted mt-2">Ensure your browser has access to the camera.</p>
                    <canvas id="capturedFrame" class="d-none"></canvas>
                  </div>
                </div>


                                <!-- Right Side: Countdown, Display, Button -->
                <div class="col-6 d-flex justify-content-center align-items-center">
                  <div class="d-flex flex-column justify-content-center align-items-center text-center"
                      style="background: #ffffff;
                              border-radius: 10px; 
                              padding: 20px; 
                              box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                              width: 100%;
                              height: 100%;">

                    <!-- Countdown (hidden until start) -->
                  <div id="countdown"
                      style="font-size: 4rem; 
                            font-weight: bold; 
                            color: #dc3545; 
                            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
                            margin-bottom: 15px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            gap: 10px;">
                    <i class="bi bi-stopwatch" style="font-size: 3rem; color: #6c757d;"></i>
                    <span id="countdownNumber">5</span>
                  </div>


                  <style>
                    @keyframes countdownZoom {
                      0% { transform: scale(1); opacity: 1; }
                      50% { transform: scale(1.5); opacity: 0.8; }
                      100% { transform: scale(1); opacity: 1; }
                    }
                    #countdown.animate {
                      animation: countdownZoom 1s ease-in-out;
                    }
                  </style>


                    <!-- Placeholder before countdown -->
                    <div id="countdownPlaceholder"
                        style="font-size: 1.2rem; 
                              color: #6c757d; 
                            ">
                      ⏳ Ready to start face recognition?
                    </div>

                    <!-- Prediction result -->
                    <p id="predictionResult" class="mt-3 text-primary" 
                      style="font-weight: 500;"></p>
                    <hr style="width: 100%;">

                    <!-- Start button -->
                    <button id="startButton" class="btn btn-primary btn-lg mt-auto" style="width: 100%;">
                      🚀 Start Countdown
                    </button>
                  </div>
                </div>

                

              </div>
            </div>



              <script>
                const builtinCamera = document.getElementById('builtinCamera');
                const esp32Camera = document.getElementById('esp32Camera');
                const cameraSource = document.getElementById('cameraSource');

                const esp32URL = 'http://192.168.0.103/frame.jpg';
                const refreshRate = 100;
                let esp32Interval = null;
                let builtinStream = null;

                async function startBuiltinCamera() {
                  stopESP32Camera();
                  try {
                    builtinStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
                    builtinCamera.srcObject = builtinStream;
                    builtinCamera.style.display = 'block';
                    esp32Camera.style.display = 'none';
                  } catch (err) {
                    alert("Error accessing built-in camera: " + err.message);
                  }
                }

                function stopBuiltinCamera() {
                  if (builtinStream) {
                    builtinStream.getTracks().forEach(track => track.stop());
                    builtinStream = null;
                  }
                  builtinCamera.style.display = 'none';
                }

                function startESP32Camera() {
                  stopBuiltinCamera();
                  esp32Camera.style.display = 'block';
                  builtinCamera.style.display = 'none';
                  function updateFrame() {
                    esp32Camera.src = esp32URL + '?t=' + Date.now();
                  }
                  updateFrame();
                  esp32Interval = setInterval(updateFrame, refreshRate);
                }

                function stopESP32Camera() {
                  if (esp32Interval) {
                    clearInterval(esp32Interval);
                    esp32Interval = null;
                  }
                  esp32Camera.style.display = 'none';
                }

                // Switch camera source on dropdown change
                cameraSource.addEventListener('change', () => {
                  if (cameraSource.value === 'builtin') {
                    startBuiltinCamera();
                  } else {
                    startESP32Camera();
                  }
                });

                // Start with Built-in Camera by default
                startBuiltinCamera();
              </script>

          </div>
        </div>
        <!-- End Live Camera Section -->
      </div>

      <script>
        async function pollForTrigger() {
          try {
            const response = await fetch("http://192.168.0.101/shouldStart"); // Replace with actual ESP32 IP
            const text = await response.text();
            if (text === "1") {
              document.getElementById("startButton").click();
              console.log("Start button clicked by ESP32!");
            }
          } catch (err) {
            console.error("Polling error:", err);
          }
        }

        setInterval(pollForTrigger, 200); // Poll every second
      </script>



  
      <script>
  const videoElement = document.getElementById('liveCamera');
const canvas = document.getElementById('capturedFrame');
const context = canvas.getContext('2d');
const predictionResult = document.getElementById('predictionResult');
const startButton = document.getElementById('startButton');
const countdownDisplay = document.getElementById('countdown');

startButton.addEventListener('click', () => {
    startCountdown();
});

const countdownNumber = document.getElementById('countdownNumber');

function startCountdown() {
    let countdown = 5;
    countdownNumber.textContent = countdown;

    startButton.disabled = true;
    startButton.classList.remove('btn-primary');
    startButton.classList.add('btn-secondary');

    const countdownInterval = setInterval(() => {
        countdown--;
        countdownNumber.textContent = countdown;

        countdownNumber.classList.remove('animate');
        void countdownNumber.offsetWidth;
        countdownNumber.classList.add('animate');

        if (countdown === 0) {
            clearInterval(countdownInterval);

            // Show result
            predictionResult.textContent = "✅ Face recognized!"; // Example
            predictionResult.style.color = "green";

            // After showing result, reset countdown to "#"
            setTimeout(() => {
                countdownNumber.textContent = "#";
                startButton.disabled = false;
                startButton.classList.remove('btn-secondary');
                startButton.classList.add('btn-primary');
            }, 1500); // Delay so user sees result before reset

            captureFrame();
        }
    }, 1000);
}

   function fetchRelay() {
                    fetch('http://192.168.0.101/open')
                        .then(response => response.text())
                        .then(data => {
                            console.log('ESP32 response:', data);
                            if (data !== 'Relay activated') {
                                fetchRelay(); 
                            }
                        })
                        .catch(() => setTimeout(fetchRelay, 10000));
                }

       function sendRemainingSeconds(remainingSeconds) {
                    fetch("http://192.168.0.101/setRemainingSeconds", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ remainingSeconds: remainingSeconds })
                    })
                    .then(res => res.text())
                    .then(response => console.log("Server response:", response))
                    .catch(() => setTimeout(sendRemainingSeconds, 10000));
                }

   let deniedBeepSent = false;
    function sendDeniedBeep() {
      if (deniedBeepSent) return;  // Prevent multiple calls

      deniedBeepSent = true;

      fetch("http://192.168.0.101/deniedBeep")
        .then(res => res.text())
        .then(response => {
          console.log("Denied beep response:", response);
        })
        .catch(error => {
          console.error("Denied beep fetch error:", error);
        });
    }


async function waitForImageLoadWithStatus(imgElement, timeout = 5000) {
  return new Promise((resolve, reject) => {
    let settled = false; // Flag to track if already resolved/rejected

    if (imgElement.complete && imgElement.naturalWidth > 0) {
      resolve();
      return;
    }

    predictionResult.textContent = 'Getting the image...';

    const downloadingTimeout = setTimeout(() => {
      if (!settled) {
        predictionResult.textContent = 'Downloading the image...';
      }
    }, 500);

    const timer = setTimeout(() => {
      if (!settled) {
        settled = true;
        imgElement.onload = null;
        imgElement.onerror = null;
        clearTimeout(downloadingTimeout);
        predictionResult.textContent = 'Status: Image load timeout. Restarting...';
        reject(new Error('Image load timeout'));
      }
    }, timeout);

    imgElement.onload = () => {
      if (!settled) {
        settled = true;
        clearTimeout(timer);
        clearTimeout(downloadingTimeout);
        // Don't set success text here, let caller handle it
        resolve();
      }
    };

    imgElement.onerror = () => {
      if (!settled) {
        settled = true;
        clearTimeout(timer);
        clearTimeout(downloadingTimeout);
        predictionResult.textContent = 'Status: Failed to load image. Restarting...';
        reject(new Error('Image failed to load'));
      }
    };
  });
}



async function captureFrame() {
   

   // Detect which camera feed is active
  const camElement = builtinCamera.style.display !== 'none' ? builtinCamera : esp32Camera;

  // Check if feed is ready
  const isVideoReady = camElement.tagName === 'VIDEO' && camElement.readyState >= 2;
  const isImageReady = camElement.tagName === 'IMG' && camElement.complete && camElement.naturalWidth > 0;

  if (!isVideoReady && camElement.tagName === 'IMG' && !isImageReady) {
    try {
      await waitForImageLoadWithStatus(camElement);
    } catch (error) {
      console.warn('Image load failed, restarting captureFrame...');
      // Wait a bit before retrying to avoid tight loop
      await new Promise(r => setTimeout(r, 1000));
      return captureFrame(); // Retry recursively
    }
  } else if (!isVideoReady && !isImageReady) {
    predictionResult.textContent = 'Status: Camera Is Not Ready';
    console.warn('Camera not ready for capture.');
    resetButton();
    return;
  }

   predictionResult.textContent = 'Scanning...';

  try {
    // Set canvas dimensions to match the camera feed
    canvas.width = camElement.videoWidth || camElement.naturalWidth;
    canvas.height = camElement.videoHeight || camElement.naturalHeight;

    // Draw the current frame onto the canvas
    context.drawImage(camElement, 0, 0, canvas.width, canvas.height);

    // Convert frame to Base64 JPEG
    const imageData = canvas.toDataURL('image/jpeg');

    // Send frame to backend
    const response = await fetch('../backend/process_faceframe.php', {
        method: 'POST',
        body: JSON.stringify({ image: imageData }),
        headers: { 'Content-Type': 'application/json' }
    });

    const data = await response.json();

    // Show entire data object for debugging
    console.log('Face frame response data:', data);
    predictionResult.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;

    if (!data.prediction || data.prediction.length === 0) {
        predictionResult.innerHTML = `
               <strong>Status:</strong> Access Denied ❌
            `;
            // <br>
        sendDeniedBeep();
        resetButton();
        return;
    }

    const result = data.prediction[0];
    const label = result.label;
    const confidence = result.confidence.toFixed(2);

    if (label.toLowerCase() !== 'unauthorized') {
        const scheduleResponse = await fetch('../backend/check_schedule.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name: label }),
        });

        const scheduleData = await scheduleResponse.json();

        // Log and display schedule data for debugging
        console.log('Schedule check response:', scheduleData);
        predictionResult.innerHTML = `<pre>${JSON.stringify(scheduleData, null, 2)}</pre>`;

        if (scheduleData.status === 'granted') {
            const now = new Date();
            const endTimeStr = scheduleData.time.split(' - ')[1]; // "08:30 PM"

            const [endHourMin, period] = endTimeStr.split(' ');
            let [endHour, endMin] = endHourMin.split(':').map(Number);

            if (period === 'PM' && endHour !== 12) endHour += 12;
            if (period === 'AM' && endHour === 12) endHour = 0;

            const endTime = new Date(now);
            endTime.setHours(endHour, endMin, 0, 0);

            const diffMs = endTime - now;
            const remainingSeconds = diffMs > 0 ? Math.floor(diffMs / 1000) : 0;

            sendRemainingSeconds(remainingSeconds);

            predictionResult.innerHTML = `
                <strong>Status:</strong> Access Granted ✅<br>
            
            `;

                // <strong>Faculty:</strong> ${label}<br>
                // <strong>Confidence:</strong> ${confidence}<br>
                // <strong>Room:</strong> ${scheduleData.room}<br>
                // <strong>Time:</strong> ${scheduleData.time}<br>

            fetchRelay();

        } else {
            predictionResult.innerHTML = `
                <strong>Status:</strong> Access Denied ❌<br> 
               
            `;

            //  <em>error 2: Schedule not granted</em><br>
            //     <em>Message: ${scheduleData.message || 'No message'}</em>
            sendDeniedBeep();
        }

    } else {
        predictionResult.innerHTML = `<strong>Status:</strong> Access Denied ❌`;

        // <br>
        //   <em>error 3: Unauthorized individual</em>
        sendDeniedBeep();
    }

} catch (error) {
    console.error('Error in captureFrame:', error);
    predictionResult.innerHTML = `<strong>Status:</strong> Access Denied ❌`;
    // <br>
    // <em>error 4: ${error.message || error}</em>
    sendDeniedBeep();
}


    resetButton();
}

function resetButton() {
    startButton.disabled = false;
    startButton.classList.remove('btn-secondary');
    startButton.classList.add('btn-primary');
}

</script>



    </div>
  </div>
  <!-- [ Main Content ] end -->


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