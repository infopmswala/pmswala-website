<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Withdrawal Request Text</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Withdrawal Request Text</li>
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
                            <h5 class="mb-0 text-primary">Edit Withdrawal Request Text</h5>
                        </div>
                        <hr>
                        <form id="myform" method="post" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label"> Description</label>
                                    <textarea type="text" value="" name="description" id="description" class="form-control" required /><?=$td_update_content[0]->description?></textarea>
                                </div>
                                <div class="form-group">
                                    <br>
                                    <button type="submit" name="update" value="update_content"
                                        class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <a onclick="window.location='<?=base_url()?>auth/is_session/var_section/update_content/';"
                                        class="btn btn-danger px-5">Cancel</a>
                                </div>
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
