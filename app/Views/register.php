<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 08:32:04 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Register | APTM Official Website</title>
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
                    <a href="<?=base_url('AptmController/index')?>" class="navbar-brand me-lg-5 ms-3">
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
                        <h1 class="text-light ms-5 fw-normal">Members Registration</h1>
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
                        <h3>Personal Information</h3>
                        <p>All fields are required so make sure to fill-up all.</p>
                    </div>
                    <form method="POST" action="register" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        
                        <?php 
                            $fname = !empty($_POST['txtFname']) ? $_POST['txtFname'] : '';
                            $age = !empty($_POST['txtAge']) ? $_POST['txtAge'] : '';
                            $street = !empty($_POST['txtStreet']) ? $_POST['txtStreet'] : '';
                            $school = !empty($_POST['txtSchool']) ? $_POST['txtSchool'] : '';
                            $mname = !empty($_POST['txtMname']) ? $_POST['txtMname'] : '';
                            $town = !empty($_POST['txtTown']) ? $_POST['txtTown'] : '';
                            $lname = !empty($_POST['txtLname']) ? $_POST['txtLname'] : '';
                            $password = !empty($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
                            $join = !empty($_POST['txtJoin']) ? $_POST['txtJoin'] : '';
                            $email = !empty($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
                            $cpassword = !empty($_POST['txtCPass']) ? $_POST['txtCPass'] : '';
                            $position = !empty($_POST['txtPosition']) ? $_POST['txtPosition'] : '';
                        ?>
                        
                            <div class="row p-2">
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <strong><small class="">First Name</small></strong>
                                        <input type="text" class="form-control mt-1 border border-primary" name="txtFname"
                                            placeholder="First Name" value="<?=$fname?>" maxlength="20" id="txtFname" required>
                                    </div>
                                 </div>
                                   <div class="col-lg-3">
                                      <div class="mb-2">
                                             <strong><small class="">Age</small></strong>
                                             <input type="text" class="form-control mt-1 border border-primary" name="txtAge"
                                             placeholder="Age" value="<?=$age?>" maxlength="2" id="txtAge" required>
                                       </div>
                                  </div>
                                   <div class="col-lg-3">
                                      <div class="mb-2">
                                            <strong><small class="">Street | Address</small></strong>
                                            <input type="text" class="form-control mt-1 border border-primary" name="txtStreet"
                                             placeholder="Street Address" value="<?=$street?>" maxlength="30" id="txtStreet" required>
                                       </div>
                                    </div>
                                   <div class="col-lg-3">
                                     <div class="mb-2">
                                            <strong><small class="">School</small></strong>
                                             <input type="text" class="form-control mt-1 border border-primary" name="txtSchool"
                                              placeholder="School" value="<?=$school?>" id="txtSchool" maxlength="75" required>
                                        </div>
                                   </div>
                                  <div class="col-lg-3">
                                       <div class="mb-2">
                                             <strong><small class="">Middle Name</small></strong>
                                             <input type="text" class="form-control mt-1  border border-primary" name="txtMname"
                                              placeholder="Middle Name" value="<?=$mname?>" maxlength="20" id="txtMname" required>
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
                                        <strong><small class="">Town | Address</small></strong>
                                        <input type="text" class="form-control mt-1  border border-primary" name="txtTown"
                                            placeholder="Town Address" value="<?=$town?>" maxlength="30" id="txtTown" required>
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
                                           <strong><small class="">Last Name</small></strong>
                                              <input type="text" class="form-control mt-1 border border-primary" name="txtLname"
                                            placeholder="Last Name" value="<?=$lname?>" maxlength="20" id="txtLname" required>
                                       </div>
                                 </div>
                                <div class="col-lg-3">
                                    <div class="mb-0">
                                            <strong><small class="">Password</small></strong>
                                            <input onkeyup="signUp_validation()" id="txtPass" type="password" class="form-control mt-1 border border-primary" name="txtPassword"
                                            placeholder="Password" maxlength="20" value="<?=$password?>" required>
                                            <small id="txtPassMsg" class="form-text" style="margin-left: 10px"></small>
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
                                            max="<?=$date_max?>" min="<?=$date_min?>" value="<?=$join?>" required>
                                    </div>
                                 </div>
                                  <div class="col-lg-3">
                                    <div class="mb-0">
                                            <strong><small class="">Email Address</small></strong>
                                            <input type="email" class="form-control mt-1 border border-primary" name="txtEmail"
                                            placeholder="Email Address" value="<?=$email?>" maxlength="30" id="txtEmail" required>
                                        </div>
                                 </div>
                                 <div class="col-lg-3 mb-2">
                                    <div class="mb-0">
                                        <strong><small class="">Confirm Password</small></strong>
                                        <input onkeyup="signUp_validation()" type="password" class="form-control mt-1 border border-primary" name="txtCPass"
                                        placeholder="Confirm Password" maxlength="20" id="txtCPass" value="<?=$cpassword?>" required disabled>
                                        <small id="txtCPassMsg" class="form-text" style="margin-left: 10px"></small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="mb-2">
                                           <strong><small class="">Position</small></strong>
                                           <input type="text" class="form-control mt-1 border border-primary" name="txtPosition"
                                            placeholder="Position" value="<?=$position?>" maxlength="20" id="txtPosition" required>
                                      </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="mb-1">
                                            <strong><small class="">Upload your PRC Id Picture</small></strong>
                                            <input type="file" class="form-control mt-1 border border-primary" name="txtProfile"
                                                id="txtProfile" accept=".png, .jpg, .jpeg" required>
                                        </div>
                                 </div>
                                 <div>
                                    <p><strong class="me-1">Reminder:</strong></p>
                                    <p>
                                        <ul>
                                            <li class="mb-1">
                                                Please use <strong>GMAIL email address</strong> because this website 
                                                only supports gmail email adresses.
                                            </li>
                                            <li class="mb-1">
                                                If you don't receive a confirmation email, that means your email is not valid.
                                            </li>
                                            <li class="mb-1">
                                                Take a clear picture of your <strong>PRC(Professional Identification Card)</strong> 
                                                ID issued by Professional Regulation Commission.
                                            </li>
                                            <li class="mb-1">
                                                Please follow the naming format of your PRC Id Picture like this: 
                                                <strong>Lastname, Firstname M.I._PRC_ID_your division</strong>
                                            </li>
                                            <li class="mb-1">
                                                <strong>Example: Dela Cruz, Juan D._PRC_ID_APTM Oriental Mindoro</strong>
                                            </li>
                                            <li class="mb-1">
                                                By uploading your PRC Id we will be 
                                                able to verify that your a <strong>certified professional teacher.</strong>
                                            </li>
                                            <li>
                                                Please double check your information before submitting it.
                                            </li>
                                        </ul>

                                    </p>

                                    <div class="form-check">
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
                                </div>
                                  
                              </div>
                              <div style="text-align: right;" class="m-2 mb-2 mt-0">
                                <button type="submit" id="btnsignUp" name="btn_register" class="btn btn-primary me-1">Ok, I'm ready to Join now</button>
                                <a href="<?=base_url()?>/AptmController/index" class="btn btn-outline-primary">Cancel</a>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- END MAIN -->

        <!-- DATA PRIVACY MODALS -->

        <!-- Privacy Policy -->
        <div class="modal fade" id="privacy_policy" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="scrollableModalTitle">Privacy Policy</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-1">
                            <p><strong>Privacy Policy for Association of Professional Teachers in MIMAROPA Official Website</strong></p>

                            <p>At APTM Official Website, accessible from <a href="http://localhost/APTM/public">http://localhost/APTM/public</a>, 
                                one of our main priorities is the privacy of our visitors. This Privacy Policy document contains 
                                types of information that is collected and recorded by APTM Official Website and how 
                                we use it.
                            </p>
                            <p>If you have additional questions or require more information about our <strong>Privacy Policy</strong>, 
                                do not hesitate to contact us.
                            </p>
                            <p>This Privacy Policy applies only to our online activities and is valid for visitors to our 
                                website with regards to the information that they shared and/or collect in APTM Official 
                                Website. This policy is not applicable to any information collected offline or via channels 
                                other than this website.
                            </p>

                            <p><strong>Consent</strong></p>

                            <p><i>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</i></p>

                            <p><strong>Information we collect</strong></p>

                            <p>The personal information that you are asked to provide, and the reasons why you are asked 
                                to provide it, will be made clear to you at the point we ask you to provide your personal information.
                            </p>
                            <p>If you contact us directly, we may receive additional information about you such as your name, 
                                email address, the contents of the message and/or attachments you may send us, and any other 
                                information you may choose to provide.
                            </p>
                            <p><i>When you register for an Account, we may ask for your contact information, including items 
                                such as name, address, email address, age, gender, position, school, APTM Division and PRC 
                                Identification Card picture.</i>
                            </p>

                            <p><strong>How we use your information</strong></p>

                            <p>We use the information we collect in various ways, including to:</p>
                            <ul>
                                <li>Provide, operate, and maintain our website</li>
                                <li>Improve, personalize, and expand our website</li>
                                <li>Understand and analyze how you use our website</li>
                                <li>Communicate with you, either directly, and to provide you with updates and other information 
                                    relating to the website </li>
                                <li>Send you emails</li>
                                <li>Find and prevent fraud</li>
                            </ul>

                            <p><strong>Log Files</strong></p>

                            <p>APTM Official Website follows a standard procedure of using log files. These files log 
                                visitors when they visit websites. All hosting companies do this and a part of hosting 
                                services' analytics. The information collected by log files include date and time stamp, 
                                referring/exit pages, and possibly the number of clicks.</p>
                            <p>These are not linked to any 
                                information that is personally identifiable. The purpose of the information is for 
                                analyzing trends, administering the site, tracking users' movement on the website.</p>

                            <p><strong>GDPR Data Protection Rights</strong></p>

                            <p>We would like to make sure you are fully aware of all of your data protection rights.</p>

                            <p>Every user is entitled to the following:</p>

                            <p><i><strong>The right to access</strong></i> – You have the right to request copies of your personal data. We may
                                charge you a small fee for this service.</p>
                            
                            <p><i><strong>The right to rectification</strong></i> – You have the right to request that we correct any 
                            information you believe is inaccurate. You also have the right to request that we complete 
                            the information you believe is incomplete.</p>

                            <p><i><strong>The right to erasure</strong></i> – You have the right to request that we erase your personal 
                            data, under certain conditions.</p>

                            <p><i><strong>The right to restrict processing</strong></i> – You have the right to request that we restrict 
                            the processing of your personal data, under certain conditions.</p>

                            <p><i><strong>The right to object to processing</strong></i> – You have the right to object to our processing 
                            of your personal data, under certain conditions.</p>

                            <p><i><strong>The right to data portability</strong></i> – You have the right to request that we transfer the 
                            data that we have collected to another organization, or directly to you, under certain conditions.</p>

                            <p><i>If you make a request, we have one month to respond to you. If you would like to exercise 
                                any of these rights, please contact us.</i></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                    </div>
                </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- x -->

        <!-- Terms of Service -->
        <div class="modal fade" id="tos" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="scrollableModalTitle">Terms of Service</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-1">
                            <p><strong>Website Terms and Conditions of Use</strong></p>

                            <p><strong>1. Terms</strong></p>

                            <p>By accessing this Website, accessible from <a href="http://localhost/APTM/public">http://localhost/APTM/public</a>, you are agreeing 
                                to be bound by these Website Terms and Conditions of Use and agree that you are responsible 
                                for the agreement with any applicable local laws. If you disagree with any of these terms, 
                                you are prohibited from accessing this site. The materials contained in this Website are 
                                protected by copyright and trade mark law.</p>
                            
                            <p><strong>2. Use License</strong></p>    

                            <p>Permission is granted to temporarily download one copy of the materials on Association of 
                                Professional Teachers in MIMAROPA's Website for personal, non-commercial transitory 
                                viewing only. This is the grant of a license, not a transfer of title, and under this 
                                license you may not:</p>

                            <ul>
                                <li>modify or copy the materials;</li>
                                <li>use the materials for any commercial purpose or for any public display</li>
                                <li>attempt to reverse engineer any information contained on Association of 
                                    Professional Teachers in MIMAROPA's Website;</li>
                                <li>remove any copyright or other proprietary notations from the materials; or</li>
                                <li>transferring the materials to another person or "mirror" the materials on any 
                                    other server.</li>
                            </ul>

                            <p>This will let Association of Professional Teachers in MIMAROPA to terminate upon 
                                violations of any of these restrictions.</p>

                            <p>Upon termination, your viewing right will also be terminated and you should destroy 
                                any downloaded materials in your possession whether it is printed or electronic format.</p>

                            <p><strong>3. Disclaimer</strong></p>

                            <p>All the materials on Association of Professional Teachers in MIMAROPA’s Website are provided 
                                "as is". Association of Professional Teachers in MIMAROPA makes no warranties, may it be 
                                expressed or implied, therefore negates all other warranties.</p>
                            
                            <p>Furthermore, Association of Professional Teachers in MIMAROPA does not make any representations 
                                concerning the accuracy or reliability of the use of the materials on its Website or otherwise 
                                relating to such materials or any sites linked to this Website.</p>

                            <p><strong>4. Limitations</strong></p>

                            <p>Association of Professional Teachers in MIMAROPA will not be hold accountable for any damages 
                                that will arise with the use or inability to use the materials on Association of Professional 
                                Teachers in MIMAROPA’s Website, even if Association of Professional Teachers in MIMAROPA or an 
                                authorize representative of this Website has been notified, orally or written, of the possibility
                                of such damage. </p>
                            
                            <p>Some jurisdiction does not allow limitations on implied warranties or limitations of liability for 
                                incidental damages, these limitations may not apply to you.</p>

                            <p><strong>5. Revisions and Errata</strong></p>        

                            <p>The materials appearing on Association of Professional Teachers in MIMAROPA’s Website may include 
                                technical, typographical, or photographic errors. Association of Professional Teachers in MIMAROPA 
                                will not promise that any of the materials in this Website are accurate, complete, or current.</p>

                            <p>Association of Professional Teachers in MIMAROPA may change the materials contained on its Website 
                                at any time without notice. Association of Professional Teachers in MIMAROPA does not make any 
                                commitment to update the materials.</p>
                            
                            <p><strong>6. Links</strong></p>

                            <p>Association of Professional Teachers in MIMAROPA has not reviewed all of the sites linked to its 
                                Website and is not responsible for the contents of any such linked site. The presence of any link
                                 does not imply endorsement by Association of Professional Teachers in MIMAROPA of the site. 
                                 The use of any linked website is at the user’s own risk.</p>

                            <p><strong>7. Site Terms of Use Modifications</strong></p>

                            <p>Association of Professional Teachers in MIMAROPA may revise these Terms of Use for its Website at any
                                 time without prior notice. By using this Website, you are agreeing to be bound by the current version
                                  of these Terms and Conditions of Use.</p>

                            <p><strong>8. Your Privacy</strong></p>

                            <p>Please read our Privacy Policy.</p>

                            <p><strong>9. Governing Law</strong></p>

                            <p>Any claim related to Association of Professional Teachers in MIMAROPA's Website shall be governed by the 
                                laws of Philippines without regards to its conflict of law provisions.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                    </div>
                </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- x -->

        <!-- Disclaimer -->
        <div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="scrollableModalTitle">Disclaimer</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body mt-1">
                        <p>All the materials on <strong>Association of Professional Teachers in MIMAROPA’s Website</strong> are provided 
                            "as is". Association of Professional Teachers in MIMAROPA makes no warranties, may it be 
                            expressed or implied, therefore negates all other warranties. </p>

                        <p>Furthermore, Association of Professional Teachers in MIMAROPA does not make any representations
                             concerning the accuracy or reliability of the use of the materials on its Website or otherwise
                              relating to such materials or any sites linked to this Website.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                    </div>
                </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- x -->

        <!-- Data Privacy -->
        <div class="modal fade" id="data_privacy" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="scrollableModalTitle">Consent on Data Privacy Act</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-1">

                            <p>This Privacy Manual is hereby adopted in compliance with 
                                <strong>Republic Act No. 10173</strong> or the 
                                <strong>Data Privacy Act of 2012 (DPA)</strong>, 
                                its <i>Implementing Rules and Regulations</i>, 
                                and other relevant policies, including issuances of the 
                                <strong>National Privacy Commission</strong>. 
                            </p>

                            <p>This organization respects and values your data privacy rights, and makes sure that 
                                all personal data collected from you, are processed in adherence to the general 
                                principles of transparency, legitimate purpose, and proportionality.</p>

                            <p><i>This Manual shall inform you of our data protection and security measures, and may 
                                serve as your guide in exercising your rights under the DPA.</i></p>

                            <p><strong>Definition of Terms</strong></p>

                            <p>Terms used in the Manual must be defined for consistency and uniformity in usage. 
                                This portion will make sure of that, and allow users of the Manual to understand 
                                the words, statements, and concepts used in the document.</p>

                            <p>Examples:</p>

                            <p>“Data Subject” – refers to an individual whose personal, sensitive personal or 
                                privileged information is processed by the organization. It may refer to officers, 
                                staffs, consultants, and members of this organization.</p>

                            <p>“Personal Information” – refers to any information whether recorded in a material form 
                                or not, from which the identity of an individual is apparent or can be reasonably and 
                                directly ascertained by the entity holding the information, or when put together with
                                 other information would directly and certainly identify an individual.</p>

                            <p>“Processing” - refers to any operation or any set of operations performed upon personal
                                 information including, but not limited to, the collection, recording, organization, 
                                 storage, updating or modification, retrieval, consultation, use, consolidation, blocking, 
                                 erasure or destruction of data.</p>

                            <p><strong>Scope and Limitations</strong></p>

                            <p>All personnel of this organization, regardless of the type, must comply with the terms set 
                                out in this <strong>Privacy Manual</strong>.</p>

                            <p><strong>Processing of Personal Data</strong></p>

                            <p><strong>A. Collection</strong></p>

                            <p>Example:</p>

                            <p>This organization collects the basic contact information of members, including their name, 
                                address, email address, age, gender, position, school, APTM Division and PRC Identification
                                 Card picture. The administrator who verifies the members of the organizations the one handles
                                  the information.</p>

                            <p><strong>B. Use</strong></p>

                            <p>Example:</p>

                            <p>Personal data collected shall be used by the organization for documentation purposes, for 
                                research.</p>

                            <p><strong>C. Storage, Retention and Destruction</strong></p>

                            <p>This organization will ensure that personal data under its custody are protected against any accidental
                                 or unlawful destruction, alteration and disclosure as well as against any other unlawful processing. 
                                 The organization will implement appropriate security measures in storing collected personal information, 
                                 depending on the nature of the information.</p>

                            <p><strong>D. Access</strong></p>

                            <p>Due to the sensitive and confidential nature of the personal data under the custody of the organization, 
                                only the member and the authorized representative of the organization shall be allowed to access such 
                                personal data, for any purpose, except for those contrary to law, public policy, public order or morals.</p>

                            <p><strong>E. Disclosure and Sharing</strong> (e.g. individuals to whom personal data is shared, disclosure of 
                            policy and processes, outsourcing and subcontracting, etc.)</p>

                            <p>Example:</p>

                            <p>Administrator of the organization shall maintain the confidentiality and secrecy of all personal data that come 
                                to their knowledge. Personal data under the custody of the organization shall be disclosed only pursuant to a 
                                lawful purpose, and to authorized recipients of such data.</p>

                            <p><strong>Security Measures</strong></p>

                            <p><strong>A. Organization Security Measures</strong></p>

                            <p>Every personal information controller and personal information processor must also consider the human aspect of 
                                data protection. The provisions under this section shall include the following:</p>

                            <p><i>1. Data Protection Officer (DPO), or Compliance Officer for Privacy (COP)</i></p>

                            <p>The designated Data Protection Officer is Nimrod F. Bantigue PhD, who is concurrently serving as the President 
                                of the organization.</p>

                            <p><i>2. Functions of the DPO, COP and/or any other responsible personnel with similar functions</i></p>

                            <p>The <strong>Data Protection Officer</strong> shall oversee the compliance of the organization with the 
                            DPA, its IRR, and other related policies, including the conduct of a Privacy Impact Assessment, 
                            implementation of security measures, security incident and data breach protocol, and the inquiry and 
                            complaints procedure.</p>

                            <p><i>3. Conduct of trainings or seminars to keep personnel, especially the Data Protection Officer updated vis-à-vis 
                                developments in data privacy and security</i></p>

                            <p>The organization shall sponsor a mandatory training on data privacy and security at least once a year. For personnel 
                                directly involved in the processing of personal data, management shall ensure their attendance and participation in 
                                relevant trainings and orientations, as often as necessary.</p>

                            <p><i>4. Conduct of Privacy Impact Assessment (PIA)</i></p>

                            <p>The organization shall conduct a Privacy Impact Assessment (PIA) relative to all activities, projects and systems 
                                involving the processing of personal data. It may choose to outsource the conduct a PIA to a third party.</p>

                            <p><i>5. Recording and documentation of activities carried out by the DPO, or the organization itself, to 
                                ensure compliance with the DPA, its IRR and other relevant policies.</i></p>

                            <p>The organization shall sponsor a mandatory training on data privacy and security at least once a year. For 
                                personnel directly involved in the processing of personal data, management shall ensure their attendance 
                                and participation in relevant trainings and orientations, as of</p>

                            <p><i>6. Duty of Confidentiality</i></p>
                            
                            <p>Administrator will be asked to sign a Non-Disclosure Agreement. All officers and staffs with access to 
                                personal data shall operate and hold personal data under strict confidentiality if the same is not 
                                intended for public disclosure.</p>

                            <p><i>7. Review of Privacy Manual</i></p>

                            <p>This Manual shall be reviewed and evaluated annually. Privacy and security policies and practices within 
                                the organization shall be updated to remain consistent with current data privacy best practices.</p>

                            <p><strong>B. Physical Security Measures</strong></p>

                            <p><i>1. Format of data to be collected</i></p>

                            <p>Personal data in the custody of the organization may be in digital/electronic format and 
                                paper-based/physical format.</p>

                            <p><i>2. Storage type and location (e.g. filing cabinets, electronic storage system, personal data 
                                room/separate room or part of an existing room)</i></p>

                            <p>All personal data being processed by the organization shall be stored in a data room, where 
                                paper-based documents are kept in locked filing cabinets while the digital/electronic files 
                                are stored in computers provided and installed by the company.</p>

                            <p><i>3. Access procedure of agency personnel</i></p>

                            <p>Only authorized personnel shall be allowed inside the data room. For this purpose, they shall 
                                each be given a duplicate of the key to the room. Other personnel may be granted access to 
                                the room upon filing of an access request form with the Data Protection Officer and the latter’s 
                                approval thereof.</p>

                            <p><i>4. Monitoring and limitation of access to room or facility</i></p>

                            <p>All personnel authorized to enter and access the data room or facility must fill out and register 
                                with the online registration platform of the organization, and a logbook placed at the entrance 
                                of the room. They shall indicate the date, time, duration and purpose of each access.</p>

                            <p><i>5. Design of office space/work station</i></p>

                            <p>The computers are positioned with considerable spaces between them to maintain privacy and protect 
                                the processing of personal data.</p>

                            <p><i>6. Persons involved in processing, and their duties and responsibilities</i></p>

                            <p>Persons involved in processing shall always maintain confidentiality and integrity of personal data.
                                 They are not allowed to bring their own gadgets or storage device of any form when entering the 
                                 data storage room.</p>

                            <p><i>7. Modes of transfer of personal data within the organization, or to third parties</i></p>

                            <p>Transfers of personal data via electronic mail shall use a secure email facility with encryption of 
                                the data, including any or all attachments. Facsimile technology shall not be used for transmitting 
                                documents containing personal data.</p>

                            <p><i>8. Retention and disposal procedure</i></p>

                            <p>The organization shall retain the personal data of a client for one (1) year from the data of registration. 
                                Upon expiration of such period, all physical and electronic copies of the personal data shall be destroyed 
                                and disposed of using secure technology. </p>

                            <p><strong>C. Technical Security Measures</strong></p>

                            <p>Each personal information controller and personal information processor must implement technical security 
                                measures to make sure that there are appropriate and sufficient safeguards to secure the processing of 
                                personal data, particularly the computer network in place, including encryption and authentication 
                                processes that control and limit access. They include the following, among others:</p>

                            <p><i>1. Monitoring for security breaches</i></p>

                            <p>The organization shall use an intrusion detection system to monitor security breaches and alert the 
                                organization of any attempt to interrupt or disturb the system.</p>

                            <p><i>2. Security features of the software/s and application/s used</i></p>

                            <p>The organization shall first review and evaluate software applications before the installation thereof 
                                in computers and devices of the organization to ensure the compatibility of security features with 
                                overall operations.</p>

                            <p><i>3. Process for regularly testing, assessment and evaluation of effectiveness of security measures</i></p>

                            <p>The organization shall review security policies, conduct vulnerability assessments and perform penetration 
                                testing within the company on regular schedule to be prescribed by the appropriate department or unit.</p>

                            <p><i>4. Encryption, authentication process, and other technical security measures that control and limit 
                                access to personal data</i></p>

                            <p>Each personnel with access to personal data shall verify his or her identity using a secure encrypted link 
                                and multi-level authentication.</p>

                            <p><strong>Breach and Security Incidents</strong></p>

                            <p>Every personal information controller or personal information processor must develop and implement policies 
                                and procedures for the management of a personal data breach, including security incidents. This section 
                                must adequately describe or outline such policies and procedures, including the following:</p>

                            <p><i>1. Creation of a Data Breach Response Team</i></p>

                            <p>A Data Breach Response Team comprising of five (5) officers shall be responsible for ensuring immediate action 
                                in the event of a security incident or personal data breach. The team shall conduct an initial assessment of 
                                the incident or breach in order to ascertain the nature and extent thereof. It shall also execute measures 
                                to mitigate the adverse effects of the incident or breach.</p>

                            <p><i>2. Measures to prevent and minimize occurrence of breach and security incidents</i></p>

                            <p>The organization shall regularly conduct a Privacy Impact Assessment to identify risks in the processing system 
                                and monitor for security breaches and vulnerability scanning of computer networks. Personnel directly involved 
                                in the processing of personal data must attend trainings and seminars for capacity building. There must also 
                                be a periodic review of policies and procedures being implemented in the organization.</p>

                            <p><i>3. Procedure for recovery and restoration of personal data</i></p>

                            <p>The organization shall always maintain a backup file for all personal data under its custody. In the event of a 
                                security incident or data breach, it shall always compare the backup with the affected file to determine the 
                                presence of any inconsistencies or alterations resulting from the incident or breach.</p>

                            <p><i>4. Notification protocol</i></p>

                            <p>The Head of the Data Breach Response Team shall inform the management of the need to notify the NPC and the 
                                data subjects affected by the incident or breach within the period prescribed by law. Management may decide 
                                to delegate the actual notification to the head of the Data Breach Response Team.</p>

                            <p><i>5. Documentation and reporting procedure of security incidents or a personal data breach</i></p>

                            <p>The Data Breach Response Team shall prepare a detailed documentation of every incident or breach encountered, 
                                as well as an annual report, to be submitted to management and the NPC, within the prescribed period.</p>

                            <p><strong>Inquiries and Complaints</strong></p>

                            <p>Every data subject has the right to reasonable access to his or her personal data being processed by the 
                                personal information controller or personal information processor. Other available rights include: (1) 
                                right to dispute the inaccuracy or error in the personal data; (2) right to request the suspension, 
                                withdrawal, blocking, removal or destruction of personal data; and (3) right to complain and be 
                                indemnified for any damages sustained due to inaccurate, incomplete, outdated, false, unlawfully 
                                obtained or unauthorized use of personal data. </p>

                            <p>Accordingly, there must be a procedure for inquiries and complaints that will specify the means through 
                                which concerns, documents, or forms submitted to the organization shall be received and acted upon. 
                                This section shall feature such procedure.</p>

                            <p>Data subjects may inquire or request for information regarding any matter relating to the processing of 
                                their personal data under the custody of the organization, including the data privacy and security 
                                policies implemented to ensure the protection of their personal data. </p>

                            <p>They may write to the organization at <strong>aptmmimaropa@gmail.com</strong> and briefly discuss the inquiry, 
                                together with their contact details for reference.</p>

                            <p>Complaints shall be filed and sent to <strong>aptmmimaropa@gmail.com</strong>. The concerned department or 
                                unit shall confirm with the complainant its receipt of the complaint.</p>

                            <p><strong>Effectivity</strong></p>

                            <p>This section indicates the period of effectivity of the Manual, as well as any other document that the organization 
                                may issue, and which has the effect of amending the provisions of the Manual.</p>

                            <p>The provisions of this Manual are effective this 15 day of August, 2021, until revoked or amended by this company, 
                                through a Board Resolution.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                    </div>
                </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- x -->

        <!-- x -->
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


            // textbox will accept letters and space only
            var input;
            // function keypress, letters only
            var let_keypress = function(input){
                $(input).each(
                    function(){
                        $(this).keypress(function (e){
                            var regex = new RegExp(/^[a-zA-Z\s\uFEFF\xA0]+|[a-zA-Z\s\uFEFF\xA0]+$/g, '');
                            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                            if(regex.test(str)){
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
                let_keypress('#txtFname');
                let_keypress('#txtMname');
                let_keypress('#txtLname');
                let_numpress('#txtAge');
            });
            // x


            // sign up validation
            function signUp_validation(){
                var pass =  document.getElementById("txtPass").value;
                var Cpass =  document.getElementById("txtCPass").value;

                // txtPass

                if(pass.length < 8){
                    document.getElementById("txtPassMsg").innerHTML = "Password must contain 8 characters above.";
                    document.getElementById("txtPassMsg").style.color = "rgb(252, 141, 141)";
                    document.getElementById("txtPass").style.borderColor = "rgb(252, 141, 141)";
                    document.getElementById("txtCPass").disabled = true;
                    document.getElementById("btnsignUp").disabled = true;
                }else{
                    document.getElementById("txtPassMsg").innerHTML = "Password";
                    document.getElementById("txtPassMsg").style.color = "rgb(59, 220, 53)";
                    document.getElementById("txtPass").style.borderColor = "rgb(59, 220, 53)";
                    document.getElementById("txtCPass").disabled = false;

                    if(Cpass == "" || null){
                        document.getElementById("txtCPassMsg").innerHTML = "Please confirm your Password.";
                        document.getElementById("txtCPassMsg").style.color = "rgb(252, 141, 141)";
                        document.getElementById("txtCPass").style.borderColor = "rgb(252, 141, 141)";
                        document.getElementById("btnsignUp").disabled = true;
                    }else if(Cpass != pass){
                        document.getElementById("txtCPassMsg").innerHTML = "Password is not matched.";
                        document.getElementById("txtCPassMsg").style.color = "rgb(252, 141, 141)";
                        document.getElementById("txtCPass").style.borderColor = "rgb(252, 141, 141)";
                        document.getElementById("btnsignUp").disabled = true;
                    }else{
                        document.getElementById("txtCPassMsg").innerHTML = "Password matched.";
                        document.getElementById("txtCPassMsg").style.color = "rgb(59, 220, 53)";
                        document.getElementById("txtCPass").style.borderColor = "rgb(59, 220, 53)";
                        document.getElementById("btnsignUp").disabled = false; 
                    } 
                }   
            }

            
        </script>
    </body>
</html>