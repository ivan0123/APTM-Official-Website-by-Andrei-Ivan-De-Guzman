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
                                    <h5 class="text-muted mt-3 mb-3">Treasurer's Task | APTM Official Website</h5>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-8">
                                
                            <!-- initialize the banner widget from libraries -->
                            <?= view_cell('\App\Libraries\AptmLibraries::bannerWidget')?>    

                            </div> <!-- end col-->

                            <div class="col-lg-4">
                                
                            <!-- initialize the about widget from libraries -->
                            <?= view_cell('\App\Libraries\AptmLibraries::aboutWidget')?>

                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <h4 class="header-title"><?=$session->get('l_division')?> Members Account</h4>
                                                <p class="text-muted font-14">Just click the unpaid button to mark the Members Account paid.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-content"> 
                                            <div class="tab-pane show active table-responsive" id="scroll-horizontal-preview">
                                                <table id="tbl_tres_pue" class="table w-100 nowrap table-centered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>Member Name</th>
                                                            <th>Membership Fee</th>
                                                            <th>Approval Status</th>
                                                            <th>User Type</th>
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
                                                                <a href="#" class="font-15 text-muted" data-bs-toggle="modal" data-bs-target="#viewMember<?=$m_info['m_id']?>" title="view member information">
                                                                    <span class="badge badge-primary-lighten">
                                                                        <i class="uil uil-eye me-1 font-14"></i>view info
                                                                    </span>
                                                                </a>
                                                            </td>

                                                            <!-- member name -->
                                                            <td>
                                                                <img src="<?=$m_info['m_profile_pic']?>" alt="table-user" class="me-2 rounded-circle" width="30" height="30">
                                                                <?=$m_info['m_fname'].' '.$m_info['m_lname']?>
                                                            </td>

                                                            <!-- membership fee -->
                                                            <?php if($m_info['m_membership_fee'] == 'paid'):?>
                                                                <td><h4><span class="badge bg-success rounded-pill">Paid</span></h4></td>
                                                            <?php elseif($m_info['m_membership_fee'] == 'unpaid'):?>
                                                                <td><h4><a href="#" class="font-15 btn_pending badge bg-primary rounded-pill" 
                                                                    data-bs-toggle="modal" data-bs-target="#paidMember<?=$m_info['m_id']?>" 
                                                                        title="click this to mark paid.">Unpaid
                                                                </a></h4></td>
                                                            <?php endif;?>

                                                            <!-- approval status -->
                                                            <?php if($m_info['m_status'] == 'approved'):?>
                                                                <td><h4><span class="badge bg-success rounded-pill">Approved</span></h4></td>
                                                            <?php elseif($m_info['m_status'] == 'pending'):?>
                                                                <td><h4><span class="badge bg-primary rounded-pill">Pending</span></h4></td>
                                                            <?php endif;?>

                                                            <td><?=$m_info['m_type']?></td>
                                                            <td><?=$m_info['m_join_date']?></td>
                                                            <td><?=$m_info['m_created_time']?></td>
                                                        </tr>
                                                        <?php endforeach;
                                                            }else{?>
                                                            <div>
                                                                <p class="text-muted">There's no pending account registration yet.</p>
                                                            </div>
                                                        <?php }?>
                                                    </tbody>
                                                </table>                                          
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                                
                        <!-- MODALS START -->
                       
                        <!-- VIEW MEMBERS FULL INFORMATION -->
                        <?php function view_modal($m_data, $division){?>

                            <?php foreach($m_data as $m_datum):?>
                        <div class="modal fade" id="viewMember<?=$m_datum['m_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body pb-3">
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
                                                <p class="mb-1 font-14 text-primary"><strong>Membership Fee :</strong> <span class="ms-2"><?=$m_datum['m_membership_fee']?></span></p>
                                                <p class="mb-1 font-14 text-primary"><strong>Approval Status :</strong> <span class="ms-2"><?=$m_datum['m_status']?></span></p>
                                                <p class="tb-1 font-14"><strong>Register Date :</strong> <span class="ms-2"><?=$m_datum['m_created_time']?></span></p>
                                                <?php if($m_datum['m_gender'] == "Male"):?>
                                                <p class="mb-1 font-14"><strong>Updated his Info at :</strong> <span class="ms-2"><?=$m_datum['m_updated_time']?></span></p>
                                                <?php else:?>
                                                <p class="mb-1 font-14"><strong>Updated her Info at :</strong> <span class="ms-2"><?=$m_datum['m_updated_time']?></span></p>
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


                        <!-- MARK AS PAID MEMBER MODAL -->
                        <?php $division = $session->get('l_division');?>
                        <?php function paid_modal($m_data, $division){?>

                        <?php foreach($m_data as $m_datum):?>
                        <div id="paidMember<?=$m_datum['m_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-primary">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Mark as Paid?</h4>
                                        <p class="mt-3">If the Member was already paid for his/her Membership Fee you can mark it as paid, 
                                        once the Membership Fee was already paid this account can now login to the website.</p>
                                        <form action="paidMember" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$m_datum['m_id']?>" name="txt_m_id">
                                            <input type="hidden" value="<?=$m_datum['m_fname']?>" name="txt_m_fname">
                                            <input type="hidden" value="<?=$m_datum['m_lname']?>" name="txt_m_lname">
                                            <input type="hidden" value="<?=$m_datum['m_email']?>" name="txt_m_email">
                                            <input type="hidden" value="<?=$m_datum['m_status']?>" name="txt_m_status">
                                            <input type="hidden" value="<?=$division?>" name="txt_m_division">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-outline-light my-2">Paid</button>
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
                        paid_modal($m_data, $division);
                    ?>
                    
                    <!-- use the view modal function for every table-->
                    <?php 
                        view_modal($m_data, $division);
                    ?>
                            
                        </div>
                        <!-- end row -->
                    </div>
                            
                    <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
<!-- initialize footer and js plugins -->
<!-- < view_cell('\App\Libraries\AptmLibraries::footer')>     -->
<!-- xxxx -->

<?= $this->endSection()?>
