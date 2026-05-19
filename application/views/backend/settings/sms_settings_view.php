<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Settings</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">SMS Settings</li>
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
                            <h5 class="mb-0 text-primary">SMS Settings</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Sms Url</label>
                                <input type="text" class="form-control" name="sms_url" value="<?= $td_sms_settings[0]->sms_url ?>" id="inputFirstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Api Key</label>
                                <input type="text" class="form-control" name="api_key" value="<?= $td_sms_settings[0]->api_key ?>" id="inputFirstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Sender Id</label>
                                <input type="text" class="form-control" name="sender_id" value="<?= $td_sms_settings[0]->sender_id?>" id="inputFirstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">User Name</label>
                                <input type="text" class="form-control" name="username" value="<?= $td_sms_settings[0]->username?>" id="inputFirstName" required>
                            </div>
                            <input type="hidden" name="uid" value="<?= $td_sms_settings[0]->id ?>" />
                            <div class="col-12">
                                <button type="submit" name="submit" value="td_sms_settings" class="btn btn-primary px-5">Submit</button>
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
