    <main class="main-wrapper">
        <div class="container">
            <div class="inner-contents">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center m-auto justify-content-center">
                            <h4 class="text-center bg-lightgreen p-3">My Profile</h4>
                        </div>
                    </div>
                </div>
                <form class="form-horizontal" action="<?=base_url()?>auth/is_session/user/profile/my_profile/" method="post" enctype="multipart/form-data">
                    <div class="row mt-3 g-5">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="name">Full Name (As per PAN) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="<?=$td_users['name'];?>" placeholder="Full Name (As per PAN)"
                                            id="name">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="name">Date of Birth (As per PAN) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="date_of_birth" value="<?=$td_users['date_of_birth'];?>" placeholder="Date of Birth (As per PAN)"
                                            id="name">
                            </div>
                            <h5 class="mb-3">Current Address <span class="text-danger">*</span></h5>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="address"> Address Line 1: Flat / House Number, Apartment, Floor, Street / Area <span class="text-danger">*</span></label>
                                <textarea type="text" name="c_address_1" class="form-control" placeholder="Your Address" id="curAddressLine1"><?=$td_users['c_address_1'];?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="address"> Address Line 2: Street , Area , Locality, etc <span class="text-danger">*</span></label>
                                <textarea type="text" name="c_address_2" class="form-control" placeholder="Your Address" id="curAddressLine2"><?=$td_users['c_address_2'];?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="city"> City <span class="text-danger">*</span></label>
                                 <input type="text" name="c_city" value="<?=$td_users['c_city'];?>" class="form-control" placeholder="Your City"
                                            id="curCity">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="state"> State <span class="text-danger">*</span></label>
                                 <input type="text" name="c_state" value="<?=$td_users['c_state'];?>" class="form-control" placeholder="Your State"
                                            id="curState">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="zip"> ZIP / Postal Code <span class="text-danger">*</span></label></label><span id="curZipcode_tel" style="color:red;"></span>
                                 <input type="text" name="c_zip" value="<?=$td_users['c_zip'];?>" class="form-control" placeholder="Your ZIP / Postal Code"
                                            id="curZipcode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                            </div>
                             <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="photo"> Your Photo</label>
                                <input type="file" name="image" class="form-control" placeholder="" id="image">
                                <p class="mt-2 text-danger">Note: Please upload this formate only <b>jpg , png, jpeg</b></p>
                            </div>
                             <?php if ($td_users['image'] != "") { ?> <img src="<?= base_url();?><?= $td_users['image']; ?>" height="75" width="95"> <?php } ?>
                            
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="phone1"> Phone Number <span class="text-danger">*</span></label><span id="phone_tel" style="color:red;"></span>
                                 <input type="text" class="form-control" name="phone" value="<?=$td_users['phone'];?>" placeholder="Your Phone Number" id="phone1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="email1"> Email ID <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email1" value="<?=$td_users['email'];?>" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="d-lg-flex mb-1">
                                <h5>Permanent Address</h5>
                                <div class="d-flex ms-lg-5 mt-1">
                                    <input type="checkbox" class="form-check-input" name="filltoo" id="filltoo" onclick="filladd();" value="1" <?php if($td_users['filltoo'] == 1){ echo 'checked'; }else{ echo ''; }?>>
                                    <label class="form-label" for="checkbox1">Click if the same with Current Address</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="address1"> Address Line 1: Flat / House Number, Apartment, Floor, Street / Area <span class="text-danger">*</span></label>
                                <textarea type="text" name="p_address_1" class="form-control"  placeholder="Your Address" id="pAddressLine1"><?=$td_users['p_address_1'];?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="address2"> Address Line 2: Street , Area , Locality, etc <span class="text-danger">*</span></label>
                                <textarea type="text" name="p_address_2" class="form-control" placeholder="Your Address" id="pAddressLine2"><?=$td_users['p_address_2'];?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="city1"> City <span class="text-danger">*</span></label>
                                 <input type="text" name="p_city" value="<?=$td_users['p_city'];?>" class="form-control" placeholder="Your City" id="pCity">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="state1"> State <span class="text-danger">*</span></label>
                                 <input type="text" name="p_state" value="<?=$td_users['p_state'];?>" class="form-control" placeholder="Your State" id="pState">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1 fw-semibold" for="zip1"> ZIP / Postal Code <span class="text-danger">*</span></label><span id="pZipcode_tel" style="color:red;"></span>
                                 <input type="text" name="p_zip" value="<?=$td_users['p_zip'];?>" class="form-control" placeholder="Your ZIP / Postal Code"
                                            id="pZipcode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                            </div>
                        </div>
                        
                        <div class="col-12 text-center">
                            <h4 class="bg-lightgreen p-3">Nominee Details: (If Any)</h4>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="mb-1 fw-semibold" for="name">Nominee Full Name (As per PAN)</label>
                            <input type="text" class="form-control"  name="nominee_name" id="nominee_name" value="<?=$td_user_nominee_details['nominee_name'] ?? '';?>" placeholder="Nominee Full Name (As per PAN)">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="mb-1 fw-semibold" for="name">Nominee Date of Birth (As per PAN)</label>
                            <input type="text" class="form-control" name="nominee_date_of_birth" placeholder="Nominee Date of Birth (As per PAN)" value="<?=$td_user_nominee_details['nominee_date_of_birth'] ?? '';?>"
                                        id="nominee_date_of_birth">
                        </div>
                        <input type="hidden" class="form-control" name="id" value="<?=$td_user_nominee_details['id'] ?? '';?>" placeholder="id" id="id">
                        <div class="mb-3 col-12 col-md-6">
                            <label class="mb-1 fw-semibold" for="name">Relation</label>
                            <input type="text" class="form-control" name="relation" placeholder="Relation" id="relation" value="<?=$td_user_nominee_details['relation'] ?? '';?>">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="mb-1 fw-semibold" for="name">Nominee Aadhar Card Number</label><span id="nominee_aadhar_card_number_tel" style="color:red;"></span>
                            <input type="text" class="form-control" name="nominee_aadhar_card_number" value="<?=$td_user_nominee_details['nominee_aadhar_card_number'] ?? '';?>" placeholder="Nominee Aadhar Card Number"
                                        id="nominee_aadhar_card_number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12">
                        </div>
                        <div class="col-12 text-center mt-5">
                                <button type="submit" name="submit" value="add_nominee" class="btn btn-green">Submit</button>
                        </div>
                    
                    </div>
                </form>
            </div>
        </div>
    </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script>
       $('[data-type="adhaar-number"]').keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
  $(this).val(value);
});

   </script>
   <script type="text/javascript">
	/* multiplication table */
	const d = [
	    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
	    [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
	    [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
	    [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
	    [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
	    [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
	    [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
	    [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
	    [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
	    [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
	]

	/* permutation table */
	const p = [
	    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
	    [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
	    [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
	    [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
	    [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
	    [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
	    [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
	    [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
	]

	/* validates Aadhar number received as string */
	function validate(aadharNumber) {
	    let c = 0
	    let invertedArray = aadharNumber.split('').map(Number).reverse()

	    invertedArray.forEach((val, i) => {
	        c = d[c][p[(i % 8)][val]]
	    })

	    return (c === 0)
	}

	function verify() {
		var message = document.getElementById("message");
		var aadharNo = document.getElementById("exampleInputAadharCard").value;
		if(validate(aadharNo)) {
			message.innerHTML = 'Your aadhar card no. valid';
		} else {
			message.innerHTML = 'Your aadhar card no. not valid';
		}
	}
	
	
	</script>
	<script>
    document.getElementById("profile").classList.add('nav-open');
    document.getElementById("myprofile").classList.add('active');
    document.getElementById("profilemenu").style.display='block';
</script>

<script type="text/javascript">
function filladd(){
if(filltoo.checked == true) {
var address_1 =document.getElementById("curAddressLine1").value;
var address_2 =document.getElementById("curAddressLine2").value;
var city_1 =document.getElementById("curCity").value;
var state_1 =document.getElementById("curState").value;
var zipcode_1 =document.getElementById("curZipcode").value;

var copytal =address_1;
var copydist =address_2;
var copypin =city_1;
var copystate =state_1;
var copyzipcode =zipcode_1;
document.getElementById("pAddressLine1").value = copytal;
document.getElementById("pAddressLine2").value = copydist;
document.getElementById("pCity").value = copypin;
document.getElementById("pState").value = copystate;
document.getElementById("pZipcode").value = copyzipcode;
}else if(filltoo.checked == false){
document.getElementById("pAddressLine1").value='';
document.getElementById("pAddressLine2").value='';
document.getElementById("pCity").value='';
document.getElementById("pState").value='';
document.getElementById("pZipcode").value = '';
}
}

$("#phone1").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#phone_tel").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	});     


$("#curZipcode").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#curZipcode_tel").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	});
	
	$("#pZipcode").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#pZipcode_tel").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	})
	
		$("#nominee_aadhar_card_number").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#nominee_aadhar_card_number_tel").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	})

</script>