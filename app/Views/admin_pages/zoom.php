<!-- MAIN CONTENT OF HOME PAGE -->

<?= $this->extend('layouts/adminLayout')?>
<?= $this->section('adminMainContent')?>

<!-- Start Content-->
                        <?php $session = \Config\Services::session();?>

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

                            <!-- ZOOM MEETINGS TABLE -->
                           
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <h4 class="header-title mt-1">Zoom Meeting Records</h4>
                                                <p class="text-muted font-14">
                                                    All records of Zoom Meetings in all division is displayed in the table.
                                                </p>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="ms-4" style="position: relative; left: 60px;">
                                                    <button type="button" class="btn btn-primary mb-2">
                                                        <i class="uil uil-print"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-content"> 
                                            <div class="tab-pane show active table-responsive" id="scroll-horizontal-preview">
                                                <table id="tbl_instant_meeting" class="table w-100 nowrap table-centered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>Creator</th>
                                                            <th>Meeting Status</th>
                                                            <th>Room Status</th>
                                                            <th>Zoom Meeting Id</th>
                                                            <th>Topic</th>
                                                            <th>Agenda</th>
                                                            <th>Who</th>
                                                            <th>Division</th>
                                                            <th>Meeting Password</th>
                                                            <th>Start Time</th>
                                                            <th>Image Included</th>
                                                            <th>Attendees</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if(count($meet_all_data) > 0){
                                                                foreach($meet_all_data as $meet_info):?>
                                                        <tr>
                                                            <td class="table-action">
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#deleteZMeet<?=$meet_info['meet_id']?>" title="click to delete this meeting"> 
                                                                    <i class="uil uil-trash-alt text-danger"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                            <?php foreach($m_data as $m_datum):?>
                                                                <?php if($meet_info['meet_creator_id'] == $m_datum['m_id']):?>
                                                                <img src="<?=$m_datum['m_profile_pic']?>" alt="table-user" class="me-1 rounded-circle" width="30" height="30">
                                                                <?=$m_datum['m_fname'].' '.$m_datum['m_lname'].' | '.$m_datum['m_type']?>
                                                            <?php endif; endforeach;?>
                                                            </td> 

                                                            <!-- Meeting Status -->
                                                            <?php if($meet_info['meet_status'] == 'Ongoing'):?>
                                                                <td><h4><span class="badge bg-success rounded-pill">Ongoing</span></h4></td>
                                                            <?php elseif($meet_info['meet_status'] == 'Ended'):?>
                                                                <td><h4><span class="badge bg-primary rounded-pill">Ended</span></h4></td>
                                                            <?php endif;?>

                                                            <!-- Meeting Room Status -->
                                                            <td>
                                                                <h4>
                                                                <?php if($meet_info['meet_room_status'] == 'Close' && $meet_info['meet_status'] == 'Ended'):?>
                                                                    <span class="badge bg-info rounded-pill">Soon to Open</span>
                                                                <?php elseif($meet_info['meet_room_status'] == 'Close' && $meet_info['meet_status'] == 'Ongoing'):?>
                                                                    <a class="btn_pending badge bg-primary rounded-pill" 
                                                                        data-bs-toggle="modal" data-bs-target="#openMeetingRoom<?=$meet_info['meet_id']?>" 
                                                                        title="click to open the meeting room">You can open it anytime now.
                                                                    </a>
                                                                <?php elseif($meet_info['meet_room_status'] == 'Open'):?>
                                                                    <a class="btn_pending badge bg-success rounded-pill" 
                                                                        data-bs-toggle="modal" data-bs-target="#closeMeetingRoom<?=$meet_info['meet_id']?>" 
                                                                        title="click to close the meeting room">Opened
                                                                    </a>
                                                                <?php elseif($meet_info['meet_room_status'] == 'Closed'):?>
                                                                    <span class="btn_pending badge bg-danger rounded-pill">Closed
                                                                    </span>
                                                                <?php endif;?>
                                                                </h4>
                                                            </td>
                                                            <!-- x -->

                                                            <td><?=$meet_info['meet_zoom_id']?></td>
                                                            <td><?=$meet_info['meet_title']?></td>
                                                            <td><?=htmlspecialchars_decode($meet_info['meet_content_what'])?></td>
                                                            <td><?=$meet_info['meet_content_who']?></td>
                                                            <td><?=$meet_info['meet_division']?></td>
                                                            <td><?=$meet_info['meet_password']?></td>
                                                            <td><?=$meet_info['meet_time_started']?></td>
                                                            <td>
                                                                <img src="<?=$meet_info['meet_image']?>" alt="image" class="me-3" height="50">
                                                            </td>

                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-small btn-primary btn-rounded" data-bs-toggle="modal" 
                                                                    data-bs-target="#viewAttendees<?=$meet_info['meet_id']?>" title="click to view the list of attendees on this meeting"> 
                                                                    <i class="uil uil-users-alt"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;
                                                            }else{?>
                                                            <div>
                                                                <p class="text-muted">There's no instant meeting created yet.</p>
                                                            </div>
                                                        <?php }?>
                                                    </tbody>
                                                </table>                                          
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->

                            <!-- end Table widget-->
        

                            <!-- x -->

                        </div>
                        <!-- end row -->


                        <!-- MODAL START -->

                        <!-- CREATE ANNOUNCEMENT -->
                        <div class="modal fade" id="createZmeet" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Create new Zoom Meeting</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <div>
                                            <p class="text-muted font-16">Admin, in order to create zoom meeting, make sure that 
                                                your account in Zoom is Logged in and all of these fields are required. 
                                                Please be reminded that the maximum number of meeting participants is 100.</p>
                                        </div>
                                        <form method="POST" action="createZoom" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <strong><small class="">Topic *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtTitle"
                                                            placeholder="Topic" value="" maxlength="50" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Who (participants) *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtWho"
                                                            placeholder="Who" value="" maxlength="50" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <div class="row mt-2">
                                                            <div class="col-lg-6">
                                                                <span><strong><small>Duration (hour) *</small></strong></span>
                                                                <select class="form-select mt-1" name="txtDurationH" required>
                                                                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                                                                    <option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option>
                                                                    <option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option>
                                                                    <option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
                                                                    <option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
                                                                    <option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <span><strong><small>minutes</small></strong></span>
                                                                <select class="form-select mt-1" name="txtDurationM" required>
                                                                    <option value="0">0</option>
                                                                    <option value="15">15</option>
                                                                    <option value="30">30</option>
                                                                    <option value="45">45</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <strong><small>Division *</small></strong>
                                                        <select class="form-select mt-1" id="txtDivision" name="txtDivision" required>
                                                            <option value="All Divisions">All Divisions</option>
                                                            <option value="APTM Oriental Mindoro">APTM Oriental Mindoro</option>
                                                            <option value="APTM Occidental Mindoro">APTM Occidental Mindoro</option>
                                                            <option value="APTM Calapan City">APTM Calapan City</option>
                                                            <option value="APTM Marinduque">APTM Marinduque</option>
                                                            <option value="APTM Romblon">APTM Romblon</option>
                                                            <option value="APTM Palawan">APTM Palawan</option>
                                                            <option value="APTM Puerto Princesa">APTM Puerto Princesa</option>
                                                        </select>
                                                    </div>
                                                          
                                                    <div class="mb-2">
                                                        <strong><small>Include Image *</small></strong>
                                                        <input class="form-control mt-1" 
                                                        type="file" name="txtImage" accept=".png, .jpg, .jpeg" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <strong><small>Agenda *</small></strong>
                                                        <p class="mb-1"></p>
                                                        <textarea class="form-control p-2" id="txtWhatEditor" 
                                                        rows="11" placeholder="Write your meeting agenda here ..." name="txtWhat"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="btn_start">Create Instant Meeting</button>
                                    </div>
                                </form>
                             </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- XXX -->

                        <!-- DELETE ZOOM MEETING -->
                        <?php foreach($meet_all_data as $meet_info):?>                                            
                        <div id="deleteZMeet<?=$meet_info['meet_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-danger">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Are you sure?</h4>
                                        <p class="mt-3">Once you delete this Zoom Meeting, it can't be undone.</p>
                                        <form action="deleteZoomMeeting" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$meet_info['meet_zoom_id']?>" name="txt_id">
                                            <input type="hidden" value="<?=$meet_info['meet_title']?>" name="txtTitle">
                                            <input type="hidden" value="<?=$meet_info['meet_division']?>" name="txtDivision">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
                                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- x -->
                        <?php endforeach?>


                        <!-- OPEN MEETING ROOM MODAL -->

                        <?php function open_meeting_room_modal($meet_data){?>

                        <?php foreach($meet_data as $meet_datum):?>
                        <div id="openMeetingRoom<?=$meet_datum['meet_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-info">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Open this Meeting Room?</h4>
                                        <p>Just click the open button to allow the members to join this Jitsi Meeting. Please 
                                            be reminded, that you have to open the meeting room, 20 mins before the Scheduled Time of the Meeting.</p>
                                        <form action="openMeetingRoom" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$meet_datum['meet_id']?>" name="txt_meet_id">
                                            <input type="hidden" value="<?=$meet_datum['meet_title']?>" name="txt_meet_title">
                                            <input type="hidden" value="<?=$meet_datum['meet_division']?>" name="txt_meet_division">
                                            <button type="sumbit" name="btn_open_room" class="btn btn-light my-2">Open</button>
                                            <button type="button" class="btn btn-outline-light my-2 ms-1" data-bs-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;?>

                        <?php }?> 

                        <!-- initialize function -->
                                                
                        <?php 
                            open_meeting_room_modal($meet_all_data);
                        ?>

                        <!-- x -->

                        <!-- CLOSE MEETING ROOM MODAL -->

                        <?php function close_meeting_room_modal($meet_data){?>

                        <?php foreach($meet_data as $meet_datum):?>
                        <div id="closeMeetingRoom<?=$meet_datum['meet_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-danger">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">CLose this Meeting Room?</h4>
                                        <p>Just click the close button to disallow the members to join this Jitsi Meeting.
                                            You can close the room meeting anytime after opening it.</p>
                                        <form action="closeMeetingRoom" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$meet_datum['meet_id']?>" name="txt_meet_id">
                                            <input type="hidden" value="<?=$meet_datum['meet_title']?>" name="txt_meet_title">
                                            <input type="hidden" value="<?=$meet_datum['meet_division']?>" name="txt_meet_division">
                                            <button type="sumbit" name="btn_open_room" class="btn btn-light my-2">Close</button>
                                            <button type="button" class="btn btn-outline-light my-2 ms-1" data-bs-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;?>

                        <?php }?> 

                        <!-- initialize function -->
                                                
                        <?php 
                            close_meeting_room_modal($meet_all_data);
                        ?>

                        <!-- x -->

                        <!-- VIEW JITSI MEETING LIST OF ATTENDEES -->
                        <?php function view_attendees_modal($meet_data, $meet_attendees_data, $m_data){?>

                        <?php foreach($meet_data as $meet_datum):?>
                        <?php foreach($meet_attendees_data as $a_datum):?>
                        <div class="modal fade" id="viewAttendees<?=$meet_datum['meet_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title">Meeting List of Attendees</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="m-3 mt-1">
                                            <h4 class="mb-3">Meeting Information</h4>
                                            <div class="row mb-3">
                                                <div class="col-lg-6">
                                                    <p class="mb-1 font-16 text-muted"><strong>Meeting Title :</strong> 
                                                    <span class="ms-2"><?=$meet_datum['meet_title']?></span></p>
                                                    <p class="mb-1 font-16 text-muted"><strong>For Who :</strong> 
                                                    <span class="ms-2"><?=$meet_datum['meet_content_who']?></span></p>
                                                    <p class="mb-1 font-16 text-muted"><strong>For Division :</strong> 
                                                    <span class="ms-2"><?=$meet_datum['meet_division']?></span></p>
                                                    <p class="mb-1 font-16 text-muted"><strong>Duration :</strong> 
                                                    <span class="ms-2"><?=$meet_datum['meet_duration']?></span></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p class="mb-1 font-16 text-muted"><strong>Status :</strong> 
                                                    <span class="ms-2"><?=$meet_datum['meet_status']?></span></p>
                                                    <p class="mb-1 font-16 text-muted"><strong>Time Started:</strong> 
                                                    <span class="ms-2"><?=date("h:i a  m/d/Y", strtotime($meet_datum['meet_time_started']))?></span></p>
                                                    <p class="mb-1 font-16 text-muted"><strong>Scheduled At:</strong> 
                                                    <span class="ms-2"><?=date("h:i a  m/d/Y", strtotime($meet_datum['meet_time_created']))?></span></p>
                                                    <p class="mb-1 font-16 text-muted"><strong>Meeting Creator :</strong> 
                                                    <span class="ms-2">
                                                            <?php foreach($m_data as $m_datum):?>
                                                                <?php if($meet_datum['meet_creator_id'] == $m_datum['m_id']):?>
                                                                    <?=$m_datum['m_fname'].' '.$m_datum['m_lname'].
                                                                    ' | '.$m_datum['m_type']?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                    </span></p>
                                                </div>
                                            </div>
                                            <h4 class="mb-3">Meeting Attendees List</h4>
                                            <table id="tbl_view_attendees" class="table w-100 nowrap table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Member Name</th>
                                                        <th>Attend Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($meet_datum['meet_id'] == $a_datum['ma_meeting_id']):?>
                                                    <tr>
                                                        <td>
                                                            <?php foreach($m_data as $m_datum):?>
                                                                <?php if($a_datum['ma_member_id'] == $m_datum['m_id']):?>
                                                                    <img src="<?=$m_datum['m_profile_pic']?>" alt="table-user" 
                                                                        class="me-1 rounded-circle" width="30" height="30">
                                                                    <?=$m_datum['m_fname'].' '.$m_datum['m_lname'].
                                                                    ' | '.$m_datum['m_type'].' | '.$m_datum['m_division']?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </td>
                                                        <td><?=$a_datum['ma_datetime']?></td>
                                                    </tr>
                                                    <?php endif;?>
                                                </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- X -->  
                        <?php endforeach;?>
                        <?php endforeach;?>

                        <?php }?> 

                            <!-- initialize function -->
                                                
                            <?php 
                                view_attendees_modal($meet_all_data, $meet_att_data, $m_data);
                            ?>

                            <!-- x -->
                        <!-- x -->

                    </div> <!-- container -->

                </div> <!-- content -->


<?= $this->endSection()?>



