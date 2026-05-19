<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Banner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add banner</li>
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
                            <h5 class="mb-0 text-primary">Add Banner</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Banner Name</label>
                                <input type="text" class="form-control" name="title" id="inputFirstName" required>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Banner Text</label>
                                <input type="text" class="form-control" name="url" id="inputFirstName" required>
                            </div> -->
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Banner Image</label>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="image" id="fileUpload">
                                </div>
                                <span>Note: 1920*1280</span>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">category Type</label>
                                <select class="form-control" name="type" id='type' required>
                                    <option value="">Select Category Type</option>
                                    <option value="category">category</option>
                                     <option value="sub_category">Sub Category</option>
                
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Category Name</label>
                               
                                <select class="form-control" name="type_id" id="type_id" required>
                                    <option value="">Select  Category</option>
                                    
                                </select>
                            </div> -->
                            <div class="col-12">
                                <button type="submit" name="submit" value="banner" class="btn btn-primary px-5">Submit</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('select[name="type"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/auth/is_session/banner/add_banner/get_type_category_list/'+stateID,
                    type: "Post",
                    dataType: "json",
                    success:function(data) {
                      console.log(stateID);
                      if(stateID == 'category'){
                        $('select[name="type_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="type_id"]').append('<option value="'+ value.category_id +'">'+ value.category +'</option>');
                        });
                      }else{
                        $('select[name="type_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="type_id"]').append('<option value="'+ value.sub_category_id +'">'+ value.sub_category +'</option>');
                        });  
                      }
                    }
                });
            }else{
                $('select[name="type_id"]').empty();
            }
        });
    });
</script>
