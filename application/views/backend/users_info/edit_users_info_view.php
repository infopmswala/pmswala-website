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
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                            <h5 class="mb-0 text-primary">Edit User</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?=$td_users[0]->name;?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone" value="<?=$td_users[0]->phone;?>" required>
                            </div>
                            <input type="hidden" class="form-control" name="id" value="<?=$td_users[0]->id;?>" required>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?=$td_users[0]->email;?>" required>
                            </div>
                             <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Date of birth</label>
                                <input type="text" class="form-control" name="date_of_birth" value="<?=$td_users[0]->date_of_birth;?>" required>
                            </div>
                               <div class="col-md-12" style="font-weight: bold;text-decoration: underline;">Current Address </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Address Line 1: Flat / House Number, Apartment, Floor, Street / Area </label>
                                <input type="text" name="c_address_1" value="<?=$td_users[0]->c_address_1;?>" class="form-control" required />

                            </div>
                               <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Address Line 2: Flat / House Number, Apartment, Floor, Street / Area </label>
                                <input type="text" name="c_address_2" value="<?=$td_users[0]->c_address_2;?>" class="form-control" required />

                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">City</label>
                                <input type="text" class="form-control" name="c_city" value="<?=$td_users[0]->c_city;?>" required>
                            </div>
                             <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">State</label>
                                <input type="text" class="form-control" name="c_state" value="<?=$td_users[0]->c_state;?>" required>
                            </div>
                             <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">ZIP / Postal Code</label>
                                <input type="text" class="form-control" name="c_zip" value="<?=$td_users[0]->c_zip;?>" required>
                            </div>
                                <div class="col-md-12" style="font-weight: bold;text-decoration: underline;">Permanent Address Address </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Address Line 1: Flat / House Number, Apartment, Floor, Street / Area </label>
                                <input type="text" name="p_address_1" value="<?=$td_users[0]->p_address_1;?>" class="form-control" required />

                            </div>
                               <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Address Line 2: Flat / House Number, Apartment, Floor, Street / Area </label>
                                <input type="text" name="p_address_2" value="<?=$td_users[0]->p_address_2;?>" class="form-control" required />

                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">City</label>
                                <input type="text" class="form-control" name="p_city" value="<?=$td_users[0]->p_city;?>" required>
                            </div>
                             <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">State</label>
                                <input type="text" class="form-control" name="p_state" value="<?=$td_users[0]->p_state;?>" required>
                            </div>
                             <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">ZIP / Postal Code</label>
                                <input type="text" class="form-control" name="p_zip" value="<?=$td_users[0]->p_zip;?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Photo</label>
                                <input type="file" name="image" value="" id="image" class="form-control"/>

                            </div>
                            <div class="col-md-6">
                            <?php if ($td_users[0]->image != "") { ?> <img src="<?= base_url();?><?=$td_users[0]->image; ?>" height="75" width="95"> <?php } ?>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="update" value="update_user"
                                    class="btn btn-primary px-5">update</button>
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