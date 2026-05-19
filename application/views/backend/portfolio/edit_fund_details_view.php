<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?=$td_modules['module_name']?></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Fund Details</li>
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
                            <h5 class="mb-0 text-primary">Edit Fund Details</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="<?=base_url()?>auth/is_session/portfolio/edit_fund_details/<?=$this->uri->segment(5)?>/?jwt_fund_details=<?php echo $_GET['jwt_fund_details'];?>';" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Fund Details Title</label>
                                <input type="text" class="form-control" name="fund_details_title" value="<?=$td_fund_details['fund_details_title'];?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Fund Details Percentage</label>
                                <input type="text" class="form-control" name="fund_details_percentage" value="<?=$td_fund_details['fund_details_percentage'];?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" rows="3" cols="80" name="short_description"><?=$td_fund_details['short_description'];?></textarea>
                            </div>
                             <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="editor" rows="10" cols="80" name="description"><?=$td_fund_details['description'];?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="update" value="add_fund_details"
                                    class="btn btn-primary px-5">Submit</button>
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


<style>
input[type=file]::-webkit-file-upload-button {
    border: 2px solid #6c5ce7;
    padding: .2em .4em;
    border-radius: .2em;
    background-color: #a29bfe;
    transition: 1s;
}

input[type=file]::file-selector-button {
    border: 2px solid #6c5ce7;
    padding: .2em .4em;
    border-radius: .2em;
    background-color: #a29bfe;
    transition: 1s;
}

input[type=file]::-webkit-file-upload-button:hover {
    background-color: #81ecec;
    border: 2px solid #00cec9;
}

input[type=file]::file-selector-button:hover {
    background-color: #81ecec;
    border: 2px solid #00cec9;
}
</style>
