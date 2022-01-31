<!-- MAIN CONTENT OF HOME PAGE -->

<?= $this->extend('layouts/adminLayout')?>
<?= $this->section('adminMainContent')?>

<!-- Start Content-->
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
                            <?php function log_tbl($log_data, $type, $tbl_color, $tbl_id){?>
                            <div class="col-12">
                                <div class="card border-<?=$tbl_color?> border">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <h4 class="header-title mt-1 text-<?=$tbl_color?>">Activity Log by <?=$type?> Account</h4>
                                                <p>These are the following records of activity logs of every account.</p>
                                            </div>
                                            <div class="col-lg-3" style="position: relative; left: 185px;">
                                                <button type="button" class="btn btn-primary mb-2">
                                                    <i class="uil uil-print"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active table-responsive" id="scroll-horizontal-preview">
                                                <table id="<?=$tbl_id?>" class="table w-100 nowrap table-striped">
                                                    <thead class="table-<?=$tbl_color?>">
                                                        <tr>
                                                            <th>Creator</th>
                                                            <th>Activity</th>
                                                            <th>Time</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(count($log_data) > 0){?>
                                                            <?php foreach($log_data as $log_info):?>
                                                        <tr>
                                                            <td>
                                                                <img src="<?=$log_info['log_creator_profile']?>" alt="table-user" class="me-2 rounded-circle" width="30" height="30">
                                                                <?=$log_info['log_creator_name'].' | '.$log_info['log_creator_type']?>
                                                                <?php if($log_info['log_creator_id'] == NULL):
                                                                    echo 'Requesting to become a member.';
                                                                endif;?>
                                                            </td>
                                                            <td><?=$log_info['log_activity']?></td>
                                                            <td><?=$log_info['log_time_created']?></td>
                                                            <td class="table-action">
                                                                <a title="delete user activity?" 
                                                                    href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#deleteActivity<?=$log_info['log_id']?>">
                                                                    <i class="uil uil-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;
                                                            }else{?>
                                                            <div>
                                                                <p class="text-muted">There's no Admin Account Activity yet.</p>
                                                            </div>
                                                        <?php }?>
                                                    </tbody>
                                                </table>                                          
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        <?php }?>

                        <!-- use tbl_log function -->
                        
                        <?php 
                            log_tbl($log_data_a, 'Admin', 'primary', 'tbl_log_a');
                            log_tbl($log_data_t, 'Treasurer', 'warning', 'tbl_log_t');
                            log_tbl($log_data_m, 'Member', 'success', 'tbl_log_m');
                        ?>

                        <!-- XX -->

                        <!-- MODALS START -->
                       
                        
                        <!-- DELETE MEMBER MODAL -->
                        <?php function delete_modal($log_data){?>
                        <?php foreach($log_data as $log_d_info):?>
                        <div id="deleteActivity<?=$log_d_info['log_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-danger">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Are you sure?</h4>
                                        <p class="mt-3">Once you delete this <strong>log</strong>, it can't be undone.</p>
                                        <form action="deleteActivity" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$log_d_info['log_id']?>" name="txt_d_id">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
                                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php endforeach;}?>

                        <?php 
                            delete_modal($log_data_a);
                            delete_modal($log_data_t);
                            delete_modal($log_data_m);
                        ?>
                    <!-- END MODALS -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->


<?= $this->endSection()?>