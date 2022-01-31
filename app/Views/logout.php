<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-logout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 08:37:05 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Logout | APTM Official Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="APTM Official Website is an online platform dedicated to deliver an extensive service dedicated to its dear members. The website aims to reach every professional teachers in MIMAROPA Region Philippines to develop relations and strengthen the teaching force across the region." name="description" />
        <meta content="Andrei Ivan De Guzman" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('public/assets/images/aptm/aptm_icon.ico'); ?>">

        <!-- App css -->
        <link href="<?php echo base_url('public/assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/assets/css/app.min.css'); ?>" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?php echo base_url('public/assets/css/app-dark.min.css'); ?>" rel="stylesheet" type="text/css" id="dark-style" /> 
        <link href="<?php echo base_url('public/assets/css/aptm.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/aptm_landing.css'); ?>">  

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <!-- Pre-loader -->
        <div id="preloader">
            <div id="status">
                <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
            </div>
        </div>
        <!-- End Preloader-->

        <!-- ALERT MESSAGE -->
        <?= view_cell('\App\Libraries\AptmLibraries::alertMsg')?>    
        <!-- XXXX -->
    
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="<?php echo base_url('public/assets/images/aptm/mini_logo.png'); ?>" alt="" height="35"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">See You Again !</h4>
                                    <p class="text-muted mb-4">You account was logged out on this website.</p>
                                </div>

                                <div class="logout-icon m-auto">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                                        <path class="path" fill="none" stroke="#0acf97" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                                            c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                                            c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
                                        <circle class="path" fill="none" stroke="#0acf97" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
                                        <polyline class="path" fill="none" stroke="#0acf97" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8
                                            74.1,108.4 48.2,86.4 "/>

                                        <circle class="spin" fill="none" stroke="#0acf97" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>
                                    </svg>
                                </div> <!-- end logout-icon-->

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Back to <a href="index" class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> © Association of Professional Teachers in Mimaropa Philippines Official Website
        </footer>

        <!-- bundle -->
        <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <script>
            // close the backdrop of modal
            $(document).ready(function () {
                $('#btn-close').click(function(){
                    $('.alert_backdrop').hide();
                    });
                });
        </script>
        
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-logout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 08:37:05 GMT -->
</html>
