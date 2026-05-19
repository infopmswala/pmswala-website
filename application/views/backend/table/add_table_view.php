<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Table</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Table</li>
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
                            <h5 class="mb-0 text-primary">Table for <b><?php echo $this->db->database ?></b> database
                            </h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputFirstName" class="form-label">Table Name</label>
                                <input type="text" name="table_name" placeholder="Table name" class="form-control"
                                    id="table_name"  required="required">
                            </div>
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Field Name</th>
                                        <th>Data Type</th>
                                        <th style="width: 100px;">Length / Set</th>
                                        <th class="text-center"><a href="#" title="Primary Key"><i
                                                    class="lni lni-key"></i></a></th>
                                        <th style="width: 10px;">Unsigned</th>
                                        <th style="width: 10px;">NULL</th>
                                        <th style="width: 10px;">Zerofill</th>
                                        <th>Default</th>
                                        <th style="width: 10px;"><a type="button" name="add" id="add" title="Delete" class="text-red delete-field bx-color"><i
                                                    class="lni lni-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody id="dynamic_field">
                                    
                                </tbody>
                            </table>
                                <div class="col-12">
                                <button type="submit" name="submit" value="td_table"
                                    class="btn btn-primary px-5">Submit</button>
                                <a onclick="window.location='<?=base_url()?>auth/is_session/table/list_table/';"
                                    class="btn btn-danger px-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
 $(document).ready(function(){
   var i = 1;
     var length;
   $("#add").click(function(){
    i++;
       $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="field[name][]" placeholder="Field name" required="required" class="form-control"></td><td><select name="field[type][]" class="form-select" style="width: 100%"><option value="">Select Type</option> <?php foreach ($type as $key => $value): ?> <optgroup label="<?php echo $key ?>"><?php foreach ($value as $val): ?> <option <?php echo ($val == 'INT')?"selected":'' ?> value="<?php echo $val ?>"><?php echo $val ?></option> <?php endforeach ?></optgroup><?php endforeach ?></select></td><td><input type="text" name="field[length][]" placeholder="length/set" value="" class="form-control"></td> <td class="text-center"><input class="form-check-input" type="checkbox"><input type="hidden" name="field[primary_key][]" value="0"></td> <td class="text-center"><input class="form-check-input" type="checkbox"><input type="hidden" name="field[unsigned][]" value="0"></td><td class="text-center"><input class="form-check-input" type="checkbox"><input type="hidden" name="field[null][]" value="0"></td><td class="text-center"><input class="form-check-input" type="checkbox"><input type="hidden" name="field[zerofill][]" value="0"></td>	<td><select name="field[value][]" class="form-select"><option value="">Default Value</option><option value="">No Default Value</option><option value="NULL">NULL</option><option value="Auto Increment">Auto Increment</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
     });
   $(document).on('click', '.btn_remove', function(){  
       var button_id = $(this).attr("id");     
       $('#row'+button_id+'').remove();  
     });
   });
</script>