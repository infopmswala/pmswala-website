  <!-- Vertical Nav -->
    <div class="kleon-vertical-nav">
        <!-- Logo  -->
        <div class="logo d-flex align-items-center justify-content-between">
            <a href="" class="d-flex align-items-center gap-3 flex-shrink-0">
                <img src="<?=base_url()?>assets/user/assets/img/logobg.png" alt="logo" height="100px">
            </a>
            <button type="button" class="kleon-vertical-nav-toggle"><i class="bi bi-list"></i></button>
        </div>

        <div class="kleon-navmenu">
            <ul class="main-menu">

                <li class="menu-item" id="dashboard">
                    <a href="<?=base_url()?>auth/is_session/user/dashboard/"><span class="nav-icon flex-shrink-0">
                        <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/dashboard.png"/></span> <span
                            class="nav-text">Dashboard</span></a>
                </li>
                <li class="menu-item" id="portfolio">
                    <a href="<?=base_url()?>auth/is_session/user/portfolios/"><span class="nav-icon flex-shrink-0">
                        <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/portfolio.png"/></span> <span
                            class="nav-text">Portfolios</span></a>
                </li>
                <li class="menu-item" id="myportfolio">
                    <a href="<?=base_url()?>auth/is_session/user/portfolios/my_portfolio/"><span class="nav-icon flex-shrink-0">
                        <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/resume.png"/></span> <span
                            class="nav-text">My Portfolios</span></a>
                </li>
                <li class="menu-item" id="transactions">
                    <a href="<?=base_url()?>auth/is_session/user/transaction/"><span class="nav-icon flex-shrink-0">
                        <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/rupee.png"/></span> <span
                            class="nav-text">Transactions</span></a>
                </li>
                 <li class="menu-item" id="withdrawl">
                    <a href="<?=base_url()?>auth/is_session/user/withdrawal_request/"><span class="nav-icon flex-shrink-0">
                        <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/request.png"/></span> <span
                            class="nav-text">Withdrawal</span></a>
                </li>
                <li class="menu-item menu-item-has-children" id="profile">
                    <a href="<?=base_url()?>auth/is_session/user/profile/"><span class="nav-icon flex-shrink-0">
                        <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/user.png"/></span> <span
                            class="nav-text">Profile</span></a>
                    <ul class="sub-menu" id="profilemenu">
                        <li class="menu-item" id="myprofile">
                            <a href="<?=base_url()?>auth/is_session/user/profile/my_profile/">My Profile</a>
                        </li>
                        <li class="menu-item" id="kyc">
                            <a href="<?=base_url()?>auth/is_session/user/profile/kyc/">KYC & Bank Details</a>
                        </li>
                    </ul>
                    <span class='submenu-opener'><i class='bi bi-chevron-right'></i></span>
                </li>
                <li class="menu-item menu-item-has-children" id="setting">
                    <a href=""><span class="nav-icon flex-shrink-0">
                        <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/settings.png"/></span> <span
                            class="nav-text">Settings</span></a>
                    <ul class="sub-menu" id="settingmenu">
                        <!--<li class="menu-item" id="notification">-->
                        <!--    <a href="<?=base_url()?>auth/is_session/user/settings/notification_settings/">Notification Settings</a>-->
                        <!--</li>-->
                        <li class="menu-item" id="password">
                            <a href="<?=base_url()?>auth/is_session/user/settings/chanage_password/">Change Password</a>
                        </li>
                    </ul>
                    <span class='submenu-opener'><i class='bi bi-chevron-right'></i></span>
                </li>
                <li class="menu-item menu-item-has-children" id="support">
                    <a href="<?=base_url()?>auth/is_session/user/support_info/support/"><span class="nav-icon flex-shrink-0">
                        <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/headset.png"/></span> <span
                            class="nav-text">Support</span></a>
                    <ul class="sub-menu" id="supportmenu">
                        <li class="menu-item" id="info">
                            <a href="<?=base_url()?>auth/is_session/user/support_info/support/">Support</a>
                        </li>
                        <li class="menu-item" id="terms">
                            <a href="<?=base_url()?>auth/is_session/user/support_info/terms_and_conditions/">Terms and Conditions</a>
                        </li>
                        <li class="menu-item" id="privacy">
                            <a href="<?=base_url()?>auth/is_session/user/support_info/privacy_policy/">Privacy Policy</a>
                        </li>
                        <li class="menu-item" id="agreement">
                            <a href="<?=base_url()?>auth/is_session/user/support_info/agreement/">Agreement</a>
                        </li>
                        <li class="menu-item" id="faq">
                            <a href="<?=base_url()?>auth/is_session/user/faq/">FAQ</a>
                        </li>
                    </ul>
                    <span class='submenu-opener'><i class='bi bi-chevron-right'></i></span>
                </li>
                <li class="menu-item" id="logout">
                    <a href="<?=base_url()?>logout/"><span class="nav-icon flex-shrink-0">
                            <img width="24" height="24" src="<?=base_url()?>assets/user/assets/img/icons/logout.png"/></span> <span
                            class="nav-text">Logout</span></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Header Modal Search -->
    <div class="modal fade header-search-modal" id="searchModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="search-form"
                        action="https://wpthemebooster.com/demo/themeforest/html/kleon/search.php">
                        <input type="text" name="search" class="keyword form-control w-100" placeholder="Search">
                        <button type="submit" class="btn"><img src="<?=base_url()?>assets/user/assets/img/svg/search.svg" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>