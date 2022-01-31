<!-- MAIN CONTENT OF NEWS PAGE -->

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

                            <!-- page refresh -->
                            <div class="text-center" style="position: relative; bottom: 10px">
                                <a href="<?php echo base_url('AptmController/view_news');?>" 
                                    class="btn btn-light btn-sm btn-rounded" 
                                    title="click to refresh feed">
                                <i class="uil-sync font-20"></i></a>
                                <h5 class="header-title">News Feed</h5>
                            </div>
                            <!-- x -->

                            </div> <!-- end col-->

                            <div class="col-lg-4">
                                
                            <!-- initialize the about widget from libraries -->
                            <?= view_cell('\App\Libraries\AptmLibraries::aboutWidget')?>

                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div>
                
                    <div class="row mb-4">
                        <div class="col-lg-8">
                            <div class="row">
                                <!-- NEWS FEED START -->
                                    <div class="col-lg-12">
                                            
                                                <?php 
                                                        if(count($news_data) > 0){
                                                            foreach($news_data as $news_datum):
                                                                if($news_datum['news_status'] == 'published'):
                                                ?>
                                                <div class="card">
                                                    <div class="row g-0 align-items-center">
                                                        <div class="col-md-7">
                                                            <div class="m-4 me-0">
                                                                <h4 class="card-title mt-3 font-16 mb-1"><?= $news_datum['news_title']?></h4>
                                                                
                                                                <!-- news category -->
                                                                <?php if($news_datum['news_category'] == 'Category 1'):?>
                                                                    <p class="font-14 m-0 mt-1">Category: <span 
                                                                        class="badge badge-primary-lighten font-12 ms-1">
                                                                        Category 1</span></p>
                                                                <?php elseif($news_datum['news_category'] == 'Category 2'):?>
                                                                    <p class="font-14 m-0 mt-1">Category: <span 
                                                                        class="badge badge-success-lighten font-12 ms-1">
                                                                        Category 2</span></p>
                                                                <?php elseif($news_datum['news_category'] == 'Category 3'):?>
                                                                    <p class="font-14 m-0 mt-1">Category: <span 
                                                                        class="badge badge-info-lighten font-12 ms-1">
                                                                        Category 3</span></p>
                                                                <?php endif;?>
                                                                <!-- news category -->
                                                            
                                                                
                                                                <small class="text-muted">
                                                                <?php 
                                                                    if($news_datum['news_comment_num'] == 1){
                                                                        echo '1 Comment';
                                                                    }elseif($news_datum['news_comment_num'] <= 0){
                                                                        echo '0 Comment';
                                                                    }else{
                                                                        echo $news_datum['news_comment_num'].' Comments';
                                                                    }
                                                                ?>
                                                                </small>
                                                                <input type="hidden" name="txt_n_id" value="<?= $news_datum['news_id']?>">
                                                                <p class="text-muted mt-1">written by</p>
                                                                <div class="d-flex">
                                                                    <?php foreach($m_data as $m_datum):
                                                                        if($news_datum['news_creator_id'] == $m_datum['m_id']):?>
                                                                        <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                                                        <div class="w-300">
                                                                            <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                                            <p class="text-muted"><small><?= $news_datum['news_time_created']?> | Admin</small></p>
                                                                        </div> <!-- end w-100-->
                                                                    <?php endif; endforeach;?>
                                                                </div> <!-- end d-flex -->
                                                                <!-- <a href="" class="btn btn-sm btn-primary"> <i class="uil uil-message me-1"></i>read</a> -->
                                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" 
                                                                    data-bs-target="#read_news_modal<?=$news_datum['news_id']?>"
                                                                    title="click to read the news"> 
                                                                    <i class="uil uil-message me-1"></i>Read
                                                                </button>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="m-3">
                                                                <img src="<?=$news_datum['news_image']?>" class="card-img" alt="news image">
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row-->
                                                </div>
                                                <?php endif;endforeach;
                                                    }else {
                                                ?>
                                                <div class="card">
                                                    <div class="card-body pb-1">
                                                        <div class="my-3">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <img width="300" src="<?=base_url('public/assets/images/aptm/undraw_empty.svg')?>" alt="post-img" class="" style="padding-left: 50px;">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                <h5 class="text-center mt-5">
                                                                    "There are no news published yet !</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <?php }?>


                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <!-- end newsfeed -->

                        

                        <div class="col-lg-4">
                           
                        </div>
                    </div>

                    
                    <!-- MODALS START -->



                <!-- READ NEWS MODAL -->
                <?php foreach($news_data as $r_news_datum):?>
                <div id="read_news_modal<?= $r_news_datum['news_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-scrollable">
                           <div class="modal-content">
                             <div class="modal-header modal-colored-header bg-primary">
                                <h4 class="modal-title">Read News Content</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body m-2 mt-1 mb-0">
                                <h3 class="mb-1 font-18"><?=$r_news_datum['news_title']?>
                                
                                <!-- news category -->
                                <?php if($r_news_datum['news_category'] == 'Category 1'):?>
                                    <p class="font-14 m-0 mt-1">Category: <span 
                                        class="badge badge-primary-lighten font-12 ms-1">
                                        Category 1</span></p>
                                <?php elseif($r_news_datum['news_category'] == 'Category 2'):?>
                                    <p class="font-14 m-0 mt-1">Category: <span 
                                        class="badge badge-success-lighten font-12 ms-1">
                                        Category 2</span></p>
                                <?php elseif($r_news_datum['news_category'] == 'Category 3'):?>
                                    <p class="font-14 m-0 mt-1">Category: <span 
                                        class="badge badge-info-lighten font-12 ms-1">
                                        Category 3</span></p>
                                <?php endif;?>
                                <!-- news category -->

                                </h3>

                                <small>written by</small>
                                <div class="d-flex ms-1 mt-1">
                                    <?php foreach($m_data as $m_datum):
                                        if($r_news_datum['news_creator_id'] == $m_datum['m_id']):?>
                                        <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                        <div class="w-300">
                                            <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                               <p class="text-muted"><small><?= $r_news_datum['news_time_created']?> | Admin</small></p>
                                        </div> <!-- end w-100-->
                                     <?php endif; endforeach;?>
                                </div> <!-- end d-flex -->
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <img src="<?=$r_news_datum['news_image']?>" alt="news-image" class="rounded me-1 p-1 mb-sm-0 img-fluid">
                                        <div class="mt-3 news_p"><?=htmlspecialchars_decode($r_news_datum['news_content'])?></div>
                                        <style>
                                            .news_p p{
                                                word-break: break-all;
                                            }
                                        </style>
                                    </div>

                                    <!-- comment section -->
                                    <div class="mt-1">
                                            <p class="text-muted"><i class="uil uil-comments-alt"></i>
                                                <?php 
                                                    if($r_news_datum['news_comment_num'] == 1){
                                                        echo '1 Comment';
                                                    }elseif($r_news_datum['news_comment_num'] <= 0){
                                                        echo '0 Comment';
                                                    }else{
                                                        echo $r_news_datum['news_comment_num'].' Comments';
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <hr class="m-0">

                                        <div class="mt-3">
                                            <p class="text-muted">Comment Section</p>        
                                            <!-- news comments feed -->
                                            <?php 
                                                foreach($news_com_data as $com_info):
                                                    if($com_info['news_id'] == $r_news_datum['news_id']):
                                            ?>
                                            <div class="d-flex m-2">
                                                <!-- fetch the commentator data -->
                                                <?php foreach($m_data as $m_datum):?>
                                                    <?php if($com_info['news_com_creator_id'] == $m_datum['m_id']):?>
                                                        <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                                        <div class="w-100">
                                                            <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                            <p class="text-muted mb-0"><small><?=$com_info['news_com_time_created']?></small></p>
                                                            <p class="my-1 ms-1"><?=$com_info['news_com_content']?>
                                                                <!-- edit and delete button -->
                                                                <?php if($com_info['news_com_creator_id'] == $session->get('l_id')):?>
                                                                    <a href="#" class="btn_pending badge bg-primary rounded-pill font-13 ms-1" 
                                                                        data-bs-toggle="modal" data-bs-target="#editCom<?=$com_info['news_com_id']?>" 
                                                                        title="click to edit your comment" data-bs-dismiss="modal">edit
                                                                    </a>
                                                                    <a href="#" class="btn_pending badge bg-danger rounded-pill font-13" 
                                                                        data-bs-toggle="modal" data-bs-target="#deleteCom<?=$com_info['news_com_id']?>" 
                                                                        title="click to delete your comment" data-bs-dismiss="modal">delete
                                                                    </a>
                                                                <?php endif;?> 
                                                            </p>

                                                            <!-- edit comment container -->
                                                <?php endif; endforeach;?>            
                                                </div> <!-- end w-100 -->
                                            </div> <!-- end d-flex -->
                                            <?php endif;?>
                                            <?php endforeach;?>    
                                            <hr>
                                            <!-- comment box -->
                                            <div class="d-flex">
                                                <img src="<?=$session->get('l_profile_pic')?>" height="32" class="align-self-start rounded me-2" 
                                                    alt="<?=$session->get('l_fname').' '.$session->get('l_lname')?>" 
                                                    title="<?=$session->get('l_fname').' '.$session->get('l_lname').' | '.$session->get('l_type')?>">
                                                <div class="w-100">
                                                    <form action="saveNewsComment" method="POST">
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <input type="text" class="form-control border-0 form-control-sm" placeholder="Write a comment" name="txt_comment" required>
                                                        <input type="hidden" value="<?=$session->get('l_id')?>" name="txt_m_id">
                                                        <input type="hidden" value="<?= $r_news_datum['news_id']?>" name="txt_news_id">
                                                        <input type="hidden" value="<?= $r_news_datum['news_title']?>" name="txt_news_head">
                                                </div> <!-- end w-100 -->
                                                <button type="submit" class="btn btn-sm btn-primary" title="send your comment"><i class="uil uil-message"></i></button>
                                                </form>
                                            </div> <!-- end d-flex -->
                                            <!-- comment box -->
                                        </div>
                                    <!-- x -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              </div>
                         </div><!-- /.modal-content -->
                     </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <?php endforeach;?>

                <!-- EDIT COMMENT MODAL -->
                <?php foreach($news_data as $e_news_datum):?>
                <?php foreach($news_com_data as $com_info):?>
                    <div class="modal fade" id="editCom<?=$com_info['news_com_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header modal-colored-header bg-primary">
                                    <h4 class="modal-title" id="myLargeModalLabel">Edit your Comment to this Announcement</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                 </div>
                                 <div class="modal-body m-2">
                                      <form method="POST" action="editNewsCom">
                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                          <div class="row"> 
                                               <div class="mb-2">
                                                 <input type="hidden" name="txt_news_id" value="<?=$com_info['news_id']?>">
                                                 <input type="hidden" name="txt_id" value="<?=$com_info['news_com_id']?>">
                                                 <input type="hidden" name="txt_news_head" value="<?=$e_news_datum['news_title']?>">
                                                 <input type="hidden" name="txt_comment_before" value="<?=$com_info['news_com_content']?>">
                                                 <strong><small class="">Your Comment : </small></strong>
                                                 <textarea class="form-control p-2 mt-2" rows="4" name="txt_comment_new"><?=$com_info['news_com_content']?></textarea>
                                             </div>
                                         </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="btn_publish">Save Changes</button>
                                  </div>
                             </form>
                         </div><!-- /.modal-content -->
                         </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                <?php endforeach;?>
                <?php endforeach;?>
                <!-- x -->

                <!-- DELETE COMMENT MODAL -->
                <?php foreach($news_data as $d_news_datum):?>
                <?php foreach($news_com_data as $com_datum):?>
                   <div id="deleteCom<?=$com_datum['news_com_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                         <div class="modal-content modal-filled bg-danger">
                              <div class="modal-body p-4">
                             <div class="text-center">
                                 <i class="dripicons-warning h1"></i>
                                 <h4 class="mt-2">Are you sure?</h4>
                                 <p class="mt-3">Once you delete your comment, it can't be undone.</p>
                                 <form action="deleteNewsCom" method="post">
                                      <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                      <input type="hidden" value="<?=$com_datum['news_com_id']?>" name="txt_id">
                                      <input type="hidden" value="<?=$com_datum['news_com_content']?>" name="txt_comment">
                                      <input type="hidden" value="<?=$com_datum['news_id']?>" name="txt_news_id">
                                      <input type="hidden" name="txt_news_head" value="<?=$d_news_datum['news_title']?>">
                                    <button type="sumbit" name="btn_del_com" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
                                     <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">No</button>
                                 </form>
                            </div>
                           </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                <?php endforeach;?>
                <?php endforeach;?>

             <!-- XX -->

             <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>
             
<?= $this->endSection()?>