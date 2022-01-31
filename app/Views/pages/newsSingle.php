<!-- MAIN CONTENT OF ANNOUNCEMENT PAGE -->

<!-- initialize that it extends the userLayout view -->
<?= $this->extend('layouts/userLayout')?>

<!-- initialize the name of section -->
<?= $this->section('mainContent')?>

<!-- main page content start -->
        <?php $session = \Config\Services::session();?>
                <div class="content-page">
                    <div class="content">

                    <?php foreach($news_data as $news_datum):?>
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right mt-2">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('AptmController/view_home');?>">Home</a></li>
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('AptmController/view_news');?>"><?= $meta_title?></a></li>
                                            <li class="breadcrumb-item active"><?= $news_datum['news_title']?></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row mb-4">
                            <!-- news single widget -->
                            <div class="col-lg-8">
                                
                                <div class="card p-4 pb-3">
                                    <h3 class="font-22 mb-1"><?= $news_datum['news_title']?></h3>
                                    <small>written by</small>
                                    <div class="d-flex ms-1 mt-2 mb-2">
                                        <?php foreach($m_data as $m_datum):
                                            if($news_datum['news_creator_id'] == $m_datum['m_id']):?>
                                            <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                            <div class="w-300">
                                                <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                <p class="text-muted"><small><?= $news_datum['news_time_created']?> | Admin</small></p>
                                            </div> <!-- end w-100-->
                                        <?php endif; endforeach;?>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img src="<?=$news_datum['news_image']?>" alt="news image" class="rounded me-1 p-1 mb-sm-0 img-fluid">
                                            <div class="mt-3"><?=htmlspecialchars_decode($news_datum['news_content'])?></div>
                                        </div>
                                        
                                        <!-- comment section -->
                                        <div class="mt-1">
                                                <p class="text-muted"><i class="uil uil-comments-alt"></i>
                                                    <?php 
                                                        if($news_datum['news_comment_num'] == 1){
                                                            echo '1 Comment';
                                                        }elseif($news_datum['news_comment_num'] <= 0){
                                                            echo '0 Comment';
                                                        }else{
                                                            echo $news_datum['news_comment_num'].' Comments';
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
                                                        if($com_info['news_id'] == $news_datum['news_id']):
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
                                                                            title="click to edit your comment">edit
                                                                        </a>
                                                                        <a href="#" class="btn_pending badge bg-danger rounded-pill font-13" 
                                                                            data-bs-toggle="modal" data-bs-target="#deleteCom<?=$com_info['news_com_id']?>" 
                                                                            title="click to delete your comment">delete
                                                                        </a>
                                                                    <?php endif;?> 
                                                                </p>
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
                                                            <input type="hidden" value="<?=$news_datum['news_id']?>" name="txt_news_id">
                                                            <input type="hidden" value="<?= $news_datum['news_title']?>" name="txt_news_head">
                                                    </div> <!-- end w-100 -->
                                                    <button type="submit" class="btn btn-sm btn-primary" title="send your comment"><i class="uil uil-message"></i></button>
                                                    </form>
                                                </div> <!-- end d-flex -->
                                                <!-- comment box -->
                                            </div>
                                        <!-- x -->
                                    </div>
                                </div>
                            </div>

                            <!-- about widget -->
                            <div class="col-lg-4">
                                    
                                <!-- initialize the about widget from libraries -->
                                <?= view_cell('\App\Libraries\AptmLibraries::aboutWidget')?>

                                <!-- trending news widget -->
                                <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img src="<?=base_url('public/assets/images/small/small-1.jpg'); ?>" alt="..." class="d-block img-fluid">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h3 class="text-white">First slide label</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?=base_url('public/assets/images/small/small-3.jpg'); ?>" alt="..." class="d-block img-fluid">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h3 class="text-white">Second slide label</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?=base_url('public/assets/images/small/small-2.jpg'); ?>" alt="..." class="d-block img-fluid">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h3 class="text-white">Third slide label</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>
                                <!-- XXXX -->

                            </div> <!-- end col-->

                            
                    </div>
                

                <!-- EDIT COMMENT MODAL -->
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
                                                 <input type="hidden" name="txt_news_head" value="<?=$news_datum['news_title']?>">
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
                <!-- x -->

                <!-- DELETE COMMENT MODAL -->
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
                                    <input type="hidden" name="txt_news_head" value="<?=$news_datum['news_title']?>">
                                    <button type="sumbit" name="btn_del_com" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
                                    <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">No</button>
                                 </form>
                            </div>
                           </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                <?php endforeach;?>  
             <!-- XX -->
            <?php endforeach;?>   

            <script src="<?php echo base_url('public/assets/js/vendor.min.js'); ?>"></script>

<?= $this->endSection()?>