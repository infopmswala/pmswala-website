<main class="main-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
                <div class="col-12 col-lg-12 m-auto">
                    <div class="inner-contents">
                        <div class="row">
                            <div class="page-header align-items-center text-center mr-bottom-60">
                                <div class="">
                                    <h3 class="text-dark text-center fw-semibold">Change Password</h3>
                                </div>
                            </div>
                            <!--<div class="col-12 col-md-6">-->
                            <!--    <div class="mb-3">-->
                            <!--        <label class="mb-1 fw-bold" for="oldpassword">Old Password</label>-->
                            <!--        <input type="text" name="oldpassword" id="oldpassword" value="" class="form-control" placeholder="Old Password">-->
                            <!--        <span class="text-danger" id="oldpassword"></span>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <form action="<?=base_url()?>auth/is_session/user/settings/change/" method="post">
                            <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="mb-1 fw-bold" for="newpassword">New Password</label>
                                    <input type="text" name="password" id="password" value="" class="form-control" placeholder="New Password" required>
                                    <span class="text-danger" id="password"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="mb-1 fw-bold" for="confirmpassword">Confirm Password</label>
                                    <input type="text" name="repassword" id="repassword" value="" class="form-control" placeholder="Confirm Password" required>
                                    <span class="text-danger" id="repassword"></span>
                                </div>
                            </div>
                            <div class="col-12 text-center m-auto mt-5">
                             <button class="btn btn-green" name="submit" value="update" type="submit">Submit</button>
                            </div>
                             </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.getElementById("setting").classList.add('nav-open');
    document.getElementById("password").classList.add('active');
    document.getElementById("settingmenu").style.display='block';
</script>