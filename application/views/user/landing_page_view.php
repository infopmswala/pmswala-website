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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Page Title -->
    <title>PMSWala Dashboard</title>
    <!-- Styles Include -->
    <link rel="stylesheet" href="<?=base_url()?>assets/user/assets/css/main.css" id="stylesheet">

</head>
<body>

    <!-- Login Form -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                 <a href="" class="w-100 d-inline-block mb-5">
                    <img src="<?=base_url()?>assets/user/assets/img/logobg.png" alt="img" class="logo">
                </a>
            </div>
        </div>
        <div class="row mt-3 g-3 m-auto">
            <div class="col-md-5 m-auto order2">
                <div class="owl-carousel owl-theme login-carousel w-100">
                    
                    <div class="item p-1">
                        <div class=" rounded-2 border p-3">
                            <h3 class="text-center mb-3 mt-3">Achieve superior returns</h3>
                            <img src="<?=base_url()?>assets/user/assets/img/clients/login-2.png" class="rounded-2 w-100 loginimage">
                        </div>
                    </div>
                    <div class="item p-1">
                        <div class=" rounded-2 border p-3">
                            <h3 class="text-center mb-3 mt-3">Personalize your investments</h3>
                            <img src="<?=base_url()?>assets/user/assets/img/clients/login-3.png" class="rounded-2 w-100 loginimage">
                        </div>
                    </div>
                    <div class="item p-1">
                        <div class=" rounded-2 border p-3">
                            <h3 class="text-center mb-3 mt-3">Build a diversified portfolio</h3>
                            <img src="<?=base_url()?>assets/user/assets/img/login1.png" class="rounded-2 w-100 loginimage">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 h-100 m-auto order1">
               
                <div class="container">
                    <h2 class="text-green text-center">Discover an exciting</h2>
                    <h3 class="mt-3 text-center">method of investing</h3>
                    <div class="m-auto text-center mt-5">
                        <button onclick="location.href = '<?=base_url()?>login/';" type="submit" 
                        class="btn btn-outline-success text-dark text-uppercase rounded-2 ff-heading fw-bold shadow me-md-2 mb-4 mt-3 w-65 w-sm-100">
                            <div class="d-flex text-center m-auto justify-content-center">
                                <img src="<?=base_url()?>assets/user/assets/img/icons/verification.png" width="38" height="38" class="me-3">
                                <span class=" my-auto">Login With Otp</span>
                            </div>
                             </button>
                        <button onclick="location.href = '<?=base_url()?>login/login_password/';" type="submit" 
                        class="btn btn-outline-success text-dark text-uppercase rounded-2 ff-heading fw-bold shadow w-65 w-sm-100">
                            <div class="d-flex text-center m-auto justify-content-center">
                             <img src="<?=base_url()?>assets/user/assets/img/icons/password.png" width="38" height="38" class="me-3">
                             <span class="my-auto">Login With Password</span>
                            </div>     
                        </button>
                    </div>
                    <p class="mt-5 text-muted">Pmswala, registered as Parihar investments advisors private limited. regesterd investment advisor with license number </p>
                    <p class="text-muted">By continuing, you agree to the <a href="">Terms & Conditions</a> and <a href="">Privacy Policy</a> of PMSWala</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" 
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Snippets JS -->
    <script src="<?=base_url()?>assets/user/assets/js/snippets.js"></script>

    <!-- Theme Custom JS -->
    <script src="<?=base_url()?>assets/user/assets/js/theme.js"></script>


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

$('.login-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
</script>
<style>
    .input-group-text{
        border:0.0625rem solid #e1e1e1 !important;
    }
    .owl-theme .owl-dots, .owl-theme .owl-nav {
        margin-top:10px;
        text-align: center;
        -webkit-tap-highlight-color: transparent;
    }
    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
        background: #869791;
    }
    .owl-theme .owl-dots .owl-dot span {
        width: 10px;
        height: 10px;
        margin: 5px 7px;
        background: #D6D6D6;
        display: block;
        -webkit-backface-visibility: visible;
        transition: opacity .2s ease;
        border-radius: 30px;
    }
    .logo{
        height:150px;
    }
    .loginimage{
        height:450px;
    }
    @media(max-width:991px){
         .loginimage{
            height:300px;
        }  
        .order1{
            order:1;
        }
        .order2{
            order:2;
        }
        .logo{
            height:100px;
        }
    }
    @media(max-width:1300px){
         .loginimage{
            height:300px;
        }  
    }
    
</style>
</body>

</html>