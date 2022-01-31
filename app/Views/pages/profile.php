<!-- MAIN CONTENT OF ANNOUNCEMENT PAGE -->

<!-- initialize that it extends the userLayout view -->
<?= $this->extend('layouts/userLayout')?>

<!-- initialize the name of section -->
<?= $this->section('mainContent')?>


<!-- main page content start -->
            <?php $session = \Config\Services::session();?>

                <div class="content-page">
                    <div class="content">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right mt-2">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('AptmController/view_home');?>">Home</a></li>
                                            <li class="breadcrumb-item"><?= $meta_title?></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->  

                        <div class="row">
                            <div class="col-lg-8">

                                <!-- Profile -->

                                <?php foreach($m_data as $m_datum):?>
                                <div class="card bg-primary">
                                    <div class="card-body profile-user-box">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-lg">
                                                            <img src="<?=$m_datum['m_profile_pic']?>" alt="" class="rounded-circle img-thumbnail">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <h4 class="mt-1 mb-1 text-white"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h4>
                                                            <p class="font-13 text-white-50"><?=$m_datum['m_type'].' | '.$m_datum['m_division']?></p>
                                                            <ul class="mb-0 list-inline text-light">
                                                                <li class="list-inline-item me-3">
                                                                    <h5 class="mb-1 font-14"><?=$m_datum['m_email']?></h5>
                                                                    <p class="mb-0 font-13 text-white-50">Email Address</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-sm-4">
                                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                                    <button type="button" class="btn btn-light btn-rounded mb-2" data-bs-toggle="modal" 
                                                        data-bs-target="#editProfile<?=$m_datum['m_id']?>">
                                                        <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                                    </button>
                                                    <?php if($m_datum['m_password'] != ''){?>
                                                    <button type="button" class="btn btn-rounded btn-outline-light" data-bs-toggle="modal" 
                                                        data-bs-target="#changePassword<?=$m_datum['m_id']?>">
                                                        <i class="mdi mdi-lock me-1"></i> Change Password
                                                    </button>
                                                    <?php }?>
                                                </div>
                                            </div> <!-- end col-->
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body/ profile-user-box-->
                                </div>

                                <div class="row">

                                    <div class="col-lg-6">

                                        <!-- Personal Information -->

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title mt-0">Personal Information</h4>

                                                <hr>

                                                <div class="text-start">
                                                    <p class="text-muted mb-2"><strong>Full Name :</strong>
                                                        <span class="ms-2"></span><?=$m_datum['m_fname'].' '.$m_datum['m_mname'].' '.$m_datum['m_lname']?></p>
                                                    <p class="text-muted mb-2"><strong>Email :</strong> <span class="ms-2"><?=$m_datum['m_email']?></span></p>
                                                    <p class="text-muted mb-2"><strong>Age :</strong> <span class="ms-2"><?=$m_datum['m_age']?></span></p>
                                                    <p class="text-muted mb-2"><strong>Gender :</strong> <span class="ms-2"><?=$m_datum['m_gender']?></span></p>
                                                    <p class="text-muted mb-2"><strong>Street Address :</strong> <span class="ms-2"><?=$m_datum['m_street']?></span></p>
                                                    <p class="text-muted mb-2"><strong>Town :</strong> <span class="ms-2"><?=$m_datum['m_town']?></span></p>
                                                    <p class="text-muted mb-2"><strong>Province :</strong> <span class="ms-2"><?=$m_datum['m_province']?></span></p>
                                                    <p class="text-muted mb-2"><strong>Position :</strong> <span class="ms-2"><?=$m_datum['m_position']?></span></p>
                                                    <p class="text-muted mb-2"><strong>Teacher at :</strong> <span class="ms-2"><?=$m_datum['m_school']?></span></p>
                                                    <p class="text-muted mb-2"><strong>Join APTM at :</strong> <span class="ms-2"><?=$m_datum['m_join_date']?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                    </div>

                                    <div class="col-lg-6">

                                        <!-- Recent Activities -->

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title mb-2">Your Recent Activities</h4>

                                                <div data-simplebar="init" style="max-height: 500px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                                                    <div class="timeline-alt pb-0">
                                                    <?php foreach($notif_data as $notif_datum):?>
                                                        <div class="timeline-item">
                                                            <i class="mdi mdi-check bg-info-lighten text-info timeline-icon"></i>
                                                            <div class="timeline-item-info">
                                                                <?php if($notif_datum['notif_content'] == "Logged in his Account."):?>
                                                                    <a class="text-info fw-bold mb-1 d-block">Logged in.</a>
                                                                <?php elseif($notif_datum['notif_content'] == "Logged out his Account."):?>
                                                                    <a class="text-info fw-bold mb-1 d-block">Logged out.</a>
                                                                <?php else:?>
                                                                    <a class="text-info fw-bold mb-1 d-block"><?=$notif_datum['notif_content']?></a>
                                                                <?php endif;?>
                                                                <p class="mb-0 pb-2">
                                                                    <small class="text-muted"><?=$notif_datum['notif_time_created']?></small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach;?>
                                                    </div>
                                                    <!-- end timeline -->
                                                </div></div></div></div><div class="simplebar-placeholder" style="width: 283px; height: 365px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 298px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div> <!-- end slimscroll -->
                                            </div>
                                            <!-- end card-body -->
                                        </div>

                                    </div>

                                </div>

                            </div> <!-- end col-->

                            <div class="col-lg-4">
                                
                            <!-- initialize the about widget from libraries -->
                            <?= view_cell('\App\Libraries\AptmLibraries::aboutWidget')?>

                            <!-- initialize the latest news widget from libraries -->
                            <?= view_cell('\App\Libraries\AptmLibraries::latestNewsWidget')?>
                            
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <!-- MODALs -->

                        <!-- EDIT PROFILE MODAL -->
                        <?php foreach($m_data as $m_datum):?>
                        <div class="modal fade" id="editProfile<?=$m_datum['m_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit Your Personal Information</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <form method="POST" action="editProfile" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="mb-2 text-center">
                                                <div class="avatar-lg" style="margin: auto;">
                                                    <img src="<?=$m_datum['m_profile_pic']?>" alt="<?=$m_datum['m_fname'].' '.$m_datum['m_lname']?> 
                                                    Profile Picture" class="rounded-circle img-thumbnail">
                                                </div>
                                                <div class="mb-3">
                                                    <h4 class="mt-1 mb-1"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h4>
                                                    <p class="font-13"><?=$m_datum['m_type'].' | '.$m_datum['m_division']?></p>
                                                </div>
                                            </div>
                                            <p class="text-muted font-16">All fields with asterisk (*) is required to be filled up.</p>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-2">
                                                        <strong><small class="">First Name *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtFname" id="txtFname"
                                                            placeholder="First Name" value="<?=$m_datum['m_fname']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Middle Name *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtMname" id="txtMname"
                                                            placeholder="Middle Name" value="<?=$m_datum['m_mname']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Last Name *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtLname" id="txtLname"
                                                            placeholder="Last Name" value="<?=$m_datum['m_lname']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Email Address *</small></strong>
                                                        <input type="email" class="form-control mt-1" name="txtEmail"
                                                            placeholder="Email Address" value="<?=$m_datum['m_email']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-2">
                                                        <strong><small>Gender *</small></strong>
                                                        <select class="form-select mt-1" name="txtGender" required>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Age *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtAge" id="txtAge"
                                                            placeholder="Age" value="<?=$m_datum['m_age']?>" 
                                                            maxlength="2" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Position *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtPosition"
                                                            placeholder="Position" value="<?=$m_datum['m_position']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Teacher at *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtSchool"
                                                            placeholder="School" value="<?=$m_datum['m_school']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    
                                                    <div class="mb-2">
                                                        <strong><small class="">Street Address *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtStreet"
                                                            placeholder="Street Address" value="<?=$m_datum['m_street']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Town *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtTown"
                                                            placeholder="Town" value="<?=$m_datum['m_town']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Province *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtProvince"
                                                            placeholder="Province" value="<?=$m_datum['m_province']?>" 
                                                            maxlength="60" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small>Update your Profile Picture</small></strong>
                                                        <input class="form-control mt-1" type="file" name="txtProfile" 
                                                        accept=".png, .jpg, .jpeg" required>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="txt_m_id" value="<?=$m_datum['m_id']?>">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="btn_save">Save Changes</button>
                                    </div>
                                </form>
                             </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;?>    
                        

                        <!-- CHANGE PASSWORD MODAL -->
                        <?php foreach($m_data as $m_datum):?>
                        <div class="modal fade" id="changePassword<?=$m_datum['m_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Change your Current Password</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <form method="POST" action="changePassword">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="text-center mb-3">
                                                <img src="<?=base_url('public/assets/images/aptm/undraw_Safe_re_kiil.svg')?>" alt="password vector" width="200">
                                            </div>

                                            <p class="text-muted text-center font-16">Please enter your current password to 
                                                change your account password. Once you change your password, your account will 
                                                automatically logged out on this website.</p>
                                            
                                            <div class="mb-1">
                                                <strong><small class="">Current Password *</small></strong>
                                                <input type="password" class="form-control mt-1" name="txtCPass" id="txtCPass"
                                                     placeholder="Current Password" onkeyup="change_pass()"
                                                     maxlength="60" required>
                                                <small id="txtCPassMsg" class="form-text m-0" style="margin-left: 10px"></small>
                                            </div>

                                            <div class="mb-1">
                                                <strong><small class="">New Password *</small></strong>
                                                <input type="password" class="form-control mt-1" name="txtNPass" id="txtNPass"
                                                     placeholder="New Password" onkeyup="change_pass()"
                                                     maxlength="60" required>
                                                <small id="txtNPassMsg" class="form-text m-0" style="margin-left: 10px"></small>
                                            </div>

                                            <div class="mb-2">
                                                <strong><small class="">Confirm your New Password *</small></strong>
                                                <input type="password" class="form-control mt-1" name="txtCoPass" id="txtCoPass"
                                                     placeholder="Re-enter your new Password" onkeyup="change_pass()"
                                                     maxlength="60" required>
                                                <small id="txtCoPassMsg" class="form-text m-0" style="margin-left: 10px"></small>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="txt_m_id" value="<?=$m_datum['m_id']?>">
                                        <?php 
                                            if($m_datum['m_password'] != ''){
                                            
                                                $encrypter = \Config\Services::encrypter();
                                                $m_pass = $encrypter->decrypt(hex2bin($m_datum['m_password']));
                                        ?>
                                        <input type="hidden" name="txt_m_pass" id="txt_m_pass" value="<?=$m_pass?>">
                                        <?php }?>
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="btn_save" id="btn_save_pass">Save Changes</button>
                                    </div>
                                </form>
                             </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;?>   

                        <script>
                        // FOR MATCHING THE NEW PASSWORD AND CONFIRM PASSWORD
                                document.getElementById("btn_save_pass").disabled = true;
                                document.getElementById("txtNPass").disabled = true;
                                document.getElementById("txtCoPass").disabled = true;

                                function change_pass(){
                                    var CPass =  document.getElementById("txtCPass").value;
                                    var NPass =  document.getElementById("txtNPass").value;
                                    var CoPass =  document.getElementById("txtCoPass").value;
                                    var txt_m_pass =  document.getElementById("txt_m_pass").value;

                                    if(CPass == "" || null){
                                        document.getElementById("txtCPassMsg").innerHTML = "Please Enter your Current Password.";
                                        document.getElementById("txtCPassMsg").style.color = "rgb(252, 141, 141)";
                                        document.getElementById("txtCPass").style.borderColor = "rgb(252, 141, 141)";
                                        document.getElementById("txtNPass").disabled = true; 
                                    }else{
                                        if(CPass == txt_m_pass){
                                            document.getElementById("txtCPassMsg").innerHTML = "Current Password matched.";
                                            document.getElementById("txtCPassMsg").style.color = "rgb(59, 220, 53)";
                                            document.getElementById("txtCPass").style.borderColor = "rgb(59, 220, 53)";
                                            document.getElementById("txtNPass").disabled = false; 

                                            if(NPass == "" || null){
                                                document.getElementById("txtNPassMsg").innerHTML = "Please Enter your New Password.";
                                                document.getElementById("txtNPassMsg").style.color = "rgb(252, 141, 141)";
                                                document.getElementById("txtNPass").style.borderColor = "rgb(252, 141, 141)";
                                                document.getElementById("txtCoPass").disabled = true; 
                                            }else if(NPass.length < 8){
                                                document.getElementById("txtNPassMsg").innerHTML = "Password must contain 8 characters above.";
                                                document.getElementById("txtNPassMsg").style.color = "rgb(252, 141, 141)";
                                                document.getElementById("txtNPass").style.borderColor = "rgb(252, 141, 141)";
                                                document.getElementById("txtCoPass").disabled = true; 
                                            }else{
                                                document.getElementById("txtNPassMsg").innerHTML = "New Password is valid.";
                                                document.getElementById("txtNPassMsg").style.color = "rgb(59, 220, 53)";
                                                document.getElementById("txtNPass").style.borderColor = "rgb(59, 220, 53)";
                                                document.getElementById("txtCoPass").disabled = false; 

                                                if(CoPass == "" || null){
                                                    document.getElementById("txtCoPassMsg").innerHTML = "Re-enter your New Password for confirmation.";
                                                    document.getElementById("txtCoPassMsg").style.color = "rgb(252, 141, 141)";
                                                    document.getElementById("txtCoPass").style.borderColor = "rgb(252, 141, 141)";
                                                    document.getElementById("btn_save_pass").disabled = true;
                                                }else if(CoPass != NPass){
                                                    document.getElementById("txtCoPassMsg").innerHTML = "It does'nt match your New Password. Try it again.";
                                                    document.getElementById("txtCoPassMsg").style.color = "rgb(252, 141, 141)";
                                                    document.getElementById("txtCoPass").style.borderColor = "rgb(252, 141, 141)";
                                                    document.getElementById("btn_save_pass").disabled = true;
                                                }else{
                                                    document.getElementById("txtCoPassMsg").innerHTML = "New Password is Matched, click the save button to submit changes.";
                                                    document.getElementById("txtCoPassMsg").style.color = "rgb(59, 220, 53)";
                                                    document.getElementById("txtCoPass").style.borderColor = "rgb(59, 220, 53)";
                                                    document.getElementById("btn_save_pass").disabled = false;
                                                }
                                            }
                                        }else{
                                            document.getElementById("txtCPassMsg").innerHTML = "It does'nt match your Current Password. Try to remember it again.";
                                            document.getElementById("txtCPassMsg").style.color = "rgb(252, 141, 141)";
                                            document.getElementById("txtCPass").style.borderColor = "rgb(252, 141, 141)";
                                            document.getElementById("txtNPass").disabled = true; 
                                        }
                                    }
                                }
                        // x
                        </script>
                    </div>
                </div>
                          
                <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
<!-- initialize footer and js plugins -->
<!-- < view_cell('\App\Libraries\AptmLibraries::footer')>     -->
<!-- xxxx -->

<?= $this->endSection()?>
