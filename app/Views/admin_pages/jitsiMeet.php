<!-- MAIN CONTENT OF HOME PAGE -->

<?= $this->extend('layouts/adminLayout')?>
<?= $this->section('adminMainContent')?>

<!-- Start Content-->
                        <?php $session = \Config\Services::session();?>

                    <div id="main_page">
                        
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
                            
                            <div id="divMsg" class="alert alert-success" style="display: none">
                                <span id="msg"></span>
                            </div>
                            <!-- TABLE WIDGET -->

                            <!-- JITSI MEETINGS TABLE -->
                           
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <h4 class="header-title mt-1">Meeting Records</h4>
                                                <p class="text-muted font-14">
                                                    All records of Jitsi Meetings per division is displayed in the table.
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
                                                        <tr class="text-center">
                                                            <th>Action</th>
                                                            <th>Creator</th>
                                                            <th>Meeting Status</th>
                                                            <th>Room Status</th>
                                                            <th>Topic</th>
                                                            <th>Agenda</th>
                                                            <th>Who</th>
                                                            <th>Division</th>
                                                            <th>Meeting Password</th>
                                                            <th>Duration</th>
                                                            <th>Start Time</th>
                                                            <th>Image Included</th>
                                                            <th>Date Created</th>
                                                            <th>Attendees</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if(count($meet_all_data) > 0){
                                                                foreach($meet_all_data as $meet_info):?>
                                                        <tr>
                                                            <td class="table-action">
                                                                <?php if($meet_info['meet_status'] == 'Scheduled'):?>
                                                                <button onclick="createJitsi<?=$meet_info['meet_id']?>()"  id='btn_start_meeting' class="btn btn-success btn-rounded me-1" 
                                                                    title="click to start the meeting.">Start Meeting
                                                                </button>
                                                                <?php endif;?>
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#deleteJMeet<?=$meet_info['meet_id']?>" title="click to delete this meeting"> 
                                                                    <i class="uil uil-trash-alt text-danger"></i>
                                                                </a>
                                                            </td>

                                                            <!-- creator -->
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
                                                            <?php elseif($meet_info['meet_status'] == 'Scheduled'):?>
                                                                <td><h4><span class="badge bg-primary rounded-pill">Scheduled</span></h4></td>
                                                            <?php elseif($meet_info['meet_status'] == 'Ended'):?>
                                                                <td><h4><span class="badge bg-danger rounded-pill">Ended</span></h4></td>
                                                            <?php endif;?>
                                                            <!-- x -->

                                                            <!-- Meeting Room Status -->
                                                            <td>
                                                                <h4>
                                                                <?php if($meet_info['meet_room_status'] == 'Close' && $meet_info['meet_status'] == 'Ended'):?>
                                                                    <span class="badge bg-info rounded-pill">Closed</span>
                                                                <?php elseif($meet_info['meet_room_status'] == 'Close' && $meet_info['meet_status'] == 'Ongoing'):?>
                                                                    <a class="btn_pending badge bg-primary rounded-pill" 
                                                                        data-bs-toggle="modal" data-bs-target="#openMeetingRoom<?=$meet_info['meet_id']?>" 
                                                                        title="click to open the meeting room">You can open it anytime now.
                                                                    </a>
                                                                <?php elseif($meet_info['meet_room_status'] == 'Close' && $meet_info['meet_status'] == 'Scheduled'):?>
                                                                    <a class="btn_pending badge bg-primary rounded-pill" 
                                                                        data-bs-toggle="modal" data-bs-target="#openMeetingRoom<?=$meet_info['meet_id']?>" 
                                                                        title="click to open the meeting room">Please open it on scheduled time.
                                                                    </a>
                                                                <?php elseif($meet_info['meet_room_status'] == 'Open'):?>
                                                                    <a class="btn_pending badge bg-success rounded-pill" 
                                                                        data-bs-toggle="modal" data-bs-target="#closeMeetingRoom<?=$meet_info['meet_id']?>" 
                                                                        title="click to close the meeting room">Opened
                                                                    </a>
                                                                <?php endif;?>
                                                                </h4>
                                                            </td>
                                                            <!-- x -->

                                                            <td><?=$meet_info['meet_title']?></td>
                                                            <td><?=htmlspecialchars_decode($meet_info['meet_content_what'])?></td>
                                                            <td><?=$meet_info['meet_content_who']?></td>
                                                            <td><?=$meet_info['meet_division']?></td>
                                                            <td><?=$meet_info['meet_password']?></td>
                                                            <td><?=$meet_info['meet_duration'].' mins'?></td>
                                                            <td><?=date("h:i a  m/d/Y", strtotime($meet_info['meet_time_started']))?></td>
                                                            <td>
                                                                <img src="<?=$meet_info['meet_image']?>" alt="image" class="me-3" height="50">
                                                            </td>
                                                            <td><?=date("h:i a  m/d/Y", strtotime($meet_info['meet_time_created']))?></td>
                                                            <td class="text-center">
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#viewAttendees<?=$meet_info['meet_id']?>" title="click to view the list of attendees on this meeting"> 
                                                                    <i class="uil uil-users-alt text-primary"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;
                                                            }else{?>
                                                            <div>
                                                                <p class="text-muted">There's no Jitsi Meeting created yet.</p>
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
                            <?php //}?>
                            
                            <!-- x -->

                        </div>
                        <!-- end row -->


                        <!-- MODAL START -->

                        <!-- CREATE JITSI MEETING-->
                        <div class="modal fade" id="createGmeet" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Create new Jitsi Meeting</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <div>
                                            <p class="text-muted font-16">In order to create new meeting you have to fill up all these field.</p>
                                        </div>
                                        <form method="POST" action="createJitsi" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <strong><small class="">Topic *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtTitle" id="txtTitle"
                                                            placeholder="Title" value="" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small class="">Who (participants) *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtWho"
                                                            placeholder="Who" value="" required>
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
                                                    <?php $timezone = "Asia/Manila";
                                                        date_default_timezone_set($timezone);
                                                        $date_min = date('Y-m-d\TH:i',strtotime("- 1 mins"));
                                                        $date_max = date('Y-m-d\TH:i',strtotime("+ 2 months"));
                                                        $date = new DateTime();
                                                        $date_now = $date->format('Y-m-d\TH:i'); 
                                                    ?>            
                                                    <div class="mb-2">
                                                        <strong><small>Schedule to (date)</small></strong>
                                                        <input class="form-control mt-1" type="datetime-local" 
                                                        name="txtDate" max="<?=$date_max?>" min="<?=$date_min?>" 
                                                        value="<?=$date_now?>" required>
                                                    </div>          
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
                                                    <div class="">
                                                        <strong><small>Include Image *</small></strong>
                                                        <input class="form-control mt-1" 
                                                            type="file" name="txtImage" accept="image/*" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <strong><small>Agenda *</small></strong>
                                                        <p class="mb-1"></p>
                                                        <textarea class="form-control p-2" id="txtWhatEditor" 
                                                        rows="11" placeholder="Write something here ..." name="txtWhat"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="btn_start">Create Meeting</button>
                                    </div>
                                </form>
                             </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- XXX -->

                    </div><!-- end of MAIN PAGE -->    

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

                    <!-- X -->    
                    
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
                    
                    <!-- DELETE JITSI MEETING -->
                    <?php foreach($meet_all_data as $meet_info):?>                                            
                        <div id="deleteJMeet<?=$meet_info['meet_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-danger">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Are you sure?</h4>
                                        <p class="mt-3">Once you delete this Jitsi Meeting, it can't be undone.</p>
                                        <form action="deleteJitsiMeet" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$meet_info['meet_id']?>" name="txt_id">
                                            <input type="hidden" value="<?=$meet_info['meet_title']?>" name="txt_title">
                                            <input type="hidden" value="<?=$meet_info['meet_division']?>" name="txt_division">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
                                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <?php endforeach?>                                       
                    <!-- x -->


                        <!-- create jitsi meeting -->
                        <div class="row">
                            <div class="col-lg-7"> 
                                <div class="card" id="jitsi-container"></div>
                                <button onclick="view_meet_info()" id="btn_pop_up" class="btn btn-dark btn-rounded mt-2" title="click to see jitsi meeting information">
                                    <i class="font-20 uil-question-circle"></i></button>
                                <div class="card p-4 pb-3 pt-3 bg-dark text-light" id="meet_details" style="border-radius: 50px;">
                                    <div class="mt-1">
                                        <div class="row">
                                            <a id="btn_close" onclick="close_meet_info()" type="button"><i class="font-20 mdi mdi-close-circle-outline text-light"></i></a>
                                            <p id="p_topic" class="font-18 m-0 text-center"></p>  
                                            <p id="p_agenda" class="font-14 m-0 mt-1 mb-2 text-center"></p>                  
                                            <div class="col-lg-6">
                                                <p id="p_participants" class="font-14 m-0 mt-1"></p>
                                                <p id="p_app" class="font-14 m-0 mt-1"></p>
                                                <p id="p_division" class="font-14 m-0 mt-1"></p>   
                                            </div>
                                            <div class="col-lg-6">
                                                <p id="p_duration" class="font-14 m-0 mt-1"></p>
                                                <p id="p_start" class="font-14 m-0 mt-1"></p>
                                                <p id="p_create_at" class="font-14 m-0 mt-1"></p>
                                            </div>
                                        </div>
                                        <form action="endJitsiMeet" method="POST">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" name="txt_id" id="txt_meet_id">   
                                            <input type="hidden" name="txt_title" id="txt_meet_title"> 
                                            <input type="hidden" name="txt_division" id="txt_meet_division">                 
                                            <button type="submit" class="btn btn-danger btn-rounded mt-3" style="float: right;" 
                                                title="click to end meeting now">Leave Jitsi Meet</button>                   
                                        </form>
                                    </div>
                                </div>
                                <script src='https://meet.jit.si/external_api.js'></script>
                                <script>
                                    // hide the meet details while theres no new meeting
                                    document.getElementById("meet_details").style.display = 'none';
                                    document.getElementById("btn_pop_up").style.display = 'none';

                                    // fetch the meet info
                                    <?php foreach($meet_all_data as $meet_info):?>
                                        <?php foreach($m_data as $m_datum):?>
                                            <?php if($meet_info['meet_creator_id'] == $m_datum['m_id']):?>

                                    function createJitsi<?=$meet_info['meet_id']?>(){
                                        var domain = "meet.jit.si";
                                        var topic = "<?=$meet_info['meet_title'].'-'.$meet_info['meet_password']?>"; //lagyan mo to ng random chars para safe
                                        var hostName = "<?=$m_datum['m_fname'].' '.$m_datum['m_lname']?>";
                                        var hostEmail = "<?=$m_datum['m_email']?>";
                                        var password = "<?=$meet_info['meet_password']?>";

                                        var options = {
                                            roomName: topic,
                                            width: 1055,
                                            height: 500,
                                            parentNode: document.querySelector('#jitsi-container'),
                                            configOverwrite: {},
                                            interfaceConfigOverwrite: {},
                                            userInfo: {
                                                email: hostEmail,
                                                displayName: hostName
                                            }
                                        }

                                        var api = new JitsiMeetExternalAPI(domain, options);

                                        // set new password for channel
                                        api.addEventListener('participantRoleChanged', function(event) {
                                            if (event.role === "moderator") {
                                                api.executeCommand('password', password);
                                            }
                                        });

                                        // hide the main page once the meeting started
                                        $(document).ready(function () {
                                            $('#main_page').hide();
                                            $('.modal-backdrop').hide();
                                            $('#btn_end').show();
                                            $('#btn_pop_up').show();
                                            // pass the meet data to inner html  
                                            $('#p_topic').text('<?='Topic: '.$meet_info['meet_title']?>');
                                            $('#p_agenda').html('<?='Agenda: '.htmlspecialchars_decode($meet_info['meet_content_what'])?>');
                                            $('#p_participants').text('<?='Participants: '.$meet_info['meet_content_who']?>');
                                            $('#p_app').text('<?='Meeting App: '.$meet_info['meet_content_where']?>');
                                            $('#p_division').text('<?='Division: '.$meet_info['meet_division']?>');
                                            $('#p_duration').text('<?='Duration: '.$meet_info['meet_duration']?>');
                                            $('#p_start').text('<?='Start Time: '.$meet_info['meet_time_started']?>');
                                            $('#p_create_at').text('<?='Created Time: '.$meet_info['meet_time_created']?>');
                                            $('#txt_meet_id').val('<?=$meet_info['meet_id']?>');
                                            $('#txt_meet_title').val('<?=$meet_info['meet_title']?>');
                                            $('#txt_meet_division').val('<?=$meet_info['meet_division']?>');
                                        });

                                        // SEND MESSAGE TO CO MEMBER
                                            $(document).ready(function(){
                                                $(document).on('click', '#btn_start_meeting', function() {
                                                    $.ajax({
                                                        method: 'post',
                                                        url: "<?=base_url()?>/AdminController/openMeetingRoomOnceStart/<?=$meet_info['meet_id']?>/<?=$meet_info['meet_title']?>/<?=$meet_info['meet_division']?>",
                                                        dataType: 'JSON'
                                                    });
                                                    alert('Jitsi Meeting with title: <?=$meet_info['meet_title']?> has been Started.');
                                                });
                                            });
                                        // x
                                    }
                                    
                                    // remove the embeded jitsi meet
                                    function remove() {
                                        api.dispose();
                                    }

                                    // view meet info
                                    function view_meet_info(){
                                        $(document).ready(function () {
                                            $('#meet_details').fadeIn();
                                        });
                                    }

                                    // close meet info
                                    function close_meet_info(){
                                        $(document).ready(function () {
                                            $('#meet_details').fadeOut();
                                        });
                                    }

                                    <?php endif; endforeach;?>
                                    <?php endforeach;?>
                                </script>
                                <style>
                                    #meet_details {
                                        position: fixed;
                                        bottom: 65px;
                                        right: 65px;
                                        width: 600px;
                                        z-index: 5;
                                    }
                                    #btn_pop_up {
                                        position: fixed;
                                        bottom: 45px;
                                        right: 45px;
                                        z-index: 2;
                                    }
                                    #btn_close {
                                        position: absolute;
                                        left: 540px;
                                        top: 20px;
                                    }
                                </style>
                            </div>
                        </div> 
                        <!-- X -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- bundle -->
                <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
                <script src="<?php echo base_url('public/assets/js/app.min.js'); ?>"></script>                        

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

                     // call the function
                    $(document).ready(function(){
                        let_keypress('#txtTitle');
                    });
                    // x


                </script>
<?= $this->endSection()?>



