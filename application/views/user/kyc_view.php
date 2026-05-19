    <main class="main-wrapper">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 col-lg-10 m-auto">
                    <div class="inner-contents">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center m-auto justify-content-center">
                                    <h4 class="text-center bg-lightgreen p-3">KYC</h4>
                                </div>
                            </div>
                        </div>
                        <form class="mt-5" action="<?=base_url()?>auth/is_session/user/profile/submit_kyc/" method="post" enctype="multipart/form-data">
                          <?php if((!empty($td_user_kyc_details) && isset($td_user_kyc_details) && $td_user_kyc_details['pan_status']==0 && $td_user_kyc_details['aadhar_status']==0)){ ?>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="pan"> PAN Number</label>
                                        <input type="text" class="form-control pan"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" placeholder="Your PAN Number" id="pan_card_number" name="pan_card_number" value="<?php echo set_value('pan_card_number',(isset($td_user_kyc_details['pan_number'])) ? $td_user_kyc_details['pan_number'] : ''); ?>">
                                         <span class="text-danger"><?php echo form_error('pan_card_number');?></span>
                                    </div>
                                    <?php if(!empty($td_user_kyc_details['pan_front_side'])){ ?>
                                    <div class="mb-3">
                                      <a class="btn text-light btn-green btn-sm" data-bs-target="#pan_card_details" data-bs-toggle="modal" type="submit">View Pan Details</a>  
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-md-6">
                                <p class="mt-2 text-danger">Note: Please upload this formate only <b>jpg , png , JPG , PNG , jpeg , JPEG</b></p>
                                    <div class="mb-3">
                                        <label class="mb-1" for="panFront">Pan Front Side</label>
                                        <input type="file" class="form-control" placeholder="" id="pan_front_side" name="pan_front_side" required>
                                       
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="panBack">Pan Back Side</label>
                                        <input type="file" class="form-control" placeholder="" id="pan_back_side" name="pan_back_side" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadhar"> Aadhar Number</label>
                                        <input type="text" class="form-control" placeholder="Your Aadhar Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" name="aadhar_number" id="aadhar_number" value="<?php echo set_value('aadhar_number',(isset($td_user_kyc_details['aadhar_number'])) ? $td_user_kyc_details['aadhar_number'] : ''); ?>">
                                        <!--<span class="text-danger"><?php echo form_error('aadhar_number');?></span>-->
                                        <p id="aadharNumber1" style="color: red;"></p>
                                    </div>
                                    <?php if(!empty($td_user_kyc_details['aadhar_front_side'])){ ?>
                                    <div class="mb-3">
                                      <a class="btn text-light btn-green btn-sm w-50" data-bs-target="#aadhar_number_details" data-bs-toggle="modal" type="submit">View Aadhar Details</a> 
                                      
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadharFront">Aadhar Front Side</label>
                                        <input type="file" class="form-control" id="aadhar_front_side" name="aadhar_front_side" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadharBack">Aadhar Back Side</label>
                                        <input type="file" class="form-control" id="aadhar_back_side" name="aadhar_back_side" required>
                                    </div>
                                </div>
                            </div>
                           <?php }elseif(!empty($td_user_kyc_details) && isset($td_user_kyc_details) && $td_user_kyc_details['pan_status']==1 && $td_user_kyc_details['aadhar_status']==0){ ?>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="pan"> PAN Number</label>
                                        <input type="text" class="form-control pan"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" placeholder="Your PAN Number" id="pan_card_number" name="pan_card_number" value="<?php echo set_value('pan_card_number',(isset($td_user_kyc_details['pan_number'])) ? $td_user_kyc_details['pan_number'] : ''); ?>">
                                         <span class="text-danger"><?php echo form_error('pan_card_number');?></span>
                                    </div>
                                    <?php if(!empty($td_user_kyc_details['pan_front_side'])){ ?>
                                    <div class="mb-3">
                                      <a class="btn text-light btn-green btn-sm" data-bs-target="#pan_card_details" data-bs-toggle="modal" type="submit">View Pan Details</a>  
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadhar"> Aadhar Number</label>
                                        <input type="text" class="form-control" placeholder="Your Aadhar Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" name="aadhar_number" id="aadhar_number" value="<?php echo set_value('aadhar_number',(isset($td_user_kyc_details['aadhar_number'])) ? $td_user_kyc_details['aadhar_number'] : ''); ?>">
                                        <!--<span class="text-danger"><?php echo form_error('aadhar_number');?></span>-->
                                        <p id="aadharNumber1" style="color: red;"></p>
                                    </div>
                                    <?php if(!empty($td_user_kyc_details['aadhar_front_side'])){ ?>
                                    <div class="mb-3">
                                      <a class="btn text-light btn-green btn-sm w-50" data-bs-target="#aadhar_number_details" data-bs-toggle="modal" type="submit">View Aadhar Details</a> 
                                      
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadharFront">Aadhar Front Side</label>
                                        <input type="file" class="form-control" id="aadhar_front_side" name="aadhar_front_side" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadharBack">Aadhar Back Side</label>
                                        <input type="file" class="form-control" id="aadhar_back_side" name="aadhar_back_side" required>
                                    </div>
                                </div>
                            </div>
                            <?php }elseif(!empty($td_user_kyc_details) && isset($td_user_kyc_details) && $td_user_kyc_details['pan_status']==0 && $td_user_kyc_details['aadhar_status']==1){ ?>
                                <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="pan"> PAN Number</label>
                                        <input type="text" class="form-control pan"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" placeholder="Your PAN Number" id="pan_card_number" name="pan_card_number" value="<?php echo set_value('pan_card_number',(isset($td_user_kyc_details['pan_number'])) ? $td_user_kyc_details['pan_number'] : ''); ?>">
                                         <span class="text-danger"><?php echo form_error('pan_card_number');?></span>
                                    </div>
                                    <?php if(!empty($td_user_kyc_details['pan_front_side'])){ ?>
                                    <div class="mb-3">
                                      <a class="btn text-light btn-green btn-sm" data-bs-target="#pan_card_details" data-bs-toggle="modal" type="submit">View Pan Details</a>  
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-md-6">
                                <p class="mt-2 text-danger">Note: Please upload this formate only <b>jpg , png , JPG , PNG , jpeg , JPEG</b></p>
                                    <div class="mb-3">
                                        <label class="mb-1" for="panFront">Pan Front Side</label>
                                        <input type="file" class="form-control" placeholder="" id="pan_front_side" name="pan_front_side" required>
                                       
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="panBack">Pan Back Side</label>
                                        <input type="file" class="form-control" placeholder="" id="pan_back_side" name="pan_back_side" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadhar"> Aadhar Number</label>
                                        <input type="text" class="form-control" placeholder="Your Aadhar Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" name="aadhar_number" id="aadhar_number" value="<?php echo set_value('aadhar_number',(isset($td_user_kyc_details['aadhar_number'])) ? $td_user_kyc_details['aadhar_number'] : ''); ?>">
                                        <!--<span class="text-danger"><?php echo form_error('aadhar_number');?></span>-->
                                        <p id="aadharNumber1" style="color: red;"></p>
                                    </div>
                                    <?php if(!empty($td_user_kyc_details['aadhar_front_side'])){ ?>
                                    <div class="mb-3">
                                      <a class="btn text-light btn-green btn-sm w-50" data-bs-target="#aadhar_number_details" data-bs-toggle="modal" type="submit">View Aadhar Details</a> 
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="pan"> PAN Number</label>
                                        <input type="text" class="form-control pan"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" placeholder="Your PAN Number" id="pan_card_number" name="pan_card_number" value="<?php echo set_value('pan_card_number',(isset($td_user_kyc_details['pan_number'])) ? $td_user_kyc_details['pan_number'] : ''); ?>">
                                         <span class="text-danger"><?php echo form_error('pan_card_number');?></span>
                                    </div>
                                    <?php if(!empty($td_user_kyc_details['pan_front_side'])){ ?>
                                    <div class="mb-3">
                                      <a class="btn text-light btn-green btn-sm" data-bs-target="#pan_card_details" data-bs-toggle="modal" type="submit">View Pan Details</a>  
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-md-6">
                                <p class="mt-2 text-danger">Note: Please upload this formate only <b>jpg , png, jpeg</b></p>
                                    <div class="mb-3">
                                        <label class="mb-1" for="panFront">Pan Front Side</label>
                                        <input type="file" class="form-control" placeholder="" id="pan_front_side" name="pan_front_side" required>
                                       
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="panBack">Pan Back Side</label>
                                        <input type="file" class="form-control" placeholder="" id="pan_back_side" name="pan_back_side" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadhar"> Aadhar Number</label>
                                        <input type="text" class="form-control" placeholder="Your Aadhar Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" name="aadhar_number" id="aadhar_number" value="<?php echo set_value('aadhar_number',(isset($td_user_kyc_details['aadhar_number'])) ? $td_user_kyc_details['aadhar_number'] : ''); ?>">
                                        <!--<span class="text-danger"><?php echo form_error('aadhar_number');?></span>-->
                                        <p id="aadharNumber1" style="color: red;"></p>
                                    </div>
                                    <?php if(!empty($td_user_kyc_details['aadhar_front_side'])){ ?>
                                    <div class="mb-3">
                                      <a class="btn text-light btn-green btn-sm w-50" data-bs-target="#aadhar_number_details" data-bs-toggle="modal" type="submit">View Aadhar Details</a> 
                                      
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadharFront">Aadhar Front Side</label>
                                        <input type="file" class="form-control" id="aadhar_front_side" name="aadhar_front_side" required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="aadharBack">Aadhar Back Side</label>
                                        <input type="file" class="form-control" id="aadhar_back_side" name="aadhar_back_side" required>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!--<div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="mb-1" for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" placeholder="Dob" id="dob" name="dob" value="<?php echo set_value('dob',(isset($td_user_kyc_details['date_of_birth'])) ? $td_user_kyc_details['date_of_birth'] : ''); ?>">
                                        <span class="text-danger"><?php echo form_error('dob');?></span>
                                    </div>
                                </div>
                            </div>-->
                            <?php if((!empty($td_user_kyc_details) && isset($td_user_kyc_details) && $td_user_kyc_details['pan_status']==0 && $td_user_kyc_details['aadhar_status']==0)){ ?>
                            <div class="text-center m-auto">
                                <button class="btn btn-green" type="submit" >Submit</button>
                            </div>
                            <?php }elseif(!empty($td_user_kyc_details) && isset($td_user_kyc_details) && $td_user_kyc_details['pan_status']==1 && $td_user_kyc_details['aadhar_status']==0){ ?>
                            <div class="text-center m-auto">
                                <button class="btn btn-green" type="submit" >Submit</button>
                            </div>
                            <?php }elseif(!empty($td_user_kyc_details) && isset($td_user_kyc_details) && $td_user_kyc_details['pan_status']==0 && $td_user_kyc_details['aadhar_status']==1){ ?>
                            <div class="text-center m-auto">
                                <button class="btn btn-green" type="submit" >Submit</button>
                            </div>
                            <?php }elseif(empty($td_user_kyc_details)){ ?>
                            <button class="btn btn-green" type="submit" >Submit</button>
                            <?php }else{ ?>
                            <div class="text-center m-auto">
                                <button class="btn btn-green" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                            </div>
                            <?php } ?>
                        </form>
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <h4 class="bg-lightgreen p-3">Bank Details</h4>
                                <div id="the-bank-message"></div>
                            </div>
                            <?php echo form_open("auth/is_session/user/profile/save_bank/", array("id" => "form-bank")) ?>
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="mb-1 fw-bold" for="bank">Bank & Branch Name</label>
                                            <input type="text" name="bank_name" id="bank_name" value="<?=$td_user_bank_details['bank_name'] ?? '';?>" class="form-control" placeholder="Bank & Branch Name">
                                            <span class="text-danger" id="bank_name"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?=$td_user_bank_details['id'] ?? '';?>" placeholder="id" id="id">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="mb-1 fw-bold" for="ac">Account Number</label>
                                            <input type="text" class="form-control" name="ac_number" id="ac_number" value="<?=$td_user_bank_details['ac_number'] ?? '';?>" placeholder="Account Number">
                                            <span class="text-danger" id="ac_number"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="mb-1 fw-bold" for="ac">Account Holder Name</label>
                                            <input type="text" class="form-control" name="ac_name" id="ac_name" value="<?=$td_user_bank_details['ac_name'] ?? '';?>"  placeholder="Account Holder Name">
                                            <span class="text-danger" id="ac_name"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="mb-1 fw-bold" for="ifsc">IFSC Code</label>
                                            <input type="text" class="form-control" name="ifsc" id="ifsc" value="<?=$td_user_bank_details['ifsc'] ?? '';?>" placeholder="IFSC Code">
                                            <span class="text-danger" id="ifsc"></span>
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
    </main>
    <div class="modal fade" id="pan_card_details" aria-hidden="true" aria-labelledby="startinvestingLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startinvestingLabel">Pan Card Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                        <th style="text-align: center;">Pan Card Front Side</th>
                        <th style="text-align: center;">Pan Card Back Side</th>
                        </tr>
                        <tr>
                        <td><img src="<?=base_url()?><?=$td_user_kyc_details['pan_front_side'];?>" style="height: 143px;width: 678px;border-radius: 10px;"></td>
                        <td><img src="<?=base_url()?><?=$td_user_kyc_details['pan_back_side'];?>" style="height: 143px;width: 678px;border-radius: 10px;"></td>
                        </tr>
                        <tr><td><a href="<?=base_url()?><?=$td_user_kyc_details['pan_front_side'];?>" class="btn text-light btn-green btn-sm" style="margin-top: 31px;" download>Pan Front Side Download</a></td>
                        <td><a href="<?=base_url()?><?=$td_user_kyc_details['pan_back_side'];?>" class="btn text-light btn-green btn-sm" style="margin-top: 31px;" download>Pan Back Side Download</a></td></tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info btn-sm" data-bs-target="#startinvesting2" data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
     <div class="modal fade" id="aadhar_number_details" aria-hidden="true" aria-labelledby="startinvestingLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startinvestingLabel">Aadhar Card Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                        <th style="text-align: center;">Aadhar Card Front Side</th>
                        <th style="text-align: center;">Aadhar Card Back Side</th>
                        </tr>
                        <tr>
                        <td class="border"><img src="<?=base_url()?><?=$td_user_kyc_details['aadhar_front_side'];?>" style="height: 143px;width: 678px;border-radius: 10px;margin-right:10px;"></td>
                        <td class="border"><img src="<?=base_url()?><?=$td_user_kyc_details['aadhar_back_side'];?>" style="height: 143px;width: 678px;border-radius: 10px;"></td>
                        </tr>
                        <tr><td><a href="<?=base_url()?><?=$td_user_kyc_details['aadhar_front_side'];?>" class="btn text-light btn-green btn-sm" style="margin-top: 31px;" download>Aadhar Front Side Download</a></td>
                        <td><a href="<?=base_url()?><?=$td_user_kyc_details['aadhar_back_side'];?>" class="btn text-light btn-green btn-sm" style="margin-top: 31px;" download>Aadhar Back Side Download</a></td></tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info btn-sm" data-bs-target="#startinvesting2" data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">    
$(document).ready(function(){    
$(".pan").change(function () {      
var inputvalues = $(this).val();      
  var regex = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;    
    if(!regex.test(inputvalues)){      
       $(".error").text("Invalid Pan No !");  
      // return regex.test(inputvalues);    
    }
    else{
    $(".error").hide();
}
});      
   
});    
</script>   

<script>
$(document).ready(function() {
    $('#pan_card_number').on('keyup', function() {
        var panNumber = $('#pan_card_number').val().trim();
        if (validatePanCard(panNumber)) {
            $('#pan_card_number1').html('PAN Card is valid').show().fadeOut(5000);
        } else {
         $('#pan_card_number1').html('Invalid PAN Card Number').show().fadeOut(5000);
        }
    });

    function validatePanCard(pan) {
        // Regular expression to match PAN card pattern
        var panPattern = /^[A-Z]{5}[0-9]{4}[A-Z]$/;

        return panPattern.test(pan);
    }
});
</script>


<script>
$(document).ready(function(){
    $('#aadhar_number').on('keyup', function(){
        var aadharNumber = $('#aadhar_number').val()
        if(aadharNumber.length === 12 && !isNaN(aadharNumber)){
            $('#aadharNumber1').html('Aadhar number is valid.').show().fadeOut(5000);
        } else {
            $('#aadharNumber1').html('Aadhar number should be a 12-digit number.').show().fadeOut(5000);
        }
    });

    function validateAadharNumber(aadharNumber) {
        var aadharRegex = /^\d{4}\s\d{4}\s\d{4}$/; // Regular expression for Aadhar number format
        return aadharRegex.test(aadharNumber);
    }
});
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p style="color: red;font-weight: bold;">Please Contact To Admin For Any Change On KYC Details</p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<script>
    document.getElementById("profile").classList.add('nav-open');
    document.getElementById("kyc").classList.add('active');
    document.getElementById("profilemenu").style.display='block';
</script>

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
                    $(this).delay(5000).hide(10, function() {
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
