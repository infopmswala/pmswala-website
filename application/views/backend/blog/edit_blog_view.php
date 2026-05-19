<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog</div>
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
                         <form class="row g-3" action="<?=base_url()?>auth/is_session/blog/edit_blog/<?=$td_modules['module_id']?>/?jwt_token=<?php echo encrypt_decrypt($td_blog['id'], 'encrypt')?>/" method="post" enctype="multipart/form-data">
                        <!--<div class="col-md-6">-->
                        <!--        <label for="inputFirstName" class="form-label">category Name</label>-->
                        <!--        <select class="form-control" name="category" id="category" required>-->
                        <!--            <option value="">Select Category</option>-->
                        <!--            <?php foreach($td_category as $key =>$row) { ?>-->
                        <!--            <option value="<?=$row->category_id;?>" <?php if($row->category_id==$td_blog[0]->category_id){echo 'Selected';}?>><?=$row->category;?></option>-->
                        <!--            <?php } ?>-->
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-6">-->
                        <!--        <label for="inputFirstName" class="form-label">Sub Category Name</label>-->
                        <!--        <select class="form-control" name="sub_category" id="sub_category">-->
                        <!--            <option value="-">Select Sub Category</option>-->
                        <!--           <?php foreach($td_sub_category as $key =>$row) { ?>-->
                        <!--            <option value="<?=$row->sub_category_id;?>" <?php if($row->sub_category_id==$td_blog[0]->sub_category_id){echo 'Selected';}?>><?=$row->sub_category;?></option>-->
                        <!--            <?php } ?>-->
                        <!--        </select>-->
                        <!--    </div>-->
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Blog Title</label>
                                <input type="text" class="form-control" name="title" value="<?=$td_blog['title']?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Title Slug </label>
                                <input type="text" class="form-control" name="slug" value="<?=$td_blog['slug']?>" required>                            </div>
                                  <div class="col-md-12">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" rows="3" cols="80"
                                    name="short_description"><?=$td_blog['short_description']?></textarea>
                                   
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Blog Content</label>
                                <textarea class="form-control summernote" id="editor" rows="10" cols="80" name="description"><?=$td_blog['description']?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Image</label>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="image" id="fileUpload">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Image</label>
                                <div class="upload-btn-wrapper">
                                <img src="<?=base_url()?><?=$td_blog['image'];?>" alt="Avatar" style="width:136px;border-radius: 50%;height: 83px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Meta Title </label>
                                <input type="text" class="form-control" name="meta_title" value="<?=$td_blog['meta_title']?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Meta Keyword</label>
                                <textarea name="meta_tag_keywords" id="meta_tag_keywords"
                                    class="form-control" placeholder="Enter Meta Keyword" required /><?=$td_blog['meta_tag_keywords']?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Meta Description</label>
                                <textarea type="text" name="meta_tag_description" id="meta_tag_description"
                                    class="form-control" placeholder="Enter Meta Description" required /><?=$td_blog['meta_tag_description']?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="update" value="blog" class="btn btn-primary px-5">Update</button>
                                <a  onclick="window.location='<?=base_url()?>auth/is_session/blog/blog_list/<?=$td_modules['module_id']?>/';" class="btn btn-danger px-5">Cancel</a>
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
    jQuery(document).on('change', 'select#category', function (e) {
    e.preventDefault();
    var category = jQuery(this).val();
    getCategoryList(category);
});
    // function get All States
function getCategoryList(category) {
    $.ajax({
        url: "<?=base_url()?>auth/is_session/blog/add_blog/getcategory",
        type: 'post',
        data: {category: category},
        dataType: 'json',
        beforeSend: function () {
            jQuery('select#category').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Select Sub Category</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].sub_category_id + '">' + json[i].sub_category + '</option>';
            }
            jQuery("select#sub_category").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
 
</script>