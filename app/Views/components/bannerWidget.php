<!-- put this on div col-lg-8 -->
<!-- BANNER WIDGET -->
<div class="card announcement-banner" style="height: 328px;">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="b p-1 ms-1 pt-0">
                    <h3 class="text-primary fw-normal hero-title">
                        <?= $b_title?>
                    </h3>
                    <p class="font-16 descrip pt-0"><?= $b_descrip?></p>
                </div>
            </div>
            <div class="col-lg-6 b">
                <img class="b_svg" src="<?=$b_svg?>" alt="" width="280">
            </div>
        </div>
     </div> <!-- end card-body-->
</div> <!-- end card-->

<style>
    
    .b_svg {
        padding: 44px 0px 44px 0px;
    }

    @media(max-width: 1028px){
        .b {
            text-align: center;
        }
        .announcement-banner {
            margin-top: 30px;
        }
        .b_svg {
            padding: 0;
            width: 200px;
        }
    }
</style>