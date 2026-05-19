<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Service Module</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
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
                        <hr>
                        <form class="row g-3" action="<?=base_url()?>auth/is_session/service/service_add/<?=$this->uri->segment(5)?>/" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"><?=$td_modules['module_name']?> Title</label>
                                <input type="text" class="form-control" name="service_title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Slug</label>
                                <input type="text" class="form-control" name="service_slug" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" rows="3" cols="80"
                                    name="service_short_description"></textarea>
                                   
                            </div>
                            <?php $module_id = array('5002');
                            if(in_array($this->uri->segment(5),$module_id)){ ?>
                             <div class="col-md-6">
                                <label class="form-label">Short Icon</label>
                                <input type="file" class="form-control"  name="service_icon" value="" required>
                            </div>
                            <!--<div class="col-md-12">-->
                            <!--    <label class="form-label">Description</label>-->
                            <!--    <textarea class="form-control" id="editor" rows="10" cols="80"-->
                            <!--        name="service_description"></textarea>-->
                                   
                            <!--</div>-->
                            <?php }else{ ?>
                             <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="editor" rows="10" cols="80"
                                    name="service_description"></textarea>
                                   
                            </div>
                            <?php } ?>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Service Image:</label>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="service_image" id="fileUpload" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"><?=$td_modules['module_name']?> Banner Image:</label>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="service_banner_image" id="fileUpload" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Meta Title </label>
                                <input type="text" class="form-control" name="meta_title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Meta Keyword</label>
                                <textarea type="text" name="meta_tag_keywords" id="meta_tag_keywords"
                                    class="form-control" placeholder="Enter Meta Keyword" required /></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Meta Description</label>
                                <textarea type="text" name="meta_tag_description" id="meta_tag_description"
                                    class="form-control" placeholder="Enter Meta Description" required /></textarea>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" name="submit" value="service_add"
                                    class="btn btn-primary px-5">Submit</button>
                                    <a  onclick="window.location='<?=base_url()?>auth/is_session/service/service_list/<?=$this->uri->segment(5)?>/';" class="btn btn-danger px-5">Cancel</a>
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
