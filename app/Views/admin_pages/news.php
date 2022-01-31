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
                            <?php function news_tbl($news_data, $division, $tbl_id, $m_data, $tbl_color){?>
                            <div class="col-12">
                                <div class="card border-<?=$tbl_color?> border">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <h4 class="header-title mt-1 text-<?=$tbl_color?>">News for <?=$division?></h4>
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
                                                            <th>Headline</th>
                                                            <th>Body</th>
                                                            <th>Image Included</th>
                                                            <th>Category</th>
                                                            <th>Time Created</th>
                                                            <th>Time Updated</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if(count($news_data) > 0){
                                                                foreach($news_data as $news_info):?>
                                                        <tr>
                                                            <!-- action -->
                                                            <td class="table-action">
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#editNews<?=$news_info['news_id']?>" title="click to edit this news"> 
                                                                    <i class="uil uil-edit text-primary"></i>
                                                                </a>
                                                                <a href="#" class="action-icon" data-bs-toggle="modal" 
                                                                    data-bs-target="#deleteNews<?=$news_info['news_id']?>" title="click to delete this news"> 
                                                                    <i class="uil uil-trash-alt text-danger"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php foreach($m_data as $m_datum):
                                                                    if($news_info['news_creator_id'] == $m_datum['m_id']):?>
                                                                <img src="<?=$m_datum['m_profile_pic']?>" alt="table-user" class="me-2 rounded-circle" width="30" height="30">
                                                                <?=$m_datum['m_fname'].' '.$m_datum['m_lname'].' | '.$m_datum['m_type']?>
                                                                <?php endif;endforeach;?>
                                                            </td>
                                                            <td>
                                                                <h4>
                                                                    <?php if($news_info['news_status'] == 'published'):?>
                                                                        <a href="#" class="btn_pending badge bg-success rounded-pill" 
                                                                            data-bs-toggle="modal" data-bs-target="#unpublishNews<?=$news_info['news_id']?>" 
                                                                            title="click to unpublish the news">Published
                                                                        </a>
                                                                    <?php else:?>
                                                                        <a href="#" class="btn_pending badge bg-primary rounded-pill" 
                                                                            data-bs-toggle="modal" data-bs-target="#publishNews<?=$news_info['news_id']?>" 
                                                                            title="click to publish the news">Unpublished
                                                                        </a>
                                                                    <?php endif;?>
                                                                </h4>
                                                            </td>
                                                            <td><?=$news_info['news_title']?></td>
                                                            <td><?=htmlspecialchars_decode($news_info['news_content'])?></td>
                                                            <td>
                                                                <img src="<?=$news_info['news_image']?>" alt="image" class="me-3" height="50">
                                                            </td>
                                                            <td><?=$news_info['news_category']?></td>
                                                            <td><?=$news_info['news_time_created']?></td>
                                                            <td>
                                                                <?php if($news_info['news_time_updated'] == null){
                                                                    echo 'not yet edited';
                                                                }else{
                                                                    echo $news_info['news_time_updated'];
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
                                news_tbl($news_all_data, 'All Divisions', 'tbl_news_all', $m_data, 'info');
                                news_tbl($news_ori_data, 'Oriental Mindoro', 'tbl_member_ori', $m_data, 'primary');
                                news_tbl($news_occ_data, 'Occidental Mindoro', 'tbl_member_occ', $m_data, 'warning');
                                news_tbl($news_cal_data, 'Calapan City', 'tbl_member_cal', $m_data, 'danger');
                                news_tbl($news_mar_data, 'Marinduque', 'tbl_member_mar', $m_data, 'success');
                                news_tbl($news_rom_data, 'Romblon', 'tbl_member_rom', $m_data, 'secondary');
                                news_tbl($news_pal_data, 'Palawan', 'tbl_member_pal', $m_data, 'info');
                                news_tbl($news_pue_data, 'Puerto Princesa', 'tbl_member_pue', $m_data, 'dark');
                            ?>

                            <!-- x -->

                        </div>
                        <!-- end row -->


                        <!-- MODAL START -->

                        <!-- CREATE NEWS -->
                        <div class="modal fade" id="createNews" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Create News</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <div>
                                            <p class="text-muted font-16">In order to create news you have to fill up all these field.</p>
                                        </div>
                                        <form method="POST" action="createNews" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <strong><small class="">Headline *</small></strong>
                                                        <input type="text" class="form-control mt-1" name="txtHeadline"
                                                            placeholder="Headline" value="" maxlength="250" required>
                                                    </div>
                                                    <div class="">
                                                        <strong><small>Category *</small></strong>
                                                        <select class="form-select mt-1" name="txtCategory" required>
                                                            <option value="Category 1">Category 1</option>
                                                            <option value="Category 2">Category 2</option>
                                                            <option value="Category 3">Category 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="mb-2">
                                                    <strong><small>Division *</small></strong>
                                                        <select class="form-select mt-1" id="txtDivision" name="txtDivision" required>
                                                            <option value="All Division">All Division</option>
                                                            <option value="APTM Oriental Mindoro">APTM Oriental Mindoro</option>
                                                            <option value="APTM Occidental Mindoro">APTM Occidental Mindoro</option>
                                                            <option value="APTM Calapan City">APTM Calapan City</option>
                                                            <option value="APTM Marinduque">APTM Marinduque</option>
                                                            <option value="APTM Romblon">APTM Romblon</option>
                                                            <option value="APTM Palawan">APTM Palawan</option>
                                                            <option value="APTM Puerto Princesa">APTM Puerto Princesa</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small>Include Image *</small></strong>
                                                        <input class="form-control mt-1" 
                                                        type="file" name="txtImage" accept=".png, .jpg, .jpeg" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <strong><small>Body *</small></strong>
                                                        <p class="mb-1"></p>
                                                        <textarea class="form-control p-2" id="txtWhatEditor" 
                                                        rows="11" placeholder="Write news body here ..." name="txtContent"></textarea>
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


                        <!-- UNPUBLISH NEWS MODAL -->

                        <?php function unpublish_modal($news_data, $division){?>

                        <?php foreach($news_data as $news_datum):?>
                        <div id="unpublishNews<?=$news_datum['news_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-primary">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Unpublish this News?</h4>
                                        <p>If there's an unessecarry contents on the news you can unpublish it.</p>
                                        <form action="unpublishNews" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$news_datum['news_id']?>" name="txt_news_id">
                                            <input type="hidden" value="<?=$division?>" name="txt_m_division">
                                            <input type="hidden" value="<?=$news_datum['news_title']?>" name="txt_news_head">
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
                            unpublish_modal($news_all_data, 'All Division');
                            unpublish_modal($news_ori_data, 'APTM Oriental Mindoro Division');
                            unpublish_modal($news_occ_data, 'APTM Occidental Mindoro Division');
                            unpublish_modal($news_cal_data, 'APTM Calapan City Division');
                            unpublish_modal($news_mar_data, 'APTM Marinduque Division');
                            unpublish_modal($news_rom_data, 'APTM Romblon Division');
                            unpublish_modal($news_pal_data, 'APTM Palawan Division');
                            unpublish_modal($news_pue_data, 'APTM Puerto Princesa Division');
                        ?>

                            <!-- x -->

                        <!-- X -->


                        <!-- PUBLISH NEWS MODAL -->

                        <?php function publish_modal($news_data, $division){?>

                        <?php foreach($news_data as $news_datum):?>
                        <div id="publishNews<?=$news_datum['news_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-success">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Re-Publish this News?</h4>
                                        <p>By clicking the publish button the news was reposted again.</p>
                                        <form action="publishNews" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$news_datum['news_id']?>" name="txt_news_id">
                                            <input type="hidden" value="<?=$division?>" name="txt_m_division">
                                            <input type="hidden" value="<?=$news_datum['news_title']?>" name="txt_news_head">
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
                            publish_modal($news_all_data, 'All Division');
                            publish_modal($news_ori_data, 'APTM Oriental Mindoro Division');
                            publish_modal($news_occ_data, 'APTM Occidental Mindoro Division');
                            publish_modal($news_cal_data, 'APTM Calapan City Division');
                            publish_modal($news_mar_data, 'APTM Marinduque Division');
                            publish_modal($news_rom_data, 'APTM Romblon Division');
                            publish_modal($news_pal_data, 'APTM Palawan Division');
                            publish_modal($news_pue_data, 'APTM Puerto Princesa Division');
                        ?>

                            <!-- x -->

                        <!-- X -->


                        <!-- EDIT NEWS -->
                        <?php function edit_modal($news_data){?>
                        <?php foreach($news_data as $news_info):?>
                        <div class="modal fade" id="editNews<?=$news_info['news_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-primary">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit News Content</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body m-2">
                                        <div>
                                            <p class="text-muted font-16">In order to edit news you have to fill up all these field.</p>
                                        </div>
                                        <form method="POST" action="editNews" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <strong><small class="">Headline *</small></strong>
                                                        <input type="hidden" name="txt_news_id_e" value="<?=$news_info['news_id']?>">
                                                        <input type="text" class="form-control mt-1" name="txtHeadline_e"
                                                            placeholder="Who" maxlength="60" value="<?=$news_info['news_title']?>" required>
                                                    </div>
                                                    <div class="">
                                                        <strong><small>Category *</small></strong>
                                                        <select class="form-select mt-1" name="txtCategory_e" value="<?=$news_info['news_category']?>" required>
                                                            <option value="Category 1">Category 1</option>
                                                            <option value="Category 2">Category 2</option>
                                                            <option value="Category 3">Category 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="mb-2">
                                                    <strong><small>Division *</small></strong>
                                                        <select class="form-select mt-1" id="txtDivision" name="txtDivision_e" value="<?=$news_info['news_division']?>" required>
                                                            <option value="All Division">All Division</option>
                                                            <option value="APTM Oriental Mindoro">APTM Oriental Mindoro</option>
                                                            <option value="APTM Occidental Mindoro">APTM Occidental Mindoro</option>
                                                            <option value="APTM Calapan City">APTM Calapan City</option>
                                                            <option value="APTM Marinduque">APTM Marinduque</option>
                                                            <option value="APTM Romblon">APTM Romblon</option>
                                                            <option value="APTM Palawan">APTM Palawan</option>
                                                            <option value="APTM Puerto Princesa">APTM Puerto Princesa</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong><small>Include Image *</small></strong>
                                                        <input class="form-control mt-1" 
                                                        type="file" name="txtImage_e" accept=".png, .jpg, .jpeg" value="<?=$news_info['news_image']?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <strong><small>Body *</small></strong>
                                                        <p class="mb-1"></p>
                                                        <textarea class="form-control p-2" id="txtNews_e<?=$news_info['news_id']?>" 
                                                        rows="11" placeholder="Write news body here ..." name="txtContent_e"><?=$news_info['news_content']?></textarea>
                                                    </div>

                                                    <script>
                                                        // ckeditor 
                                                        ClassicEditor
                                                            .create(document.querySelector('#txtNews_e<?=$news_info['news_id']?>'), {
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
                            edit_modal($news_all_data);
                            edit_modal($news_ori_data);
                            edit_modal($news_occ_data);
                            edit_modal($news_cal_data);
                            edit_modal($news_mar_data);
                            edit_modal($news_rom_data);
                            edit_modal($news_pal_data);
                            edit_modal($news_pue_data);
                        ?>
                        <!-- XXX -->

                        <!-- DELETE NEWS MODAL -->
                        <?php function delete_modal($news_data, $division){?>
                        <?php foreach($news_data as $news_datum):?>
                        <div id="deleteNews<?=$news_datum['news_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content modal-filled bg-danger">
                                    <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1"></i>
                                        <h4 class="mt-2">Are you sure?</h4>
                                        <p class="mt-3">Once you delete this news, it can't be undone.</p>
                                        <form action="deleteNews" method="post">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input type="hidden" value="<?=$news_datum['news_id']?>" name="txt_news_id_d">
                                            <input type="hidden" value="<?=$division?>" name="txt_m_division">
                                            <input type="hidden" value="<?=$news_datum['news_title']?>" name="txt_news_head">
                                            <button type="sumbit" name="btn_del_news" class="btn btn-warning my-2">Yes</button><span class="p-1">or</span>
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
                            delete_modal($news_all_data, 'All Division');
                            delete_modal($news_ori_data, 'APTM Oriental Mindoro Division');
                            delete_modal($news_occ_data, 'APTM Occidental Mindoro Division');
                            delete_modal($news_cal_data, 'APTM Calapan City Division');
                            delete_modal($news_mar_data, 'APTM Marinduque Division');
                            delete_modal($news_rom_data, 'APTM Romblon Division');
                            delete_modal($news_pal_data, 'APTM Palawan Division');
                            delete_modal($news_pue_data, 'APTM Puerto Princesa Division');
                        ?>

                        <!-- x -->

                    </div> <!-- container -->

                </div> <!-- content -->


<?= $this->endSection()?>



