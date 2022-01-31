<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-logout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 08:37:05 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Membership Fee Payment | APTM Official Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="APTM Official Website is an online platform dedicated to deliver an extensive service dedicated to its dear members. The website aims to reach every professional teachers in MIMAROPA Region Philippines to develop relations and strengthen the teaching force across the region." name="description" />
        <meta content="Andrei Ivan De Guzman" name="author" />

        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>/public/assets/images/aptm/aptm_icon.ico">

        <!-- App css -->
        <link href="<?php echo base_url('public/assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/assets/css/app.min.css'); ?>" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?php echo base_url('public/assets/css/app-dark.min.css'); ?>" rel="stylesheet" type="text/css" id="dark-style" /> 
        <link href="<?php echo base_url('public/assets/css/aptm.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/aptm_landing.css'); ?>">  

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

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

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="<?php echo base_url('public/assets/images/aptm/mini_logo.png'); ?>" alt="" height="35"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-100 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Membership Fee Payment</h4>
                                    <p class="mb-4 mt-3">
                                        You're account was verified and approved by the Administrator, you can login your account once you are paid on the Membership Fee. Please pay your <strong> Membership Fee amounting to <i>300.00 pesos</i> </strong>
                                     to your <strong> APTM Division's Treasurer manually or pay online using PayPal.</strong></p>
                                </div>

                                <div class="logout-icon m-auto mb-2">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                                        <path class="path" fill="none" stroke="#0acf97" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                                            c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                                            c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
                                        <circle class="path" fill="none" stroke="#0acf97" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
                                        <polyline class="path" fill="none" stroke="#0acf97" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8
                                            74.1,108.4 48.2,86.4 "/>

                                        <circle class="spin" fill="none" stroke="#0acf97" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>
                                    </svg>
                                </div> <!-- end logout-icon-->

                                 <div class="text-center mt-2" id="paypal-button-container"></div> 
                                
                                <div class="text-center w-100 m-auto mt-3">
                                    <p class="text-muted"><i><strong>Note:</strong> Once you receive a confirmation email 
                                        that your account was approved, please pay the membership fee on your divisions treasurer.
                                        If you are already a member of APTM before, just message your divison's treasurer.
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Back to <a href="index" class="text-muted ms-1"><b>Home Page</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> © Association of Professional Teachers in Mimaropa Philippines Official Website
        </footer>

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

        <!-- PAYPAL INTEGRATION -->

        <script
            src="https://www.paypal.com/sdk/js?client-id=AQanJHSy6xjE0Liz4VdCrww3xpuApN91pblfaMl8pRtkO8O6aTBZlLKg2cgQzopS-1RObAofD7mWV1qt"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
        </script>

        <!-- PAYPAL PAYMENT INTEGRATION -->

        <?php 
            $session = \Config\Services::session();
            $signed_up_m_id= $session->getFlashdata('signed_up_m_id');
            $signed_up_email = $session->getFlashdata('signed_up_email');
            $signed_up_fname = $session->getFlashdata('signed_up_fname');
            $signed_up_lname = $session->getFlashdata('signed_up_lname');
        ?>

        <script>

            paypal.Buttons({
                createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        reference_id: "<?=$signed_up_email?>",
                    amount: {
                        currency: "USD",
                        value: '6.00'
                    }
                    }]
                });
                },
                onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                    //alert('Success');
                    console.log(details);

                    //pass the payment details to vars
                    var transact_id = details.id;
                    var transact_payer_fname = details.payer.name.given_name;
                    var transact_payer_lname = details.payer.name.surname;
                    var transact_payer_email = details.payer.email_address;
                    var transact_payer_id = details.payer.payer_id;
                    var transact_currency = details.purchase_units[0].amount.currency_code;
                    var transact_amount = details.purchase_units[0].amount.value;
                    var transact_payee_email = details.purchase_units[0].payee.email_address;
                    var transact_payee_merchant_id = details.purchase_units[0].payee.merchant_id;
                    var transact_reference_id = details.purchase_units[0].reference_id;
                    var transact_status = details.status;
                    var transact_date = details.create_time;
                    var aptm_member_id =  '<?=$signed_up_m_id?>';
                    var aptm_member_fname = '<?=$signed_up_fname?>';
                    var aptm_member_lname = '<?=$signed_up_lname?>';

                    $.ajax({
                        method: 'post',
                        url: "<?=base_url()?>/AptmController/save_payment_transaction/"+transact_id+"/"+transact_payer_fname+"/"+transact_payer_lname+"/"+transact_payer_email+"/"+transact_payer_id+"/"+transact_currency+"/"+transact_amount+"/"+transact_payee_email+"/"+transact_payee_merchant_id+"/"+transact_reference_id+"/"+transact_status+"/"+transact_date+"/"+aptm_member_id+"/"+aptm_member_fname+"/"+aptm_member_lname+"",
                        dataType: 'JSON'
                    });

                    // //This function shows a transaction success message to your buyer.
                    alert('Dear,' + details.payer.name.given_name + ' ' + details.payer.name.surname +
                    ', Your Membership Fee PAYMENT TRANSACTION using PayPal was SUCCESSFUL, you can now login your account. Thank You.');
                });
                }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
        </script>
    </body>

</html>
