<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Testimonials</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add <?=$td_modules['module_name']?></li>
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
                            <h5 class="mb-0 text-primary">Add <?=$td_modules['module_name']?></h5>
                        </div>
                          <form class="row g-3" action="<?=base_url()?>auth/is_session/testimonial/add_testimonial/<?=$td_modules['module_id'];?>/" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputFirstName" class="form-label">Testimonial Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Testimonials" required/>
                                    </div>
                                </div>
                                <?php 
                                $module_id = array('3539');
                                if(!in_array($td_modules['module_id'], $module_id)){
                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputFirstName" class="form-label">Testimonial Image</label>
                                        <input type="file" name="image" id="image" class="form-control" placeholder="Enter Testimonials" required/>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputFirstName" class="form-label">Testimonial Role</label>
                                        <input type="text" name="role" id="role" class="form-control" placeholder="Enter Testimonial Role" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputFirstName" class="form-label">Testimonial Message</label>
                                        <textarea type="text" name="message" id="message" value="" class="form-control" placeholder="Enter Testimonial Message" required/></textarea>
                                    </div>
                                </div>
                             
           

                            <div class="col-12">
                                    <button type="submit" name="submit" value="testimonial" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
        <!--end row-->

        <!--end row-->
    </div>
</div>






