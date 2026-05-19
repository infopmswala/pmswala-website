<main class="main-wrapper">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 col-lg-10 m-auto">
                    <div class="inner-contents">
                        <div class="row">
                            <div class="col-12 col-md-9 m-auto">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start">
                                                <a href="<?=base_url()?>auth/is_session/user/profile" class="text-dark fw-bold fs-20">
                                                    <img width="24" height="24" src="https://img.icons8.com/fluency-systems-regular/24/12B886/circled-left-2.png" alt="circled-left-2"/> Back</a>
                                            </div>
                                            <div class="text-center m-auto justify-content-center">
                                                <h3 class="text-center">Bank Details</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="the-bank-message"></div>
                               <?php echo form_open("auth/is_session/user/profile/save_bank/", array("id" => "form-bank")) ?>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="bank">Bank Name</label>
                                                <input type="text" name="bank_name" id="bank_name" value="<?=$td_user_bank_details['bank_name'] ?? '';?>" class="form-control" placeholder="Bank Name">
                                                <span class="text-danger" id="bank_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="ac">Ac No</label>
                                                <input type="text" class="form-control" name="ac_number" id="ac_number" value="<?=$td_user_bank_details['ac_number'] ?? '';?>" placeholder="Ac Number" id="ac">
                                                <span class="text-danger" id="ac_number"></span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="ifsc">IFSC</label>
                                                <input type="text" class="form-control" name="ifsc" id="ifsc" value="<?=$td_user_bank_details['ifsc'] ?? '';?>" placeholder="IFSC" id="ifsc">
                                                <span class="text-danger" id="ifsc"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" name="id" id="id" value="<?=$td_user_bank_details['id'] ?? '';?>" placeholder="id" id="id">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="branch">Branch Name</label>
                                                <input type="text" class="form-control" name="branch_name" id="branch_name" value="<?=$td_user_bank_details['branch_name'] ?? '';?>" placeholder="Branch Name" id="branch">
                                                <span class="text-danger" id="branch_name"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(empty($td_user_bank_details) || $td_user_bank_details['approval_status'] == 0){ ?>
                                    <div class="text-center m-auto">
                                        <button class="btn btn-green" type="submit" name="submit">Submit</button>
                                    </div>
                                    <?php }else{ ?>
                                     <div class="text-center m-auto">
                                        <button class="btn btn-green" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
$('#form-bank').submit(function(e) {
    e.preventDefault();
    var me = $(this);
    $.ajax({
        url: me.attr('action'),
        type: 'post',
        data: me.serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.success == true) {
                $('#the-bank-message').append('<div class="alert alert-success">' + '<span class="glyphicon glyphicon-ok"></span>' +  'Bank Details updated successfully.' +'</div>');
                $('.form-group').removeClass('has-error').removeClass('has-success');
                $('.text-danger').remove();
                // reset the form
                me[0].reset();
                // close the message after seconds
                $('.alert-success').delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                        $(this).remove();
                    });
                    location.reload();
                })
            } else {
                $.each(response.messages, function(key, value) {
                    var element = $('#' + key);
                    element.closest('div.form-group')
                        .removeClass('has-error')
                        .addClass(value.length > 0 ? 'has-error' : 'has-success')
                        .find('.text-danger')
                        .remove();
                    element.after(value);
                });
            }
        }
    });
});
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p style="color: red;font-weight: bold;">Please Contact To Admin For Any Change On Bank Details</p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
