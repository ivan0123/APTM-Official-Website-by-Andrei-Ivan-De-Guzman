<!-- MAIN CONTENT OF HOME PAGE -->

<?= $this->extend('layouts/adminLayout')?>
<?= $this->section('adminMainContent')?>

    <!-- Start Main Content-->
    <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">APTM Official Website Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-5 col-lg-6">
            <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                               <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Members</h5>
                        <h3 class="mt-3 mb-3"><?=$members_count?></h3>
                         <p class="mb-0 text-muted">
                             <span class="text-info me-2"><i class="uil uil-users-alt font-20"></i> from all division</span>
                             <span class="text-nowrap">Since the beginning</span>  
                         </p>
                    </div> <!-- end card-body-->
                  </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                  <div class="card widget-flat">
                       <div class="card-body">
                         <div class="float-end">
                             <i class="mdi mdi-cart-plus widget-icon"></i>
                         </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">News</h5>
                        <h3 class="mt-3 mb-3"><?=$news_count?></h3>
                        <p class="mb-0 text-muted">
                               <span class="text-primary me-2"><i class="uil uil-newspaper font-20"></i> published</span>
                               <span class="text-nowrap">Since the beginning</span>
                           </p>
                      </div> <!-- end card-body-->
                 </div> <!-- end card-->
             </div> <!-- end col-->
        </div> <!-- end row -->

         <div class="row">
               <div class="col-lg-6">
                  <div class="card widget-flat">
                      <div class="card-body">
                          <div class="float-end">
                              <i class="mdi mdi-currency-usd widget-icon"></i>
                          </div>
                          <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Meetings</h5>
                         <h3 class="mt-3 mb-3"><?=$meetings_count?></h3>
                          <p class="mb-0 text-muted">
                              <span class="text-success me-2"><i class="uil uil-video font-20"></i> held before</span>
                              <span class="text-nowrap">Since the beginning</span>
                         </p>
                     </div> <!-- end card-body-->
                  </div> <!-- end card-->
              </div> <!-- end col-->

              <div class="col-lg-6">
                  <div class="card widget-flat">
                       <div class="card-body">
                           <div class="float-end">
                            <i class="mdi mdi-pulse widget-icon"></i>
                          </div>
                          <h5 class="text-muted fw-normal mt-0" title="Growth">Forums</h5>
                         <h3 class="mt-3 mb-3"><?=$forums_count?></h3>
                         <p class="mb-0 text-muted">
                             <span class="text-warning me-2"><i class="uil uil-comment-question font-20"></i> posted</span>
                             <span class="text-nowrap">Since the beginning</span>
                         </p>
                      </div> <!-- end card-body-->
                  </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

        </div> <!-- end col -->

        <div class="col-xl-7 col-lg-6">
            <div class="card card-h-100">
                 <div class="card-body"> 
                      <div class="row">
                         <div class="col-lg-6">
                            <div class="m-3">
                                <h3 class="text-primary fw-normal hero-title">Welcome Administrator</h3>
                                <p class="font-16 text-muted descrip">Association of Professional Teacehrs
                                    in Mimaropa (APTM) Official Website is an an informative website that 
                                    aids the members of the association to be updated in the latest memorandum 
                                    and orders from DEPED.
                                </p>
                            </div>
                           </div>
                           <div class="col-lg-6">
                            <img style="margin:90px 0 0 10px;" width="220" class="b_svg" src="<?php echo base_url('public/assets/images/startup.svg'); ?>" alt="">
                         </div>
                    </div>
                   </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

    </div>
    <!-- end row -->
    
    <!-- Admin Panel Tutorial -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-2">Demo Tutorial for Website's Administrator</h4>
                    <p class="font-16 text-muted mb-0">Video tutorial on how to use the functions done by Administrator.</p>
                    <div class="text-center container-fluid">
                        <iframe class="mt-2 video-promote" src="https://drive.google.com/file/d/1Nv9pBnhHYwm3ry0lud2Z1xRk2Z-1DbrS/view?usp=drivesdk" width="700" height="380" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>    
        </div>    
    </div>
    
    <!-- XX -->

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="header-title mb-2">Look who's Online</h4>
                    
                    <div class="tab-content"> 
                        <div class="tab-pane show active table-responsive" id="scroll-horizontal-preview">
                            <div data-simplebar style="max-height: 365px;">
                                <table id="home_tbl" class="table w-100 nowrap table-centered table-striped">
                                    <thead class="table">
                                        <tr>
                                            <th>Member Name</th>
                                            <th>User Type</th>
                                            <th>Division</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                            if(count($m_data) > 0){
                                                foreach($m_data as $m_info):?>
                                        <tr>
                                            <td>
                                                <img src="<?=$m_info['m_profile_pic']?>" alt="table-user" class="me-2 rounded-circle" width="30" height="30">
                                                <?=$m_info['m_fname'].' '.$m_info['m_lname']?>
                                            </td>
                                            <td><?=$m_info['m_type']?></td>
                                            <td><?=$m_info['m_division']?></td>

                                            <?php $session = \Config\Services::session();?>
                                        
                                            <!-- account status -->
                                            <?php if($session->get('l_id') == $m_info['m_id']) {
                                                echo '<td><h4><span class="badge badge-success-lighten" 
                                                title="Online: if the user is logged in to the Website.">Online</span></h4></td>';
                                            }else{
                                                echo '<td><h4><span class="badge badge-primary-lighten" 
                                                title="Offline: if the user not on the Website.">Offline</span></h4></td>';
                                            }?>
                                                    
                                        </tr>
                                        <?php endforeach;
                                            }else{?>
                                            <div>
                                                <p class="text-muted">There's no member yet.</p>
                                            </div>
                                        <?php }?>
                                    </tbody>
                                </table> 
                            </div> 
                        </div>  
                    </div>  
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <!-- Recent Activities -->

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
                                     
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    </div>
    <!-- container -->

    </div>
    <!-- content -->
    
<?= $this->endSection()?>