<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Service Module</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit <?=$td_modules['module_name']?></li>
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
                            <h5 class="mb-0 text-primary">Edit <?=$td_modules['module_name']?></h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="<?=base_url()?>auth/is_session/portfolio/edit/<?=$this->uri->segment(5)?>/?jwt_token=<?php echo encrypt_decrypt($td_portfolio['id'], 'encrypt')?>/" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"><?=$td_modules['module_name']?> Title</label>
                                <input type="text" class="form-control" name="title_1" value="<?=$td_portfolio['title_1'];?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Title 2</label>
                                <input type="text" class="form-control" name="title_2" value="<?=$td_portfolio['title_2'];?>"  required id="limitedTextarea" maxlength="50">
                                <div id="charCount">Characters left: 50</div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Portfolio Investment Range</label><p style="font-size: 12px;color: red;">Note: Ex: 10K-25K, 20L-1Cr</p>
                                <input type="text" class="form-control" name="investment" value="<?=$td_portfolio['investment'];?>"  required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">  Investment Lock-in Period</label><p style="font-size: 12px;color: red;">Note: Ex: 1Y, 2Y, 3Y</p>
                                <input type="text" class="form-control" name="period"  value="<?=$td_portfolio['period'];?>"  required>
                            </div>
                            <!--<div class="col-md-6">-->
                            <!--    <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Payout</label>-->
                            <!--    <input type="text" class="form-control" name="payout" value="<?=$td_portfolio['payout'];?>" required>-->
                            <!--</div>-->
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Image:</label>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="portfolio_image" id="fileUpload">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Image</label>
                                <div class="upload-btn-wrapper">
                                <img src="<?=base_url()?><?=$td_portfolio['portfolio_image'];?>" alt="Avatar" style="width:136px;border-radius: 50%;height: 83px;">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">-->
                            <!--    <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Interest Type</label>-->
                            <!--    <select class="form-control" name="payout" required>-->
                            <!--    <option value=""> Select Interest Type</option>-->
                            <!--    <option value="Monthly" <?php if($td_portfolio['payout']=="Monthly") echo 'selected="selected"'; ?>>6 Monthly</option>-->
                            <!--    <option value="Yearly" <?php if($td_portfolio['payout']=="Yearly") echo 'selected="selected"'; ?>>Yearly</option>-->
                            <!--    </select>-->
                            <!--</div>-->
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">No of Days</label>
                                <input type="number" class="form-control" name="no_of_days" value="<?=$td_portfolio['no_of_days'];?>"  required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">ROI</label>
                                <input type="number" class="form-control" name="interest" value="<?=$td_portfolio['interest'];?>"  required>
                            </div>
                            <!--<div class="col-md-6">-->
                            <!--    <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Monthly Interest</label>-->
                            <!--    <input type="number" class="form-control" name="monthly_interest" value="<?=$td_portfolio['monthly_interest'];?>"  required>-->
                            <!--</div>-->
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> Investment Category Details</label>
                                <div class="upload-btn-wrapper">
                                  <input type="text" class="form-control" name="retune_value" value="<?=$td_portfolio['retune_value'];?>"  required id="limited_Textarea" maxlength="50">
                                  <div id="charCount_1">Characters left: 50</div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Min Value</label>
                                <input type="number" class="form-control" name="min_value" value="<?=$td_portfolio['min_value'];?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Max Value</label>
                                <input type="number" class="form-control" name="max_value" value="<?=$td_portfolio['max_value'];?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?> Payout Year</label>
                                <!--<p style="font-size: 12px;color: red;">Note: Ex: 1, 2, 3</p>-->
                                <input type="number" class="form-control" name="payout_year" value="<?=$td_portfolio['payout_year'];?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"> <?=$td_modules['module_name']?>Page Title</label>
                                <!--<p style="font-size: 12px;color: red;">Note: Ex: 1, 2, 3</p>-->
                                <input type="text" class="form-control" name="heading" value="<?=$td_portfolio['heading'];?>" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="update" value="portfolio_edit"
                                    class="btn btn-primary px-5">Submit</button>
                                    <a  onclick="window.location='<?=base_url()?>auth/is_session/portfolio/portfolio_list/<?=$this->uri->segment(5)?>/';" class="btn btn-danger px-5">Cancel</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    $('#limitedTextarea').keyup(function() {
        var maxLength = parseInt($(this).attr('maxlength'));
        var currentLength = $(this).val().length;
        var charactersLeft = maxLength - currentLength;

        if (charactersLeft < 0) {
            $(this).val($(this).val().substring(0, maxLength));
            charactersLeft = 0;
        }

        $('#charCount').text('Characters left: ' + charactersLeft);
    });
});


    $(document).ready(function() {
    $('#limited_Textarea').keyup(function() {
        var maxLength = parseInt($(this).attr('maxlength'));
        var currentLength = $(this).val().length;
        var charactersLeft = maxLength - currentLength;

        if (charactersLeft < 0) {
            $(this).val($(this).val().substring(0, maxLength));
            charactersLeft = 0;
        }

        $('#charCount_1').text('Characters left: ' + charactersLeft);
    });
});
</script>