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
                        <li class="breadcrumb-item active" aria-current="page">List Help & Support</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                <form class="row g-3" action="<?=base_url();?>auth/is_session/users_info/user_help_support/" method="GET"
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
                                placeholder="Search Ticket id" id="inputFirstName">
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
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="tablelist">
                        <thead class="table-light">
                            <tr>
                                <th>S No</th>
                                <th>Ticket Id</th>
                                <th>Email</th>
                                <th>Screenshot</th>
                                <th>Payment Date</th>
                                <th>Approved</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($td_help_and_support)){
                  foreach($td_help_and_support as $key =>$row)
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
                                <td>#<?= $row->ticket_id?> </td>
                                <td><?= $row->email?></td>
                                <td><?php if($row->screenshort){ ?><a href="" data-bs-toggle="modal" data-bs-target="#screenshort<?=$row->id?>"><img src="<?=base_url()?><?= $row->screenshort?>" style="height:60px; width:100px;"></a><?php }else{?><?=no_image(); } ?></td>
                                <td><?php echo Dateconversion($row->created_at); ?></td>
                                <td><?=$row->status;?></td>
                                <td>
                                    <?php if($row->status !='closed'){ ?>
                                    <a type="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user_help_support<?=$row->id?>">Reply</a>
                                    <?php } ?>
                                <a href="#" onclick="validate('<?php echo $row->id;?>','<?php echo $row->ticket_id;?>')" class="ms-3"><i class='bx bxs-trash' style="font-size: 25px;color: #ef0716;"></i></a></td>
                                
                                <div class="modal fade" id="user_help_support<?=$row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Leave a Reply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form class="row g-3" action="<?=base_url()?>auth/is_session/users_info/add_user_help_support/" method="post" enctype="multipart/form-data">
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Status:</label>
                                            <select class="form-control" name="status" required><option value="Pending">Pending</option>
                                            <option value="closed">Closed</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message" name="message" required><?php echo $row->message;?></textarea>
                                          </div>
                                          <input type="hidden" class="form-control" name="id" value="<?php echo $row->id;?>">
                                          <button type="submit" name="update" value="add_user_help_support" class="btn btn-primary px-5">Submit</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <div class="modal fade" id="screenshort<?=$row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Screenshort</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <img src="<?=base_url()?><?=$row->screenshort;?>" style="height: 143px;border-radius: 10px;"></a>
                                        <a href="<?=base_url()?><?=$row->screenshort;?>" value="nominee_status" class="btn btn-primary" download>Download</a>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </tr>
                            
                            
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
      $(location).attr('href', '<?php echo base_url()?>auth/is_session/users_info/delete_user_help_support/' +id);
    });
  }
</script>
<script>
    function ExportData(){
        window.location.href='<?=base_url()?>auth/is_session/users_info/user_payment_info_history_download/?show='+$("[name=show]").val()+'&q='+$("[name=q]").val()+'&Fdate='+$("[name=Fdate]").val()+'&Tdate='+$("[name=Tdate]").val()+'';
    }
</script>