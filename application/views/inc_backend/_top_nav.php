<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <a href="<?=base_url()?>auth/is_session/dashboard/">
                        <img src="<?=base_url()?>assets/backend/images/logo.png" class="logo-icon"
                            alt="<?=get_compnay_title()?>">
                    </a>
                </div>
                <div>
                    <!--<h4 class="logo-text"><?=get_compnay_title()?></h4>-->
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-first-page bx-color'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="<?=base_url()?>auth/is_session/dashboard/">
                        <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="lni lni-world"></i>
                        </div>
                        <div class="menu-title">Website</div>
                    </a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Home Pages</a>
                            <ul>
                            <li> <a href="<?=base_url()?>auth/is_session/banner/list_banner/index/3561/"><i class="bx bx-right-arrow-alt"></i>Home Banner</a></li>
                            <li> <a href="<?=base_url()?>auth/is_session/var_section/"><i class="bx bx-right-arrow-alt"></i>Banner Content</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/product/"><i class="bx bx-right-arrow-alt"></i>Product List</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/pages/"><i class="bx bx-right-arrow-alt"></i>Why PMSwala</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/pages/journey/"><i class="bx bx-right-arrow-alt"></i>Our Journey</a></li>
                                <li> <a href="<?=base_url()?>auth/is_session/pages/certificate/"><i class="bx bx-right-arrow-alt"></i>Certificates</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Invest Pages</a>
                            <ul>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/invest/"><i class="bx bx-right-arrow-alt"></i>Long-Term Gain Strategy</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/invest/investment/"><i class="bx bx-right-arrow-alt"></i>Investment Option</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/invest/companies/"><i class="bx bx-right-arrow-alt"></i>Companies</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>About/plans Pages</a>
                            <ul>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/about/"><i
                                            class="bx bx-right-arrow-alt"></i>Road Map</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/about/innerpage/"><i
                                            class="bx bx-right-arrow-alt"></i>Inner Section</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/testimonial/testimonial_list/3539/"><i
                                            class="bx bx-right-arrow-alt"></i>Clients Says</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/faqs/faqs_list/6714/"><i
                                            class="bx bx-right-arrow-alt"></i>Got Questions</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/about/plans/"><i
                                            class="bx bx-right-arrow-alt"></i>Plans</a></li>
                            </ul>
                        </li>
                    </ul>


                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Useful Links</a>
                            <ul>
                                <!--<li> <a-->
                                <!--        href="<?=base_url();?>auth/is_session/information/edit_information/index?jwt_token=<?php echo encrypt_decrypt(1, 'encrypt')?>"><i-->
                                <!--            class="bx bx-right-arrow-alt"></i>Privacy Policy</a></li>-->
                                <!--<li> <a-->
                                <!--        href="<?=base_url();?>auth/is_session/information/edit_information/index?jwt_token=<?php echo encrypt_decrypt(4, 'encrypt')?>"><i-->
                                <!--            class="bx bx-right-arrow-alt"></i>Terms & Conditions</a></li>-->
                                <li> <a
                                        href="<?=base_url();?>auth/is_session/information/edit_information/index?jwt_token=<?php echo encrypt_decrypt(6, 'encrypt')?>"><i
                                            class="bx bx-right-arrow-alt"></i>User Terms & Conditions</a></li>
                                <li> <a
                                        href="<?=base_url();?>auth/is_session/information/edit_information/index?jwt_token=<?php echo encrypt_decrypt(7, 'encrypt')?>"><i
                                            class="bx bx-right-arrow-alt"></i>User Privacy Policy</a></li>
                                <li> <a
                                        href="<?=base_url();?>auth/is_session/information/edit_information/index?jwt_token=<?php echo encrypt_decrypt(8, 'encrypt')?>"><i
                                            class="bx bx-right-arrow-alt"></i>User Agreement</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul><li> <a href="<?=base_url()?>auth/is_session/social_settings/list_social/"><i class="bx bx-right-arrow-alt"></i>Social Link</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>auth/is_session/seo/list_seo/">
                        <div class="parent-icon"><i class='lni lni-seo'></i>
                        </div>
                        <div class="menu-title">SEO Pages</div>
                    </a>
                </li>
                <?php
                    if(!empty(get_type_modules('contact_us'))){
                ?>
                <li>
                    <a href="<?=base_url()?>auth/is_session/user_response/contact_list/">
                        <div class="parent-icon"><i class='bx bxs-message-rounded-dots'></i>
                        </div>
                        <div class="menu-title"><?=get_type_modules('contact_us')?></div>
                    </a>
                </li><?php } ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cog'></i>
                        </div>
                        <div class="menu-title">Settings</div>
                    </a>
                    <ul>
                        <li> <a href="<?=base_url()?>auth/is_session/settings/general_settings/"><i
                                    class="bx bx-globe"></i>General Settings</a>
                        </li>
                        <li> <a href="<?=base_url()?>auth/is_session/settings/smtp_settings/"><i
                                    class='bx bx-envelope'></i>SMTP Settings</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-menu"></i>
                        </div>
                        <div class="menu-title">User Dashboard</div>
                    </a>
                    <ul>
                        <li> <a href="<?=base_url();?>auth/is_session/portfolio/portfolio_list/9163/"><i class="bx bx-right-arrow-alt"></i>Portfolios</a>
                        </li>
                    </ul>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Investor Info</a>
                            <ul>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/users_info/user_list/"><i class="bx bx-right-arrow-alt"></i>Users Details</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/users_info/user_payment_info/"><i class="bx bx-right-arrow-alt"></i>Users Payment Info</a></li>
                                <li> <a
                                        href="<?=base_url()?>auth/is_session/users_info/user_withdrawal_request/"><i class="bx bx-right-arrow-alt"></i>Withdrawal Request</a></li>
                                <li> <a href="<?=base_url()?>auth/is_session/users_info/user_help_support/"><i class="bx bx-right-arrow-alt"></i>Users Help & Support</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Support</a>
                            <ul>
                                <li> <a
                                        href="<?=base_url();?>auth/is_session/information/edit_information/index?jwt_token=<?php echo encrypt_decrypt(6, 'encrypt')?>"><i
                                            class="bx bx-right-arrow-alt"></i>Terms and Conditions</a></li>
                                <li> <a
                                        href="<?=base_url();?>auth/is_session/information/edit_information/index?jwt_token=<?php echo encrypt_decrypt(7, 'encrypt')?>"><i
                                            class="bx bx-right-arrow-alt"></i>Privacy Policy</a></li>
                                <li> <a
                                        href="<?=base_url();?>auth/is_session/information/edit_information/index?jwt_token=<?php echo encrypt_decrypt(8, 'encrypt')?>"><i
                                            class="bx bx-right-arrow-alt"></i>Agreement</a></li>
                                <li> <a href="<?=base_url();?>auth/is_session/faqs/faqs_list/5136/"><i
                                            class="bx bx-right-arrow-alt"></i>FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li> <a href="<?=base_url();?>auth/is_session/var_section/update_content/"><i class="bx bx-right-arrow-alt"></i>Withdrawal Request Text</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url()?>auth/log_session/logout/">
                        <div class="parent-icon"><i class='bx bx-power-off'></i>
                        </div>
                        <div class="menu-title">Logout</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>