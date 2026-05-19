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
                        <li class="breadcrumb-item active" aria-current="page">Edit Modules</li>
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
                                <label for="inputFirstName" class="form-label"> Name</label>
                                <input type="text" class="form-control" value="<?=$td_modules[0]->module_name?>" name="module_name" required>
                            </div>
                            <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">Select Modules</label>
                                <select class="form-control" name="module_type" id="module_type" required>
                                    <option value="">Select Modules</option>
                                    <option value="silder_image"<?php if($td_modules[0]->module_type == 'silder_image'){ echo "selected"; } ?>>Silder Banner</option>
                                    <option value="service" <?php if($td_modules[0]->module_type == 'service'){ echo "selected"; } ?>>Service</option>
                                    <option value="page" <?php if($td_modules[0]->module_type == 'page'){ echo "selected"; } ?>>Pages</option>
                                    <option value="faqs" <?php if($td_modules[0]->module_type == 'faqs'){ echo "selected"; } ?>>FAQS</option>
                                    <option value="faqs" <?php if($td_modules[0]->module_type == 'testimonial'){ echo "selected"; } ?>>Testimonials</option>
                                    <option value="contact_us" <?php if($td_modules[0]->module_type == 'contact_us'){ echo "selected"; } ?>>Contact Enquiries</option>
                                    <option value="gallery" <?php if($td_modules[0]->module_type == 'gallery'){ echo "selected"; } ?>>Gallery</option>
                                    <option value="blog" <?php if($td_modules[0]->module_type == 'blog'){ echo "selected"; } ?>>Blog</option>
                                    <option value="portfolio" <?php if($td_modules[0]->module_type == 'portfolio'){ echo "selected"; } ?>>Portfolios</option>
                                    <option value="count_statistics" <?php if($td_modules[0]->module_type == 'count_statistics'){ echo "selected"; } ?>>Count Statistics</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="update" value="td_modules" class="btn btn-primary px-5">Submit</button>
                                <a  onclick="window.location='<?=base_url()?>auth/is_session/modules/modules_list/';" class="btn btn-danger px-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>

