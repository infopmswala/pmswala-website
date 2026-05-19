<?php $id_array = array('6','7','8');?>

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <?php if(in_array($td_information[0]->id, $id_array)){?>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Information</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User <?=$td_information[0]->information_title?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php }else{ ?>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Information</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Information</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php } ?>
        <!--end breadcrumb-->
        <div class="row">


            <div class="col">


                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div>
                            </div>
                        </div>
                        <hr>
                        <form id="myform" method="post" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">

                                    <label for="inputFirstName" class="form-label"> Title</label>
                                    <input type="text" value="<?=$td_information[0]->information_title?>"
                                        name="information_title" id="information_title" class="form-control" required />

                                </div>

                                <div class="col-md-12">

                                    <label for="inputFirstName" class="form-label"> Description</label>
                                    <textarea type="text" name="description" id="editor" class="form-control summernote"
                                        required /><?=$td_information[0]->description?></textarea>

                                </div>
                                <div class="col-md-6">

                                    <label for="inputFirstName" class="form-label">Meta Title</label>
                                    <input type="text" name="meta_tag_title"
                                        value="<?=$td_information[0]->meta_tag_title?>" id="meta_tag_title"
                                        class="form-control" placeholder="Enter Meta Title" required />

                                </div>
                                <div class="col-md-6">

                                    <label for="inputFirstName" class="form-label">Meta Keyword</label>
                                    <textarea type="text" name="meta_tag_description" id="meta_tag_description"
                                        class="form-control" placeholder="Enter Meta Keyword"
                                        required /><?=$td_information[0]->meta_tag_description?></textarea>

                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Meta Description</label>
                                    <textarea type="text" name="meta_tag_keywords" id="meta_tag_keywords"
                                        class="form-control" placeholder="Enter Meta Description"
                                        required /><?=$td_information[0]->meta_tag_keywords?></textarea>
                                </div>
                                <div class="form-group">
                                <br>
                                    <button type="submit" name="update" value="add_information"
                                        class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <!-- <a onclick="window.location='<?=base_url()?>auth/is_session/information/list_information/';"
                                        class="btn btn-danger px-5">Cancel</a> -->
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