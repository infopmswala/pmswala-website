<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Info</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                            <h5 class="mb-0 text-primary">Add User</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="inputFirstName" value="<?php echo set_value('name') ?>" required>
                            </div>
                            <div class="col-md-1">
                                <label for="inputFirstName" class="form-label">Code</label>
                                <input type="text" class="form-control" name="phone_number" id="inputFirstName" value="+91"
                                    readonly>
                            </div>
                            <div class="col-md-5">
                                <label for="inputFirstName" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone') ?>" id="inputFirstName"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo set_value('email') ?>" id="email"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">City</label>
                                <input type="text" name="city" value="<?php echo set_value('city') ?>" id="city"
                                    class="form-control" required />

                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" value="<?php echo set_value('address') ?>" id="inputFirstName"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Photo</label>
                                <input type="file" name="image" value=""  id="image" class="form-control" required/>
                                <p style="color: red;">Note: Please upload this formate only <b>jpg , png , JPG , PNG , jpeg , JPEG</b></p>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" value="add_user"
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