<script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog Module</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">

                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List <?=$td_modules['module_name']?></li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <form class="row g-3" action="<?=base_url();?>auth/is_session/blog/blog_list/<?=$this->uri->segment(5)?>" method="GET"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Show</label>
                                <select name="show" class="form-control">
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
                                    placeholder="Search Title Name" id="inputFirstName">
                            </div>
                            <div class="col-md-1">
                                <label for="inputFirstName"
                                    class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <button type="submit" name="submit" class="btn btn-primary px-5">Filter</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        
                            <div class="ms-auto"><a href="<?=base_url()?>auth/is_session/blog/blog_add/<?=$this->uri->segment(5)?>/"
                                    class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add
                                     <?=$td_modules['module_name']?></a></div>
                      
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped" id="tablelist">
                        <thead class="table-light">
                            <tr>
                                <th>S No</th>
                                <th>Blog Title</th>
                                <th>Blog image</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                             if(!empty($td_blog)){
                  foreach($td_blog as $key =>$row)
                  {
                  ?><tr id="sortable">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14"><?= $start; ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $row->title?> </td>
                                <td><?php if($row->image){ ?><img src="<?=base_url()?><?= $row->image?>"
                                        alt="<?= $row->title?>"
                                        style="height:60px; width:100px;"><?php }else{?><?=no_image(); } ?></td>

                                <td><?php echo Dateconversion($row->created_at); ?></td>
                                <td><?php echo Timeconversion($row->created_at); ?></td>
                                <td>
                                    <form method="post"
                                        action="<?=site_url('/auth/is_session/blog/showpay');?>">
                                        <input type="hidden" name="idname" value="<?=$row->id;?>">
                                        <input onChange="this.form.submit()" type="checkbox" name="feature"
                                            id="status_a<?=$row->id;?>" class="check"
                                            value="<?php if($row->pro_status==0){echo '1';}else{echo '0';}?>"
                                            <?php if($row->pro_status==1)echo 'checked';?>>
                                        <label for="status_a<?=$row->id;?>" class="checktoggle">checkbox</label>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?=base_url()?>auth/is_session/blog/edit_blog/<?=$this->uri->segment(5)?>/?jwt_token=<?php echo encrypt_decrypt($row->id, 'encrypt')?>"
                                            class=""><i class='bx bxs-edit'
                                                style="font-size: 25px;color: #008000;"></i></a>
                                        <a href="#"
                                            onclick="validate('<?php echo $row->id;?>','<?php echo $row->title;?>')"
                                            class="ms-3"><i class='bx bxs-trash'
                                                style="font-size: 25px;color: #ef0716;"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                             $start++;
                }
              ?>
                            <?php }else{ ?>
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
$(document).ready(function() {

    // Initialize sortable
    $("#sortable").sortable();

    // Save order
    $('#submit').click(function() {
        var imageids_arr = [];
        // get image ids order
        $('#sortable li').each(function() {
            var id = $(this).data('id');
            i imageids_arr.push(id);
        });

        // AJAX request
        $.ajax({
            url: 'ajaxfile.php',
            type: 'post',
            data: {
                imageids: imageids_arr
            },
            success: function(response) {
                if (response == 1)
                    alert('Save successfully.');
            }
        });
    });
});
</script>
<script>
$(function() {
    TablesDatatables.init();
});

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
        $(location).attr('href', '<?php echo base_url()?>auth/is_session/blog/delete_blog/' + id);
    });
}

jQuery(document).on('change', 'select#category', function(e) {
    e.preventDefault();
    var category = jQuery(this).val();
    getCategoryList(category);
});

function getCategoryList(category) {
    $.ajax({
        url: "<?=base_url()?>auth/is_session/blog/add_blog/getcategory",
        type: 'post',
        data: {
            category: category
        },
        dataType: 'json',
        beforeSend: function() {
            jQuery('select#category').find("option:eq(0)").html("Please wait..");
        },
        complete: function() {},
        success: function(json) {
            var options = '';
            options += '<option value="">Select Sub Category</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].sub_category_id + '">' + json[i].sub_category +
                    '</option>';
            }
            jQuery("select#sub_category").html(options);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
</script>