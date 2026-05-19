<div class="page-wrapper">
    <div class="page-content">
 <!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Plan & Package</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Plan & Package</li>
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
                            <h5 class="mb-0 text-primary">Plan & Package</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Plan & Package Servies</label>
                                <select class="form-control" name="plan_and_package_servies" required>
                                <option value="">Select Plan & Package Servies</option>
                                <?php foreach($td_services as $key => $val){?>
                                <option value="<?=$val->module_id?>" <?php if($td_price_list[0]->plan_and_package_servies == $val->module_id){ echo "selected"; } ?>><?=$val->module_name?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Plan & Package Name</label>
                                <input type="text" class="form-control" name="plan_and_package_name" value="<?=$td_price_list[0]->plan_and_package_name?>">
                            </div>
                            <div class="col-md-10">
                                <label for="inputFirstName" class="form-label">Plan & Package Pricing</label>
                                <input type="text" class="form-control" name="plan_and_package_pricing" value="<?=$td_price_list[0]->plan_and_package_pricing?>">
                            </div>
                            <?php 
                            $where = array("status" => "1",'plan_and_package_id'=>$td_price_list[0]->plan_and_package_id);
                            $td_price_item_list = $this->Main_model->get_data($where, "td_price_item_list");
                            foreach($td_price_item_list as $key => $val){
                            ?>
                            <div class="col-md-10"><label for="inputFirstName" class="form-label">Pricing Item</label><input type="text" class="form-control" value="<?=$val->pricing_item?>" required></div><div class="col-md-2"><a href="<?=site_url('/auth/is_session/plan_and_package/delete_price_itme_list/'.$val->id);?>" type="button" class="btn btn-danger btn_remove">X</a></div>
                            <?php } ?>
                            <div class="col-md-6">
                            <a type="button" name="add" id="add" title="Delete" class="text-red delete-field bx-color">
                                <i class="lni lni-plus"></i></a>
                            </div>
                            <div id="dynamic_field"></div>
                            <div class="col-12">
                                <button type="submit" name="update" value="td_price_list" class="btn btn-primary px-5">Submit</button>
                                <a  onclick="window.location='<?=base_url()?>auth/is_session/plan_and_package/list/';" class="btn btn-danger px-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
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
 $(document).ready(function(){
   var i = 1;
     var length;
   $("#add").click(function(){
    i++;
    $('#dynamic_field').append('<div id="row'+i+'" class="row g-3"><div class="col-md-10"><label for="inputFirstName" class="form-label">Pricing Item</label><input type="text" class="form-control" name="pricing_item[]" required></div><div class="col-md-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
     });
   $(document).on('click', '.btn_remove', function(){  
       var button_id = $(this).attr("id");     
       $('#row'+button_id+'').remove();  
     });
   });
</script>