<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">SEO Pages</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add SEO Page</li>
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
                            <h5 class="mb-0 text-primary">Add SEO Page</h5>
                        </div>
                        <hr>
                        <form id="myform" method="post" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Page Name</label>
                                    <input type="text" name="page_name" value="" id="page_name" class="form-control"
                                        placeholder="Enter Page Name" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Page Url</label>
                                    <input type="text" name="url" value="" id="url" class="form-control"
                                        placeholder="Enter Page url" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Meta Title</label>
                                    <input type="text" name="meta_tag_title" value="" id="meta_tag_title"
                                        class="form-control" placeholder="Enter Meta Title" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Meta Keyword</label>
                                    <textarea type="text" name="meta_tag_description" id="meta_tag_description"
                                        class="form-control" placeholder="Enter Meta Keyword" required /></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Meta Description</label>
                                    <textarea type="text" name="meta_tag_keywords" id="meta_tag_keywords"
                                        class="form-control" placeholder="Enter Meta Description" required /></textarea>
                                </div></div></br>
                                <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" name="submit" value="add_seo" class="btn btn-primary px-5">
                                        Submit
                                    </button>
                                    <a onclick="window.location='<?=base_url()?>auth/is_session/seo/list_seo/';"
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