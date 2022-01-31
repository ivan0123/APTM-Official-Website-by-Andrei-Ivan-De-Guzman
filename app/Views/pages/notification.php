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
                            <div class="card pb-4">
                                <h4 class="page-title ps-4 pt-3 pb-2">Notifications</h4>  
                                <div class="" data-simplebar style="max-height: 700px;">
                                <!-- if theres notif display it -->
                                <?php if(count($notif_data) > 0):?>
                                    <?php foreach($notif_data as $notif_datum):?>
                                            
                                        <form class="pb-1" action='visitNotif' method='post'>
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type='hidden' name='txtNotifId' value='<?=$notif_datum['notif_id']?>'>
                                            <input type='hidden' name='txtLink' value='<?=$notif_datum['notif_link']?>'>
                                            <input type='hidden' name='txtDataId' value='<?=$notif_datum['notif_data_id']?>'>
                                            <button class='dropdown-item notify-item' title='click to view notification'>
                                                <div class='notify-icon d-flex ps-2'>
                                                    <img class='rounded-circle shadow-sm' src='<?=$notif_datum['notif_creator_pic']?>' height='50'>
                                                    <strong class="ps-1">
                                                       <p class='notify-details font-15 mb-0' style='position: relative; left: 10px;'><?=$notif_datum['notif_content']?></p>
                                                       <small class='text-muted me-1 ms-2 font-14'><?=$notif_datum['notif_creator_type'].' | '.$notif_datum['notif_creator_name'].' | '.$notif_datum['notif_time_created']?></small>
                                                       <!-- if notif is not seen display new -->
                                                        <?php if($notif_datum['notif_status'] == 'not seen'):?>   
                                                           <span class='badge badge-danger-lighten rounded-pill font-12'><?=$notif_datum['notif_status']?></span>
                                                        <?php else:?>
                                                            <span class='badge badge-primary-lighten rounded-pill font-12'><?=$notif_datum['notif_status']?></span>
                                                        <?php endif;?>    
                                                    </strong>
                                                 </div>
                                            </button>
                                        </form>

                                    <?php endforeach;?>
                                <!-- if there's no notif yet display empty -->
                                <?php else:?>
                                    <div class='m-5 text-center'>
                                        <img class='mb-2' src='<?=base_url()?>/public/assets/images/aptm/undraw_empty_street_sfxm.svg' width='400'>
                                        <h5 class='fw-normal hero-title'>There's no notification yet.</h5>
                                    </div>
                                <?php endif;?>
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

                    </div>
                </div>


                <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
<?= $this->endSection()?>
