<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Info</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">

                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$td_users['name'];?></li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                   <div class="card">
							<div class="card-body">
								<ul class="nav nav-tabs nav-primary" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#kyc_details" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><ion-icon name="home-sharp" class="me-1"></ion-icon>
												</div>
												<div class="tab-title">Kyc Details</div>
											</div>
										</a>
									</li>
										<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#user_details" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
												</div>
												<div class="tab-title">User Details</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#bank_details" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><ion-icon name="person-sharp" class="me-1"></ion-icon>
												</div>
												<div class="tab-title">Bank Details</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#nominee_details" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
												</div>
												<div class="tab-title">Nominee Details</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#user_portfolio" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
												</div>
												<div class="tab-title">Purchased Portfolio </div>
											</div>
										</a>
									</li>
									
								</ul>
								<div class="tab-content py-3">
									<div class="tab-pane fade show active" id="kyc_details" role="tabpanel">
									    <?php if(!empty($td_user_kyc_details['pan_front_side'])){ ?>
                                     <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Pan Card Number</th>
                                              <th scope="col">Pan Card Front Side</th>
                                              <th scope="col">Pan Card Back Side</th>
                                              <th scope="col">Approval</th>
                                              <th scope="col">Edit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th><?=$td_user_kyc_details['pan_number'];?></th>
                                              <td><a href="" data-bs-toggle="modal" data-bs-target="#pan_card_front_number"><img src="<?=base_url()?><?=$td_user_kyc_details['pan_front_side'];?>" style="height: 143px;border-radius: 10px;"></a></td>
                                              <td><a href="" data-bs-toggle="modal" data-bs-target="#pan_card_back_number"><img src="<?=base_url()?><?=$td_user_kyc_details['pan_back_side'];?>" style="height: 143px;border-radius: 10px;"></a></td>
                                               <td>
                                                  <?php if($td_user_kyc_details['pan_status'] == 0){ ?>
                                                  <a type="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pan_kyc_replay">Status</a>
                                                  <?php }else{ ?>
                                                  <p style="color: green;font-size: 15px;">Accepted</p>
                                                  <?php } ?>
                                               </td>
                                               <td><div class="d-flex order-actions">
                                                <a href="<?=base_url()?>auth/is_session/users_info/edit_pan_card_list_view/?jwt_token=<?=$_GET['jwt_token'];?><?=$td_user_kyc_details['id'];?>/" class=""><i class="bx bxs-edit" style="font-size: 25px;color: #008000;"></i></a>
                                                </div>
                                               </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <?php }else{ ?>
                                        <p style="text-align: center;color: red;font-weight: bold;">No Pan Card Details</p>
                                        <?php } ?>
                                        <?php if(!empty($td_user_kyc_details['aadhar_front_side'])){ ?>
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Aadhar Card Number</th>
                                              <th scope="col">Aadhar Card Front Side</th>
                                              <th scope="col">Aadhar Card Back Side</th>
                                              <th scope="col">Approval</th>
                                              <th scope="col">Edit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th><?=$td_user_kyc_details['aadhar_number'];?></th>
                                              <td><a href="" data-bs-toggle="modal" data-bs-target="#aadhar_card_front_number"><img src="<?=base_url()?><?=$td_user_kyc_details['aadhar_front_side'];?>" style="height: 143px;border-radius: 10px;"></a></td>
                                              <td><a href="" data-bs-toggle="modal" data-bs-target="#aadhar_card_back_number"><img src="<?=base_url()?><?=$td_user_kyc_details['aadhar_back_side'];?>" style="height: 143px;border-radius: 10px;"></a></td>
                                               <td>
                                                  <?php if($td_user_kyc_details['aadhar_status'] == 0){ ?>
                                                  <a type="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aadhar_kyc_replay">Reply</a>
                                                  <?php }else{ ?>
                                                  <p style="color: green;font-size: 15px;">Accepted</p>
                                                  <?php } ?>
                                               </td>
                                               <td><div class="d-flex order-actions">
                                                <a href="<?=base_url()?>auth/is_session/users_info/edit_aadhar_card_list_view/?jwt_token=<?=$_GET['jwt_token'];?><?=$td_user_kyc_details['id'];?>/" class=""><i class="bx bxs-edit" style="font-size: 25px;color: #008000;"></i></a>
                                                </div>
                                               </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <?php }else{ ?>
                                        <p style="text-align: center;color: red;font-weight: bold;">No Aadhar Card Details</p>
                                        <?php } ?>
                                        <?php if(!empty($td_user_kyc_details['date_of_birth'])){ ?>
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Date Of Birth</th>
                                               <th scope="col">Edit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th><?=date("d-m-Y", strtotime($td_user_kyc_details['date_of_birth']));?></th>
                                             <td><div class="d-flex order-actions">
                                                <a href="<?=base_url()?>auth/is_session/users_info/edit_date_of_birth_list_view/?jwt_token=<?=$_GET['jwt_token'];?>&id=<?=$td_user_kyc_details['id'];?>/" class=""><i class="bx bxs-edit" style="font-size: 25px;color: #008000;"></i></a>
                                                </div>
                                               </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <?php }else{ ?>
                                        <p style="text-align: center;color: red;font-weight: bold;">No Date Of Birth Details</p>
                                        <?php } ?>
                					</div>
                				    <div class="tab-pane fade" id="bank_details" role="tabpanel">
                				        <?php if(!empty($td_user_bank_details)){?>
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Bank & Branch Name</th>
                                              <th scope="col">Account Number</th>
                                              <th scope="col">Account Holder Name</th>
                                              <th scope="col">IFSC Code</th>
                                              <th scope="col">Approval</th>
                                              <th scope="col">Edit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th><?=$td_user_bank_details['bank_name']?></th>
                                              <td><?=$td_user_bank_details['ac_number']?></td>
                                              <td><?=$td_user_bank_details['ac_name']?></td>
                                              <td><?=$td_user_bank_details['ifsc']?></td>
                                                 <td>
                                                  <?php if($td_user_bank_details['approval_status'] == 0){ ?>
                                                  <a type="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bank_replay">Reply</a>
                                                  <?php }else{ ?>
                                                  <p style="color: green;font-size: 15px;">Accepted</p>
                                                  <?php } ?>
                                               </td>
                                               <td><div class="d-flex order-actions">
                                                <a href="<?=base_url()?>auth/is_session/users_info/edit_bank_details_list_view/?jwt_token=<?=$_GET['jwt_token'];?><?=$td_user_kyc_details['id'];?>/" class=""><i class="bx bxs-edit" style="font-size: 25px;color: #008000;"></i></a>
                                                </div>
                                               </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <?php }else{ ?>
                                         <p style="text-align: center;color: red;font-weight: bold;">No Bank Details</p>
                                        <?php } ?>
                        					</div>
                        			<div class="tab-pane fade" id="nominee_details" role="tabpanel">
                        			    <?php if(!empty($td_user_nominee_details)){?>
        									<table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Name</th>
                                              <th scope="col">Date of Birth</th>
                                              <th scope="col">Relation</th>
                                              <th scope="col">Aadhar Card Number</th>
                                              <th scope="col">Approval</th>
                                              <th scope="col">Edit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th><?=$td_user_nominee_details['nominee_name']?></th>
                                              <td><?=$td_user_nominee_details['nominee_date_of_birth']?></td>
                                              <td><?=$td_user_nominee_details['relation']?></td>
                                              <td><?=$td_user_nominee_details['nominee_aadhar_card_number']?></td>
                                               <td>
                                                  <?php if($td_user_nominee_details['approval_status'] == 0){ ?>
                                                  <a type="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nomineee_replay">Reply</a>
                                                  <?php }else{ ?>
                                                  <p style="color: green;font-size: 15px;">Accepted</p>
                                                  <?php } ?>
                                               </td>
                                               <td><div class="d-flex order-actions">
                                                <a href="<?=base_url()?>auth/is_session/users_info/edit_nominee_list_view/?jwt_token=<?=$_GET['jwt_token'];?><?=$td_user_kyc_details['id'];?>/" class=""><i class="bx bxs-edit" style="font-size: 25px;color: #008000;"></i></a>
                                                </div>
                                               </td>
                                            </tr>
                                          </tbody>
                                          
                                        </table>
                                        <?php }else{ ?>
                                        <p style="text-align: center;color: red;font-weight: bold;">No Nominee Details</p>
                                        <?php } ?>
									</div>
									
									
									<div class="tab-pane fade" id="user_portfolio" role="tabpanel">
									    <div class="row">
									        <?php foreach($td_payment_transactions as $key => $row){ ?>
									        <div class="col-12 col-md-6">
                                                <div class="card border-0 shadow rounded">
                                                    <div class="card-body gap-2 gap-lg-5">
                                                        <div class="row text-center align-items-center">
                                                            <div class="col-12 col-md-3">
                                                                <img src="<?=base_url()?><?=$row['portfolio_image'];?>" height="100px" width="100%">
                                                            </div>
                                                            <div class="col-12 col-md-5 m-auto text-center">
                                                                <h5 class="text-green"><?=$row['title_1'];?></h5>
                                                                 <h6><?=$row['title_2'];?></h6>
                                                            </div>
                                                            <div class="col-12 col-md-4 m-auto">
                                                                <button onclick="viewDetailsFunction<?=$row['id'];?>()" type="button" class="btn btn-info rounded btn-sm text-white mt-3">View Details</button>
                                                            </div>
                                                        </div>
                                                        <div class="bg-green p-2 p-xxl-1 rounded-2 mt-1 text-center align-items-center">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <p class="text-white mb-1">Investment:</p>
                                                                    <span class="text-white"><?=$row['investment'];?></span>
                                                                </div>
                                                                <div class="col-4">
                                                                    <p class="text-white mb-1">Period:</p>
                                                                    <span class="text-white"><?=$row['period'];?></span>
                                                                </div>
                                                                <div class="col-4">
                                                                    <p class="text-white mb-1">Payout:</p>
                                                                    <span class="text-white"><?=$row['payout'];?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3" id="viewDetails<?=$row['id'];?>" style="display:none;">
                                                            <div class="col-12">
                                									<table class="table text-nowrap border">
                                                                      <tbody>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Transaction Id</th>
                                                                            <td class="border border-gray border-opacity-50"><?=$row['transaction_id']?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Portfolio Name</th>
                                                                            <td class="border border-gray border-opacity-50"><?=$row['title_1']?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Amount</th>
                                                                            <td class="border border-gray border-opacity-50">₹ <?=$row['payment_amount']?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Years</th>
                                                                            <td class="border border-gray border-opacity-50"><?=$row['pay_period'];?> Year(s)</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Interest</th>
                                                                            <td class="border border-gray border-opacity-50"><?=$row['pay_interest'];?> %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Pay Mode</th>
                                                                            <td class="border border-gray border-opacity-50"><?=$row['pay_mode'];?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Earnings</th>
                                                                            <td class="border border-gray border-opacity-50">₹ <?=$row['sub_earnings'];?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Maturity Amount</th>
                                                                            <td class="border border-gray border-opacity-50">₹ <?=$row['maturity_amount'];?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="col" class="border w-50 border-gray border-opacity-50">Maturity Date</th>
                                                                            <td class="border border-gray border-opacity-50"><?=$row['maturity_date'];?></td>
                                                                        </tr>
                                                                       
                                                                      </tbody>
                                                                    </table>
                                                            </div>
                                                            <div class="col-12 text-center m-auto">
                                                                <button class="btn-danger btn-sm" type="button" onclick="btnclose<?=$row['id'];?>()">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <script>
                                            function viewDetailsFunction<?=$row['id'];?>() {
                                              var htmlShow = document.getElementById("viewDetails<?=$row['id'];?>");
                                              if (htmlShow.style.display === "none") {
                                                htmlShow.style.display = "block";
                                              } else {
                                                htmlShow.style.display = "none";
                                              }
                                            }
                                            function btnclose<?=$row['id'];?>(){
                                                var htmlShow = document.getElementById("viewDetails<?=$row['id'];?>");
                                                if (htmlShow.style.display === "block") {
                                                    htmlShow.style.display = "none";
                                                }
                                            }
                                            </script>
                                            <?php } ?>
									    </div>
                        			    
									</div>
									
								  <div class="tab-pane fade" id="user_details" role="tabpanel">
                				        <?php if(!empty($td_users)){?>
                                          
                                          
                                          <table class="table table-bordered mt-3">
                                            
                                              <tbody>
                                                <tr>
                                                  <th scope="row">Full Name (As per PAN)</th>
                                                
                                                  <td><?=$td_users['name']?></td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Phone Number</th>
                                                 
                                                  <td><?=$td_users['phone']?></td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Date of Birth (As per PAN) </th>
                                               
                                                  <td><?=$td_users['date_of_birth']?></td>
                                                </tr>
                                                  <tr>
                                                  <th scope="row">Email ID </th>
                                               
                                                 <td><?=$td_users['email']?></td>
                                                </tr>
                                                  <tr>
                                                  <th scope="row">Current Address Line 1: </th>
                                               
                                                  <td><?=$td_users['c_address_1']?></td>
                                                </tr>
                                                  <tr>
                                                  <th scope="row">Current Address Line 2:</th>
                                               
                                                <td><?=$td_users['c_address_2']?></td>
                                                </tr>
                                                 <tr>
                                                  <th scope="row">Current City:</th>
                                               
                                                <td><?=$td_users['c_city']?></td>
                                                </tr>
                                                 <tr>
                                                  <th scope="row">Current State:</th>
                                               
                                                  <td><?=$td_users['c_state']?></td>
                                                </tr>
                                                 <tr>
                                                  <th scope="row">Current Zip:</th>
                                               
                                                 <td><?=$td_users['c_zip']?></td>
                                                </tr>
                                                   <tr>
                                                  <th scope="row">Permanent  Address Line 1: </th>
                                               
                                                  <td><?=$td_users['p_address_1']?></td>
                                                </tr>
                                                  <tr>
                                                  <th scope="row">Permanent Address Line 2:</th>
                                                <td><?=$td_users['p_address_2']?></td>
                                                </tr>
                                                   <tr>
                                                  <th scope="row">Permanent City:</th>
                                               <td><?=$td_users['p_city']?></td>
                                                </tr>
                                                 <tr>
                                                  <th scope="row">Permanent State:</th>
                                               <td><?=$td_users['p_state']?></td>
                                                </tr>
                                                 <tr>
                                                  <th scope="row">Permanent Zip:</th>
                                              <td><?=$td_users['p_zip']?></td>
                                                </tr>
                                              </tbody>
                                            </table>
                				        
                				        
                				        
                                        <!--<table class="table">-->
                                        <!--  <thead>-->
                                        <!--    <tr>-->
                                        <!--      <th scope="col">Full Name</th>-->
                                        <!--      <th scope="col">Email</th>-->
                                        <!--      <th scope="col">Mobile Number</th>-->
                                        <!--      <th scope="col">Edit</th>-->
                                        <!--    </tr>-->
                                        <!--  </thead>-->
                                        <!--  <tbody>-->
                                        <!--    <tr>-->
                                        <!--      <th><?=$td_users['name']?></th>-->
                                        <!--      <td><?=$td_users['email']?></td>-->
                                        <!--      <td><?=$td_users['phone']?></td>-->
                                             
                                               
                                               <!--<td><div class="d-flex order-actions">-->
                                               <!-- <a href="<?=base_url()?>auth/is_session/users_info/edit_bank_details_list_view/?jwt_token=<?=$_GET['jwt_token'];?><?=$td_user_kyc_details['id'];?>/" class=""><i class="bx bxs-edit" style="font-size: 25px;color: #008000;"></i></a>-->
                                               <!-- </div>-->
                                               <!--</td>-->
                                        <!--    </tr>-->
                                        <!--  </tbody>-->
                                        <!--</table>-->
                                        <?php }else{ ?>
                                         <p style="text-align: center;color: red;font-weight: bold;">No Bank Details</p>
                                        <?php } ?>
                        					</div>
								</div>
							</div>
						</div>
                </div>
                
                
                
            </div>
        </div>


    </div>
</div>

<div class="modal fade" id="pan_kyc_replay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pan Card Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form class="row g-3" action="<?=base_url()?>auth/is_session/users_info/kyc_pan_status/" method="post" enctype="multipart/form-data">
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Status:</label>
                                            <select class="form-control" name="status" required>
                                            <option value="">Select</option>
                                            <option value="accepted" <?php if($td_user_kyc_details['pan_status']== 1) echo 'selected="selected"'; ?>>Accepted</option>
                                            <option value="rejected" <?php if($td_user_kyc_details['pan_status']== 0) echo 'selected="selected"'; ?>>Rejected</option>
                                            </select>
                                          </div>
                                          <input type="hidden" class="form-control" name="user_id" value="<?php echo $td_user_kyc_details['user_id'];?>">
                                          <input type="hidden" class="form-control" name="id" value="<?php echo $td_user_kyc_details['id'];?>">
                                          <button type="submit" name="update" value="kyc_pan_status" class="btn btn-primary px-5">Submit</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <div class="modal fade" id="aadhar_kyc_replay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aadhar Card Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form class="row g-3" action="<?=base_url()?>auth/is_session/users_info/kyc_aadhar_status/" method="post" enctype="multipart/form-data">
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Status:</label>
                                            <select class="form-control" name="status" required>
                                            <option value="">Select</option>
                                            <option value="accepted" <?php if($td_user_kyc_details['aadhar_status']== 1) echo 'selected="selected"'; ?>>Accepted</option>
                                            <option value="rejected" <?php if($td_user_kyc_details['aadhar_status']== 0) echo 'selected="selected"'; ?>>Rejected</option>
                                            </select>
                                          </div>
                                          <input type="hidden" class="form-control" name="user_id" value="<?php echo $td_user_kyc_details['user_id'];?>">
                                          <input type="hidden" class="form-control" name="id" value="<?php echo $td_user_kyc_details['id'];?>">
                                          <button type="submit" name="update" value="kyc_aadhar_status" class="btn btn-primary px-5">Submit</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                            <div class="modal fade" id="bank_replay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bank Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form class="row g-3" action="<?=base_url()?>auth/is_session/users_info/bank_status/" method="post" enctype="multipart/form-data">
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Status:</label>
                                            <select class="form-control" name="status" required>
                                            <option value="">Select</option>
                                            <option value="accepted" <?php if($td_user_bank_details['approval_status']== 1) echo 'selected="selected"'; ?>>Accepted</option>
                                            <option value="rejected" <?php if($td_user_bank_details['approval_status']== 0) echo 'selected="selected"'; ?>>Rejected</option>
                                            </select>
                                          </div>
                                          <input type="hidden" class="form-control" name="user_id" value="<?php echo $td_user_bank_details['user_id'];?>">
                                          <input type="hidden" class="form-control" name="id" value="<?php echo $td_user_bank_details['id'];?>">
                                          <button type="submit" name="update" value="bank_status" class="btn btn-primary px-5">Submit</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <div class="modal fade" id="nomineee_replay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nominee Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form class="row g-3" action="<?=base_url()?>auth/is_session/users_info/nominee_status/" method="post" enctype="multipart/form-data">
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Status:</label>
                                            <select class="form-control" name="status" required>
                                            <option value="">Select</option>
                                            <option value="accepted" <?php if($td_user_nominee_details['approval_status']== 1) echo 'selected="selected"'; ?>>Accepted</option>
                                            <option value="rejected" <?php if($td_user_nominee_details['approval_status']== 0) echo 'selected="selected"'; ?>>Rejected</option>
                                            </select>
                                          </div>
                                          <input type="hidden" class="form-control" name="user_id" value="<?php echo $td_user_nominee_details['user_id'];?>">
                                          <input type="hidden" class="form-control" name="id" value="<?php echo $td_user_nominee_details['id'];?>">
                                          <button type="submit" name="update" value="nominee_status" class="btn btn-primary px-5">Submit</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <div class="modal fade" id="nomineee_image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nominee Id Proof	</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                       <img src="<?=base_url()?><?=$td_user_nominee_details['nominee_id_proof']?>" style="width: 475px;">
                                       <a href="<?=base_url()?><?=$td_user_nominee_details['nominee_id_proof']?>" value="nominee_status" class="btn btn-primary" download>Download</a>
                                      </div>
                                      
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                
                                <div class="modal fade" id="pan_card_front_number" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pan Card Front Side Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <img src="<?=base_url()?><?=$td_user_kyc_details['pan_front_side'];?>" style="height: 143px;border-radius: 10px;"></a>
                                        <a href="<?=base_url()?><?=$td_user_kyc_details['pan_front_side']?>" value="nominee_status" class="btn btn-primary" download>Download</a>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                 <div class="modal fade" id="pan_card_back_number" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pan Card Back Side Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <img src="<?=base_url()?><?=$td_user_kyc_details['pan_back_side'];?>" style="height: 143px;border-radius: 10px;"></a>
                                        <a href="<?=base_url()?><?=$td_user_kyc_details['pan_back_side']?>" value="nominee_status" class="btn btn-primary" download>Download</a>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <div class="modal fade" id="aadhar_card_front_number" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aadhar Card Front Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <img src="<?=base_url()?><?=$td_user_kyc_details['aadhar_front_side'];?>" style="height: 143px;border-radius: 10px;"></a>
                                        <a href="<?=base_url()?><?=$td_user_kyc_details['aadhar_front_side']?>" value="nominee_status" class="btn btn-primary" download>Download</a>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <div class="modal fade" id="aadhar_card_back_number" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aadhar Card Back Side Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <img src="<?=base_url()?><?=$td_user_kyc_details['aadhar_back_side'];?>" style="height: 143px;border-radius: 10px;"></a>
                                        <a href="<?=base_url()?><?=$td_user_kyc_details['aadhar_back_side']?>" value="nominee_status" class="btn btn-primary" download>Download</a>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
<style>
    .bg-green{
        background-color:#179c49;
    }
    .text-green{
        color:#179c49;
    }
</style>