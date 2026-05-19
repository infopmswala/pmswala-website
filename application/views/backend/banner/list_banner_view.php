<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Banner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">

                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Banner</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <form class="row g-3" action="<?=base_url();?>auth/is_session/banner/list_banner/" method="GET"
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
                                placeholder="Search Banner Name" id="inputFirstName">
                        </div>
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <button type="submit" name="submit" class="btn btn-primary px-5">Filter</button>
                        </div>
                        
                        <?php echo form_close(); ?>
                        <div class="col-md-1">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <button type="submit" name="submit" class="btn btn-primary px-5 position_save" style="margin-left: 100px;">Save</button>
                        </div>
                        <div class="ms-auto"><a href="<?=base_url()?>auth/is_session/banner/add_banner/"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New
                                Banner</a></div>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>S No</th>
                                <th>Banner Name</th>
                                <th>Banner image</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="row_position">
                            <?php 
                            if(!empty($td_banner)){
                            foreach($td_banner as $key =>$row){ ?>
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
                                <td><?= $row->title?> </td>
                                <td><img src="<?=base_url()?><?= $row->image?>" alt="Italian Trulli"
                                        style="height:60px; width:100px;"></td>

                                <td><?php echo Dateconversion($row->created_at); ?></td>
                                <td><?php echo Timeconversion($row->created_at); ?></td>
                                <td>
                                    <form method="post"
                                        action="<?=site_url('/auth/is_session/banner/list_banner/showpay');?>">
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
                                        <a href="<?=base_url()?>auth/is_session/banner/edit_banner/index?jwt_token=<?php echo encrypt_decrypt($row->id, 'encrypt')?>"
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
              ?>  <?php }else{ ?>
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
        $(location).attr('href', '<?php echo base_url()?>auth/is_session/banner/list_banner/delete_banner/' +
            id);
    });
}
</script>

<script type="text/javascript">
    $( ".row_position" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
          
            updateOrder(selectedData);
       
        }
    });


    function updateOrder(data) {
        $('.position_save').click(function(){
        $.ajax({
            url:"<?=base_url()?>auth/is_session/banner/list_banner/sorting/",
            type:'post',
            data:{position:data},
            success:function(){
                toastr.success("your change successfully saved");
                setTimeout(function(){ window.location.reload(); }, 2000);
            }
        });
    });
    }
</script>