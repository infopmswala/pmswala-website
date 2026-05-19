<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon and touch Icons -->
    <link href="<?=base_url()?>assets/user/assets/img/favicon.png" rel="shortcut icon" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Page Title -->
    <title>PMSWala Dashboard</title>

    <!-- Styles Include -->
    <link rel="stylesheet" href="<?=base_url()?>assets/user/assets/css/main.css" id="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="" class="w-100 text-start">
                    <img src="<?=base_url()?>assets/user/assets/img/logobg.png" alt="img" class="logo">
                </a>
            </div>
        </div>
        <!-- Login Form -->
        <div class="row align-items-center m-auto mt-5 mb-5">
            <div class="col-xl-5 col-md-6">
                <div class="card rounded-2 border-0 p-3 m-0">
                    <div class="card-body p-0 ">
                        <form class="form-horizontal" method="post">
                            <h3>Two Step Verification</h3>
                            <p class="fs-14 text-dark my-4">We've sent you an SMS with a 4-digit verification code on +91 <?php echo maskPhoneNumber($this->session->userdata('verify_user_phone'));?>.
                            </p>
                            <div class="form-group">
                                <label class="form-label text-dark">Enter your 4 digits security
                                    code</label>
                                <div class="d-flex align-items-center justify-content-center gap-2 flex-nowrap">
                                    <input type="text" name="one_value" class="form-control border"  required style="border-color: #179c49 !important;"  id="digit-1" data-next="digit-2" maxlength="1">
                                    <input type="text" name="two_value" class="form-control border" placeholder="" required style="border-color: #179c49 !important;"  id="digit-2" data-next="digit-3" data-previous="digit-1" maxlength="1">
                                    <input type="text" name="three_value" class="form-control border"  required style="border-color: #179c49 !important;"  id="digit-3" data-next="digit-4" data-previous="digit-2" maxlength="1">
                                    <input type="text" name="four_value" class="form-control border"  required style="border-color: #179c49 !important;"  id="digit-4" data-previous="digit-3" maxlength="1">
                                </div>
                            </div>
                            <div class="m-auto text-center">
                                <button  type="submit" name="submit" value="user_verify_otp" class="btn btn-success w-100 m-auto text-center text-uppercase text-white rounded-2 ff-heading fw-bold shadow">Verify Number</button>
                            </div>
                            <p class="mt-4 mb-0 text-center"><a href="<?=base_url()?>login/resend_otp/" class="text-primary fw-bold text-decoration-underline">Didn't receive the OTP?</a></p>
                               
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-5 m-auto">
                <div class="bg-soft-success shadow rounded-2 p-4 pe-0">
                    <h3 class="text-green mb-5 text-center">Wise investment for wealth creation</h3>
                    <img src="<?=base_url()?>assets/user/assets/img/clients/verification.png" class="verificationbg">
                </div>
            </div>
        </div>
    </div>
 <!-- Core JS -->
    <script src="<?=base_url()?>assets/user/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url()?>assets/user/assets/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery UI Kit -->
    <script src="<?=base_url()?>assets/user/plugins/jquery_ui/jquery-ui.1.12.1.min.js"></script>

    <!-- ApexChart -->
    <script src="<?=base_url()?>assets/user/plugins/apexchart/apexcharts.min.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/apexchart/apexchart-inits/apexcharts-analytics-2.js"></script>

    <!-- Peity  -->
    <script src="<?=base_url()?>assets/user/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/peity/piety-init.js"></script>

    <!-- Select 2 -->
    <script src="<?=base_url()?>assets/user/plugins/select2/js/select2.min.js"></script>

    <!-- Datatables -->
    <script src="<?=base_url()?>assets/user/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/datatables/js/datatables.init.js"></script>

    <!-- Date Picker -->
    <script src="<?=base_url()?>assets/user/plugins/flatpickr/flatpickr.min.js"></script>

    <!-- Dropzone -->
    <script src="<?=base_url()?>assets/user/plugins/dropzone/dropzone.min.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/dropzone/dropzone_custom.js"></script>

    <!-- TinyMCE -->
    <script src="<?=base_url()?>assets/user/plugins/tinymce/tinymce.min.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/prism/prism.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/jquery-repeater/jquery.repeater.js"></script>

    <!-- Sweet Alert -->
    <script src="<?=base_url()?>assets/user/plugins/sweetalert/sweetalert2.min.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/sweetalert/sweetalert2-init.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/nicescroll/jquery.nicescroll.min.js"></script>

    <!-- Snippets JS -->
    <script src="<?=base_url()?>assets/user/assets/js/snippets.js"></script>

    <!-- Theme Custom JS -->
    <script src="<?=base_url()?>assets/user/assets/js/theme.js"></script>
<script>
 $('.form-horizontal').find('input').each(function() {
	$(this).attr('maxlength', 1);
	$(this).on('keyup', function(e) {
		var parent = $($(this).parent());
		
		if(e.keyCode === 8 || e.keyCode === 37) {
			var prev = parent.find('input#' + $(this).data('previous'));
			
			if(prev.length) {
				$(prev).select();
			}
		} else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
			var next = parent.find('input#' + $(this).data('next'));
			
			if(next.length) {
				$(next).select();
				$(this).attr('maxlength', 1);
			} else {
				if(parent.data('autosubmit')) {
					parent.submit();
				}
			}
		}
	});
});
</script>

<script>
$(document).ready(function(){
    $('#digit-4').on('input', function(){
        var inputValue = $(this).val();
        var maxLength = 1; // Set the maximum length

        if(inputValue.length > maxLength){
            $(this).val(inputValue.slice(0, maxLength)); // Trim the value if it exceeds the limit
        }
    });
});

$(document).ready(function(){
    $('#digit-3').on('input', function(){
        var inputValue = $(this).val();
        var maxLength = 1; // Set the maximum length

        if(inputValue.length > maxLength){
            $(this).val(inputValue.slice(0, maxLength)); // Trim the value if it exceeds the limit
        }
    });
});

$(document).ready(function(){
    $('#digit-2').on('input', function(){
        var inputValue = $(this).val();
        var maxLength = 1; // Set the maximum length

        if(inputValue.length > maxLength){
            $(this).val(inputValue.slice(0, maxLength)); // Trim the value if it exceeds the limit
        }
    });
});

$(document).ready(function(){
    $('#digit-1').on('input', function(){
        var inputValue = $(this).val();
        var maxLength = 1; // Set the maximum length

        if(inputValue.length > maxLength){
            $(this).val(inputValue.slice(0, maxLength)); // Trim the value if it exceeds the limit
        }
    });
});

	$("#digit-1").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#phone_tel").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
		$("#digit-2").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#phone_tel").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
		$("#digit-3").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#phone_tel").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
		$("#digit-4").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#phone_tel").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript">
<?php 
$message = $this->session->flashdata('success');

if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success');
    $this->session->unset_userdata('success');
    ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); 
     $this->session->unset_userdata('error');
     ?>");
  
<?php } ?>
</script>
<style>
    .bg-soft-green{
        background: rgba( 45, 160, 77, 0.1 );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 2px );
        -webkit-backdrop-filter: blur( 2px );
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
    }
    .verificationbg{
        height:500px;
        width:100%;
    }
    @media(max-width:1300px){
        .verificationbg{
            height:350px;
            width:100%;
        }
    }
    @media(max-width:991px){
        .verificationbg{
            height:250px;
            width:100%;
        }
         .loginimage{
            height:250px;
        }  
        .logo{
            height:100px;
        }
    }
    .logo{
        height:150px;
    }
</style>
</body>

</html>