
<style>
    .check {
        display: block;
        margin: 0;
        padding: 0;
        width: 0;
        height: 0;
        visibility: hidden;
        opacity: 0;
        pointer-events: none;
        position: absolute;
    }

    .checktoggle {
        background-color:
            #e0001a;
        border-radius: 12px;
        cursor: pointer;
        display: block;
        font-size: 0;
        height: 24px;
        margin-bottom: 0;
        position: relative;
        width: 48px;
    }

    .checktoggle::after {
        content: ' ';
        display: block;
        position: absolute;
        top: 50%;
        left: 0;
        transform: translate(5px, -50%);
        width: 16px;
        height: 16px;
        background-color:
            #fff;
        border-radius: 50%;
        transition: left 300ms ease, transform 300ms ease;
    }

    .check:checked+.checktoggle {
        background-color:
            #55ce63;
    }

    .checktoggle {

        cursor: pointer;
        font-size: 0;

    }

    .check:checked+.checktoggle::after {
        left: 100%;
        transform: translate(calc(-100% - 5px), -50%);
    }
</style>
<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © 2023 <a class="bx-color" href="https://pmswala.com/" target="_blank"><?=$td_settings[0]->title?></a>   |   All Rights Reserved   |   Developed By <a class="bx-color" href="https://royalitpark.com/" target="_blank">Royal IT Park</a> .</p>
</footer>
</div>
<!--end wrapper-->
<!--start switcher-->
 <script>        
 CKEDITOR.replace( 'editor' );
           </script>
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="<?=base_url()?>assets/backend/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?=base_url()?>assets/backend/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/backend/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?=base_url()?>assets/backend/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?=base_url()?>assets/backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?=base_url()?>assets/backend/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=base_url()?>assets/backend/plugins/notifications/js/notifications.min.js"></script>
<script src="<?=base_url()?>assets/backend/plugins/notifications/js/notification-custom-script.js"></script>
<script src="<?=base_url()?>assets/backend/plugins/highcharts/js/highcharts.js"></script>
<script src="<?=base_url()?>assets/backend/js/index4.js"></script>
<!--app JS-->
<script src="<?=base_url()?>assets/backend/js/app.js"></script>
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

</body>

</html>