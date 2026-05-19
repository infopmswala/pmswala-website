<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Faq</div>
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
                            <h5 class="mb-0 text-primary">Edit <?=$td_modules['module_name']?></h5>
                        </div>
                        <hr>
                         <form class="row g-3" action="<?=base_url()?>auth/is_session/faqs/edit_faq/<?=$this->uri->segment(5);?>/?jwt_token=<?php echo encrypt_decrypt($td_modules['id'], 'encrypt')?>/" method="post" enctype="multipart/form-data">
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Faq Question</label>
                                <input type="text" class="form-control" name="question" value="<?=$td_faqs[0]->question?>" required>
                            </div>
                           <input type="hidden" class="form-control" name="update_id" value="<?=$td_faqs[0]->id?>" required>
                            <div class="col-md-12">
                                <label class="form-label">Faq Answer</label>
                                <textarea class="form-control" rows="10" id="editor" cols="80" name="answer"><?=$td_faqs[0]->answer?></textarea>
                            </div>
                            <?php 
                            $modules_id = array(6714,2232,5136,8540,7770,9484,3446);
                            if(!in_array($this->uri->segment(5),$modules_id)){ ?>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Featured Image</label>
                                <input type="file" class="form-control" name="faq_image">
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Video Image</label>
                                <div class="upload-btn-wrapper">
                                <img src="<?=base_url()?><?=$td_faqs[0]->faq_image;?>" alt="Avatar" style="width:136px;border-radius: 50%;height: 83px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Meta Title </label>
                                <input type="text" class="form-control" name="meta_title" value="<?=$td_faqs[0]->meta_title?>"  required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Meta Keywords </label>
                                <input type="text" class="form-control" name="meta_keywords" value="<?=$td_faqs[0]->meta_keywords?>"  required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label"> Meta Description</label>
                                <textarea class="form-control" rows="10"  cols="80" name="meta_description"><?=$td_faqs[0]->meta_description?></textarea>
                            </div><?php } ?>
                            <div class="col-12">
                                <button type="submit" name="update" value="td_faqs" class="btn btn-primary px-5">Update</button>
                                <a  onclick="window.location='<?=base_url()?>auth/is_session/faqs/faqs_list/<?=$this->uri->segment(5)?>/';" class="btn btn-danger px-5">Cancel</a>
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
<script>
	CKEDITOR.replace('editor');
</script>