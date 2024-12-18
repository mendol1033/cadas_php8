<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.4.1
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        <?php echo $title?>
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="assets/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="assets/css/app.bundle.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <!-- Optional: page related CSS-->
    <link rel="stylesheet" media="screen, print" href="assets/css/page-login-alt.css">
</head>
<body>
    <div class="blankpage-form-field">
        <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <a href="index" class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="assets/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                <span class="page-logo-text mr-1">Cikarang Dashboard Pengawasan</span>
                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
            </a>
        </div>
        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
            <?php if (!empty($_SESSION['pesan-login'])){;?>
                <div class="alert alert-danger text-dark" role="alert">
                    <strong><?php echo $_SESSION['pesan-login'] ;?></strong>
                </div>
            <?php }?>
            <form class="needs-validation" action="Login/login" method="post" novalidate>
                <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="your id or email" required>
                    <span class="help-block">
                        Your unique username to app
                    </span>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                    <span class="help-block">
                        Your password
                    </span>
                </div>
                <div class="form-group text-left">
                    <div class="custom-control custom-radio custom-control-inline custom-rounded">
                        <input type="radio" name="tipe" class="custom-control-input" id="pegawai-radio" value="pegawai" required>
                        <label class="custom-control-label" for="pegawai-radio">Pegawai</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline custom-rounded">
                        <input type="radio" name="tipe" class="custom-control-input" id="stakeholder-radio" value="Stakeholders">
                        <label class="custom-control-label" for="stakeholder-radio">Stakeholders</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default float-right">Secure login</button>
            </form>
        </div>
        <div class="blankpage-footer text-center">
            <a href="#"><strong>Forgot Password</strong></a> | <a href="Register"><strong>Register Account</strong></a>
        </div>
    </div>
    <div class="login-footer p-2">
        <div class="row">
            <div class="col col-sm-12 text-center">
                <i><strong>System Message:</strong> You were logged out from 198.164.246.1 on Saturday, March, 2017 at 10.56AM</i>
            </div>
        </div>
    </div>
    <video poster="assets/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
        <source src="assets/media/video/cc.webm" type="video/webm">
            <source src="assets/media/video/cc.mp4" type="video/mp4">
            </video>
            <!-- BEGIN Color profile -->
            <!-- this area is hidden and will not be seen on screens or screen readers -->
            <!-- we use this only for CSS color refernce for JS stuff -->
            <p id="js-color-profile" class="d-none">
                <span class="color-primary-50"></span>
                <span class="color-primary-100"></span>
                <span class="color-primary-200"></span>
                <span class="color-primary-300"></span>
                <span class="color-primary-400"></span>
                <span class="color-primary-500"></span>
                <span class="color-primary-600"></span>
                <span class="color-primary-700"></span>
                <span class="color-primary-800"></span>
                <span class="color-primary-900"></span>
                <span class="color-info-50"></span>
                <span class="color-info-100"></span>
                <span class="color-info-200"></span>
                <span class="color-info-300"></span>
                <span class="color-info-400"></span>
                <span class="color-info-500"></span>
                <span class="color-info-600"></span>
                <span class="color-info-700"></span>
                <span class="color-info-800"></span>
                <span class="color-info-900"></span>
                <span class="color-danger-50"></span>
                <span class="color-danger-100"></span>
                <span class="color-danger-200"></span>
                <span class="color-danger-300"></span>
                <span class="color-danger-400"></span>
                <span class="color-danger-500"></span>
                <span class="color-danger-600"></span>
                <span class="color-danger-700"></span>
                <span class="color-danger-800"></span>
                <span class="color-danger-900"></span>
                <span class="color-warning-50"></span>
                <span class="color-warning-100"></span>
                <span class="color-warning-200"></span>
                <span class="color-warning-300"></span>
                <span class="color-warning-400"></span>
                <span class="color-warning-500"></span>
                <span class="color-warning-600"></span>
                <span class="color-warning-700"></span>
                <span class="color-warning-800"></span>
                <span class="color-warning-900"></span>
                <span class="color-success-50"></span>
                <span class="color-success-100"></span>
                <span class="color-success-200"></span>
                <span class="color-success-300"></span>
                <span class="color-success-400"></span>
                <span class="color-success-500"></span>
                <span class="color-success-600"></span>
                <span class="color-success-700"></span>
                <span class="color-success-800"></span>
                <span class="color-success-900"></span>
                <span class="color-fusion-50"></span>
                <span class="color-fusion-100"></span>
                <span class="color-fusion-200"></span>
                <span class="color-fusion-300"></span>
                <span class="color-fusion-400"></span>
                <span class="color-fusion-500"></span>
                <span class="color-fusion-600"></span>
                <span class="color-fusion-700"></span>
                <span class="color-fusion-800"></span>
                <span class="color-fusion-900"></span>
            </p>
            <!-- END Color profile -->
<!-- base vendor bundle: 
DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
+ pace.js (recommended)
+ jquery.js (core)
+ jquery-ui-cust.js (core)
+ popper.js (core)
+ bootstrap.js (core)
+ slimscroll.js (extension)
+ app.navigation.js (core)
+ ba-throttle-debounce.js (core)
+ waves.js (extension)
+ smartpanels.js (extension)
+ src/../jquery-snippets.js (core) -->
<script src="assets/js/vendors.bundle.js"></script>
<script src="assets/js/app.bundle.js"></script>
<!-- Page related scripts -->
<script type="text/javascript">
     // Example starter JavaScript for disabling form submissions if there are invalid fields
     (function() {
      'use strict';
      window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        console.log(forms);
                        console.log(form);
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
  })();
</script>
</body>
</html>
