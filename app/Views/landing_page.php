<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>APTM Official Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="APTM Official Website is an online platform dedicated to deliver an extensive service dedicated to its dear members. The website aims to reach every professional teachers in MIMAROPA Region Philippines to develop relations and strengthen the teaching force across the region." name="description" />
        <meta content="Andrei Ivan De Guzman" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>/public/assets/images/aptm/aptm_icon.ico">

        <!-- App css -->
        <link href="<?=base_url()?>/public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/public/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?=base_url()?>/public/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" /> 
        <link href="<?=base_url()?>/public/assets/css/aptm.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>/public/assets/css/aptm_landing.css">  
 
    </head>

    <body class="loading" data-layout-config='{"darkMode":false}'>

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

        <!-- NAVBAR START -->
        <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark" style="width: 100%;">
            <div class="container">

                <!-- logo -->
                <a href="#" class="navbar-brand me-lg-5">
                    <img src="<?php echo base_url('public/assets/images/aptm/mini_logo.png'); ?>" alt="" class="logo-dark" height="35" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <!-- menus -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <!-- left menu -->
                    <ul class="navbar-nav" style="margin-left: 390px;">
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link active" href="#home">Home</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="#description">About</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="#news">News</a>
                        </li>
                        <!-- <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="#faq">FAQs</a>
                        </li> -->
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>

                        <li>
                            <a href="" class="btn-login btn btn-sm btn-light btn-rounded"
                            data-bs-toggle="modal" data-bs-target="#signin_modal" title='click this, to login in regular way.'> Log in 
                            <i class="mdi mdi-arrow-right ms-1"> </i> 
                            </a>
                        </li>
                        
                        <li>
                            <a href='<?=$btn_g_signup?>' class='btn btn-sm btn-rounded btn-danger ms-2' 
                                title='click this, to login using your Gmail Account.'>
                                Gmail log in<i class='mdi mdi-gmail ms-1 text-light'></i>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <style>
            .navbar-expand-lg {
                position: fixed;
                top: 0;
                padding: 5px 0px 5px 0px;
                background-color: #7B74F2;
                z-index: 1;
                width: 100%;
            }

            .navbar-nav {
                margin-left: 510px;
            }

            .btn-login {
                margin-left: 50px;
            }

            @media(max-width: 1028px){
                .logo-dark {
                    padding: 10px;
                    height: 50px;
                }

                .navbar-nav {
                    margin-left: 20px;
                }

                .btn-login {
                    margin-left: 0px;
                }
            }
        </style>
        <!-- NAVBAR END -->

        <!-- LOG IN MODAL -->
        
        <div id="signin_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="primary-header-modalLabel">Log in</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>                                    
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-3">
                            <span><img src="<?php echo base_url('public/assets/images/aptm/mini_logo_dark.png'); ?>" alt="" height="30"></span>
                        </div>

                        <div class="text-center">
                            <h5 class="m-0 fw-normal cta-box-title" style="padding: 0px 30px 0px 30px">Just enter your <b>email address</b> and <b>password</b>
                                to log in your account.</h5>
                            <img class="my-3" src="<?php echo base_url('public/assets/images/aptm/undraw_Login_re_4vu2.svg'); ?>" width="220" alt="Generic placeholder image">
                        </div>
                                                   
                        <form class="ps-3 pe-3" action="<?php echo base_url('AptmController/login'); ?>" method="post">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        
                            <div class="mb-1">
                                <input class="form-control" type="email" name="txt_email" required="" placeholder="Email address" maxlength="50" required> 
                                <small id="emailHelp" class="form-text text-muted" style="margin-left: 10px">Email Address</small>
                            </div>
                            <div class="mb-0">
                                <input class="form-control" type="password" name="txt_password" required="" placeholder="Password" maxlength="50" required> 
                                <small id="emailHelp" class="form-text text-muted" style="margin-left: 10px">Password</small>
                            </div>
                            <div class="mb-2 text-center">
                                <button class="btn btn-rounded btn-primary me-1" type="submit"
                                    title="regular login using email address and your password">
                                    Log in <i class="mdi mdi-arrow-right"></i>
                                </button>
                            </div>
                            <div class="mb-2 text-center">
                                <a href="<?=base_url('AptmController/view_register');?>" 
                                class="text-muted" title="You will be redirected to registration page.">
                                Don't have an account? click here to create yours.</a>
                            </div>
                        </form>
                                                        
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- X -->


        <!-- HOME -->
        <section id="home" class="hero-section mt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="title">
                            <div>
                                <span class="font-16 text-white-50 ms-1 mb-2">Welcome to</span>
                            </div>
                            <h1 class="text-white fw-normal hero-title mt-2 mb-3">
                            APTM Official Website</h1>

                            <p class="mb-4 font-16 text-white-50 ms-3 mt-1" style="text-align: justify;">an online 
                                platform dedicated 
                                to deliver an extensive service dedicated to its dear members. The website aims to 
                                reach every professional teachers in MIMAROPA Region Philippines to develop relations 
                                and strengthen the teaching force across the region.
                            </p>
                        
                            
                            <a href="<?=base_url('AptmController/view_register');?>" 
                                class="btn btn-rounded btn-light p-3 pt-2 pb-2 ms-2" 
                                title="click to register your account in regular way.">
                                Register<i class="uil uil-user-plus ms-1 font-16"></i>
                            </a>
                                
                                
                            <a href='<?=$btn_g_signup?>' class='btn btn-rounded btn-danger p-3 pt-2 pb-2 ms-1' 
                                title='click this, to register account using your Gmail Account.'>
                                Register using Gmail<i class='mdi mdi-gmail ms-1 text-light'></i>
                            </a>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-2 mt-2">
                        <div class="text-md-end mt-md-0">
                            <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active mt-1">
                                        <img src="<?php echo base_url('public/assets/images/startup.svg'); ?>" alt="" class="img-fluid" />
                                    </div>
                                    <div class="carousel-item mt-2">
                                        <img src="<?php echo base_url('public/assets/images/aptm/aptm logo_white_border.png'); ?>" alt="aptm_logo" class="img-fluid" />
                                    </div>
                                    <div class="carousel-item banner_carousel_item mt-2">
                                        <img src="<?php echo base_url('public/assets/images/aptm/reg_tuts_1.jpg'); ?>" alt="techer_picture" class="reg_tuts" />
                                    </div>
                                    <div class="carousel-item banner_carousel_item mt-2">
                                        <img src="<?php echo base_url('public/assets/images/aptm/reg_tuts_2.jpg'); ?>" alt="techer_picture" class="reg_tuts" />
                                    </div>
                                    <div class="carousel-item banner_carousel_item mt-2">
                                        <img src="<?php echo base_url('public/assets/images/aptm/reg_tuts_3.jpg'); ?>" alt="techer_picture" class="reg_tuts" />
                                    </div>
                                    <div class="carousel-item banner_carousel_item mt-2">
                                        <img src="<?php echo base_url('public/assets/images/aptm/reg_tuts_4.jpg'); ?>" alt="techer_picture" class="reg_tuts" />
                                    </div>
                                    <div class="carousel-item banner_carousel_item mt-2">
                                        <img src="<?php echo base_url('public/assets/images/aptm/reg_tuts_5.jpg'); ?>" alt="techer_picture" class="reg_tuts" />
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HERO -->


        <!-- ABOUT -->
        <section id="description" class="description mt-5">
            <div class="text-center container-fluid mt-5">
                <iframe class="mt-4 video-promote" src="https://drive.google.com/file/d/15QbKlgiMQik8UEE4farRiHX_JYWI7iqi/preview" 
                width="640" height="350" allow="autoplay"></iframe>
            </div>
            
            <div class="text-center mt-5 mb-2">
                <h3 class="mt-5">About <span class="text-primary">Us</span></h3>
                <p class="text-muted mt-2 font-16">Know more about our Association, 
                    <br/>.</p>
            </div>

            <div class="about_section">
                
            <p class="font-18"><strong>APTM Official Website</strong></p>

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

            <br><p class="font-18"><strong>Rules of the Association</strong></p>  

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

        </section>
        <!-- END SERVICES -->

        <!-- LATEST NEWS -->
        <section id="news" class="py-3">
            <div class="container">
                <div class="col-lg-12">
                    <div class="text-center mt-5">
                        <h3>Latest <span class="text-primary">News</span></h3>
                        <p class="text-muted mt-2 mb-5">Be updated on the latest happenings about APTM through online, 
                            <br/>and tell us about what your comments.</p>
                    </div>
                </div>

                <div class="row">
                    <?php if(count($latest_news_data) != 0):?>
                        <?php foreach($latest_news_data as $news_datum):?>
                        <div class="col-lg-4 p-3">
                            <div class="card d-block">
                                <img class="card-img-top" src="<?=$news_datum['news_image']?>" alt="news image">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$news_datum['news_title']?></h5>
                                    <p class="card-text">
                                        <small class="text-muted">published date: </small>
                                        <small class="text-muted"><?=$news_datum['news_time_created']?></small>
                                    </p>
                                    <a href="#" class="btn btn-primary btn-sm btn-rounded">Read More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    <?php else:?>
                        <div class="text-center">
                            <img class="mb-4 empty-svg" width="500px" src="<?=base_url()?>/public//assets/images/aptm/undraw_empty_street_sfxm.svg" alt="news image">
                            <p class="text-muted">There's no news posted yet, but come back soon.</p>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </section>
        <!-- END FEATURES 2 -->


        <!-- START FAQ -->
        <!-- <section id="faq" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1 class="mt-0"><i class="mdi mdi-frequently-asked-questions"></i></h1>
                            <h3>Frequently Asked <span class="text-primary">Questions</span></h3>
                            <p class="text-muted mt-2">Here are some of the questions for our customers. For more 
                                <br>information please contact us.</p>

                            <button type="button" class="btn btn-success btn-sm mt-2"><i class="mdi mdi-email-outline me-1"></i> Email us your question</button>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-5 offset-lg-1"> -->
                        <!-- Question/Answer -->
                        <!-- <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question text-body">Can I use this template for my client?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Yup, the marketplace license allows you to use this theme
                                in any end products.
                                For more information on licenses, please refere <a href="https://themes.getbootstrap.com/licenses/" target="_blank">here</a>.</p>
                        </div> -->

                        <!-- Question/Answer -->
                        <!-- <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question text-body">How do I get help with the theme?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Use our dedicated support email (support@coderthemes.com) to send your issues or feedback. We are here to help anytime.</p>
                        </div> -->

                    <!-- </div> -->
                    <!--/col-lg-5 -->

                    <!-- <div class="col-lg-5"> -->
                        <!-- Question/Answer -->
                        <!-- <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question text-body">Can this theme work with Wordpress?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">No. This is a HTML template. It won't directly with
                                wordpress, though you can convert this into wordpress compatible theme.</p>
                        </div> -->

                        <!-- Question/Answer -->
                        <!-- <div>
                            <div class="faq-question-q-box">Q.</div>
                            <h4 class="faq-question text-body">Will you regularly give updates of Hyper?</h4>
                            <p class="faq-answer mb-4 pb-1 text-muted">Yes, We will update the Hyper regularly. All the
                                future updates would be available without any cost.</p>
                        </div> -->

                    <!-- </div> -->
                    <!--/col-lg-5-->
                <!-- </div> -->
                <!-- end row -->

            <!-- </div> end container -->
        <!-- </section> -->
        <!-- END FAQ -->

        
        <!-- START CONTACT -->
        <section id="contact" class="py-5 bg-light-lighten border-top border-bottom border-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3>Get In <span class="text-primary">Touch</span></h3>
                            <p class="text-muted mt-2">Please fill out the following form and we will get back to you shortly. For more 
                                <br>information please contact us.</p>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col-md-4">
                        <p class="text-muted"><span class="fw-bold">Customer Support:</span><br> <span class="d-block mt-1">+63 9350661311</span></p>
                        <p class="text-muted mt-4"><span class="fw-bold">Email Address:</span><br> <span class="d-block mt-1">aptmmimaropa@gmail.com</span></p>
                        <p class="text-muted mt-4"><span class="fw-bold">Office Address:</span><br> <span class="d-block mt-1">Calapan City, Oriental Mindoro</span></p>
                        <p class="text-muted mt-4"><span class="fw-bold">Office Time:</span><br> <span class="d-block mt-1">9:00AM To 6:00PM</span></p>
                    </div>

                    <div class="col-md-8">
                        <form method="POST" action="<?php echo base_url('AptmController/customer_send_email'); ?>">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="fullname" class="form-label">Your Name</label>
                                        <input class="form-control form-control-light" type="text" name="txt_name" placeholder="Name..." required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="emailaddress" class="form-label">Your Email</label>
                                        <input class="form-control form-control-light" type="email" name="txt_email" placeholder="Enter you email..." required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        <label for="subject" class="form-label">Your Subject</label>
                                        <input class="form-control form-control-light" type="text" name="txt_subject" placeholder="Enter subject..." required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        <label for="comments" class="form-label">Message</label>
                                        <textarea name="txt_comment" rows="4" class="form-control form-control-light" placeholder="Type your message here..." required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">Send a Message <i
                                        class="mdi mdi-telegram ms-1"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- END CONTACT -->

        <!-- SIGN UP MODAL -->
        
        <div id="signup_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="primary-header-modalLabel">Become a Member of APTM</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>                                    
                    <div class="modal-body">
                        <div class="text-center mt-1 mb-3">
                            <span><img src="<?php echo base_url('public/assets/images/aptm/mini_logo_dark.png'); ?>" alt="" height="30"></span>
                        </div>

                        <div class="text-center">
                            <h5 class="m-3 mb-1 fw-normal cta-box-title" style="line-height: 23px;">You have two options to register your account, 
                                (1) is by <b> regular registration</b> and (2) is by using your <b> Gmail Account.</b></h5>
                            <img class="my-3" src="<?php echo base_url('public/assets/images/aptm/undraw_completing_6bhr.svg'); ?>" 
                                width="200" alt="Generic placeholder image">
                        </div>  
                        
                        <div class="text-center mt-2 mb-3">
                            <ul style="list-style-type: none;padding-left: 0px;">
                                <li class="mb-2">
                                    <a href="<?=base_url('AptmController/view_register');?>" 
                                        class="btn btn-rounded btn-primary p-3 pt-2 pb-2" 
                                        title="click this, for regular account registration.">
                                        Regular Sign up<i class="uil uil-arrow-right ms-1 text-light"></i>
                                    </a>
                                </li>
                                <li>
                                    <!-- btn gmail sign up before -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- X -->

        <!-- START FOOTER -->
        <footer class="bg-dark py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="<?php echo base_url('public/assets/images/aptm/mini_logo.png'); ?>" alt="" class="logo-dark" height="30" />

                        <p class="text-muted mt-3">APTM Official Website is an informative website 
                            <br>that aids the members of the association to be updated in the latest 
                            <br>memorandum and orders from DEPED.
                        </p>

                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-lg-2 mt-3 mt-lg-0">
                        
                    </div>

                    <div class="col-lg-2 mt-3 mt-lg-0">
                        <h5 class="text-light">Association</h5>
                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">About Us</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Documentation</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 mt-3 mt-lg-0">
                        <h5 class="text-light">Data Privacy</h5>
                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="" data-bs-toggle="modal" data-bs-target="#privacy_policy" 
                                class="text-muted">Privacy Policy</a></li>
                            <li class="mt-2"><a href="" data-bs-toggle="modal" data-bs-target="#tos"
                                class="text-muted">Terms of Service</a></li>
                            <li class="mt-2"><a href="" data-bs-toggle="modal" data-bs-target="#disclaimer" 
                                class="text-muted">Disclaimer</a></li>
                            <li class="mt-2"><a href="" data-bs-toggle="modal" data-bs-target="#data_privacy"
                                class="text-muted">Consent on Data Privacy Act</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- DATA PRIVACY MODALS -->

        <!-- Privacy Policy -->
        <div class="modal fade" id="privacy_policy" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="scrollableModalTitle">Privacy Policy</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-1">
                            <p><strong>Privacy Policy for Association of Professional Teachers in MIMAROPA Official Website</strong></p>

                            <p>At APTM Official Website, accessible from <a href="http://localhost/APTM/public">http://localhost/APTM/public</a>, 
                                one of our main priorities is the privacy of our visitors. This Privacy Policy document contains 
                                types of information that is collected and recorded by APTM Official Website and how 
                                we use it.
                            </p>
                            <p>If you have additional questions or require more information about our <strong>Privacy Policy</strong>, 
                                do not hesitate to contact us.
                            </p>
                            <p>This Privacy Policy applies only to our online activities and is valid for visitors to our 
                                website with regards to the information that they shared and/or collect in APTM Official 
                                Website. This policy is not applicable to any information collected offline or via channels 
                                other than this website.
                            </p>

                            <p><strong>Consent</strong></p>

                            <p><i>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</i></p>

                            <p><strong>Information we collect</strong></p>

                            <p>The personal information that you are asked to provide, and the reasons why you are asked 
                                to provide it, will be made clear to you at the point we ask you to provide your personal information.
                            </p>
                            <p>If you contact us directly, we may receive additional information about you such as your name, 
                                email address, the contents of the message and/or attachments you may send us, and any other 
                                information you may choose to provide.
                            </p>
                            <p><i>When you register for an Account, we may ask for your contact information, including items 
                                such as name, address, email address, age, gender, position, school, APTM Division and PRC 
                                Identification Card picture.</i>
                            </p>

                            <p><strong>How we use your information</strong></p>

                            <p>We use the information we collect in various ways, including to:</p>
                            <ul>
                                <li>Provide, operate, and maintain our website</li>
                                <li>Improve, personalize, and expand our website</li>
                                <li>Understand and analyze how you use our website</li>
                                <li>Communicate with you, either directly, and to provide you with updates and other information 
                                    relating to the website </li>
                                <li>Send you emails</li>
                                <li>Find and prevent fraud</li>
                            </ul>

                            <p><strong>Log Files</strong></p>

                            <p>APTM Official Website follows a standard procedure of using log files. These files log 
                                visitors when they visit websites. All hosting companies do this and a part of hosting 
                                services' analytics. The information collected by log files include date and time stamp, 
                                referring/exit pages, and possibly the number of clicks.</p>
                            <p>These are not linked to any 
                                information that is personally identifiable. The purpose of the information is for 
                                analyzing trends, administering the site, tracking users' movement on the website.</p>

                            <p><strong>GDPR Data Protection Rights</strong></p>

                            <p>We would like to make sure you are fully aware of all of your data protection rights.</p>

                            <p>Every user is entitled to the following:</p>

                            <p><i><strong>The right to access</strong></i> – You have the right to request copies of your personal data. We may
                                charge you a small fee for this service.</p>
                            
                            <p><i><strong>The right to rectification</strong></i> – You have the right to request that we correct any 
                            information you believe is inaccurate. You also have the right to request that we complete 
                            the information you believe is incomplete.</p>

                            <p><i><strong>The right to erasure</strong></i> – You have the right to request that we erase your personal 
                            data, under certain conditions.</p>

                            <p><i><strong>The right to restrict processing</strong></i> – You have the right to request that we restrict 
                            the processing of your personal data, under certain conditions.</p>

                            <p><i><strong>The right to object to processing</strong></i> – You have the right to object to our processing 
                            of your personal data, under certain conditions.</p>

                            <p><i><strong>The right to data portability</strong></i> – You have the right to request that we transfer the 
                            data that we have collected to another organization, or directly to you, under certain conditions.</p>

                            <p><i>If you make a request, we have one month to respond to you. If you would like to exercise 
                                any of these rights, please contact us.</i></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                    </div>
                </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- x -->

        <!-- Terms of Service -->
        <div class="modal fade" id="tos" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="scrollableModalTitle">Terms of Service</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-1">
                            <p><strong>Website Terms and Conditions of Use</strong></p>

                            <p><strong>1. Terms</strong></p>

                            <p>By accessing this Website, accessible from <a href="http://localhost/APTM/public">http://localhost/APTM/public</a>, you are agreeing 
                                to be bound by these Website Terms and Conditions of Use and agree that you are responsible 
                                for the agreement with any applicable local laws. If you disagree with any of these terms, 
                                you are prohibited from accessing this site. The materials contained in this Website are 
                                protected by copyright and trade mark law.</p>
                            
                            <p><strong>2. Use License</strong></p>    

                            <p>Permission is granted to temporarily download one copy of the materials on Association of 
                                Professional Teachers in MIMAROPA's Website for personal, non-commercial transitory 
                                viewing only. This is the grant of a license, not a transfer of title, and under this 
                                license you may not:</p>

                            <ul>
                                <li>modify or copy the materials;</li>
                                <li>use the materials for any commercial purpose or for any public display</li>
                                <li>attempt to reverse engineer any information contained on Association of 
                                    Professional Teachers in MIMAROPA's Website;</li>
                                <li>remove any copyright or other proprietary notations from the materials; or</li>
                                <li>transferring the materials to another person or "mirror" the materials on any 
                                    other server.</li>
                            </ul>

                            <p>This will let Association of Professional Teachers in MIMAROPA to terminate upon 
                                violations of any of these restrictions.</p>

                            <p>Upon termination, your viewing right will also be terminated and you should destroy 
                                any downloaded materials in your possession whether it is printed or electronic format.</p>

                            <p><strong>3. Disclaimer</strong></p>

                            <p>All the materials on Association of Professional Teachers in MIMAROPA’s Website are provided 
                                "as is". Association of Professional Teachers in MIMAROPA makes no warranties, may it be 
                                expressed or implied, therefore negates all other warranties.</p>
                            
                            <p>Furthermore, Association of Professional Teachers in MIMAROPA does not make any representations 
                                concerning the accuracy or reliability of the use of the materials on its Website or otherwise 
                                relating to such materials or any sites linked to this Website.</p>

                            <p><strong>4. Limitations</strong></p>

                            <p>Association of Professional Teachers in MIMAROPA will not be hold accountable for any damages 
                                that will arise with the use or inability to use the materials on Association of Professional 
                                Teachers in MIMAROPA’s Website, even if Association of Professional Teachers in MIMAROPA or an 
                                authorize representative of this Website has been notified, orally or written, of the possibility
                                of such damage. </p>
                            
                            <p>Some jurisdiction does not allow limitations on implied warranties or limitations of liability for 
                                incidental damages, these limitations may not apply to you.</p>

                            <p><strong>5. Revisions and Errata</strong></p>        

                            <p>The materials appearing on Association of Professional Teachers in MIMAROPA’s Website may include 
                                technical, typographical, or photographic errors. Association of Professional Teachers in MIMAROPA 
                                will not promise that any of the materials in this Website are accurate, complete, or current.</p>

                            <p>Association of Professional Teachers in MIMAROPA may change the materials contained on its Website 
                                at any time without notice. Association of Professional Teachers in MIMAROPA does not make any 
                                commitment to update the materials.</p>
                            
                            <p><strong>6. Links</strong></p>

                            <p>Association of Professional Teachers in MIMAROPA has not reviewed all of the sites linked to its 
                                Website and is not responsible for the contents of any such linked site. The presence of any link
                                 does not imply endorsement by Association of Professional Teachers in MIMAROPA of the site. 
                                 The use of any linked website is at the user’s own risk.</p>

                            <p><strong>7. Site Terms of Use Modifications</strong></p>

                            <p>Association of Professional Teachers in MIMAROPA may revise these Terms of Use for its Website at any
                                 time without prior notice. By using this Website, you are agreeing to be bound by the current version
                                  of these Terms and Conditions of Use.</p>

                            <p><strong>8. Your Privacy</strong></p>

                            <p>Please read our Privacy Policy.</p>

                            <p><strong>9. Governing Law</strong></p>

                            <p>Any claim related to Association of Professional Teachers in MIMAROPA's Website shall be governed by the 
                                laws of Philippines without regards to its conflict of law provisions.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                    </div>
                </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- x -->

        <!-- Disclaimer -->
        <div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="scrollableModalTitle">Disclaimer</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body mt-1">
                        <p>All the materials on <strong>Association of Professional Teachers in MIMAROPA’s Website</strong> are provided 
                            "as is". Association of Professional Teachers in MIMAROPA makes no warranties, may it be 
                            expressed or implied, therefore negates all other warranties. </p>

                        <p>Furthermore, Association of Professional Teachers in MIMAROPA does not make any representations
                             concerning the accuracy or reliability of the use of the materials on its Website or otherwise
                              relating to such materials or any sites linked to this Website.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                    </div>
                </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- x -->

        <!-- Data Privacy -->
        <div class="modal fade" id="data_privacy" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="scrollableModalTitle">Consent on Data Privacy Act</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-1">

                            <p>This Privacy Manual is hereby adopted in compliance with 
                                <strong>Republic Act No. 10173</strong> or the 
                                <strong>Data Privacy Act of 2012 (DPA)</strong>, 
                                its <i>Implementing Rules and Regulations</i>, 
                                and other relevant policies, including issuances of the 
                                <strong>National Privacy Commission</strong>. 
                            </p>

                            <p>This organization respects and values your data privacy rights, and makes sure that 
                                all personal data collected from you, are processed in adherence to the general 
                                principles of transparency, legitimate purpose, and proportionality.</p>

                            <p><i>This Manual shall inform you of our data protection and security measures, and may 
                                serve as your guide in exercising your rights under the DPA.</i></p>

                            <p><strong>Definition of Terms</strong></p>

                            <p>Terms used in the Manual must be defined for consistency and uniformity in usage. 
                                This portion will make sure of that, and allow users of the Manual to understand 
                                the words, statements, and concepts used in the document.</p>

                            <p>Examples:</p>

                            <p>“Data Subject” – refers to an individual whose personal, sensitive personal or 
                                privileged information is processed by the organization. It may refer to officers, 
                                staffs, consultants, and members of this organization.</p>

                            <p>“Personal Information” – refers to any information whether recorded in a material form 
                                or not, from which the identity of an individual is apparent or can be reasonably and 
                                directly ascertained by the entity holding the information, or when put together with
                                 other information would directly and certainly identify an individual.</p>

                            <p>“Processing” - refers to any operation or any set of operations performed upon personal
                                 information including, but not limited to, the collection, recording, organization, 
                                 storage, updating or modification, retrieval, consultation, use, consolidation, blocking, 
                                 erasure or destruction of data.</p>

                            <p><strong>Scope and Limitations</strong></p>

                            <p>All personnel of this organization, regardless of the type, must comply with the terms set 
                                out in this <strong>Privacy Manual</strong>.</p>

                            <p><strong>Processing of Personal Data</strong></p>

                            <p><strong>A. Collection</strong></p>

                            <p>Example:</p>

                            <p>This organization collects the basic contact information of members, including their name, 
                                address, email address, age, gender, position, school, APTM Division and PRC Identification
                                 Card picture. The administrator who verifies the members of the organizations the one handles
                                  the information.</p>

                            <p><strong>B. Use</strong></p>

                            <p>Example:</p>

                            <p>Personal data collected shall be used by the organization for documentation purposes, for 
                                research.</p>

                            <p><strong>C. Storage, Retention and Destruction</strong></p>

                            <p>This organization will ensure that personal data under its custody are protected against any accidental
                                 or unlawful destruction, alteration and disclosure as well as against any other unlawful processing. 
                                 The organization will implement appropriate security measures in storing collected personal information, 
                                 depending on the nature of the information.</p>

                            <p><strong>D. Access</strong></p>

                            <p>Due to the sensitive and confidential nature of the personal data under the custody of the organization, 
                                only the member and the authorized representative of the organization shall be allowed to access such 
                                personal data, for any purpose, except for those contrary to law, public policy, public order or morals.</p>

                            <p><strong>E. Disclosure and Sharing</strong> (e.g. individuals to whom personal data is shared, disclosure of 
                            policy and processes, outsourcing and subcontracting, etc.)</p>

                            <p>Example:</p>

                            <p>Administrator of the organization shall maintain the confidentiality and secrecy of all personal data that come 
                                to their knowledge. Personal data under the custody of the organization shall be disclosed only pursuant to a 
                                lawful purpose, and to authorized recipients of such data.</p>

                            <p><strong>Security Measures</strong></p>

                            <p><strong>A. Organization Security Measures</strong></p>

                            <p>Every personal information controller and personal information processor must also consider the human aspect of 
                                data protection. The provisions under this section shall include the following:</p>

                            <p><i>1. Data Protection Officer (DPO), or Compliance Officer for Privacy (COP)</i></p>

                            <p>The designated Data Protection Officer is Nimrod F. Bantigue PhD, who is concurrently serving as the President 
                                of the organization.</p>

                            <p><i>2. Functions of the DPO, COP and/or any other responsible personnel with similar functions</i></p>

                            <p>The <strong>Data Protection Officer</strong> shall oversee the compliance of the organization with the 
                            DPA, its IRR, and other related policies, including the conduct of a Privacy Impact Assessment, 
                            implementation of security measures, security incident and data breach protocol, and the inquiry and 
                            complaints procedure.</p>

                            <p><i>3. Conduct of trainings or seminars to keep personnel, especially the Data Protection Officer updated vis-à-vis 
                                developments in data privacy and security</i></p>

                            <p>The organization shall sponsor a mandatory training on data privacy and security at least once a year. For personnel 
                                directly involved in the processing of personal data, management shall ensure their attendance and participation in 
                                relevant trainings and orientations, as often as necessary.</p>

                            <p><i>4. Conduct of Privacy Impact Assessment (PIA)</i></p>

                            <p>The organization shall conduct a Privacy Impact Assessment (PIA) relative to all activities, projects and systems 
                                involving the processing of personal data. It may choose to outsource the conduct a PIA to a third party.</p>

                            <p><i>5. Recording and documentation of activities carried out by the DPO, or the organization itself, to 
                                ensure compliance with the DPA, its IRR and other relevant policies.</i></p>

                            <p>The organization shall sponsor a mandatory training on data privacy and security at least once a year. For 
                                personnel directly involved in the processing of personal data, management shall ensure their attendance 
                                and participation in relevant trainings and orientations, as of</p>

                            <p><i>6. Duty of Confidentiality</i></p>
                            
                            <p>Administrator will be asked to sign a Non-Disclosure Agreement. All officers and staffs with access to 
                                personal data shall operate and hold personal data under strict confidentiality if the same is not 
                                intended for public disclosure.</p>

                            <p><i>7. Review of Privacy Manual</i></p>

                            <p>This Manual shall be reviewed and evaluated annually. Privacy and security policies and practices within 
                                the organization shall be updated to remain consistent with current data privacy best practices.</p>

                            <p><strong>B. Physical Security Measures</strong></p>

                            <p><i>1. Format of data to be collected</i></p>

                            <p>Personal data in the custody of the organization may be in digital/electronic format and 
                                paper-based/physical format.</p>

                            <p><i>2. Storage type and location (e.g. filing cabinets, electronic storage system, personal data 
                                room/separate room or part of an existing room)</i></p>

                            <p>All personal data being processed by the organization shall be stored in a data room, where 
                                paper-based documents are kept in locked filing cabinets while the digital/electronic files 
                                are stored in computers provided and installed by the company.</p>

                            <p><i>3. Access procedure of agency personnel</i></p>

                            <p>Only authorized personnel shall be allowed inside the data room. For this purpose, they shall 
                                each be given a duplicate of the key to the room. Other personnel may be granted access to 
                                the room upon filing of an access request form with the Data Protection Officer and the latter’s 
                                approval thereof.</p>

                            <p><i>4. Monitoring and limitation of access to room or facility</i></p>

                            <p>All personnel authorized to enter and access the data room or facility must fill out and register 
                                with the online registration platform of the organization, and a logbook placed at the entrance 
                                of the room. They shall indicate the date, time, duration and purpose of each access.</p>

                            <p><i>5. Design of office space/work station</i></p>

                            <p>The computers are positioned with considerable spaces between them to maintain privacy and protect 
                                the processing of personal data.</p>

                            <p><i>6. Persons involved in processing, and their duties and responsibilities</i></p>

                            <p>Persons involved in processing shall always maintain confidentiality and integrity of personal data.
                                 They are not allowed to bring their own gadgets or storage device of any form when entering the 
                                 data storage room.</p>

                            <p><i>7. Modes of transfer of personal data within the organization, or to third parties</i></p>

                            <p>Transfers of personal data via electronic mail shall use a secure email facility with encryption of 
                                the data, including any or all attachments. Facsimile technology shall not be used for transmitting 
                                documents containing personal data.</p>

                            <p><i>8. Retention and disposal procedure</i></p>

                            <p>The organization shall retain the personal data of a client for one (1) year from the data of registration. 
                                Upon expiration of such period, all physical and electronic copies of the personal data shall be destroyed 
                                and disposed of using secure technology. </p>

                            <p><strong>C. Technical Security Measures</strong></p>

                            <p>Each personal information controller and personal information processor must implement technical security 
                                measures to make sure that there are appropriate and sufficient safeguards to secure the processing of 
                                personal data, particularly the computer network in place, including encryption and authentication 
                                processes that control and limit access. They include the following, among others:</p>

                            <p><i>1. Monitoring for security breaches</i></p>

                            <p>The organization shall use an intrusion detection system to monitor security breaches and alert the 
                                organization of any attempt to interrupt or disturb the system.</p>

                            <p><i>2. Security features of the software/s and application/s used</i></p>

                            <p>The organization shall first review and evaluate software applications before the installation thereof 
                                in computers and devices of the organization to ensure the compatibility of security features with 
                                overall operations.</p>

                            <p><i>3. Process for regularly testing, assessment and evaluation of effectiveness of security measures</i></p>

                            <p>The organization shall review security policies, conduct vulnerability assessments and perform penetration 
                                testing within the company on regular schedule to be prescribed by the appropriate department or unit.</p>

                            <p><i>4. Encryption, authentication process, and other technical security measures that control and limit 
                                access to personal data</i></p>

                            <p>Each personnel with access to personal data shall verify his or her identity using a secure encrypted link 
                                and multi-level authentication.</p>

                            <p><strong>Breach and Security Incidents</strong></p>

                            <p>Every personal information controller or personal information processor must develop and implement policies 
                                and procedures for the management of a personal data breach, including security incidents. This section 
                                must adequately describe or outline such policies and procedures, including the following:</p>

                            <p><i>1. Creation of a Data Breach Response Team</i></p>

                            <p>A Data Breach Response Team comprising of five (5) officers shall be responsible for ensuring immediate action 
                                in the event of a security incident or personal data breach. The team shall conduct an initial assessment of 
                                the incident or breach in order to ascertain the nature and extent thereof. It shall also execute measures 
                                to mitigate the adverse effects of the incident or breach.</p>

                            <p><i>2. Measures to prevent and minimize occurrence of breach and security incidents</i></p>

                            <p>The organization shall regularly conduct a Privacy Impact Assessment to identify risks in the processing system 
                                and monitor for security breaches and vulnerability scanning of computer networks. Personnel directly involved 
                                in the processing of personal data must attend trainings and seminars for capacity building. There must also 
                                be a periodic review of policies and procedures being implemented in the organization.</p>

                            <p><i>3. Procedure for recovery and restoration of personal data</i></p>

                            <p>The organization shall always maintain a backup file for all personal data under its custody. In the event of a 
                                security incident or data breach, it shall always compare the backup with the affected file to determine the 
                                presence of any inconsistencies or alterations resulting from the incident or breach.</p>

                            <p><i>4. Notification protocol</i></p>

                            <p>The Head of the Data Breach Response Team shall inform the management of the need to notify the NPC and the 
                                data subjects affected by the incident or breach within the period prescribed by law. Management may decide 
                                to delegate the actual notification to the head of the Data Breach Response Team.</p>

                            <p><i>5. Documentation and reporting procedure of security incidents or a personal data breach</i></p>

                            <p>The Data Breach Response Team shall prepare a detailed documentation of every incident or breach encountered, 
                                as well as an annual report, to be submitted to management and the NPC, within the prescribed period.</p>

                            <p><strong>Inquiries and Complaints</strong></p>

                            <p>Every data subject has the right to reasonable access to his or her personal data being processed by the 
                                personal information controller or personal information processor. Other available rights include: (1) 
                                right to dispute the inaccuracy or error in the personal data; (2) right to request the suspension, 
                                withdrawal, blocking, removal or destruction of personal data; and (3) right to complain and be 
                                indemnified for any damages sustained due to inaccurate, incomplete, outdated, false, unlawfully 
                                obtained or unauthorized use of personal data. </p>

                            <p>Accordingly, there must be a procedure for inquiries and complaints that will specify the means through 
                                which concerns, documents, or forms submitted to the organization shall be received and acted upon. 
                                This section shall feature such procedure.</p>

                            <p>Data subjects may inquire or request for information regarding any matter relating to the processing of 
                                their personal data under the custody of the organization, including the data privacy and security 
                                policies implemented to ensure the protection of their personal data. </p>

                            <p>They may write to the organization at <strong>aptmmimaropa@gmail.com</strong> and briefly discuss the inquiry, 
                                together with their contact details for reference.</p>

                            <p>Complaints shall be filed and sent to <strong>aptmmimaropa@gmail.com</strong>. The concerned department or 
                                unit shall confirm with the complainant its receipt of the complaint.</p>

                            <p><strong>Effectivity</strong></p>

                            <p>This section indicates the period of effectivity of the Manual, as well as any other document that the organization 
                                may issue, and which has the effect of amending the provisions of the Manual.</p>

                            <p>The provisions of this Manual are effective this 15 day of August, 2021, until revoked or amended by this company, 
                                through a Board Resolution.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                    </div>
                </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- x -->

        <!-- WEBSITE AND ASSOCIATION INFORMATION -->

        <div class="modal fade" id="modal_about" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body m-2">
                        

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->                            

        <!-- x -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-5">
                            <script>document.write(new Date().getFullYear())</script> © Association of Professional Teachers in Mimaropa Philippines Official Website
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->
        
        <!-- MOBILE SIZE -->
        
        <style>
            .about_section {
                padding-left: 180px; 
                padding-right: 130px; 
                text-align: justify;
            }
            
            .banner_teacher {
                width: 500px;
            }
            
            .reg_tuts {
                width: 450px;
                border-radius: 40px;
            }
            
            .hero-section:after {
                background-image: linear-gradient(to left,#8669ed,#455ABE);
            }
            
            .navbar-expand-lg {
                background-image: linear-gradient(to right,#8669ed,#455ABE);
            }
            
            

            @media(max-width: 1028px){
                .about_section {
                    padding-left: 40px; 
                    padding-top: 10px; 
                    padding-right: 40px; 
                    padding-bottom: 20px;
                    text-align: justify;
                }
                    
                .video-promote {
                    width: 320px;
                    height: 160px;
                }
                
                .empty-svg {
                    width: 300px;
                }
            }
        </style>
        
        <!-- XXX -->

        <!-- bundle -->
        <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <script>
            // close the backdrop of modal
            $(document).ready(function () {
                $('#btn-close').click(function(){
                    $('.alert_backdrop').hide();
                    });
                });
        </script>
    </body>
</html>