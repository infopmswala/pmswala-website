<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Our Products</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">

                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Products</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <form class="row g-3" action="<?=base_url();?>auth/is_session/products/products_list/" method="GET"
                        enctype="multipart/form-data">
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">Show</label>
                            <select name="show" class="form-control">
                                <!-- <option value="5"
                                    <?php echo ($this->input->get('show', true) == '5') ? 'selected' : ''; ?>>5
                                </option> -->
                                <option value="10"
                                    <?php echo ($this->input->get('show', true) == '10') ? 'selected' : ''; ?>>
                                    10
                                </option>
                                <option value="30"
                                    <?php echo ($this->input->get('show', true) == '30') ? 'selected' : ''; ?>>30
                                </option>
                                <option value="60"
                                    <?php echo ($this->input->get('show', true) == '60') ? 'selected' : ''; ?>>60
                                </option>
                                <option value="100"
                                    <?php echo ($this->input->get('show', true) == '100') ? 'selected' : ''; ?>>100
                                </option>
                                <option value="200"
                                    <?php echo ($this->input->get('show', true) == '200') ? 'selected' : ''; ?>>200
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="q"
                                value="<?php echo html_escape($this->input->get('q', true)); ?>"
                                placeholder="Search Portfolio Name" id="inputFirstName">
                        </div>
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <button type="submit" name="submit" class="btn btn-primary px-5">Filter</button>
                        </div>
                        <?php echo form_close(); ?>
                        <div class="ms-auto"><a href="<?=base_url()?>auth/is_session/products/products_add/"
                                    class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add
                                    Product</a></div>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>S No</th>
                                <th>Plan & Package Servies</th>
                                <th>Plan & Package Name</th>
                                <th>Plan & Package Pricing</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="row_position">
                            <?php 
                            if(!empty($td_price_list)){
                            foreach(array_reverse($td_price_list) as $key =>$row){ ?>
                            <tr id="<?=$row->id?>">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14"><?= $start; ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php 
                                $where = array("status" => "1",'module_type' => 'service','module_id' => $row->plan_and_package_servies);
                                $td_services = $this->Main_model->get_data($where, "td_modules");?>
                                    <?= $td_services[0]->module_name?> </td>
                                <td><?= $row->plan_and_package_name?> </td>
                                <td><?= $row->plan_and_package_pricing?> </td>
                                <td>
                                    <form method="post"
                                        action="<?=site_url('/auth/is_session/plan_and_package/showpay');?>">
                                        <input type="hidden" name="idname" value="<?=$row->id;?>">
                                        <input onChange="this.form.submit()" type="checkbox" name="feature"
                                            id="status_a<?=$row->id;?>" class="check"
                                            value="<?php if($row->status==0){echo '1';}else{echo '0';}?>"
                                            <?php if($row->status==1)echo 'checked';?>>
                                        <label for="status_a<?=$row->id;?>" class="checktoggle">checkbox</label>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?=base_url()?>auth/is_session/plan_and_package/edit?jwt_token=<?php echo encrypt_decrypt($row->id, 'encrypt')?>"
                                            class=""><i class='bx bxs-edit'
                                                style="font-size: 25px;color: #008000;"></i></a>
                                        <a href="#"
                                            onclick="validate('<?php echo $row->id;?>','<?php echo $td_services[0]->module_name;?>')"
                                            class="ms-3"><i class='bx bxs-trash'
                                                style="font-size: 25px;color: #ef0716;"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $start++;
                }
              ?> <?php }else{ ?>
                            <td colspan="7" style="text-align: center;color: red;font-size: 19px;">No Record Found</td>
                            <?php } ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function validate(id, title) {
    swal({
        title: "Are you sure?",
        text: "Are you sure you want to delete this record" + " " + title,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete it!",
        closeOnConfirm: false
    }, function() {
        //swal("Deleted!", "Your record has been deleted successfully.", "success");
        $(location).attr('href', '<?php echo base_url()?>auth/is_session/portfolio/delete_portfolio/' +
            id);
    });
}
</script>
<script>
$(document).ready(function() {
    var i = 1;
    var length;
    $("#add").click(function() {
        i++;
        $('#dynamic_field').append('<div id="row' + i +
            '" class="row g-3"><div class="col-md-10"><label for="inputFirstName" class="form-label">Pricing Item</label><input type="text" class="form-control" name="pricing_item[]" required></div><div class="col-md-2"><button type="button" name="remove" id="' +
            i +
            '" class="btn btn-danger btn_remove" style="border-radius: 45px;background: #e62e2e;">X</button></div></div>'
            );
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
});
</script>