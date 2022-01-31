<!-- MAIN CONTENT OF HOME PAGE -->

<?= $this->extend('layouts/adminLayout')?>
<?= $this->section('adminMainContent')?>

<!-- Start Content-->
                        <?php $session = \Config\Services::session();?>
       
                        <!-- Oriental Mindoro Division Member Table -->
                        <div class="row">
                            
                            <!-- BANNER WIDGET -->
                            <div class="col-lg-8">
                                                
                            <!-- initialize the banner widget from libraries -->
                            <?= view_cell('\App\Libraries\AptmLibraries::bannerWidget')?>    

                            </div> <!-- end col-->

                             <!-- ABOUT US WIDGET -->
                             <div class="col-lg-4">
                                                
                             <!-- initialize the about widget from libraries -->
                             <?= view_cell('\App\Libraries\AptmLibraries::aboutWidget')?>

                            </div> <!-- end col-->

                            <!-- TABLE WIDGET -->
                            <?php function m_tbl($m_data, $division, $tbl_id, $tbl_color){?>
                            <div class="col-12">
                                <div class="card border-<?=$tbl_color?> border">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <h4 class="header-title text-<?=$tbl_color?>"><?=$division?> Division Members</h4>
                                                <p class="text-muted font-14">
                                                    Click the eye icon to view all information of the member.
                                                </p>
                                            </div>
                                            <div class="col-lg-3" style="position: relative; left: 175px;">
                                                <button style="margin-left: 10px;" type="button" class="btn btn-primary mb-2">
                                                    <i class="uil uil-print"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-content"> 
                                            <div class="tab-pane show active table-responsive" id="scroll-horizontal-preview">
                                                <table id="<?=$tbl_id?>" class="table w-100 nowrap table-centered table-striped">
                                                    <thead class="table-<?=$tbl_color?>">
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>Member</th>
                                                            <th>User Type</th>
                                                            <th>Account Status</th>
                                                            <th>Membership Fee</th>
                                                            <th>Approval Status</th>
                                                            <th>Join Date</th>
                                                            <th>Created at</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if(count($m_data) > 0){
                                                                foreach($m_data as $m_info):?>
                                                        <tr>
                                                            <!-- action -->
                                                            <td class="table-action">
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" data-bs-target="#viewMember<?=$m_info['m_id']?>" title="view member information"> 
                                                                    <i class="uil uil-eye text-primary"></i>
                                                                </a>
                                                                <?php if($m_info['m_type'] == 'member'):?>
                                                                <!--<a href="#" class="action-icon" data-bs-toggle="modal" data-bs-target="#deleteMember<?=$m_info['m_id']?>" title="delete Member?"> -->
                                                                <!--    <i class="uil uil-trash-alt text-danger"></i>-->
                                                                <!--</a>-->
                                                                <?php else:?>
                                                                    
                                                                <?php endif;?>
                                                            </td>

                                                            <td>
                                                                <img src="<?=$m_info['m_profile_pic']?>" alt="table-user" class="me-2 rounded-circle" width="30" height="30">
                                                                <?=$m_info['m_fname'].' '.$m_info['m_lname']?>
                                                            </td>
                                                            <td><?=$m_info['m_type']?></td>

                                                            <?php $session = \Config\Services::session();?>
                                                            <!-- account status -->
                                                            <?php if($session->get('l_id') == $m_info['m_id']) {
                                                                echo '<td><h4><span class="badge bg-success rounded-pill" 
                                                                title="Online: if the user is logged in to the Website.">Online</span></h4></td>';
                                                            }else{
                                                                echo '<td><h4><span class="badge bg-primary rounded-pill" 
                                                                title="Offline: if the user not on the Website.">Offline</span></h4></td>';
                                                            }?>
                                                            
                                                            <!-- membership fee -->
                                                            <?php if($m_info['m_membership_fee'] == 'paid'):?>
                                                                <td><h4><span class="badge bg-success rounded-pill" title="Paid: if the user was already paid in membership fee."
                                                                >Paid</span></h4></td>
                                                            <?php elseif($m_info['m_membership_fee'] == 'unpaid'):?>
                                                                <td><h4><span class="badge bg-primary rounded-pill" title="Unpaid: if the user was not paid in membership fee. The divisions secretary has the capability to mark this paid."
                                                                >Unpaid</span></h4></td>
                                                            <?php endif;?>

                                                            <!-- approval status -->
                                                            <?php if($m_info['m_status'] == 'approved'):?>
                                                                <td><h4><span class="badge bg-success rounded-pill" title="Approved: The user account has been approved and authorize to log in on this website.">Approved</span></h4></td>
                                                            <?php elseif($m_info['m_status'] == 'pending'):?>
                                                                <td><h4><a href="#" class="btn_pending badge bg-primary rounded-pill" 
                                                                    data-bs-toggle="modal" data-bs-target="#approveMember<?=$m_info['m_id']?>" 
                                                                        title="click to approve this account, Validate this user account, if it is qualified to became a member of APTM.">Pending
                                                                </a></h4></td>
                                                            <?php endif;?>       

                                                            <td><?=$m_info['m_join_date']?></td>
                                                            <td><?=$m_info['m_created_time']?></td>

                                                        </tr>
                                                        <?php endforeach;
                                                            }else{?>
                                                            <div>
                                                                <p class="text-muted">There's no member yet.</p>
                                                            </div>
                                                        <?php }?>
                                                    </tbody>
                                                </table>                                          
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            <?php }?>

                            <!-- initialize table functions -->
                        
                            <?php 
                                m_tbl($m_cal_data, 'Calapan City', 'tbl_member_cal', 'danger');
                                m_tbl($m_ori_data, 'Oriental Mindoro', 'tbl_member_ori', 'primary');
                                m_tbl($m_occ_data, 'Occidental Mindoro', 'tbl_member_occ', 'warning');
                                m_tbl($m_mar_data, 'Marinduque', 'tbl_member_mar', 'success');
                                m_tbl($m_rom_data, 'Romblon', 'tbl_member_rom', 'secondary');
                                m_tbl($m_pal_data, 'Palawan', 'tbl_member_pal', 'dark');
                                m_tbl($m_pue_data, 'Puerto Princesa', 'tbl_member_pue', 'info');
                            ?>

                        </div>
                        <!-- end row-->

                        <!-- MODALS START -->
                        
                        <!-- ADD MEMBER -->
                        <div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Add Member Account</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2 mb-0">
                                        <div>
                                            <div class="text-center mt-2">
                                                <p class="text-muted font-16">In order to create member account you have to fill up all these field.</p>
                                                <img class="mb-4 empty-svg mt-2" width="300px" src="<?=base_url()?>/public//assets/images/aptm/undraw_add_information_j2wg.svg" alt="news image">
                                            </div>
                                        </div>
                                        <form method="POST" action="addMember" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-2">
                                                        <strong><small class="">First Name</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtFname"
                                                        placeholder="First Name" value="<?=$fname?>" maxlength="30" id="" required>
                                                    </div>
                                                    <div class="mb-2">
                                                         <strong><small class="">Middle Name</small></strong>
                                                         <input type="text" class="form-control mt-1" name="txtMname"
                                                          placeholder="Middle Name" value="<?=$mname?>" maxlength="30" id="txtMname" required>
                                                   </div>
                                                   <div class="mb-2">
                                                       <strong><small class="">Last Name</small></strong>
                                                          <input type="text" class="form-control mt-1" name="txtLname"
                                                        placeholder="Last Name" value="<?=$lname?>" maxlength="30" id="txtLname" required>
                                                   </div>
                                                   <div class="mb-2">
                                                        <strong><small class="">Email Address</small></strong>
                                                        <input type="email" class="form-control mt-1" name="txtEmail"
                                                        placeholder="Email Address" value="<?=$email?>" maxlength="60" id="txtEmail" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <!-- min and max date -->
                                                        <?php $timezone = "Asia/Manila";
                                                            date_default_timezone_set($timezone);
                                                            $date_min = date('Y-m-d',strtotime("- 3 years"));
                                                            $date_max = date('Y-m-d',strtotime("+ 1 mins"));
                                                            $date = new DateTime();
                                                        ?>
                                                        <strong><small class="">Became Member at</small></strong>
                                                        <input class="form-control" 
                                                            id="txtJoin" name="txtJoin" type="date"
                                                            max="<?=$date_max?>" min="<?=$date_min?>" value="<?=$join?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-2">
                                                         <strong><small class="">Age</small></strong>
                                                         <input type="text" class="form-control mt-1" name="txtAge"
                                                         placeholder="Age" value="<?=$age?>" maxlength="2" id="txtAge" required>
                                                    </div>
                                                    <div class="mb-2">
                                                      <strong><small class="">Gender</small></strong>
                                                      <select class="form-select mt-1" id="txtGender" name="txtGender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                       </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Street | Address</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtStreet"
                                                         placeholder="Street Address" value="<?=$street?>" maxlength="40" id="txtStreet" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Town | Address</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtTown"
                                                            placeholder="Town Address" value="<?=$town?>" maxlength="40" id="txtTown" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-2">
                                                      <strong><small class="">Province | Address</small></strong>
                                                      <select class="form-select mt-1" id="txtProvince" name="txtProvince">
                                                           <option value="Oriental Mindoro">Oriental Mindoro</option>
                                                           <option value="Occidental Mindoro">Occidental Mindoro</option>
                                                          <option value="Marinduque">Marinduque</option>
                                                            <option value="Romblon">Romblon</option>
                                                              <option value="Palawan">Palawan</option>
                                                      </select>
                                                    </div>
                                                    <div class="mb-2">
                                                       <strong><small class="">Position</small></strong>
                                                       <input type="text" class="form-control mt-1" name="txtPosition"
                                                        placeholder="Position" value="<?=$position?>" maxlength="40" id="txtPosition" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">School</small></strong>
                                                         <input type="text" class="form-control mt-1" name="txtSchool"
                                                          placeholder="School" value="<?=$school?>" id="txtSchool" maxlength="100" required>
                                                    </div>
                                                    <div class="mb-2">
                                                      <strong><small class="">APTM Division</small></strong>
                                                      <select class="form-select mt-1" id="txtDivision" name="txtDivision">
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
                                            </div>
                                            <div class="mt-2">
                                                <p><strong class="me-1">Reminder:</strong></p>
                                                <p>
                                                    <ul>
                                                        <li class="mb-1">
                                                            Please use <strong>GMAIL email address</strong> because this website 
                                                            only supports gmail email adresses.
                                                        </li>
                                                        <li class="mb-1">
                                                            If the member don't receive a confirmation email, that means the email is not valid.
                                                        </li>
                                                        <li>
                                                            Please double check the information before submitting it.
                                                        </li>
                                                    </ul>
                                                </p>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="btn_publish">Submit</button>
                                    </div>
                                </form>
                             </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- XXX -->
                       
                        <!-- VIEW MEMBERS FULL INFORMATION -->
                        <?php function view_modal($m_data, $division){?>

                            <?php foreach($m_data as $m_datum):?>
                            <div class="modal fade" id="viewMember<?=$m_datum['m_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <form action="make_aptm_treasurer/<?=$division?>" method="POST">
                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                        <input type="hidden" name="txt_m_id" value="<?=$m_datum['m_id']?>">
                                        <input type="hidden" name="txt_m_fname" value="<?=$m_datum['m_fname']?>">
                                        <input type="hidden" name="txt_m_lname" value="<?=$m_datum['m_lname']?>">
                                        <input type="hidden" name="txt_m_division" value="<?=$division?>">
                                        <?php if($m_datum['m_type'] != 'treasurer' && $m_datum['m_type'] != 'admin' && $m_datum['m_type'] == 'member'):?>
                                        <div class="d-grid">
                                            <!--<button class="btn btn-sm btn-primary" type="submit" title="just click this">Click this, to make this Member become a Treasurer of this Division</button>-->
                                        </div>
                                        <?php endif;?>
                                    </form>
                                <div class="modal-body pb-1">
                                    <div class="p-3 pb-0">
                                        
                                        <div class="text-center">
                                            <img src="<?=$m_datum['m_profile_pic']?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                            <h4 class="mb-0 mt-2"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h4>
                                            <p class="text-muted font-14"><?=$m_datum['m_type'].' | '.$division?></p>
                                        </div>

                                        <div class="text-start mt-3">
                                            <h4 class="font-18 text-center mb-3">Member Full Information</h4>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="ms-4">
                                                    <p class="mb-1 font-14"><strong>Full Name :</strong> <span class="ms-2"><?=$m_datum['m_fname'].' '.$m_datum['m_mname'].' '.$m_datum['m_lname']?></span></p>
                                                    <p class="mb-1 font-14"><strong>Email :</strong> <span class="ms-2"><?=$m_datum['m_email']?></span></p>
                                                    <p class="mb-1 font-14"><strong>Age:</strong> <span class="ms-2"><?=$m_datum['m_age']?></span></p>
                                                    <p class="mb-1 font-14"><strong>Gender :</strong> <span class="ms-2"><?=$m_datum['m_gender']?></span></p>
                                                    <p class="mb-1 font-14"><strong>Address :</strong> <span class="ms-2"><?=$m_datum['m_street'].' '.$m_datum['m_town'].' '.$m_datum['m_province']?></span></p>
                                                    <p class="mb-1 font-14"><strong>Teacher Level :</strong> <span class="ms-2"><?=$m_datum['m_position']?></span></p>
                                                    <p class="mb-1 font-14"><strong>School :</strong> <span class="ms-2"><?=$m_datum['m_school']?></span></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="mb-1 font-14"><strong>Division :</strong> <span class="ms-2"><?=$m_datum['m_division']?></span></p>
                                                <p class="mb-1 font-14"><strong>Became member at :</strong> <span class="ms-2"><?=$m_datum['m_join_date']?></span></p>
                                                <p class="mb-1 font-14"><strong>Membership Fee :</strong> <span class="ms-2"><?=$m_datum['m_membership_fee']?></span></p>
                                                <p class="mb-1 font-14"><strong>Approval Status :</strong> <span class="ms-2"><?=$m_datum['m_status']?></span></p>
                                                <p class="tb-1 font-14"><strong>Register Date :</strong> <span class="ms-2"><?=$m_datum['m_created_time']?></span></p>
                                                <?php if($m_datum['m_gender'] == "Male"):?>
                                                <p class="mb-0 font-14"><strong>Updated his Info at :</strong> <span class="ms-2"><?=$m_datum['m_updated_time']?></span></p>
                                                <?php else:?>
                                                <p class="mb-0 font-14"><strong>Updated her Info at :</strong> <span class="ms-2"><?=$m_datum['m_updated_time']?></span></p>
                                                <?php endif;?>
                                            </div>
                                            
                                            <div class="text-center mt-4">
                                                <?php if($m_datum['m_prc_id'] != "This member is registered by Admin. PRC ID is not needed."):?>
                                                    <!--show prc id-->
                                                    <h4 class="font-18 text-center">Professional Identification Card (PRC ID) Picture</h4>
                                                    <img src="<?=$m_datum['m_prc_id']?>" alt="PRC Id Picture" class="img-fluid" width="500">
                                                <?php else:?>
                                                    <p class="text-muted font-14">This member is registered by Admin. PRC ID is not needed.</p>
                                                <?php endif;?>
                                            </div>
                                        </div>

                                        <!-- <ul class="social-list list-inline mt-3 mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                            </li>
                                        </ul> -->
                                    </div> <!-- end card-body -->
                                </div>
                                <div class="modal-footer bg-primary">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->                                        
                        <?php endforeach;?>

                        <?php }?>
                        <!-- X -->

                        <!-- DELETE MEMBER MODAL -->
                        <?php function delete_modal($m_data){?>

                        <?php foreach($m_data as $m_datum):?>
                        <div id="deleteMember<?=$m_datum['m_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-danger">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Are you sure?</h4>
                                        <p class="mt-3">Once you delete this member account info, it can't be undone.</p>
                                        <form action="deleteMember" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$m_datum['m_id']?>" name="txt_d_id">
                                            <input type="hidden" value="<?=$m_datum['m_fname']?>" name="txt_d_fname">
                                            <input type="hidden" value="<?=$m_datum['m_lname']?>" name="txt_d_lname">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
                                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;?>

                        <?php }?>
                        <!-- x -->


                        <!-- APPROVE MEMBER MODAL -->
                        <?php function approve_modal($m_data, $division){?>

                        <?php foreach($m_data as $m_datum):?>
                        <div id="approveMember<?=$m_datum['m_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-primary">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Approve this Account?</h4>
                                        <p class="mt-3">If this Member is not yet paid to Membership Fee, you can't approve his/her account registration.</p>
                                        <form action="approveMember" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$m_datum['m_id']?>" name="txt_m_id">
                                            <input type="hidden" value="<?=$m_datum['m_fname']?>" name="txt_m_fname">
                                            <input type="hidden" value="<?=$m_datum['m_lname']?>" name="txt_m_lname">
                                            <input type="hidden" value="<?=$m_datum['m_email']?>" name="txt_m_email">
                                            <input type="hidden" value="<?=$division?>" name="txt_m_division">
                                            <input type="hidden" value="<?=$m_datum['m_membership_fee']?>" name="txt_m_membership">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-outline-light my-2">Approve</button>
                                            <button type="button" class="btn btn-light my-2 ms-1" data-bs-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;?>

                        <?php }?>


                    <!-- END MODALS -->

                    <!-- use the delete modal function for every table-->
                    <?php 
                        approve_modal($m_ori_data,'APTM Oriental Mindoro');
                        approve_modal($m_occ_data,'APTM Occidental Mindoro');
                        approve_modal($m_cal_data,'APTM Calapan City');
                        approve_modal($m_mar_data,'APTM Marinduque');
                        approve_modal($m_rom_data,'APTM Romblon');
                        approve_modal($m_pal_data,'APTM Palawan');
                        approve_modal($m_pue_data,'APTM Puerto Princesa');
                    ?>
                    
                    <!-- use the view modal function for every table-->
                    <?php 
                        view_modal($m_ori_data,'APTM Oriental Mindoro');
                        view_modal($m_occ_data,'APTM Occidental Mindoro');
                        view_modal($m_cal_data,'APTM Calapan City');
                        view_modal($m_mar_data,'APTM Marinduque');
                        view_modal($m_rom_data,'APTM Romblon');
                        view_modal($m_pal_data,'APTM Palawan');
                        view_modal($m_pue_data,'APTM Puerto Princesa');
                    ?>

                    <!-- use the delete modal function for every table-->
                    <?php 
                        delete_modal($m_ori_data);
                        delete_modal($m_occ_data);
                        delete_modal($m_cal_data);
                        delete_modal($m_mar_data);
                        delete_modal($m_rom_data);
                        delete_modal($m_pal_data);
                        delete_modal($m_pue_data);
                    ?>
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                        <script>
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
                                // let_keypress('#txtFname');
                                // let_keypress('#txtMname');
                                // let_keypress('#txtLname');
                                // let_numpress('#txtAge');
                            });
                            // x
                        </script>

<?= $this->endSection()?>