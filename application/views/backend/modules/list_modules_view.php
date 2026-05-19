<div class="page-wrapper">
    <div class="page-content">
 <!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Modules</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Modules</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div>
                            </div>
                            <h5 class="mb-0 text-primary">Modules</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Modules Name</label>
                                <input type="text" class="form-control" name="module_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Select Modules</label>
                                <select class="form-control" name="module_type" id="module_type" required>
                                    <option value="">Select Modules</option>
                                    <option value="silder_image">Silder Banner</option>
                                    <option value="gallery">Gallery</option>
                                    <option value="blog">Blog</option>
                                    <option value="faqs">FAQS</option>
                                    <option value="portfolio">Portfolios</option>
                                    <option value="testimonial">Testimonials</option>
                                    <option value="contact_us">Contact Enquiries</option>
                                    <option value="service">Service</option>
                                    <option value="count_statistics">Count Statistics</option>
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" name="submit" value="td_modules" class="btn btn-primary px-5">Submit</button>
                                <a  onclick="window.location='<?=base_url()?>auth/is_session/modules/modules_list/';" class="btn btn-danger px-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Modules</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Modules</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <form class="row g-3" action="<?=base_url();?>auth/is_session/modules/modules_list/" method="GET"
                        enctype="multipart/form-data">
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">Show</label>
                            <select name="show" class="form-control">
                                <!-- <option value="5"
                                    <?php echo ($this->input->get('show', true) == '5') ? 'selected' : ''; ?>>5
                                </option> -->
                                <option value="10"
                                    <?php echo ($this->input->get('show', true) == '10') ? 'selected' : ''; ?>>
                                    10
                                </option>
                                <option value="30"
                                    <?php echo ($this->input->get('show', true) == '30') ? 'selected' : ''; ?>>30
                                </option>
                                <option value="60"
                                    <?php echo ($this->input->get('show', true) == '60') ? 'selected' : ''; ?>>60
                                </option>
                                <option value="100"
                                    <?php echo ($this->input->get('show', true) == '100') ? 'selected' : ''; ?>>100
                                </option>
                                <option value="200"
                                    <?php echo ($this->input->get('show', true) == '200') ? 'selected' : ''; ?>>200
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="q"
                                value="<?php echo html_escape($this->input->get('q', true)); ?>"
                                placeholder="Search Modules Name" id="inputFirstName">
                        </div>
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <button type="submit" name="submit" class="btn btn-primary px-5">Filter</button>
                        </div>
                        
                        <?php echo form_close(); ?>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>S No</th>
                                <th>Module Name</th>
                                <th>Module Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="row_position">
                            <?php 
                            if(!empty($td_modules)){
                            foreach($td_modules as $key =>$row){ ?>
                            <tr id="<?=$row->id?>">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14"><?= $start; ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $row->module_name?> </td>
                                <td><?= $row->module_type?> </td>
                                <td>
                                    <form method="post"
                                        action="<?=site_url('/auth/is_session/modules/showpay');?>">
                                        <input type="hidden" name="idname" value="<?=$row->id;?>">
                                        <input onChange="this.form.submit()" type="checkbox" name="feature"
                                            id="status_a<?=$row->id;?>" class="check"
                                            value="<?php if($row->status==0){echo '1';}else{echo '0';}?>"
                                            <?php if($row->status==1)echo 'checked';?>>
                                        <label for="status_a<?=$row->id;?>" class="checktoggle">checkbox</label>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?=base_url()?>auth/is_session/modules/edit?jwt_token=<?php echo encrypt_decrypt($row->id, 'encrypt')?>"
                                            class=""><i class='bx bxs-edit'
                                                style="font-size: 25px;color: #008000;"></i></a>
                                        <a href="#"
                                            onclick="validate('<?php echo $row->id;?>','<?php echo $row->module_name;?>')"
                                            class="ms-3"><i class='bx bxs-trash'
                                                style="font-size: 25px;color: #ef0716;"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $start++;
                }
              ?>  <?php }else{ ?>
                <td colspan="7" style="text-align: center;color: red;font-size: 19px;">No Record Found</td>
                <?php } ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function validate(id, title) {
    swal({
        title: "Are you sure?",
        text: "Are you sure you want to delete this record" + " " + title,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete it!",
        closeOnConfirm: false
    }, function() {
        //swal("Deleted!", "Your record has been deleted successfully.", "success");
        $(location).attr('href', '<?php echo base_url()?>auth/is_session/modules/delete_modules/' +
            id);
    });
}
</script>
