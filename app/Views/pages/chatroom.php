<!-- MAIN CONTENT OF PAGE -->

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

                        <div class="row mb-4">
                            <!-- start chat users-->
                            <div class="col-xxl-3 col-xl-6 order-xl-1">
                                <div class="card p-2">
                                    <div class="card-body p-0">
                                        <ul class="nav nav-tabs nav-bordered">
                                            <li class="nav-item">
                                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link active py-2">
                                                    Your Messages
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#members" data-bs-toggle="tab" aria-expanded="false" class="nav-link py-2">
                                                    Co-Members
                                                </a>
                                            </li>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active p-3" id="messages">

                                                <!-- start search box -->
                                                <!-- <div class="app-search">
                                                    <form>
                                                        <div class="mb-2 position-relative">
                                                            <input type="text" class="form-control" id="search_text"
                                                                placeholder="Search your Messages" name="txtSearch" />
                                                            <span class="mdi mdi-magnify search-icon"></span>
                                                        </div>
                                                    </form>
                                                </div> -->
                                                <!-- end search box -->

                                                <!-- member messages -->
                                                <div class="row">
                                                    <div class="col">
                                                    <p class="text-muted">These are the list of your co-members together with your conversation.</p>
                                                        <div id="msgList" data-simplebar style="max-height: 335px">
                                                            <?php foreach($c_data as $c_datum):?>
                                                                <?php foreach($m_data as $m_datum):?>
                                                                    <?php if($c_datum['chat_receiver_id'] == $m_datum['m_id']):?>
                                                                    <!-- member message once this btn is clicked all mesages from this member will appear -->
                                                                    <form action='<?=base_url()?>/AptmController/viewMessage/<?=$m_datum['m_id']?>' method='post'>
                                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                                        <input type='hidden' name='txt_c_id' value='<?=$c_datum['chat_id']?>'>
                                                                        <input type='hidden' name='txt_r_id' value='<?=$c_datum['chat_receiver_id']?>'>
                                                                        <input type='hidden' name='txt_s_id' value='<?=$c_datum['chat_sender_id']?>'>
                                                                        <button class='text-body btn_view_msg' title='click to view message'>
                                                                            <style>.btn_view_msg {border-style: none;background-color: none;background: none;text-align: start;}</style>
                                                                            <div class="d-flex align-items-start mt-1 p-2 ps-0 pe-1">
                                                                                <img src="<?=$m_datum['m_profile_pic']?>" class="me-2 rounded-circle" height="48" 
                                                                                    alt="Brandon Smith"/>
                                                                                <div class="w-100 overflow-hidden">
                                                                                    <h5 class="mt-0 mb-0 font-14">
                                                                                        <?=$m_datum['m_fname'].' '.$m_datum['m_lname']?>
                                                                                        <span class="float-right text-muted font-12" style="padding-left: 50px;">
                                                                                        <?=$c_datum['chat_time_created'].' | '.$c_datum['chat_status']?></span>
                                                                                    </h5>
                                                                                    <p class="mt-1 mb-0 text-muted font-14">
                                                                                        <span class="w-75"><?=$c_datum['chat_content']?></span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </button>    
                                                                    </form>
                                                                    <!-- x -->

                                                                    <?php endif;?>
                                                                <?php endforeach;?>
                                                            <?php endforeach;?>
                                                        </div> <!-- end slimscroll-->
                                                    </div> <!-- End col -->
                                                </div>

                                                <!-- end users -->
                                            </div> <!-- end Tab Pane-->

                                            <div class="tab-pane show p-3" id="members">

                                                <!-- start search box -->
                                                <!-- <div class="app-search">
                                                    <form>
                                                        <div class="mb-2 position-relative">
                                                            <input type="text" class="form-control" id="search_text"
                                                                placeholder="Search for Co-Member Names" name="txtSearch" />
                                                            <span class="mdi mdi-magnify search-icon"></span>
                                                        </div>
                                                    </form>
                                                </div> -->
                                                <!-- end search box -->

                                                <!-- co member names on user division -->
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-muted">Below are the list of your Co-Members Name from your Division you belong.</p>
                                                        <div data-simplebar style="max-height: 335px">
                                                            <?php foreach($m_data_per_d as $datum):?>
                                                            <form action="<?=base_url()?>/AptmController/clickMember/<?=$datum['m_id']?>" method="post">
                                                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                                <button class='text-body btn_send_msg_member' title='click this to send message request'>
                                                                    <div class='d-flex align-items-start mt-1 p-2 ps-0'>
                                                                        <img src='<?=$datum['m_profile_pic']?>' class='me-2 rounded-circle' height='48' title='' />
                                                                        <div class='overflow-hidden' style='width:290px;'>
                                                                            <h5 class='mt-0 mb-0 font-14'><?=$datum['m_fname'].' '.$datum['m_lname']?>
                                                                            <?php if($datum['m_type'] == 'member'):?>
                                                                            <span class='badge badge-primary-lighten font-12'>Member</span>
                                                                            <?php elseif($datum['m_type'] == 'treasurer'):?>
                                                                            <span class='badge badge-info-lighten font-12'>Treasurer</span>
                                                                            <?php elseif($datum['m_type'] == 'admin'):?>
                                                                            <span class='badge badge-success-lighten font-12'>Admin</span>
                                                                            <?php endif;?>
                                                                            </h5>
                                                                            <p class='mb-0 font-14'>
                                                                                <span class='w-75 float-right'><?=$datum['m_division']?></span>
                                                                            </p>
                                                                            <p class='mb-0 text-muted font-12'>
                                                                                <span class='w-75 float-right'><?=$datum['m_school'].' | '.$datum['m_position']?></span>
                                                                            </p>
                                                                        </div> 
                                                                    </div> 
                                                                </button>
                                                            </form>
                                                            <?php endforeach;?>
                                                            <style>.btn_send_msg_member 
                                                                {border-style: none;background-color: none;background: none;text-align: start;}
                                                            </style>
                                                        </div> <!-- end slimscroll-->
                                                    </div> <!-- End col -->
                                                </div>
                                            
                                                <!-- end users -->
                                            </div> <!-- end Tab Pane-->

                                        </div> <!-- end tab content-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                            <!-- end chat users-->

                            <!-- chat area -->
                            <div class="col-xxl-3 col-xl-6 order-xl-1 order-xxl-2">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if($click_stat == 1):?>
                                        <?php foreach($r_data as $r_datum):?>
                                        <div class="mb-3 ms-1 d-flex">
                                            <img class="me-2 rounded-circle" src="<?=$r_datum['m_profile_pic']?>" alt="Generic placeholder image" height="42">
                                            <div class="w-100">
                                                <h5 class="m-0"><?=$r_datum['m_fname'].' '.$r_datum['m_lname']?></h5>
                                                <small><?=$r_datum['m_type'].' | '.$r_datum['m_division']?></small>
                                            </div>
                                        </div>
                                        <div id="chatbox" data-simplebar style="max-height: 300px">
                                            <ul class="conversation-list">
                                                <?php foreach($c_data as $c_datum):?>
                                                <?php if($c_datum['chat_sender_id'] == $session->get('l_id')):?>
                                                        <li class="clearfix odd" id="sender">
                                                            <div class="chat-avatar">
                                                                <?php if($c_datum['chat_sender_id'] == $r_datum['m_id']):?>
                                                                <img src="<?=$r_datum['m_profile_pic']?>" class="rounded-circle" alt="" />
                                                                <?php endif;?>
                                                            </div>
                                                            <div class="conversation-text">
                                                                <div class="ctext-wrap">
                                                                    <p><?=$c_datum['chat_content']?></p>
                                                                </div>
                                                                <p class="mb-0 mt-1"><small><?=$c_datum['chat_time_created'].' | '.$c_datum['chat_status']?></small></p>
                                                            </div>
                                                        </li>
                                                <?php else:?>
                                                        <li class="clearfix" id="receiver">
                                                            <div class="chat-avatar">
                                                                <?php if($c_datum['chat_sender_id'] == $r_datum['m_id']):?>
                                                                <img src="<?=$r_datum['m_profile_pic']?>" class="rounded-circle" alt="" />
                                                                <?php endif;?>
                                                            </div>
                                                            <div class="conversation-text">
                                                                <div class="ctext-wrap">
                                                                    <p><?=$c_datum['chat_content']?></p>
                                                                </div>
                                                                <p class="mb-0 mt-1"><small><?=$c_datum['chat_time_created'].' | '.$c_datum['chat_status']?></small></p>
                                                            </div>
                                                        </li>
                                                <?php endif;?>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>                            
                                        <div class="row">
                                            <div class="col">
                                                <div class="mt-2 bg-light p-3 rounded">
                                                    <form id="chat-form" method="post">
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <div class="row">
                                                            <div class="col mb-2 mb-sm-0">
                                                                <input type="hidden" id="receiver_id_cont" value="<?=$r_datum['m_id']?>">
                                                                <!-- <input type="text" name="txt_messsage"  id="txt_messsage" class="form-control border-0" 
                                                                placeholder="type your message here ..."> -->
                                                                <textarea class="form-control p-2" id="txt_messsage" 
                                                                    placeholder="Type your message here ..."></textarea>
                                                                <small id="txtErrMsg" class="form-text m-0 text-danger" style="margin-left: 10px"></small>
                                                            </div>
                                                            <div class="col-sm-auto">
                                                                <div class="btn-group">
                                                                    <div class="d-grid">
                                                                        <button type="button" class="btn btn-success chat-send" id='btnSend'>Send<i class='uil uil-message ms-1'></i></button>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row-->
                                                    </form>
                                                    <?php endforeach;?>
                                                </div> 
                                            </div> <!-- end col-->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end card-body -->
                                    
                                </div> <!-- end card -->
                                <?php else:?>
                                    <div class="text-center mt-3 mb-3">
                                        <img class="mb-2" src="<?=base_url()?>/public/assets/images/aptm/undraw_Chat_re_re1u.svg" alt="" width="300">
                                        <h4>Chatbox</h4>
                                        <p class="text-muted">Click the messages or co-member name from the messages widget on the left side, to read and send messages.</p>
                                    </div>
                                <?php endif;?>                                


                            </div> <!-- end col -->
                            <!-- end user detail -->
                        </div> <!-- end row-->

                        <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>                                                        

                        <script>
                        $(document).ready(function(){
                            $('#receiver_id_cont').hide();
                        });

                        // SEND MESSAGE TO CO MEMBER
                            $(document).ready(function(){
                                $(document).on('click', '#btnSend', function() {
                                    txt_message = document.getElementById("txt_messsage").value;
                                    txt_receiver = document.getElementById("receiver_id_cont").value;
                                    if(txt_message == ""){
                                        alert('Please enter your Message, before sending it!');
                                    }else{
                                        $.ajax({
                                            method: 'post',
                                            url: "<?=base_url()?>/AptmController/sendMessage/"+txt_message+"/"+txt_receiver+"",
                                            dataType: 'JSON'
                                        });
                                        alert("Message Sent!");
                                        $('#txt_messsage').val('');
                                    }
                                });
                            });
                        // x

                        // FETCH ALL MESSAGES FOR LOGGED IN USER
                        function reloadMsg(){
                                $(document).ready(function (){
                                    $('#msgList').load(' #msgList');
                                    $('#chatbox').load(' #chatbox');
                                });
                            }
                            setInterval(reloadMsg, 3000);
                        // x

                        </script>

<?= $this->endSection()?>                    