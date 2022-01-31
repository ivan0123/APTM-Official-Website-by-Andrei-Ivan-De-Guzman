<!-- MAIN CONTENT OF HOME PAGE -->

<?= $this->extend('layouts/adminLayout')?>
<?= $this->section('adminMainContent')?>

<!-- Start Content-->
                        <?php $session = \Config\Services::session();?>
       
                        <!-- Oriental Mindoro Division Member Table -->
                        <div class="row">
                            
                            <!-- BANNER WIDGET -->
                            <div class="col-lg-8">
                                                
                            <!-- initialize the banner widget from libraries -->
                            <?= view_cell('\App\Libraries\AptmLibraries::bannerWidget')?>    

                            </div> <!-- end col-->

                             <!-- ABOUT US WIDGET -->
                             <div class="col-lg-4">
                                                
                             <!-- initialize the about widget from libraries -->
                             <?= view_cell('\App\Libraries\AptmLibraries::aboutWidget')?>

                            </div> <!-- end col-->

                            <!-- TABLE WIDGET -->

                            <!-- Oriental Mindoro Division -->
                            <?php function forum_tbl($forum_data, $division, $tbl_id, $m_data, $tbl_color){?>
                            <div class="col-12">
                                <div class="card border-<?=$tbl_color?> border">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <h4 class="header-title mt-1 text-<?=$tbl_color?>">Forums created for <?=$division?></h4>
                                                <p class="text-muted font-14">
                                                    
                                                </p>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="ms-4" style="position: relative; left: 60px;">
                                                    <button type="button" class="btn btn-primary mb-2">
                                                        <i class="uil uil-print"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-content"> 
                                            <div class="tab-pane show active table-responsive" id="scroll-horizontal-preview">
                                                <table id="<?=$tbl_id?>" class="table w-100 nowrap table-centered table-striped">
                                                    <thead class="table-<?=$tbl_color?>">
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>Creator</th>
                                                            <th>Status</th>
                                                            <th>Content</th>
                                                            <th>Category</th>
                                                            <th>Time Created</th>
                                                            <th>Time Updated</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if(count($forum_data) > 0){
                                                                foreach($forum_data as $forum_info):?>
                                                        <tr>
                                                            <!-- action -->
                                                            <td class="table-action">
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#deleteForum<?=$forum_info['forum_id']?>" title="click to delete this news"> 
                                                                    <i class="uil uil-trash-alt text-danger"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php foreach($m_data as $m_datum):
                                                                    if($forum_info['forum_creator_id'] == $m_datum['m_id']):?>
                                                                <img src="<?=$m_datum['m_profile_pic']?>" alt="table-user" class="me-2 rounded-circle" width="30" height="30">
                                                                <?=$m_datum['m_fname'].' '.$m_datum['m_lname'].' | '.$m_datum['m_type']?>
                                                                <?php endif;endforeach;?>
                                                            </td>
                                                            <td>
                                                                <h4>
                                                                    <?php if($forum_info['forum_status'] == 'pending'):?>
                                                                        <a class="btn_pending badge bg-primary rounded-pill" 
                                                                            data-bs-toggle="modal" data-bs-target="#approveForum<?=$forum_info['forum_id']?>" 
                                                                            title="click to approve this forum">Pending
                                                                        </a>
                                                                    <?php else:?>
                                                                        <span class="badge bg-success rounded-pill" 
                                                                            title="this forum has been approved by the admin">Approved
                                                                        </span>
                                                                    <?php endif;?>
                                                                </h4>
                                                            </td>
                                                            <td><?=htmlspecialchars_decode($forum_info['forum_content'])?></td>
                                                            <td><?=$forum_info['forum_category']?></td>
                                                            <td><?=$forum_info['forum_time_created']?></td>
                                                            <td>
                                                                <?php if($forum_info['forum_time_updated'] == null){
                                                                    echo 'not yet edited';
                                                                }else{
                                                                    echo $forum_info['forum_time_updated'];
                                                                }?>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;
                                                            }else{?>
                                                            <div>
                                                                <p class="text-muted">There's no news created yet.</p>
                                                            </div>
                                                        <?php }?>
                                                    </tbody>
                                                </table>                                          
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->

                            <!-- end Table widget-->
                            <?php }?>
                            
                            <!-- initialize table functions -->
                        
                            <?php 
                                forum_tbl($forum_all_data, 'All Division', 'tbl_news_all', $m_data, 'info');
                                forum_tbl($forum_ori_data, 'Oriental Mindoro', 'tbl_member_ori', $m_data, 'primary');
                                forum_tbl($forum_occ_data, 'Occidental Mindoro', 'tbl_member_occ', $m_data, 'warning');
                                forum_tbl($forum_cal_data, 'Calapan City', 'tbl_member_cal', $m_data, 'danger');
                                forum_tbl($forum_mar_data, 'Marinduque', 'tbl_member_mar', $m_data, 'success');
                                forum_tbl($forum_rom_data, 'Romblon', 'tbl_member_rom', $m_data, 'secondary');
                                forum_tbl($forum_pal_data, 'Palawan', 'tbl_member_pal', $m_data, 'info');
                                forum_tbl($forum_pue_data, 'Puerto Princesa', 'tbl_member_pue', $m_data, 'dark');
                            ?>

                            <!-- x -->

                        </div>
                        <!-- end row -->

                        <!-- MODAL START -->

                        <!-- UNPUBLISH ANNOUNCEMENT MODAL -->

                        <?php function approve_modal($forum_data, $division){?>

                        <?php foreach($forum_data as $forum_datum):?>
                        <div id="approveForum<?=$forum_datum['forum_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-primary">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Approve this Forum?</h4>
                                        <p>Just click the approve button to approve the forum created by the member.
                                        Once the Forum has been approved, it will be visible to Forum Page.</p>
                                        <form action="approveForum" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$forum_datum['forum_id']?>" name="txt_forum_id">
                                            <input type="hidden" value="<?=$forum_datum['forum_content']?>" name="txt_forum_content">
                                            <input type="hidden" value="<?=$division?>" name="txt_division">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-light my-2">Approve</button>
                                            <button type="button" class="btn btn-outline-light my-2 ms-1" data-bs-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;?>

                        <?php }?> 

                        <!-- initialize table functions -->
                                                
                        <?php 
                            approve_modal($forum_all_data, 'All Divisions');
                            approve_modal($forum_ori_data, 'APTM Oriental Mindoro Division');
                            approve_modal($forum_occ_data, 'APTM Occidental Mindoro Division');
                            approve_modal($forum_cal_data, 'APTM Calapan City Division');
                            approve_modal($forum_mar_data, 'APTM Marinduque Division');
                            approve_modal($forum_rom_data, 'APTM Romblon Division');
                            approve_modal($forum_pal_data, 'APTM Palawan Division');
                            approve_modal($forum_pue_data, 'APTM Puerto Princesa Division');
                        ?>

                        <!-- x -->

                        <!-- X -->                                                

                        <!-- DELETE FORUM MODAL -->
                        <?php function delete_modal($forum_data, $division){?>
                        <?php foreach($forum_data as $forum_datum):?>
                        <div id="deleteForum<?=$forum_datum['forum_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-danger">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Are you sure?</h4>
                                        <p class="mt-3">Once you delete this forum, it can't be undone.</p>
                                        <form action="deleteForum" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$forum_datum['forum_id']?>" name="txt_forum_id_d">
                                            <input type="hidden" value="<?=$division?>" name="txt_division">
                                            <input type="hidden" value="<?=$forum_datum['forum_content']?>" name="txt_forum_content">
                                            <button type="sumbit" name="btn_del_forum" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
                                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;?>
                        <?php }?>

                        <!-- use the delete modal function for every table-->
                        <?php 
                            delete_modal($forum_all_data, 'All Division');
                            delete_modal($forum_ori_data, 'APTM Oriental Mindoro Division');
                            delete_modal($forum_occ_data, 'APTM Occidental Mindoro Division');
                            delete_modal($forum_cal_data, 'APTM Calapan City Division');
                            delete_modal($forum_mar_data, 'APTM Marinduque Division');
                            delete_modal($forum_rom_data, 'APTM Romblon Division');
                            delete_modal($forum_pal_data, 'APTM Palawan Division');
                            delete_modal($forum_pue_data, 'APTM Puerto Princesa Division');
                        ?>

                        <!-- x -->

                    </div> <!-- container -->

                </div> <!-- content -->


<?= $this->endSection()?>



