<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Settings</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Seo Tools Settings</li>
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
                            <h5 class="mb-0 text-primary">Seo Tools Settings</h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bxl-google-circle font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Google Analytics</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bxl-facebook-plus-circle font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Website Meta Keywords</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bxl-facebook-plus-circle font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Website Contact Meta Keywords</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Analytics</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea class="form-control" name="analytics"
                                                        required><?=$td_seo_analytics[0]->analytics?></textarea>
                                                </div>
                                            </div>
                                            
                                    

        

                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <button type="submit" name="submit" value="analytics"
                                                        class="btn btn-primary px-4" />Update Analytics</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Website Meta Title</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea type="text" class="form-control" name="meta_title" required><?= $td_seo_analytics[0]->meta_title ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Website Meta Keywords</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea type="text" class="form-control" name="metakeyword" required><?= $td_seo_analytics[0]->metakeyword ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Website Meta Description</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea type="text" class="form-control" name="meta_description" required><?= $td_seo_analytics[0]->meta_description ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <button type="submit" name="submit" value="metakeyword"
                                                        class="btn btn-primary px-4" value="Save Changes" />Update Meta Keywords</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Website contact Meta Title</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea type="text" class="form-control" name="contact_meta_title" required><?= $td_seo_analytics[0]->contact_meta_title ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Website contact Meta Keywords</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea type="text" class="form-control" name="contact_metakeyword" required><?= $td_seo_analytics[0]->contact_metakeyword ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Website contact Meta Description</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <textarea type="text" class="form-control" name="contact_meta_description" required><?= $td_seo_analytics[0]->contact_meta_description ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <button type="submit" name="submit" value="contact_metakeyword"
                                                        class="btn btn-primary px-4" value="Save Changes" />Update Meta Keywords</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!--end row-->

        <!--end row-->
    </div>
</div>