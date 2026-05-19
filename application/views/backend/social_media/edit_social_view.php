<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Social</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update social</li>
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
                            <h5 class="mb-0 text-primary">Update social</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">social Name</label>
                                <input type="text" class="form-control" name="name" id="inputFirstName" value="<?=$td_social[0]->name?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Social Code</label>
                                <input type="text" class="form-control" name="code" id="inputFirstName" value="<?=$td_social[0]->code?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Social Link</label>
                                <input type="text" class="form-control" name="link" id="inputFirstName" value="<?=$td_social[0]->link?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Status</label>
                                <select class="form-control" name="social_status" required>
                                    <option value="">Select Status</option>
                                    <option value="Active"
                                    <?php

                 if($td_social[0]->social_status == 'Active')

                 {

                  echo "selected";

                 }

                ?>>Active</option>
                                    <option value="Deactive"
                                    <?php

if($td_social[0]->social_status == 'Deactive')

{

 echo "selected";

}

?>
>Deactive</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="update" value="social"
                                    class="btn btn-primary px-5">update</button>
                                    <a  onclick="window.location='<?=base_url()?>auth/is_session/social_settings/list_social/';" class="btn btn-danger px-5">Cancel</a>
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
<script>
const actualBtn = document.getElementById('actual-btn');
const fileChosen = document.getElementById('file-chosen');
actualBtn.addEventListener('change', function() {
    fileChosen.textContent = this.files[0].name
})
</script>
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