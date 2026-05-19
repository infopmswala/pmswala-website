<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?=$td_users['name'];?></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Nominee Details</li>
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
                            <h5 class="mb-0 text-primary">Update Nominee Details</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="<?=base_url()?>auth/is_session/users_info/edit_nominee_list_view/?jwt_token=<?=$_GET['jwt_token'];?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Name</label>
                                <input type="text" class="form-control" name="nominee_name" value="<?=$td_user_nominee_details['nominee_name'];?>" id="nominee_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Date of Birth</label>
                                <input type="text" class="form-control" name="nominee_date_of_birth" value="<?=$td_user_nominee_details['nominee_date_of_birth'];?>" id="nominee_date_of_birth" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Relation</label>
                                <input type="text" class="form-control" name="relation" value="<?=$td_user_nominee_details['relation'];?>" id="relation" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Aadhar Card Number</label>
                                <input type="text" class="form-control" name="ifsc" value="<?=$td_user_nominee_details['ifsc'];?>" id="nominee_aadhar_card_number" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12">
                            </div>
                            <!--<div class="col-md-6">-->
                            <!--    <label for="inputFirstName" class="form-label">Id Proof	</label>-->
                            <!--    <input type="file" class="form-control" name="nominee_id_proof" id="nominee_id_proof">-->
                            <!--    <p style="color: red;">Note: Please upload this formate only <b>jpg , png , JPG , PNG , jpeg , JPEG</b></p>-->
                            <!--</div>-->
                            <!-- <div class="col-md-6">-->
                            <!--    <label for="inputFirstName" class="form-label">ID Proof</label>-->
                            <!--    <div class="upload-btn-wrapper">-->
                            <!--    <img src="<?=base_url()?><?=$td_user_nominee_details['nominee_id_proof'];?>" alt="Avatar" style="width:136px;height: 83px;">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-12">
                                <button type="submit" name="update" value="update_nominee_details" class="btn btn-primary px-5">Submit</button>
                                <a onclick="window.history.go(-1); return false;" class="btn btn-danger px-5">Cancel</a>
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

