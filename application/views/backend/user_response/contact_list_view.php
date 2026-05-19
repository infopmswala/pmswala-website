<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Conatct List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Conatct</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                <form class="row g-3" action="<?=base_url();?>auth/is_session/user_response/contact_list/" method="GET"
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
                                placeholder="Search Conatct Name" id="inputFirstName">
                        </div>
                        <div class="col-md-3">
                            <label for="inputFirstName" class="form-label">&nbsp;&nbsp;</label>
                            <button type="submit" name="submit" class="btn btn-primary px-5">Filter</button>
                        </div>
                        <?php echo form_close(); ?>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S No</th>
                                <th>Name</th>
                               <th>Phone Number</th>
                                <th>Message</th>
                                <th>Created  Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                if(!empty($contact_list)){
                  foreach($contact_list as $key =>$row)
                  {
                  ?>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14"><?= $start; ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $row->name?> </td>
                                <td><?= $row->phone?> </td>
                                 <?php if(strlen($row->message)<=40){ ?>
                                <td><?=$row->message ?></td>
                                <?php }else{ ?>
                                <td><?= substr($row->message,0,40)?>...<a  href="#" data-bs-toggle="modal" data-bs-target="#read_more<?=$row->id?>">Read More</a></td>
                                <?php } ?>
                                <td><?php echo Dateconversion($row->created_at); ?></td>
                                <td><div class="d-flex order-actions">
                                        <a href="#" onclick="validate('<?php echo $row->id;?>','<?php echo $row->name;?>')" class="ms-3" style="font-size: 25px;color: #ef0716;"><i class='bx bxs-trash'></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="read_more<?=$row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p style="width: 465px;color:Gray;white-space:normal;font-size:14px;"><?=$row->message?></p>
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
      $(location).attr('href', '<?php echo base_url()?>auth/is_session/user_response/contact_list/delete_information/' +id);
    });
  }
</script>