<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Info</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">

                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Payment Info</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                <form class="row g-3" action="<?=base_url();?>auth/is_session/users_info/user_payment_info/" method="GET"
                        enctype="multipart/form-data">
                        <div class="col-md-1">
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
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="q"
                                value="<?php echo html_escape($this->input->get('q', true)); ?>"
                                placeholder="Search Transaction id" id="inputFirstName">
                        </div>
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <input type="date" class="form-control" name="Fdate"
                                value="<?php echo html_escape($this->input->get('Fdate', true)); ?>"
                                placeholder="Search Transaction id" id="inputFirstName">
                        </div>
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <input type="date" class="form-control" name="Tdate"
                                value="<?php echo html_escape($this->input->get('Tdate', true)); ?>"
                                placeholder="Search Transaction id" id="inputFirstName">
                        </div>
                        <div class="col-md-2">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <button type="submit" name="submit" class="btn btn-primary px-5">Filter</button>
                        </div>
                        <?php echo form_close(); ?>
                         <button  onclick="ExportData()" type="submit" class="btn btn-primary" style="margin-left: 14px;margin-top: 26px;"><i class="bx bx-down-arrow-alt"></i>Export Data</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="tablelist">
                        <thead class="table-light">
                            <tr>
                                <th>S No</th>
                                <th>Name</th>
                                <th>Transaction Id</th>
                                <th>Amount</th>
                                <th>Purchase</th>
                                <th>Payment Thought</th>
                                <th>Payment Date</th>
                                <th>Payment Approved</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($td_payment_transactions)){
                  foreach($td_payment_transactions as $key =>$row)
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
                                <?php $td_user_nominee_details = $this->db->where('id',$row->user_id)->get('td_users')->row_array(); ?>
                                <td><?= $td_user_nominee_details['name']?> </td>
                                <td>#<?= $row->transaction_id?> </td>
                                <td><?= numberFormat($row->amount)?> </td>
                                <?php $td_portfolio = $this->db->where('module_id',9163)->where('id',$row->purchase)->get('td_portfolio')->row_array(); ?>
                                <td><?=$td_portfolio['title_2'];?></td>
                                <?php if($row->mode_of_payment_status == 'Bank Account for Funds Transfer'){ ?>
                                <td>Bank Transfer</td>
                                <?php }else{ ?>
                                <td>UPI</td>
                                <?php } ?>
                                <td><?php echo Dateconversion($row->created_at); ?></td>
                                <td>
                                    <?php if($row->payment_status==0){ ?>
                                    <a type="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user_payment<?=$row->id?>">Reply</a>
                                    <!--<form method="post"-->
                                    <!--    action="<?=site_url('/auth/is_session/users_info/showpay/');?>">-->
                                    <!--    <input type="hidden" name="idname" value="<?=$row->id;?>">-->
                                    <!--    <input onChange="this.form.submit()" type="checkbox" name="feature"-->
                                    <!--        id="status_a<?=$row->id;?>" class="check"-->
                                    <!--        value="<?php if($row->payment_status==0){echo '1';}else{echo '0';}?>"-->
                                    <!--        <?php if($row->payment_status==1)echo 'checked';?>>-->
                                    <!--    <label for="status_a<?=$row->id;?>" class="checktoggle">checkbox</label>-->
                                    <!--</form>-->
                                    <?php }elseif($row->payment_status==2){ ?>
                                     <p style="color: red;font-size: 15px;">Payment Failed</p>
                                    <?php }else{ ?>
                                        <p style="color: green;font-size: 15px;">Payment Received Successfully</p>
                                   <?php } ?>
                                </td>
                                
                            </tr>
                            
                            <div class="modal fade" id="user_payment<?=$row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Leave a Reply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form class="row g-3" action="<?=base_url()?>auth/is_session/users_info/payment_status/" method="post" enctype="multipart/form-data">
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Status:</label>
                                            <select class="form-control" name="status" required>
                                            <option value="Pending" <?php if($row->payment_status == 0) echo 'selected="selected"'; ?>>Pending</option>
                                            <option value="success" <?php if($row->payment_status == 1) echo 'selected="selected"'; ?>>Success</option>
                                            <option value="failed" <?php if($row->payment_status == 2) echo 'selected="selected"'; ?>>failed</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message" name="message" required><?php echo $row->message;?></textarea>
                                          </div>
                                          <input type="hidden" class="form-control" name="user_id" value="<?php echo $row->user_id;?>">
                                          <input type="hidden" class="form-control" name="id" value="<?php echo $row->id;?>">
                                          <button type="submit" name="update" value="payment_status" class="btn btn-primary px-5">Submit</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php
                            $start++;
                }
              ?>
<?php }else{ ?>
                            <td colspan="9" style="text-align: center;color: red;font-size: 19px;">No Record Found</td>

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
      $(location).attr('href', '<?php echo base_url()?>auth/is_session/careers/list_careers/delete_careers/' +id);
    });
  }
</script>
<script>
    function ExportData(){
        window.location.href='<?=base_url()?>auth/is_session/users_info/user_payment_info_history_download/?show='+$("[name=show]").val()+'&q='+$("[name=q]").val()+'&Fdate='+$("[name=Fdate]").val()+'&Tdate='+$("[name=Tdate]").val()+'';
    }
</script>