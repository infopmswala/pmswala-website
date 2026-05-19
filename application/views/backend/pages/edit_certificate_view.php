<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Certificate</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Certificate</li>
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
                            <h5 class="mb-0 text-primary">Edit Certificate</h5>
                        </div>
                        <hr>
                        <form id="myform" method="post" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label"> Title</label>
                                    <input type="text" value="<?=$tbl_why_pmswala[0]->title?>"
                                        name="title" id="title" class="form-control" required />
                                </div>
                              
                                  <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Image</label>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="image" id="fileUpload">
                                </div>
                            </div>
                                
                              <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Image</label>
                                    <img src="<?=base_url()?><?=$tbl_why_pmswala[0]->image;?>" alt="Avatar" style="width:136px;border-radius: 50%;height: 83px;">
                                </div>
                                
                       
                                <div class="form-group mt-5">
                                    <button type="submit" name="update" value="add_information"
                                        class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <a onclick="window.location='<?=base_url()?>auth/is_session/pages/journey';"
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