<!-- MAIN CONTENT OF HOME PAGE -->

<?= $this->extend('layouts/userLayout')?>
<?= $this->section('mainContent')?>

<!-- main page content start -->
               <div class="content-page">
                    <div class="content">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Home | APTM Official Website</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                        
                            <div class="col-xl-7 col-lg-6">
                                
                                <div class="card card-h-100">
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3 class="text-primary fw-normal hero-title">
                                                    Welcome APTM Members
                                                </h3>
                                                <p class="font-16 text-muted descrip">Association of Professional Teacehrs
                                                    in Mimaropa (APTM) Official Website is an an informative website that 
                                                    aids the members of the association to be updated in the latest memorandum 
                                                    and orders from DEPED.
                                                </p>
                                            </div>
                                            <div class="col-lg-6">
                                                <img style="margin:90px 0 0 10px;" width="220" class="b_svg" src="<?php echo base_url('public/assets/images/startup.svg'); ?>" alt="">
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->

                            </div> <!-- end col -->

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
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="about_section">
                                            
                                            <p class="font-18"><strong>Website Information</strong></p>

                                            <p class="text-muted font-16">The <strong>Association of Professional Teachers in MIMAROPA (APTM)</strong>
                                                Official Website is an informative website that aids teachers of the association 
                                                to be updated in the latest memorandum and orders from Department of Education.
                                                The website aims to reach every professional teachers in the MIMAROPA Region and 
                                                built a healthy community that aims to develop relations and strengthen the teaching
                                                force across the region. This website features the most recent news and updates from
                                                the <strong>Department of Education</strong> and all about education sector in MIMAROPA. Also, it 
                                                contains communicating features that connects each division inside the APTM such 
                                                as online forums ang chat rooms to ensure the bond of every members of the association.</p>

                                            <br><p class="font-18"><strong>Association Description</strong></p>

                                            <p class="text-muted font-16">The <strong>Association of Professional Teachers in MIMAROPA (APTM)</strong> is a 
                                                regional professional association consisting of all <i>Philippine Public School 
                                                Teachers in DepEd MIMAROPA-Region</i>, vigorously interested in the promotion of 
                                                sustainable financial and socio-economic progress, as well as feasible intellectual 
                                                and skills advancement.</p>

                                            <br><p class="font-18"><strong>Vision</strong></p>

                                            <p class="text-muted font-16">We, the Association of Professional Teachers in MIMAROPA, accustomed to fulfill our 
                                                duty as educators and as significant members of the society, unite to achieve common 
                                                objectives and aspirations to continuously improve the living and working conditions 
                                                of all public school teachers within the MIMAROPA Region.</p>

                                            <br><p class="font-18"><strong>Objectives of the Association</strong></p>  

                                            <ul>
                                                <li class="text-muted font-16">To actively engage and participate in promoting and providing equal opportunities, 
                                                    privileges and benefits to its members.</li>
                                                <li class="text-muted font-16">To provide assistance and adequate resources for the continuous development of 
                                                    financial, social and economic status of its members.</li>
                                                <li class="text-muted font-16">To enhance the members’ intellectual and skills by introducing profound trainings,
                                                    activities, programs and projects, and expand their proficiency in the teaching profession.</li>
                                                <li class="text-muted font-16">To deliver accessible and transparent services to its members.</li>
                                                <li class="text-muted font-16">To promote and safeguard the welfare and interest of its members.</li>
                                            </ul>
                                        </div>
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-lg-4">
                                <!-- rules of the association -->
                                <div class="card">
                                    <div class="card-body">
                                        <p class="font-18"><strong>Rules of the Association</strong></p>  

                                        <p class="font-16"><strong>On Membership</strong></p>

                                        <p class="text-muted font-16">All persons engaged in teaching at the elementary and secondary levels, whether on full 
                                            time or part-time basis, and all other persons performing supervisory and/or administrative 
                                            functions in all schools in the aforesaid levels and qualified to practice teaching as 
                                            defined in <strong>Republic Act No. 7836</strong> are qualified for membership in this 
                                            association.</p>

                                        <p class="text-muted font-16">The following are the <strong>Division Chapters of the APTM:</strong></p>

                                        <ol>
                                            <li class="text-muted font-16"> APTM Oriental Mindoro</li>
                                            <li class="text-muted font-16"> APTM Occidental Mindoro</li>
                                            <li class="text-muted font-16"> APTM Calapan City</li>
                                            <li class="text-muted font-16"> APTM Palawan</li>
                                            <li class="text-muted font-16"> APTM Puerto Princesa City</li>
                                            <li class="text-muted font-16"> APTM Romblon</li>
                                            <li class="text-muted font-16"> APTM Marinduque</li>
                                        </ol>
                                    </div>
                                </div>
                                <!-- x -->
                            
                                <!-- initialize the latest news widget from libraries -->
                                <?= view_cell('\App\Libraries\AptmLibraries::latestNewsWidget')?>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- End Main Page Content -->

                    <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>

<!-- initialize footer and js plugins -->
<?= $this->endSection()?>