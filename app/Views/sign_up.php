<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 08:37:05 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Sign up | APTM Official Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/aptm/aptm_icon.ico">

        <!-- App css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <link href="../assets/css/aptm.css" rel="stylesheet" type="text/css" />
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
                            <!-- Logo-->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="../assets/images/aptm/mini_logo.png" alt="" height="35"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign Up</h4>
                                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
                                </div>

                                <form action="signUp" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <div class="mb-1">
                                        <input onkeyup="signUp_validation()" name="txtUname" id="txtFname" class="form-control" type="text" placeholder="Username" maxlength="35">
                                        <small id="txtFnameMsg" class="form-text" style="margin-left: 10px"></small>
                                    </div>

                                    <div class="mb-1">
                                        <input onkeyup="signUp_validation()" name="txtEmail" id="txtEmail" class="form-control" type="email" placeholder="Email Address" maxlength="35" required disabled>
                                        <small id="txtEmailMsg" class="form-text" style="margin-left: 10px"></small>
                                    </div>

                                    <div class="mb-1">
                                        <div class="input-group input-group-merge">
                                            <input onkeyup="signUp_validation()" name="txtPass" id="txtPass" type="password" class="form-control" placeholder="Password" maxlength="35" disabled>
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                        <small id="txtPassMsg" class="form-text" style="margin-left: 10px"></small>
                                    </div>

                                    <div class="mb-0">
                                        <div class="input-group input-group-merge">
                                            <input onkeyup="signUp_validation()" id="txtCPass" type="password" class="form-control" placeholder="Confirm your Password" maxlength="35" disabled>
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                        <small id="txtCPassMsg" class="form-text" style="margin-left: 10px"></small>
                                    </div>

                                    <div class="">
                                        <ul style="list-style-type: none;">
                                            <li>
                                                <div class="mb-2">
                                                    <small class="text-muted" style="position: relative; right: 32px;">Upload Profile Picture (png, jpg, jpeg, gif)</small>
                                                    <input style="height: 35px; position: relative; right: 32px; width: 300px" type="file" 
                                                    id="file" name="file" accept=".png, .jpg, .jpeg, .gif" class="form-control sm">
                                                    <input type="button" class="btn btn-primary btn-sm" id="submit" value="Upload" 
                                                    style="position: absolute;left: 350px;top: 525px;" title="Upload Picture">
                                                </div>
                                            </li>
                                            <li>
                                                <!-- File preview --> 
                                                <div id="filepreview" class="displaynone"> 
                                                    <img src="" class="displaynone m-2" height="100px" style="position: relative; right: 32px;">
                                                    <small class="text-muted" style="position: relative; right: 32px;">Image Preview</small>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                            <label class="form-check-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button id="btnsignUp" class="btn btn-primary" type="submit" disabled> Sign Up </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account? <a href="index" class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col-->
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
        <script src="../assets/js/vendor.min.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/js/custom.js"></script>

        <script>
        // close the backdrop of modal
        $(document).ready(function () {
            $('#btn-close').click(function(){
                $('.alert_backdrop').hide();
            });
        });
        </script>
        
    </body>
</html>
