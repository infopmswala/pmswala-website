
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Careers</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">

                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Applied Careers</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                <form class="row g-3" action="<?=base_url();?>auth/is_session/careers/list_applied_careers/" method="GET"
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
                                placeholder="Search Title Name" id="inputFirstName">
                        </div>
                        <div class="col-md-3">
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
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Phone</th>
                                <th>Job Title</th>
                                <th>Resume</th>
                                <th>Date</th>
                                <th>Time</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            if(!empty($td_submit_career)){
                  foreach(array_reverse($td_submit_career) as $key =>$row)
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
                                <td><?= $row->full_name?> </td>
                                <td><?= $row->email?> </td>
                                <td><?= $row->mobile?> </td>
                                <td><?= $row->job_title?> </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?=base_url()?><?=$row->resume;?>"  class="ms-3" download><i class='bx bxs-download' style="font-size: 25px;color: #008000;"></i></a>
                                    </div>
                                </td>
                                <td><?php echo Dateconversion($row->created_at); ?></td>
                                <td><?php echo Timeconversion($row->created_at); ?></td>
                               
                                
                            </tr>
                            <?php
                            $start++;
                }
              ?>
<?php }else{ ?>
                            <td colspan="8" style="text-align: center;color: red;font-size: 19px;">No Record Found</td>

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
      $(location).attr('href', '<?php echo base_url()?>auth/is_session/careers/list_careers/delete_careers/' +id);
    });
  }
</script>