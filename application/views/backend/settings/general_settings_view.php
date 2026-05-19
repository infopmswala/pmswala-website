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
                        <li class="breadcrumb-item active" aria-current="page">Web Settings</li>
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
                            <h5 class="mb-0 text-primary">Web Settings</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Logo</label>
                                <input type="file" class="form-control" name="logo" id="inputFirstName">
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Logo image</label>
                                <?php
                                if ($td_settings[0]->logo != "") { ?>
                                <img src="<?= base_url() . $td_settings[0]->logo ?>" alt="logo" height="75" width="95">
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Fav icon</label>
                                <input type="file" class="form-control" name="fav" id="inputFirstName">
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Fav icon image</label>
                                <?php
                                if ($td_settings[0]->fav != "") { ?>
                                <img src="<?= base_url() . $td_settings[0]->fav ?>" alt="fav" height="75" width="95">
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Address</label>
                                <textarea type="text" class="form-control" name="address"
                                    required><?= $td_settings[0]->address ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Google Maps</label>
                                <textarea type="text" class="form-control" name="about" id="inputFirstName"
                                    required><?= $td_settings[0]->about ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Phone</label>
                                <input type="text" class="form-control" value="<?= $td_settings[0]->phone ?>"
                                    name="phone" id="inputFirstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="inputFirstName"
                                    value="<?= $td_settings[0]->email ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Support Email</label>
                                <input type="email" class="form-control" name="email_two"
                                    id="inputFirstName" value="<?= $td_settings[0]->email_two ?>" required>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Sale Support</label>
                                <input type="email" class="form-control" name="email" id="inputFirstName"
                                    value="<?= $td_settings[0]->email ?>" required>
                            </div> -->
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Website Name</label>
                                <input type="text" class="form-control" name="title" id="inputFirstName"
                                    value="<?= $td_settings[0]->title ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Color Code</label>
                                <input type="color" class="form-control" name="color" id="inputFirstName"
                                    value="<?= $td_settings[0]->color ?>" required>
                            </div>
                            <div class="card-title d-flex align-items-center">
                                <div>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="uid" value="<?= $td_settings[0]->id ?>" />
                                <button type="submit" name="submit" value="general_settings"
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