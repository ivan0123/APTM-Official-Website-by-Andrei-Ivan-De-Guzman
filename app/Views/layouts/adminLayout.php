<?php $session = \Config\Services::session();?>
<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 08:29:36 GMT -->
<head>
        <meta charset="utf-8" />
        <title><?= $meta_title?> | APTM Official Website Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="APTM Official Website is an online platform dedicated to deliver an extensive service dedicated to its dear members. The website aims to reach every professional teachers in MIMAROPA Region Philippines to develop relations and strengthen the teaching force across the region." name="description" />
        <meta content="Andrei Ivan De Guzman" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('public/assets/images/aptm/aptm_icon.ico'); ?>">

        <!-- third party css -->
        <link href="<?php echo base_url('public/assets/css/vendor/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="<?php echo base_url('public/assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/assets/css/app.min.css'); ?>" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?php echo base_url('public/assets/css/app-dark.min.css'); ?>" rel="stylesheet" type="text/css" id="dark-style" />

        <!-- Datatables css -->
        <link href="<?php echo base_url('public/assets/css/vendor/buttons.bootstrap4.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/assets/css/vendor/dataTables.bootstrap4.css'); ?>" rel="stylesheet" type="text/css">

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        
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

        <!-- ckeditor js plugins -->
        <script src="<?php echo base_url('public/assets/ckeditor5-build-classic/ckeditor.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/ckeditor5-build-classic/ckeditor.js.map'); ?>"></script>
        <script src="<?php echo base_url('public/assets/ckeditor5-build-classic/vendor.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/ckeditor5-build-classic/vendor.js.map'); ?>"></script>
        <!-- x -->
    
    <style>
        .btn:hover { -webkit-transform: translateY(-4px); transform: translateY(-4px); -webkit-transition: all .5s; transition: all .5s}
        .btn_pending:hover { -webkit-transform: translateY(-4px); transform: translateY(-4px); -webkit-transition: all .5s; transition: all .5s; color: white;}
    </style>    

    <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light pt-2">
                    <span class="logo-lg">
                        <img src="<?php echo base_url('public/assets/images/aptm/mini_logo.png'); ?>" alt="" height="35">
                        <strong><p class="text-muted" style="position: relative; bottom:30px; left:5px">Dashboard</p></strong>
                    </span>
                    <span class="logo-sm">
                        <img src="<?php echo base_url('public/assets/images/aptm/logo_no_text.png'); ?>" alt="" height="35">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark pt-2">
                    <span class="logo-lg">
                        <img src="<?php echo base_url('public/assets/images/aptm/mini_logo.png'); ?>" alt="" height="35">
                        <strong><p class="text-muted" style="position: relative; bottom:30px; left:5px">Dashboard</p></strong>
                    </span>
                    <span class="logo-sm">
                        <img src="<?php echo base_url('public/assets/images/aptm/logo_no_text.png'); ?>" alt="" height="35">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav pt-5">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url('AdminController/view_home');?>" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Home </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url('AdminController/view_members');?>" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span> Members </span>
                            </a>
                        </li>
                        
                        <li class="side-nav-item">
                            <a href="<?php echo base_url('AdminController/view_announcement');?>" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Announcements </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url('AdminController/view_news');?>" class="side-nav-link">
                                <i class="uil-newspaper"></i>
                                <span> News </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url('AdminController/view_forum');?>" class="side-nav-link">
                                <i class="uil-comment-question"></i>
                                <span> Forums </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-video"></i>
                                <span> Conference Meeting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('ZoomApiController/view_zoom');?>">Zoom</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('AdminController/view_jitsiMeet');?>">Jitsi Meet</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url('AdminController/view_activityLog');?>" class="side-nav-link">
                                <i class="uil-notebooks"></i>
                                <span> Activity Log </span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>

                            <li>
                                <a href="<?=base_url('AptmController/view_home');?>" class="btn btn-primary btn-rounded me-2" style="margin-top: 17px;" 
                                    title="click me, to visit Member's Page">
                                    <span class="">Member's Page</span>
                                </a>
                            </li>

                            <li class="dropdown notification-list ms-1">
                                <a type="button" onclick="fetchNotif()" class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" 
                                    id="topbar-notifydrop" role="button" aria-haspopup="true" 
                                    aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <div id="notifCount">
                                        <span class="badge bg-danger rounded-pill" 
                                            style="position: relative; bottom: 60px; left: 15px;">
                                            <?=$not_seen_notif_count?>
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">
            
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-end">
                                            </span>Notification
                                        </h5>
                                    </div>

                                    <div id="notifList" style="max-height: 250px;" data-simplebar>

                                    </div>

                                    <style>
                                        .dropdown-menu {
                                            width: 380px;
                                        }

                                        #notifList{
                                            max-height: 250px;
                                            overflow-y: scroll;
                                            overflow-x: scroll;
                                        }

                                        /* Works on Chrome, Edge, and Safari */
                                        *::-webkit-scrollbar {
                                        width: 10px;
                                        }

                                        *::-webkit-scrollbar-thumb {
                                        background-color: #D1D6DB;
                                        border-radius: 20px;
                                        }
                                    </style>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View All
                                    </a>
            
                                </div>
                            </li>

                            <li class="notification-list">
                                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?=$session->get('l_profile_pic');?>" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?=$session->get('l_fname').' '.$session->get('l_lname');?></span>
                                        <span class="account-position"><?=$session->get('l_type')?></span>
                                    </span>

                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline me-1"></i>
                                        <span>Lock Screen</span>
                                    </a>

                                    <!-- item-->
                                    <a href="<?php echo base_url('AptmController/signOut');?>" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>
                            
                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <!-- <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Search..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Search</button>
                                </div>
                            </form>

                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                                
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                                </div>

                                
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-notes font-16 me-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-life-ring font-16 me-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-cog font-16 me-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Erwin Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- end Topbar -->
                    
                    <!-- START MAIN PAGE -->
                    <div class="container-fluid mb-4">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right mt-2">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><?= $meta_title?></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                    <!-- Main Content Start -->

                        <!-- RENDER MAIN CONTENT HERE -->
                        <?= $this->renderSection('adminMainContent') ?>
                        <!-- XXXX -->

                    <!-- end Main Content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                    <script>document.write(new Date().getFullYear())</script> © Association of Professional Teachers in Mimaropa Philippines Official Website
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                
                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app.min.js'); ?>"></script>

        <!-- third party js -->
        <script src="<?php echo base_url('public/assets/js/vendor/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/dataTables.bootstrap4.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/dataTables.responsive.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/responsive.bootstrap4.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/dataTables.buttons.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/buttons.bootstrap4.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/buttons.html5.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/buttons.flash.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/buttons.print.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/dataTables.keyTable.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/vendor/dataTables.select.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?php echo base_url('public/assets/js/pages/demo.datatable-init.js'); ?>"></script>
        <!-- end demo js-->

        <script>

// REFRESH NOTIF COUNT 
    function reloadMsg(){
        $(document).ready(function (){
            $('#notifCount').load(' #notifCount');
        });
    }
    setInterval(reloadMsg, 3000);
//   

            // close the backdrop of modal
            $(document).ready(function () {
                $('#btn-close').click(function(){
                    $('.alert_backdrop').hide();
                    });
                });

            $( "#FileInput" ).change(function() {
            $( "#Up" ).click();
            });

            // datatables
            $(document).ready(function (){
                // member tables
                $('#tbl_member_ori').DataTable();
                $('#tbl_member_occ').DataTable();
                $('#tbl_member_cal').DataTable();
                $('#tbl_member_mar').DataTable();
                $('#tbl_member_rom').DataTable();
                $('#tbl_member_pal').DataTable();
                $('#tbl_member_pue').DataTable();

                // log table
                $('#tbl_log_activity').DataTable();

                // announcement table
                $('#tbl_ann_all').DataTable();
                $('#tbl_ann_ori').DataTable();
                $('#tbl_ann_occ').DataTable();
                $('#tbl_ann_cal').DataTable();
                $('#tbl_ann_mar').DataTable();
                $('#tbl_ann_rom').DataTable();
                $('#tbl_ann_pal').DataTable();
                $('#tbl_ann_pue').DataTable();

                // announcement table
                $('#tbl_news_all').DataTable();
                $('#tbl_news_ori').DataTable();
                $('#tbl_news_occ').DataTable();
                $('#tbl_news_cal').DataTable();
                $('#tbl_news_mar').DataTable();
                $('#tbl_news_rom').DataTable();
                $('#tbl_news_pal').DataTable();
                $('#tbl_news_pue').DataTable();

                // meeting table
                $('#tbl_instant_meeting').DataTable();
                $('#tbl_view_attendees').DataTable();

                // log table
                $('#tbl_log_a').DataTable();
                $('#tbl_log_t').DataTable();
                $('#tbl_log_m').DataTable();

                // table in home page
                $('#home_tbl').DataTable();
            });
                    
            // ckeditor 
            ClassicEditor
                .create(document.querySelector('#txtWhatEditor'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
                })
                .catch( error => {
                    console.error( error );
                } );


            //fetch notif
            function fetchNotif() {
                $.ajax({
                    url:"<?=base_url()?>/AptmController/fetchNotif",
                    type: 'post',
                    dataType: 'JSON',
                    success: function(response){
                        var len = response.length;

                        if(len != 0){
                            for(var i=0; i<len; i++){

                                var notifId = response[i].notif_id;
                                var acti = response[i].notif_content;
                                var time = response[i].notif_time_created;
                                var c_name = response[i].notif_creator_name;
                                var c_profile = response[i].notif_creator_pic;
                                var c_type = response[i].notif_creator_type;
                                var c_division = response[i].notif_creator_division;
                                var notifStat = response[i].notif_status;
                                var link = response[i].notif_link;
                                var dataId = response[i].notif_data_id;

                                if(notifStat == 'not seen'){
                                    var notifList = "<form action='visitNotif' method='post'><input type='hidden' name='<?= csrf_token() ?>' value='<?= csrf_hash() ?>' />" +
                                        "<input type='hidden' name='txtNotifId' value='"+notifId+"'>" +
                                        "<input type='hidden' name='txtLink' value='"+link+"'>" +
                                        "<input type='hidden' name='txtDataId' value='"+dataId+"'>" +
                                        "<button class='dropdown-item notify-item' title='click to view notification'>" +
                                        "<div class='notify-icon'>" +
                                            "<img class='rounded-circle shadow-sm mt-1' src='" + c_profile + "' height='42'>" +
                                        "</div>" + 
                                    "<strong><p class='notify-details font-14 mb-0 text-dark' style='position: relative; left: 10px;'>" 
                                            + acti + "</p>" +
                                            "<small class='me-1 ms-2 mb-0'>"+c_name+" | "+time+"</small>" +
                                            "<span class='badge badge-danger-lighten rounded-pill font-12 mb-0'>" + notifStat + "</span>" +
                                    "</strong>" +
                                            "<p class='mb-0' style='position: relative; left: 45px; bottom: 2px;'>" +
                                            "<i><small class='me-1 ms-2 mb-0'>"+c_type+" | "+c_division+"</small></i></p>" +
                                    "</button></form>";

                                    $("#notifList").append(notifList);
                                }else{
                                    var notifList = "<form action='visitNotif' method='post'><input type='hidden' name='<?= csrf_token() ?>' value='<?= csrf_hash() ?>' />" +
                                        "<input type='hidden' name='txtNotifId' value='"+notifId+"'>" +
                                        "<input type='hidden' name='txtLink' value='"+link+"'>" +
                                        "<input type='hidden' name='txtDataId' value='"+dataId+"'>" +
                                        "<button class='dropdown-item notify-item' title='click to view notification'>" +
                                        "<div class='notify-icon'>" +
                                            "<img class='rounded-circle shadow-sm mt-1' src='" + c_profile + "' height='42'>" +
                                        "</div>" + 
                                    "<strong><p class='notify-details font-14 mb-0 text-dark' style='position: relative; left: 10px;'>" 
                                            + acti + "</p>" +
                                            "<small class='me-1 ms-2 mb-0'>"+c_name+" | "+time+"</small>" +
                                            "<span class='badge badge-primary-lighten rounded-pill font-12 mb-0'>" + notifStat + "</span>" +
                                    "</strong>" +
                                            "<p class='mb-0' style='position: relative; left: 45px; bottom: 2px;'>" +
                                            "<i><small class='me-1 ms-2 mb-0'>"+c_type+" | "+c_division+"</small></i></p>" +
                                    "</button></form>";

                                    $("#notifList").append(notifList);
                                }
                            }
                        }else{
                            var notifList = "<div class='mt-2 mb-0 text-center'>" +
                                                "<img class='mb-2' src='<?=base_url()?>/public/assets/images/aptm/undraw_empty_street_sfxm.svg' width='230'>" +
                                                "<h5 class='fw-normal hero-title'>There's no notification yet.</h5>" +
                                            "</div>";
                            $("#notifList").append(notifList);
                        }
                    }
                });
                event.preventDefault();

                $('#notifList').text(Math.ceil(Math.random()*90)+10);
                $('#notifList').text('');
            }
        </script>
        
        <!-- use the ajax request view cell -->
        <?= view_cell('\App\Libraries\AptmLibraries::ajaxRequest')?>
    </body>

</html>