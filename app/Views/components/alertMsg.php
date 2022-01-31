<!-- alert msg -->
<?php $session = session();?>
    <?php if(!empty($session->getFlashdata('msg_status'))): ?>    
        <div id="msg_alert" class="alert modal-filled bg-<?php echo $session->getFlashdata('msg_type');?> card fade show" role="alert">
        <button type="button" id="btn-close" class="btn-close alert_close" data-bs-dismiss="alert" aria-hidden="true"></button>
            <center><img class="mt-2" src="<?=base_url()?>/public/assets/images/aptm/logo_no_text.png" alt="minimal_logo" width="40"></center>
            <h4 id="msg_head" class="mt-2"><?php echo $session->getFlashdata('msg_head');?></h4>
            <p id="msg_status" class="mt-2 mb-2"><?php echo $session->getFlashdata('msg_status');?></p>
            <hr>
            <small class="mb-0">APTM Official Website</small>
        </div>
        <div class="alert_backdrop"></div>
    <?php endif;?> 

    <?php 
        unset($_SESSION['msg_status']);
        unset($_SESSION['msg_type']);
        unset($_SESSION['msg_head']);
    ?>

    <style>
        /* alert msg */
        .alert { width: 290px; position: fixed; top: 25%; z-index: 1004 !important; left: 39.5%; 
            text-align: center; padding: 2.25rem!important; box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;}
        .alert_close { position: absolute; right: 10px; top: 10px;}
        .btn-close { color: rgb(59, 220, 53);}
        .alert p { margin: 0%; padding: 0%;}
        .btn_continue { width: 100px; position: relative; left: 55px;}
        .alert_backdrop {background-color: #2a303585; position: fixed; top: 0; left: 0; width: 100%;
            height: 100%; z-index: 1003 !important;}
        /* x */ 

        @media(max-width: 1028px){
            .alert { 
                position: fixed; 
                left: 10%; 
            }
        }
    </style>

        <script>
            // close the backdrop of modal
            $(document).ready(function () {
                $('#btn-close').click(function(){
                    $('.alert_backdrop').hide();
                    });
                });
        </script>