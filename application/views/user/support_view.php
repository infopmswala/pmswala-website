    <main class="main-wrapper">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 col-lg-10 m-auto">
                    <div class="inner-contents">
                        <div class="row">
                            <div class="col-12 col-md-9 m-auto">
                                <div class="row">
                                    <div class="col-12">
                                            <div class="text-center m-auto justify-content-center">
                                                <h3 class="text-center">Help & Support</h3>
                                            </div>
                                    </div>
                                </div>
                                <form class="mt-5" action="<?=base_url()?>auth/is_session/user/profile/help_and_support/" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="ac">Title</label>
                                                <input type="text" class="form-control" placeholder="Enter Your Issue Title" name="title" id="title" required>
                                            </div>
                                        </div>
                                         <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="ac">Description</label>
                                                <textarea type="text" class="form-control" placeholder="Enter Your Issue Description" name="description" id="description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="ac">Email</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="mb-1" for="branch">Screenshot</label>
                                                <input type="file" class="form-control" placeholder="Screenshot" id="screenshot" name="screenshort" required>
                                            </div>
                                            <p class="text-danger">Note: Please upload this formate only <b>jpg , png ,jpeg</b></p>
                                        </div>
                                    </div>
                                    <div class="text-center m-auto mt-3">
                                        <button class="btn btn-green" type="submit" name="submit" value="add_help_support">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 page-header d-flex align-items-center justify-content-between mr-bottom-30">
                <div class="text-center m-auto">
                    <h3 class="text-center">List of Help & Support</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-9 m-auto">
                    <div class="row gy-1">
                        
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Ticket Id</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Email</th>
                              <th scope="col">Screenshot</th>
                              <th scope="col">Status</th>
                              <th scope="col">Comment</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php foreach($td_help_and_support as $key => $val){ 
                             if($val->user_id == $this->session->userdata('user_id')){
                             ?> 
                            <tr>
                              <th scope="row"><?= $start; ?></th>
                              <td><?=$val->ticket_id;?></td>
                              <td><?=$val->title;?></td>
                              <?php if(strlen($val->description)<=40){ ?>
                                <td><?=$val->description ?></td>
                                <?php }else{ ?>
                                <td><?= substr($val->description,0,40)?>...<a  href="#" data-bs-toggle="modal" data-bs-target="#read_more<?=$val->id?>">Read More</a></td>
                                <?php } ?>
                              <td><?=$val->email;?></td>
                              <td><a  href="#" data-bs-toggle="modal" data-bs-target="#screenshort_read_more<?=$val->id?>"><img src="<?=base_url()?><?=$val->screenshort;?>" style="width: 74px;height: 55px;"></a></td>
                              <?php if($val->status == 'Pending'){ ?>
                              <td><span class="text-yellow" style="font-weight: bold;"><?=$val->status;?></td>
                              <?php }elseif($val->status == ''){ ?>
                              <td><span class="text-green" style="font-weight: bold;"><?=$val->status;?></td>
                              <?php }else{ ?>
                              <td><span class="text-green" style="font-weight: bold;"><?=$val->status;?></td>
                              <?php } ?>
                              <?php if(strlen($val->message)<=40){ ?>
                                <td><?=$val->message ?></td>
                                <?php }else{ ?>
                                <td><?= substr($val->message,0,40)?>...<a  href="#" data-bs-toggle="modal" data-bs-target="#comment_read_more<?=$val->id?>">Read More</a></td>
                                <?php } ?>
                            </tr>
                            <div class="modal fade" id="read_more<?=$val->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p style="width: 465px;color:Gray;white-space:normal;font-size:14px;"><?=$val->description?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal fade" id="comment_read_more<?=$val->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p style="width: 465px;color:Gray;white-space:normal;font-size:14px;"><?=$val->message?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="modal fade" id="screenshort_read_more<?=$val->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <img src="<?=base_url()?><?=$val->screenshort;?>">
                                     <a href="<?=base_url()?><?=$val->screenshort;?>" class="btn text-light btn-green btn-sm" style="margin-top: 31px;" download>Screenshort Download</a>
                        
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php 
                            $start++;
                            } } ?>
                          </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
                    </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
    document.getElementById("support").classList.add('nav-open');
    document.getElementById("info").classList.add('active');
    document.getElementById("supportmenu").style.display='block';
</script>