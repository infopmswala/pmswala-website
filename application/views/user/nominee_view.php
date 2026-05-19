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
                                                <h3 class="text-center">Add Nominee</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="the-nominee-message"></div>
                               <?php echo form_open_multipart("auth/is_session/user/profile/nominee/", array('enctype' => "multipart/form-data")) ?>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="bank">Name</label>
                                                <input type="text" class="form-control" placeholder="Name"  name="nominee_name" id="nominee_name" value="<?=$td_user_nominee_details['nominee_name'];?>" id="bank" required>
                                               <span class="text-danger" id="nominee_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="ac">Email</label>
                                                <input type="email" class="form-control" placeholder="Email" name="nominee_email" id="nominee_email" value="<?=$td_user_nominee_details['nominee_email'];?>"
                                                    id="ac" required>
                                                    <span class="text-danger" id="nominee_email"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" name="id" id="id" value="<?=$td_user_nominee_details['id'] ?? '';?>" placeholder="id" id="id">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="ifsc">Phone Number</label>
                                                <input type="tel" class="form-control" placeholder="Phone Number" name="nominee_phone" id="nominee_phone" value="<?=$td_user_nominee_details['nominee_phone'];?>"
                                                    id="ifsc" required>
                                                    <span class="text-danger" id="nominee_phone"></span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="branch">ID Proof</label>
                                                <input type="file" class="form-control" name="nominee_id_proof" placeholder="Id Proof" id="nominee_id_proof" required>
                                                <span class="text-danger" id="nominee_id_proof"></span>
                                                <p class="mt-3 text-danger">Note: Please upload this formate only <b>jpg , png , JPG , PNG , jpeg , JPEG</b></p>
                                            </div>
                                        <?php if(!empty($td_user_nominee_details['nominee_id_proof'])){ ?>
                                         <button class="btn btn-green" type="button" name="button" data-bs-target="#startinvesting" data-bs-toggle="modal">view Id Proof</button>
                                         <?php } ?>
                                        </div>
                                    </div>
                                    <?php if(empty($td_user_nominee_details) || $td_user_nominee_details['approval_status'] == 0){ ?>
                                    <div class="text-center m-auto">
                                          <button class="btn btn-green" type="submit" name="submit" value="add_nominee">Submit</button>
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
    <div class="modal fade" id="startinvesting" aria-hidden="true" aria-labelledby="startinvestingLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startinvestingLabel">Nominee ID Proof</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-accent-01 shadow rounded-2 p-3">
                        <img src="<?=base_url()?><?=$td_user_nominee_details['nominee_id_proof'];?>" alt="<?=$td_user_nominee_details['nominee_name'];?>">
                    </div>
                    <tr><td><a href="<?=base_url()?><?=$td_user_nominee_details['nominee_id_proof'];?>" class="btn text-light btn-green btn-sm" style="margin-top: 31px;" download>Id Proof Download</a></td>
                        </tr>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info btn-sm" data-bs-target="#startinvesting2" data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
$('#form-nominee').submit(function(e) {
    e.preventDefault();
    var me = $(this);
    $.ajax({
        url: me.attr('action'),
        type: 'post',
        data: me.serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.success == true) {
                $('#the-nominee-message').append('<div class="alert alert-success">' + '<span class="glyphicon glyphicon-ok"></span>' +  'Nominee Details updated successfully.' +'</div>');
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
      <p style="color: red;font-weight: bold;">Please Contact To Admin For Any Change On Nominee Details</p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>