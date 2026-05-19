<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">banner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Single Banner</li>
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
                            <h5 class="mb-0 text-primary">Single Banner</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="inputFirstName">
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Logo image</label>
                                <?php
                                if ($td_update_single_slider['image'] != "") { ?>
                                <img src="<?= base_url() . $td_update_single_slider['image'] ?>" alt="image" height="75" width="95">
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Banner Title 1</label>
                                <input type="text" class="form-control" value="<?= $td_update_single_slider['title_1']; ?>"
                                    name="title_1" id="inputFirstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Banner Title 2</label>
                                <input type="text" class="form-control" name="title_2" id="inputFirstName"
                                    value="<?= $td_update_single_slider['title_2']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Banner Title 3</label>
                                <input type="text" class="form-control" name="title_3"
                                    id="inputFirstName" value="<?= $td_update_single_slider['title_3']; ?>" required>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Banner Title 4</label>
                                <input type="text" class="form-control" name="title_4" id="inputFirstName"
                                    value="<?= $td_update_single_slider['title_4']; ?>" required>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="uid" value="<?= $td_update_single_slider['id'] ?>" />
                                <button type="submit" name="submit" value="update_single_slider"
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