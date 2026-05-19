<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Price List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Price List</li>
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
                            <h5 class="mb-0 text-primary">Add Price List</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Category</label>
                                <select name="category_price_list" class="form-control" required>
                                    <option value="">Select Price List</option>
                                    <option value="Retail Prices">Retail Prices</option>
                                    <option value="HS/MS">HS/MS</option>
                                    <option value="Main Cities">Main Cities</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Product</label>
                                <input type="text" class="form-control" name="product" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Unit</label>
                                <input type="text" class="form-control" name="unit" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Supply Location</label>
                                <input type="text" class="form-control" name="supply_location" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">BPCL</label>
                                <input type="text" class="form-control" name="bpcl" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">HPCL</label>
                                <input type="text" class="form-control" name="hpcl" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">MRPL</label>
                                <input type="text" class="form-control" name="mrpl" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">IOCL</label>
                                <input type="text" class="form-control" name="iocl" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Petro Bazaar</label>
                                <input type="text" class="form-control" name="petrobazaar" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Updated Date</label>
                                <input type="date" class="form-control" name="updated_date" required>
                            </div>
                           
                            <div class="col-12">
                                <button type="submit" name="submit" value="td_price_list" class="btn btn-primary px-5">Submit</button>
                                <a  onclick="window.location='<?=base_url()?>auth/is_session/pricelist/list_price_list/';" class="btn btn-danger px-5">Cancel</a>
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