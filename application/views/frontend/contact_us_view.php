	<main class="main">
        
		<!-- Start Breadcrumb
		============================================= -->
		<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/contact.jpg)">
			<div class="container">
				<div class="site-breadcrumb-wpr">
					<h2 class="breadcrumb-title">Contact Us</h2>
					<ul class="breadcrumb-menu clearfix">
						<li><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Contact Us</li>
					</ul>
				</div>
			</div>
		</div>
        <!-- End Breadcrumb -->
        
      	<!-- Start Contact us
		============================================= -->
		<div class="contact-area de-padding">
			<div class="container">
				<div class="contact-wpr">
					<div class="row g-5">
						<div class="col-xl-4">
							<div class="contact-sdebar">
								<div class="contact-up-title">
									<h2 class="heading-1">
										Get in Touch
									</h2>
									<p class="mb-0">
										Lorem ipsum is simply free text available dolor sit amet, consectetur notted adipisicing.
									</p>
								</div>
								<div class="addr-home">
									<div class="addr-box">
										<div class="addr-box-single">
											<div class="addr-icon">
												<i class="icofont-google-map"></i>
											</div>
											<div class="addr-desc">
												<h5>Location</h5>
												<p class="mb-0">
												<?=$td_settings['address'];?>
												</p>
											</div>
										</div>
										<div class="addr-box-single">
											<div class="addr-icon">
												<i class="icofont-phone"></i>
											</div>
											<div class="addr-desc">
												<h5>Make a Call</h5>
												<a href="tel:<?=$td_settings['phone'];?>"><?=$td_settings['phone'];?></a>
											</div>
										</div>
										<div class="addr-box-single">
											<div class="addr-icon">
												<i class="icofont-email"></i>
											</div>
											<div class="addr-desc">
												<h5>Our Email</h5>
											    <a href="mailto:<?=$td_settings['email'];?>"><?=$td_settings['email'];?></a>
											    <a href="mailto:<?=$td_settings['email_two'];?>"><?=$td_settings['email_two'];?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="contact-home pl-30">
							    <?php echo form_open("home/save", array("id" => "form-contact", "class" => "contact-form contact-cnt")) ?>
									<div class="contact-form-title mb-30">
									    <div id="the-message"></div>
										<h2 class="heading-1">
											Send us a message
										</h2>
									</div>
									<div class="row">
										<div class="col-xl-6">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control input-style-2" id="name" name="name" placeholder="Your Full Name*">
													<span class="alert alert-error" id="error-name"></span>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="email" class="form-control input-style-2" id="email" name="email" placeholder="Your Email Address*">
													<span class="alert alert-error" id="error-email"></span>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control input-style-2" id="phone_no" name="phone_no" placeholder="Phone Number">
													<span class="alert alert-error" id="error-phone_no"></span>
												</div>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="col-md-12">
												<textarea class="form-control input-style-2" id="message1" name="message1" placeholder="Your Message..."></textarea>
												<span class="alert alert-error" id="error-message1"></span>
												<!-- Alert Message -->
												
											</div>
										</div>
									</div>
									<div class="sub-btn d-flex align-items-center justify-content-between">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="terms_agreement" id="terms_agreement" value="1">
											<label class="form-check-label" for="flexCheckDefault">
												I agree to the <span>Terms &amp; Conditions</span> 
											</label>
										</div>
									<span class="alert alert-error" id="error-terms_agreement"></span>
										<div class="contact-sub-btn">
											<button type="submit" class="btn-submit">
												Send Message...
											</button>
											 <div class="success1" id='mail_success1'>Thankyou for contating us, our team will get in touch with you shortly</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Contact us -->
		
		<!-- Start Google Map
		============================================= -->
		<div class="g-map-area">
			<div class="g-map--wrapper text-center">
			<iframe src="<?=$td_settings['about'];?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
		<!-- End Google Map -->
		
	</main>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

	 <script>

  $('#form-contact').submit(function(e) {
    e.preventDefault();
    var me = $(this);
    // perform ajax
    alert("test");
    $.ajax({
      url: 'home/save',
      type: 'post',
      data: me.serialize(),
      dataType: 'json',
      success: function(response) {
        if (response.success == true) {
          // if success we would show message
          // and also remove the error class
          $('#the-message').append('<div class="alert alert-success">' +

            '<span class="glyphicon glyphicon-ok"></span>' +

         'Thankyou for contacting us, our team will get in touch with you shortly'   +

            '</div>');

          $('.form-group').removeClass('has-error')

            .removeClass('has-success');

          $('.text-danger').remove();

          // reset the form

          me[0].reset();

          // close the message after seconds

          $('.alert-success').delay(500).show(10, function() {

            $(this).delay(3000).hide(10, function() {

              $(this).remove();

            });

          })

        } else {

          $.each(response.messages, function(key, value) {

            var element = $('#error-' + key);

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

   <script>

      $(document).ready(function() {
          $("#phone_no").keypress(function(e) {
              if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  $("#tell").html("Digits Only").show().fadeOut("slow");
                  return false;
              }

          });
      });

  </script>

  <style>

      .red1 {
          color: red;
      }



      .success1 {
          border: 2px solid #5cb85c;
          color: #5cb85c;
          display: none;
          font-weight: bold;
          margin-bottom: 20px;
          padding: 10px;
          margin-top: 15px;
          float: left;

      }

  </style>
	