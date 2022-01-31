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
                        <!-- end row -->
                    </div>
                
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="text-center" style="position: relative; bottom: 15px">
                                <a href="<?php echo base_url('AptmController/view_depedOrders');?>" 
                                    class="btn btn-light btn-sm btn-rounded" 
                                    title="click to refresh feed">
                                <i class="uil-sync font-20"></i></a>
                            </div>
                                
                                <!-- recent orders feed -->
                            <?php if(count($memo_data) > 0):?>
                            <?php foreach($memo_data as $memo_datum):?>

                            <div class="card">
                                <div class="card-body pb-1">
                                    <div class="d-flex">
                                        <img class="me-2 mb-2 rounded" src="<?=base_url('public/assets/images/aptm/deped_logo.png'); ?>" 
                                            alt="DepEd Logo" height="50">
                                            <div class="w-100">
                                                <h5 class="m-0 mt-1">Department of Education Official Website</h5>
                                                <p class="text-muted"><small><span>deped.gov.ph</span></small></p>
                                             </div> <!-- end w-100-->
                                     </div> <!-- end d-flex -->

                                    <hr class="m-0 mt-1">

                                    <div class="mt-2 ms-1 me-1">
                                        <p class="font-16 m-0 mt-3 mb-1"><strong><?=$memo_datum->textContent?></strong></p>
                                        <a href="<?=$memo_datum->getAttribute('href')?>" class="btn btn-sm btn-primary" title="click to read the recent DepEd order" 
                                            style="float: right; margin: 0 10px 27px 0;"> 
                                             <i class="uil uil-message me-1"></i>Read
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach;?>
                            <?php else:?>

                            <div class="card">
                                <div class="card-body pb-1">
                                    <div class="my-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                   <img width="300" src="<?=base_url('public/assets/images/aptm/undraw_empty.svg'); ?>" alt="post-img" class="" style="padding-left: 50px;">
                                             </div>
                                            <div class="col-sm-6">
                                            <h5 class="text-center mt-5">
                                                 "There are no recent memoranda published yet, by DepED Official Website !</h5>
                                             </div>
                                         </div>
                                     </div>
                                </div> <!-- end card-body -->
                            </div>    

                            <?php endif;?>

                        </div> <!-- end col-->

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
