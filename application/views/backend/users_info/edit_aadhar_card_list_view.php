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
                        <li class="breadcrumb-item active" aria-current="page">Update Aadhar Details</li>
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
                            <h5 class="mb-0 text-primary">Update Aadhar Details</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="<?=base_url()?>auth/is_session/users_info/edit_aadhar_card_list_view/?jwt_token=<?=$_GET['jwt_token'];?>" enctype="multipart/form-data">
                            <div class="col-md-12>
                                <label for="inputFirstName" class="form-label">Aadhar Number</label>
                                <input type="text" class="form-control" name="aadhar_number" value="<?=$td_user_kyc_details['aadhar_number'];?>" id="aadhar_number" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Aadhar Front Side</label>
                                <input type="file" class="form-control" name="aadhar_front_side" id="aadhar_front_side">
                                <p style="color: red;">Note: Please upload this formate only <b>jpg , png , JPG , PNG , jpeg , JPEG</b></p>
                            </div>
                            <?php if(!empty($td_user_kyc_details['aadhar_front_side'])){ ?>
                             <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Aadhar Front Side</label>
                                <div class="upload-btn-wrapper">
                                <img src="<?=base_url()?><?=$td_user_kyc_details['aadhar_front_side'];?>" alt="Avatar" style="width:136px;height: 83px;">
                                </div>
                            </div>
                            <?php } ?>
                            
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Aadhar Back Side</label>
                                <input type="file" class="form-control" name="aadhar_back_side" id="aadhar_back_side">
                                <p style="color: red;">Note: Please upload this formate only <b>jpg , png , JPG , PNG , jpeg , JPEG</b></p>
                            </div>
                            <?php if(!empty($td_user_kyc_details['aadhar_back_side'])){ ?>
                             <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Aadhar Back Side</label>
                                <div class="upload-btn-wrapper">
                                <img src="<?=base_url()?><?=$td_user_kyc_details['aadhar_back_side'];?>" alt="Avatar" style="width:136px;height: 83px;">
                                </div>
                            </div>
                            <?php } ?>
                            
                            <div class="col-12">
                                <button type="submit" name="update" value="update_aadhar_details" class="btn btn-primary px-5">Submit</button>
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

