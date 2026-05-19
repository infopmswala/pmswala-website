<link href="<?=base_url()?>assets/backend/plugins/highcharts/css/highcharts.css" rel="stylesheet" />

<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-4">
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total User</p>
                                <h5 class="mb-0 text-white"><?php echo $this->db->get('td_users')->num_rows(); ?>
                                </h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-cart font-30'></i>
                            </div>
                        </div>
                        <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 46%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-gradient-burning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Active User</p>
                                <h5 class="mb-0 text-white"><?php echo $this->db->where('status',1)->get('td_users')->num_rows(); ?>
                                </h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-wallet font-30'></i>
                            </div>
                        </div>
                        <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 72%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Inactive User</p>
                                <h5 class="mb-0 text-white"><?php echo $this->db->where('status',0)->get('td_users')->num_rows(); ?></h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-bulb font-30'></i>
                            </div>
                        </div>
                        <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 68%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-gradient-moonlit">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Contact Us</p>
                                <h5 class="mb-0 text-white"><?php echo $this->db->get('td_contact_us')->num_rows(); ?>
                                </h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-chat font-30'></i>
                            </div>
                        </div>
                        <div class="progress  bg-white-2 radius-10 mt-4" style="height:4.5px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 66%"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

       
        
        
    </div>
</div>
