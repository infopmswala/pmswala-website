<main class="main-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
                <div class="col-12 col-lg-12 m-auto">
                    <div class="inner-contents">
                        <div class="row">
                            <div class="page-header align-items-center text-center justify-content-between mr-bottom-30">
                                <div class="">
                                    <h4 class="text-dark text-center fw-semibold bg-lightgreen p-3">Notifications</h4>
                                </div>
                            </div>
                            <?php 
                            if(!empty($td_notifications)){
                            foreach($td_notifications as $key => $val){ ?>
                            <div class="col-12">
                                <div class="card rounded-2 shadow bg-lightgreen">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="bg-lightgreen p-2 rounded-2" style="height:60px">
                                                <img height="40" width="40" src="<?=base_url()?>assets/user/assets/img/icons/message.png">
                                            </div>
                                            <div>
                                                <h6><?=$val['title'];?></h6>
                                                <p class="text-gray"><?=$val['message'];?></p>
                                            </div>
                                            <div class="my-auto">
                                                <p class="fw-semibold"><?php echo Dateconversion($val['created_at']); ?></p>
                                            </div>
                                            <div class="my-auto">
                                                <a href='<?php site_url('auth/is_session/user/Settings/delete/$id');?>' onClick='javascript:return confirm(\"Are you sure to Delete?\")' class="btn btn-red btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php } }else{ ?>
                             <div class="col-12">
                                   <h6 style="text-align: center;color: red;">NO NEW NOTIFICATIONS</h6>
                            </div>
                            <?php } ?>
                            <!--<div class="col-12">-->
                            <!--    <div class="card rounded-2 shadow bg-lightgreen">-->
                            <!--        <div class="card-body">-->
                            <!--            <div class="d-flex justify-content-between">-->
                            <!--                <div class="bg-lightgreen p-2 rounded-2" style="height:60px">-->
                            <!--                    <img height="40" width="40" src="<?=base_url()?>assets/user/assets/img/icons/message.png">-->
                            <!--                </div>-->
                            <!--                <div>-->
                            <!--                    <h6>You have a new message from PMSWala</h6>-->
                            <!--                    <p class="text-gray">Welcome to pmswala</p>-->
                            <!--                </div>-->
                            <!--                <div class="my-auto">-->
                            <!--                    <p class="fw-semibold">09/01/2024</p>-->
                            <!--                </div>-->
                            <!--                <div class="my-auto">-->
                            <!--                    <button class="btn btn-red btn-sm">Delete</button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                                    
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-12">-->
                            <!--    <div class="card rounded-2 shadow bg-lightgreen">-->
                            <!--        <div class="card-body">-->
                            <!--            <div class="d-flex justify-content-between">-->
                            <!--                <div class="bg-lightgreen p-2 rounded-2" style="height:60px">-->
                            <!--                    <img height="40" width="40" src="<?=base_url()?>assets/user/assets/img/icons/message.png">-->
                            <!--                </div>-->
                            <!--                <div>-->
                            <!--                    <h6>You have a new message from PMSWala</h6>-->
                            <!--                    <p class="text-gray">Welcome to pmswala</p>-->
                            <!--                </div>-->
                            <!--                <div class="my-auto">-->
                            <!--                    <p class="fw-semibold">09/01/2024</p>-->
                            <!--                </div>-->
                            <!--                <div class="my-auto">-->
                            <!--                    <button class="btn btn-red btn-sm">Delete</button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                                    
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-12">-->
                            <!--    <div class="card rounded-2 shadow bg-lightgreen">-->
                            <!--        <div class="card-body">-->
                            <!--            <div class="d-flex justify-content-between">-->
                            <!--                <div class="bg-lightgreen p-2 rounded-2" style="height:60px">-->
                            <!--                    <img height="40" width="40" src="<?=base_url()?>assets/user/assets/img/icons/message.png">-->
                            <!--                </div>-->
                            <!--                <div>-->
                            <!--                    <h6>You have a new message from PMSWala</h6>-->
                            <!--                    <p class="text-gray">Welcome to pmswala</p>-->
                            <!--                </div>-->
                            <!--                <div class="my-auto">-->
                            <!--                    <p class="fw-semibold">09/01/2024</p>-->
                            <!--                </div>-->
                            <!--                <div class="my-auto">-->
                            <!--                    <button class="btn btn-red btn-sm">Delete</button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                                    
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.getElementById("setting").classList.add('nav-open');
    document.getElementById("notification").classList.add('active');
    document.getElementById("settingmenu").style.display='block';
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>

function validate(id) {
    swal({
        title: "Are you sure?",
        text: "Are you sure you want to delete this record",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete it!",
        closeOnConfirm: false
    }, function() {
        //swal("Deleted!", "Your record has been deleted successfully.", "success");
        $(location).attr('href',
            '<?php echo base_url()?>auth/is_session/user/settings/notification_settings/delete/' + id);
    });
}
</script>