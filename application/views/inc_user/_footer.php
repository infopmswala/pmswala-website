
    <!-- Core JS -->
    

    <script src="<?=base_url()?>assets/user/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url()?>assets/user/assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <!-- jQuery UI Kit -->
    <script src="<?=base_url()?>assets/user/plugins/jquery_ui/jquery-ui.1.12.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
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
$("#phone").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#phone1").html("Digits Only").show().fadeOut("slow");
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
<script>


 
 
   
//     $(document).ready(function(){
//              var investamount = $('#investamount').val();
//              var investment = $('#investment').val();
//              var interest = ;
//              var payout =$("input[type='radio']:checked").val();
//              $.ajax({
//                 type: "POST",
//                 url: '<?=base_url()?>auth/is_session/user/portfolios/get_investment_details/',
//                 data: {'investamount': investamount, 'investment': investment, 'payout': payout, 'interest': interest}
//             }).done(function (data) {
//                 var val=JSON.parse(data);
//                 $("#interest_earning").append(val.interest_earning);
//                 $("#total_earning").append(val.total_earning);
//                 $("#interest").append(val.interest);
//                 $("#years").append(val.investment);
//                 $("#payouts").append(val.payout);
//                 $("#get_invest_amount").append(val.invest_amount);
//             });

// });

    $("#investment").ionRangeSlider({
        type: "single",
        min: 1,
        max: 5,
        from: 5,
        to: 5,
        grid: true
    });
    $("#interest").ionRangeSlider({
        type: "single",
        min: 11,
        max: 12.5,
        from: 11,
        to: 12.5,
        grid: false
    });
    
</script>

    


</body>

</html>