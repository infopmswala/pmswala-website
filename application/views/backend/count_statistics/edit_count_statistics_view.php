<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Statistics Count</div>
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
                            <h5 class="mb-0 text-primary">Add <?=$td_modules['module_name']?></h5>
                        </div>
                        <hr>
                         <form class="row g-3" method="post" enctype="multipart/form-data">
                             <?php $read_only_flag = array('9895');
                             if(in_array($this->uri->segment(5),$read_only_flag)){
                             ?>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Counter Icon</label>
                                <input type="text" class="form-control" name="counter_icon" value="<?=$td_count_statistics[0]->counter_icon?>" readonly>
                            </div>
                            <?php }else{ ?>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Counter Icon</label>
                                <input type="text" class="form-control" name="counter_icon" value="<?=$td_count_statistics[0]->counter_icon?>" required>
                            </div>
                            <?php } ?>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Counter Timer</label>
                                <input type="text" class="form-control" name="counter_timer" value="<?=$td_count_statistics[0]->counter_timer?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Counter Operator</label>
                                <input type="text" class="form-control" name="counter_operator" value="<?=$td_count_statistics[0]->counter_operator?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Counter Title</label>
                                <input type="text" class="form-control" name="counter_title" value="<?=$td_count_statistics[0]->counter_title?>" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="update" value="td_count_statistics" class="btn btn-primary px-5">Submit</button>
                                <a  onclick="window.location='<?=base_url()?>auth/is_session/count_statistics/list_count_statistics/<?=$this->uri->segment(5)?>/';" class="btn btn-danger px-5">Cancel</a>
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
<script>
	CKEDITOR.replace('editor');
</script>