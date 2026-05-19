<div class="page-wrapper">
    <div class="page-content">
 <!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Gallery Modules</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit <?=$td_modules['module_name']?></li>
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
                            <h5 class="mb-0 text-primary"><?=$td_modules['module_name']?></h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Name</label>
                                <input type="text" class="form-control" value="<?=$td_development_environments[0]->name?>" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Image</label>
                                <div class="upload-btn-wrapper">
                                <img src="<?=base_url()?><?=$td_development_environments[0]->image;?>" alt="Avatar" style="width:136px;border-radius: 50%;height: 83px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="update" value="td_development_environments" class="btn btn-primary px-5">Submit</button>
                                <a  onclick="window.location='<?=base_url()?>auth/is_session/gallery/gallery_list/<?=$td_modules['module_id']?>/';" class="btn btn-danger px-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
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
        $(location).attr('href', '<?php echo base_url()?>auth/is_session/gallery/list_gallery/delete_gallery/' +
            id);
    });
}
</script>
