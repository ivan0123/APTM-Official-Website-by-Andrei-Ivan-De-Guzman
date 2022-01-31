<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 08:32:04 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Registration | APTM Official Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="APTM Official Website is an online platform dedicated to deliver an extensive service dedicated to its dear members. The website aims to reach every professional teachers in MIMAROPA Region Philippines to develop relations and strengthen the teaching force across the region." name="description" />
        <meta content="Andrei Ivan De Guzman" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>/public/assets/images/aptm/aptm_icon.ico">

        <!-- App css -->
        <link href="<?php echo base_url('public/assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/assets/css/app.min.css'); ?>" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?php echo base_url('public/assets/css/app-dark.min.css'); ?>" rel="stylesheet" type="text/css" id="dark-style" /> 
        <link href="<?php echo base_url('public/assets/css/aptm.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/aptm_landing.css'); ?>">  
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/register.css'); ?>">  
 

    </head>

    <body class="loading" data-layout-config='{"darkMode":false}'>

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

        <!-- X -->

    <div id="main-container">
        <img class="wave-bg" src="<?php echo base_url('public/assets/images/aptm/wave-bg.png'); ?>" alt="">
        <section id="header">
            <div class="">
                <div class="p-0 pb-0">
                    <!-- logo -->
                    <a href="index.html" class="navbar-brand me-lg-5 ms-3">
                        <img src="<?php echo base_url('public/assets/images/aptm/mini_logo.png'); ?>" alt="" class="logo-dark" height="35" />
                    </a>
                </div>
            </div>
        </section>

        <div class="page-title-box">
            <div class="page-title-right mt-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('AptmController/index'); ?>" class="text-white">APTM Official Website</a></li>
                    <li class="breadcrumb-item active text-white">Registration</li>
                </ol>
            </div>
        </div>
        
        <!-- MAIN PAGE -->
        <section id="main" class="">
            <div class="container">

            <div class="banner">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="text-light fw-normal ms-5">Members Registration</h1>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <img class="b_svg" src="<?php echo base_url('public/assets/images/aptm/undraw_completing_6bhr.svg'); ?>" alt="">
                            <style>
                                .b_svg {
                                    width: 30%;
                                    z-index: 4;
                                    position: absolute;
                                    top: 125px;
                                    right: 270px;
                                }

                                .banner {
                                    margin-top: 140px;
                                }

                                @media(max-width: 1028px){
                                    .b_svg {
                                        width: 60%;
                                        z-index: 4;
                                        position: static;
                                        margin-left: 80px;
                                        margin-top: 20px;
                                    }

                                    .banner {
                                        margin-top: 100px;
                                    }

                                    .banner h1 {
                                        margin-left: 50px;
                                    }
                                    
                                    .logo-dark {
                                        position: relative;
                                        top: 30px;
                                        left: 20px;
                                    }
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>

                <div class="card card-body mt-5 mb-5">
                    <div class="p-2 pt-0 pb-0">

                        <div class="mt-2">
                            <h4>Personal Information</h4>
                            <p class="mb-0">To create your member account, Please fill out all these<br>
                            additional information. Don't reload the page until you're not <br>
                            finish filling out this form.</p>
                        </div>

                        <div class="text-center">
                            <?php $session = \Config\Services::session();?>
                            <img class="me-2 img-fluid rounded-circle img-thumbnail" 
                                src="<?=$session->getFlashdata("gmail_profile_img")?>" 
                                title="<?=$session->getFlashdata("gmail_fname").' '.
                                $session->getFlashdata("gmail_lname")?>" height="32">

                                <div class="mt-2">
                                    <p class="mb-0 text-muted font-16">Welcome to APTM Official Website</p>
                                    <h4 class="m-0">
                                        <?=$session->getFlashdata("gmail_fname").' '.
                                        $session->getFlashdata("gmail_lname")?>
                                    </h4>
                                    <p class="text-muted"><?=$session->getFlashdata("gmail_email")?></p>
                                </div>
                            </div>
                        </div>

                    <form method="POST" action="register_account_gmail" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="row p-2">
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">Age</small></strong>
                                        <input type="text" class="form-control mt-1 border border-primary" name="txtAge"
                                            placeholder="Age" value="" maxlength="2" id="txtAge" required>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">Gender</small></strong>
                                        <select class="form-select mt-1 border border-primary" id="txtGender" name="txtGender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">Street | Address</small></strong>
                                        <input type="text" class="form-control mt-1 border border-primary" name="txtStreet"
                                            placeholder="Street Address" value="" maxlength="30" id="txtStreet" required>
                                    </div>
                                </div>
                                   
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">Province | Address</small></strong>
                                        <select class="form-select mt-1 border border-primary" id="txtProvince" name="txtProvince">
                                            <option value="Oriental Mindoro">Oriental Mindoro</option>
                                            <option value="Occidental Mindoro">Occidental Mindoro</option>
                                            <option value="Marinduque">Marinduque</option>
                                            <option value="Romblon">Romblon</option>
                                            <option value="Palawan">Palawan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">School</small></strong>
                                        <input type="text" class="form-control mt-1 border border-primary" name="txtSchool"
                                            placeholder="School" value="" id="txtSchool" maxlength="75" required>
                                    </div>
                                </div>
                                   
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">APTM Division</small></strong>
                                        <select class="form-select mt-1 border border-primary" id="txtDivision" name="txtDivision">
                                            <option value="APTM Oriental Mindoro">APTM Oriental Mindoro</option>
                                            <option value="APTM Occidental Mindoro">APTM Occidental Mindoro</option>
                                            <option value="APTM Calapan City">APTM Calapan City</option>
                                            <option value="APTM Marinduque">APTM Marinduque</option>
                                            <option value="APTM Romblon">APTM Romblon</option>
                                            <option value="APTM Palawan">APTM Palawan</option>
                                            <option value="APTM Puerto Princesa">APTM Puerto Princesa</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">Town | Address</small></strong>
                                        <input type="text" class="form-control mt-1  border border-primary" name="txtTown"
                                            placeholder="Town Address" value="" maxlength="30" id="txtTown" required>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">Upload your PRC Id Picture</small></strong>
                                        <input type="file" class="form-control mt-1 border border-primary" name="txtPrc_ID"
                                            accept=".png, .jpg, .jpeg" required>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-2">
                                           <strong><small class="">Position</small></strong>
                                           <input type="text" class="form-control mt-1 border border-primary" name="txtPosition"
                                            placeholder="Position" value="" maxlength="20" id="txtPosition" required>
                                      </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mt-1">
                                        <!-- min and max date -->
                                        <?php $timezone = "Asia/Manila";
                                            date_default_timezone_set($timezone);
                                            $date_min = date('Y-m-d',strtotime("- 3 years"));
                                            $date_max = date('Y-m-d',strtotime("+ 1 mins"));
                                            $date = new DateTime();
                                        ?>
                                        <strong><small class="">Became Member at</small></strong>
                                        <input class="form-control border border-primary" 
                                            id="txtJoin" name="txtJoin" type="date"
                                            max="<?=$date_max?>" min="<?=$date_min?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <p class="text-muted mb-0"><i>Please take a clear picture 
                                    of your PRC(Professional Identification Card) ID issued by Professional Regulation 
                                    Commission. By uploading your PRC Id we will be able to verify that your a certified 
                                    professional teacher.</i></p></div>
                                </div>

                                <p><strong class="ms-3">Reminder:</strong></p>
                                    <p>
                                        <ul class="ms-3">
                                            <li class="mb-1">
                                                Please use <strong>GMAIL email address</strong> because this website 
                                                only supports gmail email adresses.
                                            </li>
                                            <li class="mb-1">
                                                Please follow the naming format of your PRC Id Picture like this: 
                                                <strong>Lastname, Firstname M.I._PRC_ID_your division</strong>
                                            </li>
                                            <li>
                                                <strong>Example: Dela Cruz, Juan D._PRC_ID_APTM Oriental Mindoro</strong>
                                            </li>
                                        </ul>

                                    </p>

                                <p class="me-2 ms-3"><i><strong>Note</strong>: This is your first time to login on this website 
                                    using your gmail account, that's why you are redirected to this page and you have 
                                    to fill out this information to create your account. Once you submit your information, 
                                    wait for the approval of the Admin and you have to pay the Membership Fee.
                                </i></p>

                                <div class="form-check ms-2">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signup" required>
                                     <label class="form-check-label" for="checkbox-signup">
                                         <p class="me-2">By submitting my personal information I acknowledge reading 
                                              <a href="#" data-bs-toggle="modal" data-bs-target="#privacy_policy">
                                                  Privacy Policy</a>, I agree to 
                                              <a href="#" data-bs-toggle="modal" data-bs-target="#tos">
                                                  Terms of Service</a>,
                                              <a href="#" data-bs-toggle="modal" data-bs-target="#disclaimer">
                                                   Disclaimer</a>, and 
                                              <a href="#" data-bs-toggle="modal" data-bs-target="#data_privacy">
                                                 Consent on Data Privacy Act</a>.
                                         </p>
                                    </label>
                                </div>

                                <div style="text-align: right;" class="m-2 mb-2 mt-3">
                                    <button type="submit" id="btnsignUp" name="btn_register" class="btn btn-primary me-1">Ok, I'm ready to Join now</button>
                                    <a href="<?=base_url()?>/AptmController/index" class="btn btn-outline-primary">Cancel</a>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- END MAIN -->


    </div>

        
        <!-- bundle -->
        <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app.min.js'); ?>"></script>

        <script>
            // close the backdrop of modal
            $(document).ready(function () {
                $('#btn-close').click(function(){
                    $('.alert_backdrop').hide();
                    });
                });


            // pre-loader js code
            $(window).on('load', function(){
                $('#preloader').fadeOut('slow');
            });


            // function keypress, numbers only
            var let_numpress = function(input){
                $(input).each(
                    function(){
                        $(this).keypress(function (e){
                            var regex = new RegExp(/^[a-zA-Z\s\uFEFF\xA0]+|[a-zA-Z\s\uFEFF\xA0]+$/g, '');
                            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                            if(!regex.test(str)){
                                return input;
                            }else{
                                e.preventDefault();
                                return input;
                            }
                        });
                    }
                );
                $(document).ready(function(){
                    $(input).bind("cut copy paste",function(e){
                        e.preventDefault();
                    });
                });
            };

            // call the function
            $(document).ready(function(){
                let_numpress('#txtAge');
            });
            // x

        </script>
    </body>
</html>