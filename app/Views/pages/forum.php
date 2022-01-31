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

                                <!-- create forum -->
                                <div class="create-forum">
                                    <div class="card p-1 pb-0 pt-0">
                                        <div class="card-body">
                                            <form action="createForum" method="POST">
                                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                <div class="mb-2">
                                                    <h3 class="mb-2 font-18 ms-1">Ask your Question</h3>
                                                    <textarea class="form-control p-2" id="txtForumCreate" 
                                                        placeholder="Write your question here ..." 
                                                        name="txtContent"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-2">
                                                            <strong><small>Select Category</small></strong>
                                                            <select class="form-select mt-1" name="txtCategory">
                                                                <option value="Category 1">Category 1</option>
                                                                <option value="Category 2">Category 2</option>
                                                                <option value="Category 3">Category 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="mb-3">
                                                            <strong><small>Select Division</small></strong>
                                                            <select class="form-select mt-1" name="txtDivision">
                                                                <?php if($session->get('l_type') == 'admin'):?>
                                                                    <option value="All Division">All Division</option>
                                                                    <option value="APTM Oriental Mindoro">APTM Oriental Mindoro</option>
                                                                    <option value="APTM Occidental Mindoro">APTM Occidental Mindoro</option>
                                                                    <option value="APTM Calapan City">APTM Calapan City</option>
                                                                    <option value="APTM Marinduque">APTM Marinduque</option>
                                                                    <option value="APTM Romblon">APTM Romblon</option>
                                                                    <option value="APTM Palawan">APTM Palawan</option>
                                                                    <option value="APTM Puerto Princesa">APTM Puerto Princesa</option>
                                                                <?php else:?>
                                                                    <option value="All Division">All Division</option>
                                                                    <option value="
                                                                    <?=$session->get('l_division')?>">
                                                                    <?=$session->get('l_division')?> / the division where you belong</option>
                                                                <?php endif;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <button type="submit" class="btn btn-primary" style="float: right;">
                                                        <i class="uil uil-message me-1"> </i>Post 
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- x -->

                                <!-- page refresh -->
                                <div class="text-center" style="position: relative; bottom: 10px">
                                    <a href="<?php echo base_url('AptmController/view_forum');?>" 
                                        class="btn btn-light btn-sm btn-rounded" 
                                        title="click to refresh feed">
                                    <i class="uil-sync font-20"></i></a>
                                    <h5 class="header-title">Forums Feed</h5>
                                </div>
                                <!-- x -->

                                <!-- forum feed -->
                                <div class="row">
                                    <div class="col-lg-12">
                                            
                                                <?php 
                                                        if(count($forum_data) > 0){
                                                            foreach($forum_data as $forum_datum):
                                                                if($forum_datum['forum_status'] == 'published' ):
                                                ?>
                                                <div class="card ribbon-box">
                                                    <div class="row g-0 align-items-center">
                                                        <div class="col-lg-12">
                                                            <div class="m-4 me-0">

                                                                <!-- Category Ribbon -->
                                                                <?php if($forum_datum['forum_category'] == 'Category 1'):?>
                                                                    <div class="ribbon ribbon-primary float-end" 
                                                                        style="position: relative; right: 20px; bottom: 10px;">
                                                                        Category 1
                                                                    </div>    
                                                                <?php elseif($forum_datum['forum_category'] == 'Category 2'):?>
                                                                    <div class="ribbon ribbon-info float-end" 
                                                                        style="position: relative; right: 20px; bottom: 10px;">
                                                                        Category 2
                                                                    </div>    
                                                                <?php elseif($forum_datum['forum_category'] == 'Category 3'):?>
                                                                    <div class="ribbon ribbon-warning float-end" 
                                                                        style="position: relative; right: 20px; bottom: 10px;">
                                                                        Category 3
                                                                    </div>
                                                                <?php endif;?>
                                                                <!-- x -->

                                                                <div class="d-flex">
                                                                    <?php foreach($m_data as $m_datum):
                                                                        if($forum_datum['forum_creator_id'] == $m_datum['m_id']):?>
                                                                        <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                                                        <div class="w-300">
                                                                            <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                                            <p class="text-muted"><small><?= $forum_datum['forum_time_created']?> 
                                                                                | <?=$m_datum['m_type']?> | <?=$m_datum['m_division']?></small></p>
                                                                        </div> <!-- end w-100-->
                                                                    <?php endif; endforeach;?>
                                                                </div> <!-- end d-flex -->


                                                                <div class="card-title mt-1 font-16 pe-4"><?= $forum_datum['forum_content']?></div>
                                                                <p class="text-muted mb-1">To: <?= $forum_datum['forum_division']?></p>

                                                                <small class="text-muted">
                                                                <?php 
                                                                    if($forum_datum['forum_comment_num'] == 1){
                                                                        echo '1 Comment';
                                                                    }elseif($forum_datum['forum_comment_num'] <= 0){
                                                                        echo '0 Comment';
                                                                    }else{
                                                                        echo $forum_datum['forum_comment_num'].' Comments';
                                                                    }
                                                                ?>
                                                                </small><br>
                                                                
                                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" 
                                                                    data-bs-target="#read_news_modal<?=$forum_datum['forum_id']?>"
                                                                    title="click to read the news" style="float: right; margin: 0 29px 27px 0;"> 
                                                                    <i class="uil uil-message me-1"></i>View
                                                                </button>

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
                                                                    <img width="300" src="<?=base_url('public/assets/images/aptm/undraw_empty.svg'); ?>" alt="post-img" class="" style="padding-left: 50px;">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                <h5 class="text-center mt-5">
                                                                    "There are no Forums created yet !</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end card-body -->
                                                </div>
                                                <?php }?>


                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                                <!-- x -->

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
                    <!-- end content page -->
                </div>

                    
                    <!-- MODALS START -->



                <!-- VIEW FORUM MODAL -->
                <?php foreach($forum_data as $r_forum_datum):?>
                <div id="read_news_modal<?= $r_forum_datum['forum_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                             <div class="modal-header modal-colored-header bg-primary">
                                <h4 class="modal-title">View Forum Content</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body m-2 mt-1 mb-0 ribbon-box">

                                <!-- Category Ribbon -->
                                <?php if($r_forum_datum['forum_category'] == 'Category 1'):?>
                                    <div class="ribbon ribbon-primary float-end" 
                                        style="position: relative; right: -20px;">
                                        Category 1
                                     </div>    
                                   <?php elseif($r_forum_datum['forum_category'] == 'Category 2'):?>
                                     <div class="ribbon ribbon-info float-end" 
                                         style="position: relative; right: -20px;">
                                         Category 2
                                    </div>    
                                 <?php elseif($r_forum_datum['forum_category'] == 'Category 3'):?>
                                     <div class="ribbon ribbon-warning float-end" 
                                           style="position: relative; right: -20px;">
                                          Category 3
                                    </div>
                                <?php endif;?>
                                <!-- x -->

                                <!-- Forum Creator -->
                                <div class="d-flex ms-1 mt-1">
                                    <?php foreach($m_data as $m_datum):
                                        if($forum_datum['forum_creator_id'] == $m_datum['m_id']):?>
                                        <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                        <div class="w-300">
                                            <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                               <p class="text-muted"><small><?= $r_forum_datum['forum_time_created']?> | <?=$m_datum['m_type']?> | <?=$m_datum['m_division']?></small></p>
                                        </div> <!-- end w-100-->
                                     <?php endif; endforeach;?>
                                </div> <!-- end d-flex -->
                                <!-- x -->

                                <!-- forum content -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="news_p font-16 ms-2"><?=htmlspecialchars_decode($r_forum_datum['forum_content'])?></div>
                                        <style>.news_p p{word-break: break-all;}</style>
                                    </div>

                                    <!-- comment section -->
                                    <div class="mt-1">
                                            <p class="text-muted"><i class="uil uil-comments-alt"></i>
                                                <?php 
                                                    if($r_forum_datum['forum_comment_num'] == 1){
                                                        echo '1 Comment';
                                                    }elseif($r_forum_datum['forum_comment_num'] <= 0){
                                                        echo '0 Comment';
                                                    }else{
                                                        echo $r_forum_datum['forum_comment_num'].' Comments';
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <hr class="m-0">

                                        <div class="mt-3">
                                            <p class="text-muted">Comment Section</p>        
                                            <!-- news comments feed -->
                                            <?php 
                                                foreach($forum_com_data as $com_info):
                                                    if($com_info['forum_id'] == $r_forum_datum['forum_id']):
                                            ?>
                                            <div class="d-flex m-2">
                                                <!-- fetch the commentator data -->
                                                <?php foreach($m_data as $m_datum):?>
                                                    <?php if($com_info['forum_com_creator_id'] == $m_datum['m_id']):?>
                                                        <img class="me-2 rounded" src="<?=$m_datum['m_profile_pic']?>" alt="Generic placeholder image" height="32">
                                                        <div class="w-100">
                                                            <h5 class="m-0"><?=$m_datum['m_fname'].' '.$m_datum['m_lname']?></h5>
                                                            <p class="text-muted mb-0"><small><?=$com_info['forum_com_time_created']?></small></p>
                                                            <p class="my-1 ms-1"><?=$com_info['forum_com_content']?>
                                                                <!-- edit and delete button -->
                                                                <?php if($com_info['forum_com_creator_id'] == $session->get('l_id')):?>
                                                                    <a href="#" class="btn_pending badge bg-primary rounded-pill font-13 ms-1" 
                                                                        data-bs-toggle="modal" data-bs-target="#editCom<?=$com_info['forum_com_id']?>" 
                                                                        title="click to edit your comment" data-bs-dismiss="modal">edit
                                                                    </a>
                                                                    <a href="#" class="btn_pending badge bg-danger rounded-pill font-13" 
                                                                        data-bs-toggle="modal" data-bs-target="#deleteCom<?=$com_info['forum_com_id']?>" 
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
                                                    <form action="saveForumComment" method="POST">
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <input type="text" class="form-control border-0 form-control-sm" placeholder="Write a comment" name="txt_comment" required>
                                                        <input type="hidden" value="<?=$session->get('l_id')?>" name="txt_m_id">
                                                        <input type="hidden" value="<?= $r_forum_datum['forum_id']?>" name="txt_forum_id">
                                                        <input type="hidden" value="<?= $r_forum_datum['forum_content']?>" name="txt_forum_content">
                                                        <input type="hidden" value="<?= $r_forum_datum['forum_division']?>" name="txt_division">
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
                <?php foreach($forum_data as $e_forum_datum):?>
                <?php foreach($forum_com_data as $com_info):?>
                    <div class="modal fade" id="editCom<?=$com_info['forum_com_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header modal-colored-header bg-primary">
                                    <h4 class="modal-title" id="myLargeModalLabel">Edit your Comment to this Announcement</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                 </div>
                                 <div class="modal-body m-2">
                                      <form method="POST" action="editForumCom">
                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                          <div class="row"> 
                                               <div class="mb-2">
                                                 <input type="hidden" name="txt_forum_id" value="<?=$com_info['forum_id']?>">
                                                 <input type="hidden" name="txt_id" value="<?=$com_info['forum_com_id']?>">
                                                 <input type="hidden" name="txt_forum_content" value="<?=$e_forum_datum['forum_content']?>">
                                                 <input type="hidden" name="txt_forum_division" value="<?=$e_forum_datum['forum_division']?>">
                                                 <input type="hidden" name="txt_comment_before" value="<?=$com_info['forum_com_content']?>">
                                                 <strong><small class="">Your Comment : </small></strong>
                                                 <textarea class="form-control p-2 mt-2" rows="4" name="txt_comment_new"><?=$com_info['forum_com_content']?></textarea>
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
                <?php foreach($forum_data as $d_forum_datum):?>
                <?php foreach($forum_com_data as $com_datum):?>
                   <div id="deleteCom<?=$com_datum['forum_com_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                         <div class="modal-content modal-filled bg-danger">
                              <div class="modal-body p-4">
                             <div class="text-center">
                                 <i class="dripicons-warning h1"></i>
                                 <h4 class="mt-2">Are you sure?</h4>
                                 <p class="mt-3">Once you delete your comment, it can't be undone.</p>
                                 <form action="deleteForumCom" method="post">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                      <input type="hidden" value="<?=$com_datum['forum_com_id']?>" name="txt_id">
                                      <input type="hidden" value="<?=$com_datum['forum_com_content']?>" name="txt_comment">
                                      <input type="hidden" value="<?=$com_datum['forum_id']?>" name="txt_forum_id">
                                      <input type="hidden" name="txt_forum_content" value="<?=$d_forum_datum['forum_content']?>">
                                      <input type="hidden" name="txt_forum_division" value="<?=$d_forum_datum['forum_division']?>">
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