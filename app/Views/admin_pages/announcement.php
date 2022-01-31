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
                            <?php function ann_tbl($ann_data, $division, $tbl_id, $m_data, $tbl_color){?>
                            <div class="col-12">
                                <div class="card border-<?=$tbl_color?> border">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <h4 class="header-title mt-1 text-<?=$tbl_color?>">Announcements for <?=$division?></h4>
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
                                                            <th>What</th>
                                                            <th>When(Date)</th>
                                                            <th>Where</th>
                                                            <th>Who</th>
                                                            <th>Image Included</th>
                                                            <th>Time Created</th>
                                                            <th>Time Updated</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if(count($ann_data) > 0){
                                                                foreach($ann_data as $ann_info):?>
                                                        <tr>
                                                            <!-- action -->
                                                            <td class="table-action">
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#editAnn<?=$ann_info['ann_id']?>" title="click to edit this announcement"> 
                                                                    <i class="uil uil-edit text-primary"></i>
                                                                </a>
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#deleteAnn<?=$ann_info['ann_id']?>" title="click to delete this announcement"> 
                                                                    <i class="uil uil-trash-alt text-danger"></i>
                                                                </a>
                                                            </td>

                                                            <td>
                                                                <?php foreach($m_data as $m_datum):
                                                                    if($ann_info['ann_creator_id'] == $m_datum['m_id']):?>
                                                                <img src="<?=$m_datum['m_profile_pic']?>" alt="table-user" class="me-2 rounded-circle" width="30" height="30">
                                                                <?=$m_datum['m_fname'].' '.$m_datum['m_lname'].' | '.$m_datum['m_type']?>
                                                                <?php endif;endforeach;?>
                                                            </td>
                                                            <td>
                                                                <h4>
                                                                    <?php if($ann_info['ann_status'] == 'published'):?>
                                                                        <a href="#" class="btn_pending badge bg-success rounded-pill" 
                                                                            data-bs-toggle="modal" data-bs-target="#unpublishAnn<?=$ann_info['ann_id']?>" 
                                                                            title="click to unpublish the announcement">Published
                                                                        </a>
                                                                    <?php else:?>
                                                                        <a href="#" class="btn_pending badge bg-primary rounded-pill" 
                                                                            data-bs-toggle="modal" data-bs-target="#publishAnn<?=$ann_info['ann_id']?>" 
                                                                            title="click to publish the announcement">Unpublished
                                                                        </a>
                                                                    <?php endif;?>
                                                                </h4>
                                                            </td>
                                                            <td><?=htmlspecialchars_decode($ann_info['ann_content_what'])?></td>
                                                            <td><?=date("h:i a  m/d/Y", strtotime($ann_info['ann_content_when_date']))?></td>
                                                            <td><?=$ann_info['ann_content_where']?></td>
                                                            <td><?=$ann_info['ann_content_who']?></td>
                                                            <td>
                                                                <img src="<?=$ann_info['ann_image']?>" alt="image" class="me-3" height="50">
                                                            </td>
                                                            <td><?=$ann_info['ann_time_created']?></td>
                                                            <td>
                                                                <?php if($ann_info['ann_time_updated'] == null){
                                                                    echo 'not yet edited';
                                                                }else{
                                                                    echo $ann_info['ann_time_updated'];
                                                                }?>
                                                            </td>

                                                        </tr>
                                                        <?php endforeach;
                                                            }else{?>
                                                            <div>
                                                                <p class="text-muted">There's no announcement created yet.</p>
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
                                ann_tbl($ann_all_data, 'All Divisions', 'tbl_ann_all', $m_data,'info');
                                ann_tbl($ann_ori_data, 'Oriental Mindoro', 'tbl_member_ori', $m_data,'primary');
                                ann_tbl($ann_occ_data, 'Occidental Mindoro', 'tbl_member_occ', $m_data,'warning');
                                ann_tbl($ann_cal_data, 'Calapan City', 'tbl_member_cal', $m_data,'danger');
                                ann_tbl($ann_mar_data, 'Marinduque', 'tbl_member_mar', $m_data,'success');
                                ann_tbl($ann_rom_data, 'Romblon', 'tbl_member_rom', $m_data,'secondary');
                                ann_tbl($ann_pal_data, 'Palawan', 'tbl_member_pal', $m_data,'info');
                                ann_tbl($ann_pue_data, 'Puerto Princesa', 'tbl_member_pue', $m_data,'dark');
                            ?>

                            <!-- x -->

                        </div>
                        <!-- end row -->


                        <!-- MODAL START -->

                        <!-- CREATE ANNOUNCEMENT -->
                        <div class="modal fade" id="createAnn" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Create new announcement</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <div>
                                            <p class="text-muted font-16">In order to create new announcement you have to fill up all these field.</p>
                                        </div>
                                        <form method="POST" action="createAnn" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <strong><small class="">Who (respondents)</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtWho"
                                                            placeholder="Who" value="" maxlength="60" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small>Where (place)</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtWhere"
                                                            placeholder="Where" value="" maxlength="60" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <!-- min and max date -->
                                                    <?php $timezone = "Asia/Manila";
                                                        date_default_timezone_set($timezone);
                                                        $date_min = date('Y-m-d\TH:i',strtotime("- 1 mins"));
                                                        $date_max = date('Y-m-d\TH:i',strtotime("+ 2 months"));
                                                        $date = new DateTime();
                                                        $date_now = $date->format('Y-m-d\TH:i'); 
                                                    ?>
                                                    <div class="mb-2">
                                                        <strong><small>When (date)</small></strong>
                                                        <input class="form-control mt-1" max="<?=$date_max?>" 
                                                            min="<?=$date_min?>" value="<?=$date_now?>" type="datetime-local" 
                                                            name="txtDate" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small>Division</small></strong>
                                                        <select class="form-select mt-1" id="txtDivision" name="txtDivision" required>
                                                            <option value="All Divisions">All Divisions</option>
                                                            <option value="APTM Oriental Mindoro">APTM Oriental Mindoro</option>
                                                            <option value="APTM Occidental Mindoro">APTM Occidental Mindoro</option>
                                                            <option value="APTM Calapan City">APTM Calapan City</option>
                                                            <option value="APTM Marinduque">APTM Marinduque</option>
                                                            <option value="APTM Romblon">APTM Romblon</option>
                                                            <option value="APTM Palawan">APTM Palawan</option>
                                                            <option value="APTM Puerto Princesa">APTM Puerto Princesa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-2">
                                                        <strong><small>Include Image</small></strong>
                                                        <input class="form-control mt-1" 
                                                        type="file" name="txtImage" accept=".png, .jpg, .jpeg" required>
                                                    </div>
                                                    <div class="mt-2">
                                                        <strong><small>What (announcement)</small></strong>
                                                        <p class="mb-1"></p>
                                                        <textarea class="form-control p-2" id="txtWhatEditor" 
                                                        rows="11" placeholder="Write something here ..." name="txtWhat"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="btn_publish">Publish</button>
                                    </div>
                                </form>
                             </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- XXX -->


                        <!-- UNPUBLISH ANNOUNCEMENT MODAL -->

                        <?php function unpublish_modal($ann_data, $division){?>

                        <?php foreach($ann_data as $ann_datum):?>
                        <div id="unpublishAnn<?=$ann_datum['ann_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-primary">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Unpublish this Announcement?</h4>
                                        <p>If there's an unessecarry contents on the post you can unplish it.</p>
                                        <form action="unpublishAnn" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$ann_datum['ann_id']?>" name="txt_ann_id">
                                            <input type="hidden" value="<?=$division?>" name="txt_m_division">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-outline-light my-2">Unpublish</button>
                                            <button type="button" class="btn btn-light my-2 ms-1" data-bs-dismiss="modal">Cancel</button>
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
                            unpublish_modal($ann_all_data, 'All Divisions');
                            unpublish_modal($ann_ori_data, 'APTM Oriental Mindoro Division');
                            unpublish_modal($ann_occ_data, 'APTM Occidental Mindoro Division');
                            unpublish_modal($ann_cal_data, 'APTM Calapan City Division');
                            unpublish_modal($ann_mar_data, 'APTM Marinduque Division');
                            unpublish_modal($ann_rom_data, 'APTM Romblon Division');
                            unpublish_modal($ann_pal_data, 'APTM Palawan Division');
                            unpublish_modal($ann_pue_data, 'APTM Puerto Princesa Division');
                        ?>

                            <!-- x -->

                        <!-- X -->


                        <!-- PUBLISH ANNOUNCEMENT MODAL -->

                        <?php function publish_modal($ann_data, $division){?>

                        <?php foreach($ann_data as $ann_datum):?>
                        <div id="publishAnn<?=$ann_datum['ann_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-success">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Publish this Announcement?</h4>
                                        <p>By clicking the publish button the announcement was reposted again.</p>
                                        <form action="publishAnn" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$ann_datum['ann_id']?>" name="txt_ann_id">
                                            <input type="hidden" value="<?=$division?>" name="txt_m_division">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-outline-light my-2">Publish</button>
                                            <button type="button" class="btn btn-light my-2 ms-1" data-bs-dismiss="modal">Cancel</button>
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
                            publish_modal($ann_all_data, 'All Divisions');
                            publish_modal($ann_ori_data, 'APTM Oriental Mindoro Division');
                            publish_modal($ann_occ_data, 'APTM Occidental Mindoro Division');
                            publish_modal($ann_cal_data, 'APTM Calapan City Division');
                            publish_modal($ann_mar_data, 'APTM Marinduque Division');
                            publish_modal($ann_rom_data, 'APTM Romblon Division');
                            publish_modal($ann_pal_data, 'APTM Palawan Division');
                            publish_modal($ann_pue_data, 'APTM Puerto Princesa Division');
                        ?>

                            <!-- x -->

                        <!-- X -->


                        <!-- EDIT ANNOUNCEMENT -->
                        <?php function edit_modal($ann_data){?>
                        <?php foreach($ann_data as $ann_info):?>
                        <div class="modal fade" id="editAnn<?=$ann_info['ann_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit Announcement</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <div>
                                            <p class="text-muted font-16">In order to edit this announcement you have to fill up all these field.</p>
                                        </div>
                                        <form method="POST" action="editAnn" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <input type="hidden" name="txt_ann_id_e" value="<?=$ann_info['ann_id']?>">
                                                        <strong><small class="">Who (respondents)</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtWho_e"
                                                            placeholder="Who" value="<?=$ann_info['ann_content_who']?>" maxlength="100" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small>Where (place)</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtWhere_e"
                                                            placeholder="Where" value="<?=$ann_info['ann_content_where']?>" maxlength="100" required>
                                                    </div>
                                                    <div class="">
                                                        <strong><small>Division</small></strong>
                                                        <select class="form-select mt-1" id="txtDivision" name="txtDivision_e" required>
                                                            <option value="<?=$ann_info['ann_division']?>"><?=$ann_info['ann_division']?></option>
                                                            <option value="APTM Oriental Mindoro">To All Divisions</option>
                                                            <option value="APTM Oriental Mindoro">APTM Oriental Mindoro</option>
                                                            <option value="APTM Occidental Mindoro">APTM Occidental Mindoro</option>
                                                            <option value="APTM Calapan City">APTM Calapan City</option>
                                                            <option value="APTM Marinduque">APTM Marinduque</option>
                                                            <option value="APTM Romblon">APTM Romblon</option>
                                                            <option value="APTM Palawan">APTM Palawan</option>
                                                            <option value="APTM Puerto Princesa">APTM Puerto Princesa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <strong><small>When (date)</small></strong>
                                                        <input class="form-control mt-1" value="<?=$ann_info['ann_content_when_date']?>" type="dateTime-local" 
                                                            name="txtDate_e" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small>Include Image</small></strong>
                                                        <input class="form-control mt-1" value="<?=$ann_info['ann_image']?>" type="file" 
                                                            name="txtImage_e" accept=".png, .jpg, .jpeg" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <strong><small>What (announcement)</small></strong>
                                                        <p class="mb-1"></p>
                                                        <textarea class="form-control p-2" id="txtWhatEditor_edit<?=$ann_info['ann_id']?>" rows="11" 
                                                            placeholder="Write something here ..." name="txtWhat_e"><?=$ann_info['ann_content_what']?></textarea>
                                                    </div>

                                                    <script>
                                                        // ckeditor 
                                                        ClassicEditor
                                                            .create(document.querySelector('#txtWhatEditor_edit<?=$ann_info['ann_id']?>'), {
                                                            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
                                                            })
                                                            .catch( error => {
                                                                console.error( error );
                                                            } );
                                                    </script>
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
                        <?php }?>
                        
                        <!-- use the delete modal function for every table-->
                        <?php 
                            edit_modal($ann_all_data);
                            edit_modal($ann_ori_data);
                            edit_modal($ann_occ_data);
                            edit_modal($ann_cal_data);
                            edit_modal($ann_mar_data);
                            edit_modal($ann_rom_data);
                            edit_modal($ann_pal_data);
                            edit_modal($ann_pue_data);
                        ?>
                        <!-- XXX -->

                        <!-- DELETE ANNOUNCEMENT MODAL -->
                        <?php function delete_modal($ann_data){?>
                        <?php foreach($ann_data as $ann_datum):?>
                        <div id="deleteAnn<?=$ann_datum['ann_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-danger">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Are you sure?</h4>
                                        <p class="mt-3">Once you delete this announcement, it can't be undone.</p>
                                        <form action="deleteAnn" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$ann_datum['ann_id']?>" name="txt_ann_id_d">
                                            <input type="hidden" value="<?=$ann_datum['ann_content_what']?>" name="txt_ann_what_d">
                                            <input type="hidden" value="<?=$ann_datum['ann_content_when_date']?>" name="txt_ann_when_d">
                                            <button type="sumbit" name="btn_del_ann" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
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
                            delete_modal($ann_all_data);
                            delete_modal($ann_ori_data);
                            delete_modal($ann_occ_data);
                            delete_modal($ann_cal_data);
                            delete_modal($ann_mar_data);
                            delete_modal($ann_rom_data);
                            delete_modal($ann_pal_data);
                            delete_modal($ann_pue_data);
                        ?>

                        <!-- x -->

                    </div> <!-- container -->

                </div> <!-- content -->


<?= $this->endSection()?>



