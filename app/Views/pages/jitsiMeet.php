<!-- MAIN CONTENT OF ZOOM MEETINGS PAGE -->

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
                        <div class="col-lg-8">

                            <!-- page refresh -->
                            <div class="text-center" style="position: relative; bottom: 10px">
                                <a href="<?php echo base_url('AptmController/view_jitsiMeet');?>" 
                                class="btn btn-light btn-sm btn-rounded" 
                                title="click to refresh feed">
                                <i class="uil-sync font-20"></i></a>
                                <h5 class="header-title">Jitsi Meetings</h5>
                            </div>
                            <!-- x -->

                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                  <li class="nav-item">
                                      <a href="#upcoming" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                         <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                          <span class="d-none d-md-block">Upcoming Meetings</span>
                                      </a>
                                 </li>
                                 <li class="nav-item">
                                      <a href="#finished" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                          <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                          <span class="d-none d-md-block">Finished Meetings</span>
                                       </a>
                                 </li>
                            </ul> 

                            <!-- meetings feed -->
                            <div class="tab-content">
                                
                                <!-- UPCOMING MEETINGS -->
                                <div class="tab-pane active" id="upcoming">
                                <?php 
                                    if(count($meet_data) > 0){
                                        foreach($meet_data as $meet_datum):
                                            if($meet_datum['meet_content_where'] == 'Jitsi Meet' && $meet_datum['meet_status'] == 'Scheduled'):
                                ?>
                                <div class="card">
                                    <div class="card-body pb-1">
                                        <!-- fetch the data of member creator id -->
                                        <?php foreach($m_data as $m_datum):?>
                                            <?php if($meet_datum['meet_creator_id'] == $m_datum['m_id']):?>
                                        <div class="d-flex">
                                            <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                <p class="text-muted"><small>Admin | <?= date("h:i a  m/d/Y", strtotime($meet_datum['meet_time_created']))?> <span class="mx-1"></span> <span></span></small></p>
                                            </div> <!-- end w-100-->
                                        </div> <!-- end d-flex -->

                                        <hr class="m-0">

                                        <div class="mt-3 ms-1 me-1">
                                            <p class="font-16 m-0 mt-1"><strong>Topic: </strong></p>
                                            <div class="text-center">
                                                <h4><?=$meet_datum['meet_title']?></h4>
                                                <span class="m-2"><strong>Agenda: </strong></span><?=htmlspecialchars_decode($meet_datum['meet_content_what'])?>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <img src="<?= $meet_datum['meet_image']?>" alt="post-img" class="rounded me-1 mb-3 p-1 mb-sm-0 img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-1">
                                                        <p class="font-16 m-0"><strong>Participants: </strong><?= $meet_datum['meet_content_who']?></p>
                                                        <p class="font-16 m-0 mt-1"><strong>Video Meeting App: </strong><?= $meet_datum['meet_content_where']?></p>
                                                        <p class="font-16 m-0 mt-1 mb-1"><strong>Division: </strong><?= $meet_datum['meet_division']?></p>
                                                        <p class="font-16 m-0 mt-1 mb-1"><strong>Duration: </strong><?= $meet_datum['meet_duration']?></p>
                                                        <p class="font-16 m-0 mt-1 mb-1"><strong>Meeting Password: </strong><?= $meet_datum['meet_password']?></p>
                                                        <p class="font-16 m-0 mt-1 mb-1"><strong>Start Time: </strong><?= date("h:i a  m/d/Y", strtotime($meet_datum['meet_time_started']))?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($meet_datum['meet_room_status'] == 'Open'):?>
                                            <div class="text-center mt-2">
                                                <form action="saveMeetingAttendee" method="post">
                                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                    <input type="hidden" value="<?=$meet_datum['meet_id']?>" name="txt_meet_id">
                                                    <input type="hidden" value="<?=$meet_datum['meet_title']?>" name="txt_meet_title">
                                                    <input type="hidden" value="<?=$meet_datum['meet_division']?>" name="txt_meet_division">
                                                    <input type="hidden" value="<?=$meet_datum['meet_link']?>" name="txt_meet_link">
                                                    <input type="hidden" value="<?=$session->get('l_id')?>" name="txt_member_id">
                                                    <button type="submit" class="btn btn-primary btn-rounded me-2" 
                                                        style="margin-top: 15px;" title="click to Join the Jitsi Meeting">
                                                        <i class="uil-video font-16 me-2"></i><span>Join Meeting Now</span>
                                                    </button>
                                                </form>
                                            </div>
                                            <?php else:?>
                                            <div class="text-center mt-2">
                                                <p class="text-primary"><i><strong>Note: </strong> Please wait, until the Meeting Room is Open. It will be Open by the Host of Meeting.</i></p>
                                            </div>    
                                            <?php endif;?>
                                        </div>

                                        <div class="mt-1 mb-1">
                                            <p class="text-muted"><i class="uil uil-comments-alt"></i>
                                                <?php 
                                                    if($meet_datum['meet_comment_num'] == 1){
                                                        echo '1 Comment';
                                                    }elseif($meet_datum['meet_comment_num'] <= 0){
                                                        echo '0 Comment';
                                                    }else{
                                                        echo $meet_datum['meet_comment_num'].' Comments';
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <hr class="m-0">

                                        <!-- 1 comment -->
                                        <div class="mt-3">
                                            <!-- jitsi meetings comments feed -->
                                            <?php 
                                                foreach($meet_com_data as $com_info):
                                                    if($com_info['meet_id'] == $meet_datum['meet_id']):
                                            ?>
                                            <div class="d-flex m-2">

                                                <!-- fetch the commentator data -->
                                                <?php foreach($m_data as $m_datum):?>
                                                    <?php if($com_info['meet_com_creator_id'] == $m_datum['m_id']):?>

                                                <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                    <p class="text-muted mb-0"><small><?=$com_info['meet_com_time_created']?></small></p>
                                                    <p class="my-1 ms-1"><?=$com_info['meet_com_content']?>
                                                        <!-- edit and delete button -->
                                                        <?php if($com_info['meet_com_creator_id'] == $session->get('l_id')):?>
                                                            <a href="#" class="btn_pending badge bg-primary rounded-pill font-13 ms-1" 
                                                                data-bs-toggle="modal" data-bs-target="#editCom<?=$com_info['meet_com_id']?>" 
                                                                title="click to edit your comment">edit
                                                            </a>
                                                            <a href="#" class="btn_pending badge bg-danger rounded-pill font-13" 
                                                                data-bs-toggle="modal" data-bs-target="#deleteCom<?=$com_info['meet_com_id']?>" 
                                                                title="click to delete your comment">delete
                                                            </a>
                                                        <?php endif;?>
                                                        <?php endif; endforeach;?> 
                                                    </p>
                                                </div> <!-- end w-100 -->
                                            </div> <!-- end d-flex -->
                                            <?php endif; endforeach;?>        
                                            <?php endif;?>
                                            <?php endforeach;?>    
                                            <hr>
                                            <!-- comment box -->
                                            <div class="d-flex mb-2">
                                                <img src="<?=$session->get('l_profile_pic')?>" height="32" class="align-self-start rounded me-2" 
                                                    alt="<?=$session->get('l_fname').' '.$session->get('l_lname')?>" 
                                                    title="<?=$session->get('l_fname').' '.$session->get('l_lname').' | '.$session->get('l_type')?>">
                                                <div class="w-100">
                                                    <form action="saveJitsiMeetComment" method="POST">
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <input type="text" class="form-control border-0 form-control-sm" placeholder="Write a comment" name="txt_comment" required>
                                                        <input type="hidden" value="<?=$session->get('l_id')?>" name="txt_m_id">
                                                        <input type="hidden" value="<?= $meet_datum['meet_id']?>" name="txt_meet_id">
                                                        <input type="hidden" value="<?= $meet_datum['meet_title']?>" name="txt_meet_title">
                                                </div> <!-- end w-100 -->
                                                <button type="submit" class="btn btn-sm btn-primary" title="send your comment"><i class="uil uil-message"></i></button>
                                                </form>
                                            </div> <!-- end d-flex -->
                                            <!-- comment box -->
                                        </div>
                                    </div> <!-- end card-body -->
                                </div>

                                <?php endif;endforeach;
                                    }else {?>

                                <div class="card">
                                    <div class="card-body pb-1">
                                        <div class="my-3">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img width="300" src="<?=base_url('public/assets/images/aptm/undraw_empty.svg')?>" alt="post-img" class="" style="padding-left: 20px;">
                                                </div>
                                                <div class="col-sm-6">
                                                    <h5 class="text-center" style="position: relative;top: 70px; padding-right: 20px;">"There are no zoom meetings created yet !</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body -->
                                </div>

                                <?php }?>
                            </div>
                            
                            <!-- FINISHED MEETINGS -->
                            <div class="tab-pane show" id="finished">
                                <?php 
                                    if(count($meet_data) > 0){
                                        foreach($meet_data as $meet_datum):
                                            if($meet_datum['meet_content_where'] == 'Jitsi Meet' && $meet_datum['meet_status'] == 'Ended'):
                                ?>
                                <div class="card">
                                    <div class="card-body pb-1">
                                        <!-- fetch the data of member creator id -->
                                        <?php foreach($m_data as $m_datum):?>
                                            <?php if($meet_datum['meet_creator_id'] == $m_datum['m_id']):?>
                                        <div class="d-flex">
                                            <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                <p class="text-muted"><small>Admin | <?= date("h:i a  m/d/Y", strtotime($meet_datum['meet_time_created']))?> <span class="mx-1"></span> <span></span></small></p>
                                            </div> <!-- end w-100-->
                                        </div> <!-- end d-flex -->

                                        <hr class="m-0">

                                        <div class="mt-3 ms-1 me-1">
                                            <p class="font-16 m-0 mt-1"><strong>Topic: </strong></p>
                                            <div class="text-center">
                                                <h4><?=$meet_datum['meet_title']?></h4>
                                                <span class="m-2"><strong>Agenda: </strong></span><?=htmlspecialchars_decode($meet_datum['meet_content_what'])?>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <img src="<?= $meet_datum['meet_image']?>" alt="post-img" class="rounded me-1 mb-3 p-1 mb-sm-0 img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-1">
                                                        <p class="font-16 m-0"><strong>Participants: </strong><?= $meet_datum['meet_content_who']?></p>
                                                        <p class="font-16 m-0 mt-1"><strong>Video Meeting App: </strong><?= $meet_datum['meet_content_where']?></p>
                                                        <p class="font-16 m-0 mt-1 mb-1"><strong>Division: </strong><?= $meet_datum['meet_division']?></p>
                                                        <p class="font-16 m-0 mt-1 mb-1"><strong>Duration: </strong><?= $meet_datum['meet_duration']?></p>
                                                        <p class="font-16 m-0 mt-1 mb-1"><strong>Meeting Password: </strong><?= $meet_datum['meet_password']?></p>
                                                        <p class="font-16 m-0 mt-1 mb-1"><strong>Start Time: </strong><?= date("h:i a  m/d/Y", strtotime($meet_datum['meet_time_started']))?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-1 mb-1">
                                            <p class="text-muted"><i class="uil uil-comments-alt"></i>
                                                <?php 
                                                    if($meet_datum['meet_comment_num'] == 1){
                                                        echo '1 Comment';
                                                    }elseif($meet_datum['meet_comment_num'] <= 0){
                                                        echo '0 Comment';
                                                    }else{
                                                        echo $meet_datum['meet_comment_num'].' Comments';
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <hr class="m-0">

                                        <!-- 1 comment -->
                                        <div class="mt-3">
                                            <!-- jitsi meetings comments feed -->
                                            <?php 
                                                foreach($meet_com_data as $com_info):
                                                    if($com_info['meet_id'] == $meet_datum['meet_id']):
                                            ?>
                                            <div class="d-flex m-2">

                                                <!-- fetch the commentator data -->
                                                <?php foreach($m_data as $m_datum):?>
                                                    <?php if($com_info['meet_com_creator_id'] == $m_datum['m_id']):?>

                                                <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                    <p class="text-muted mb-0"><small><?=$com_info['meet_com_time_created']?></small></p>
                                                    <p class="my-1 ms-1"><?=$com_info['meet_com_content']?>
                                                        <!-- edit and delete button -->
                                                        <?php if($com_info['meet_com_creator_id'] == $session->get('l_id')):?>
                                                            <a href="#" class="btn_pending badge bg-primary rounded-pill font-13 ms-1" 
                                                                data-bs-toggle="modal" data-bs-target="#editCom<?=$com_info['meet_com_id']?>" 
                                                                title="click to edit your comment">edit
                                                            </a>
                                                            <a href="#" class="btn_pending badge bg-danger rounded-pill font-13" 
                                                                data-bs-toggle="modal" data-bs-target="#deleteCom<?=$com_info['meet_com_id']?>" 
                                                                title="click to delete your comment">delete
                                                            </a>
                                                        <?php endif;?>
                                                        <?php endif; endforeach;?> 
                                                    </p>
                                                </div> <!-- end w-100 -->
                                            </div> <!-- end d-flex -->
                                            <?php endif; endforeach;?>        
                                            <?php endif;?>
                                            <?php endforeach;?>    
                                            <hr>
                                            <!-- comment box -->
                                            <div class="d-flex mb-2">
                                                <img src="<?=$session->get('l_profile_pic')?>" height="32" class="align-self-start rounded me-2" 
                                                    alt="<?=$session->get('l_fname').' '.$session->get('l_lname')?>" 
                                                    title="<?=$session->get('l_fname').' '.$session->get('l_lname').' | '.$session->get('l_type')?>">
                                                <div class="w-100">
                                                    <form action="saveJitsiMeetComment" method="POST">
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <input type="text" class="form-control border-0 form-control-sm" placeholder="Write a comment" name="txt_comment" required>
                                                        <input type="hidden" value="<?=$session->get('l_id')?>" name="txt_m_id">
                                                        <input type="hidden" value="<?= $meet_datum['meet_id']?>" name="txt_meet_id">
                                                        <input type="hidden" value="<?= $meet_datum['meet_title']?>" name="txt_meet_title">
                                                </div> <!-- end w-100 -->
                                                <button type="submit" class="btn btn-sm btn-primary" title="send your comment"><i class="uil uil-message"></i></button>
                                                </form>
                                            </div> <!-- end d-flex -->
                                            <!-- comment box -->
                                        </div>
                                    </div> <!-- end card-body -->
                                </div>

                                <?php endif;endforeach;
                                    }else {?>

                                <div class="card">
                                    <div class="card-body pb-1">
                                        <div class="my-3">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img width="300" src="<?=base_url('public/assets/images/aptm/undraw_empty.svg')?>" alt="post-img" class="" style="padding-left: 20px;">
                                                </div>
                                                <div class="col-sm-6">
                                                    <h5 class="text-center" style="position: relative;top: 70px; padding-right: 20px;">"There are no zoom meetings created yet !</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body -->
                                </div>

                                <?php }?>
                            </div>
                        </div>             
                    </div> <!-- end col-->

                            <!-- EDIT COMMENT -->
                            <?php foreach($meet_com_data as $com_info):?>
                                <div class="modal fade" id="editCom<?=$com_info['meet_com_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-primary">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit your Comment to this Announcement</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body m-2">
                                                <form method="POST" action="editJitsiMeetCom" enctype="multipart/form-data">
                                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                    <div class="row"> 
                                                        <div class="mb-2">
                                                            <input type="hidden" name="txt_meet_id" value="<?=$com_info['meet_id']?>">
                                                            <input type="hidden" name="txt_id" value="<?=$com_info['meet_com_id']?>">
                                                            <input type="hidden" name="txt_comment_before" value="<?=$com_info['meet_com_content']?>">
                                                            <strong><small class="">Your Comment : </small></strong>
                                                            <textarea class="form-control p-2 mt-2" rows="4" name="txt_comment_new"><?=$com_info['meet_com_content']?></textarea>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary" name="btn_save">Save Changes</button>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <?php endforeach;?>
                            <!-- XX -->



                            <!-- DELETE COMMENT MODAL -->
                            <?php foreach($meet_com_data as $com_datum):?>
                                <div id="deleteCom<?=$com_datum['meet_com_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content modal-filled bg-danger">
                                            <div class="modal-body p-4">
                                            <div class="text-center">
                                                <i class="dripicons-warning h1"></i>
                                                <h4 class="mt-2">Are you sure?</h4>
                                                <p class="mt-3">Once you delete your comment, it can't be undone.</p>
                                                <form action="deleteJitsiMeetCom" method="post">
                                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                    <input type="hidden" value="<?=$com_datum['meet_com_id']?>" name="txt_id">
                                                    <input type="hidden" value="<?=$com_datum['meet_com_content']?>" name="txt_comment">
                                                    <input type="hidden" value="<?=$com_datum['meet_id']?>" name="txt_meet_id">
                                                    <button type="sumbit" name="btn_del_com" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
                                                    <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">No</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            <?php endforeach;?>
                            <!-- XX -->

                            <div class="col-lg-4">
                                <!-- initialize the latest news widget from libraries -->
                                <?= view_cell('\App\Libraries\AptmLibraries::latestNewsWidget')?>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                            

                    <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
<!-- initialize footer and js plugins -->
<!-- < view_cell('\App\Libraries\AptmLibraries::footer')>     -->
<!-- xxxx -->

<?= $this->endSection()?>
