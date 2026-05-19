<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?=base_url()?><?=$td_admin[0]->photo;?>" alt="Admin"
                                        class="rounded-circle p-1 bx-color" width="150px" height="150px">
                                    <div class="mt-3">
                                        <h4><?=$td_admin[0]->full_name;?></h4>
                                        <p class="text-secondary mb-1">Email: <?=$td_admin[0]->email_id;?></p>
                                        <p class="text-secondary mb-1">Phone: <?=$td_admin[0]->mobile_no;?></p>
                                        <p class="text-muted font-size-sm">Address: <?=$td_admin[0]->address;?></p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-primary bx-color" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active bx-color" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                            aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bxs-user-pin font-18 me-1 bx-color' ></i>
                                                </div>
                                                <div class="tab-title bx-color">Profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link bx-color" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                            aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bxs-key font-18 me-1 bx-color'></i>
                                                </div>
                                                <div class="tab-title bx-color">Change Password</div>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                        <div class="card-body">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="full_name"
                                                            value="<?=$td_admin[0]->full_name?>" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="email_id"
                                                            value="<?=$td_admin[0]->email_id?>" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="mobile_no"
                                                            value="<?=$td_admin[0]->mobile_no?>" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <textarea class="form-control" name="address" required><?=$td_admin[0]->address?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Profile image</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                    <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <button type="submit" name="submit" value="profile"
                                                            class="btn btn-primary px-4" value="Save Changes" />Update
                                                        Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                        <div class="card-body">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Old Password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="Password" class="form-control" name="current_password"
                                                            value="" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">New password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="Password" class="form-control" name="password" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="Password" class="form-control" name="repassword" required>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <button type="submit" name="submit" value="update"
                                                            class="btn btn-primary px-4" value="Save Changes" />Update
                                                        Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</div>