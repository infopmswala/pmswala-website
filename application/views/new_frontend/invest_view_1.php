<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/animate.min.css">
<style>
    .service-block-two .inner-box {
    transition: all 0.4s ease;
}

.service-block-two:hover .inner-box {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}
.service-block-two .inner-box:before {
    top:0px !important;
}

service-block-two .inner-box .lower-box {
    position: relative;
    margin-top: -25px;
    padding-top: 15px;
    padding-left: 0px !important; 
}

.service-block-two .inner-box .lower-box .box-inner {
    position: relative;
    padding: 30px 10px 0px 0px !important;
}
</style>

<main class="main">

    <!-- Breadcrumb -->
    <div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/contact.jpg)">
        <div class="container">
            <div class="site-breadcrumb-wpr">
                <h2 class="breadcrumb-title">Products / Offering</h2>
                <ul class="breadcrumb-menu clearfix">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li class="active">Products</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Intro Section -->
    <div class="team-area de-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-success">PMSWALA – India’s Best Platform for Alternate Investment Products</h2>
                    <p class="mt-3">
                        Build wealth with <strong>PMSWALA</strong>.  
                        We offer curated alternative assets designed for stable & high returns,
                        diversification, and long-term growth.
                    </p>
                    <p>
                        Explore real, tangible assets that generate predictable cash flows,
                        offer lower volatility, and help diversify your portfolio.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Cards -->
    <div class="team-area">
        <div class="container">
            <h2 class="text-center mb-5">Explore Our Products / Offerings</h2>

            <div class="row">

                <!-- Fractional Real Estate -->
                <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="<?=base_url()?>fractional-real-estate.jpg" alt="" style="padding-top: 13%;">
                        </div>
                        <div class="lower-box">
                            <div class="box-inner text-center">
                                <h5>Fractional Real Estate</h5>
                                <p>
                                    Own a share of premium commercial properties and earn rental
                                    income plus capital appreciation.
                                </p>
                                <ul class="text-start">
                                    <li>Grade A Commercial Offices</li>
                                    <li>Warehouses & Logistics Parks</li>
                                    <li>Bank Auction Properties</li>
                                    <li>Co-working Hubs</li>
                                </ul>
                                <p><strong>Minimum Investment:</strong> From ₹10 Lakhs</p>
                                <p><strong>Returns:</strong> Rental Income + Capital Gains</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Invoice Discounting -->
                <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="<?=base_url()?>invoice-discounting.jpg" alt="" style="padding-top: 13%;">
                        </div>
                        <div class="lower-box">
                            <div class="box-inner text-center">
                                <h5>Invoice Discounting</h5>
                                <p><strong>Short Term | High Return</strong></p>
                                <p>
                                    Fund short-term working capital needs of vetted vendors
                                    and earn attractive returns in 30–150 days.
                                </p>
                                <ul class="text-start">
                                    <li>14–16% Annualized Returns</li>
                                    <li>30–150 Days Tenure</li>
                                    <li>High Liquidity</li>
                                    <li>Credit Risk Vetted</li>
                                    <li>PMSWALA Guarantee Fund</li>
                                </ul>
                                <p><strong>Minimum Investment:</strong> ₹20,000</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alternate Assets -->
                <div class="service-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="inner-box">
                        <div class="image">
                            <img src="<?=base_url()?>alternate-assets.jpg" alt="">
                        </div>
                        <div class="lower-box">
                            <div class="box-inner text-center">
                                <h5>Alternate Assets</h5>
                                <p>
                                    Diversify your portfolio with a wide range of alternate
                                    investment opportunities.
                                </p>
                                <ul class="text-start">
                                    <li><strong>Bonds:</strong> Corporate, Bank & NBFC bonds</li>
                                    <li><strong>Asset Leasing:</strong> Cars, machinery, equipment</li>
                                    <li><strong>Co-Partnership:</strong> Profit-linked investments</li>
                                    <li><strong>Renewable Energy:</strong> Solar, Wind & Hydro</li>
                                    <li><strong>Real Estate Funds:</strong> High-growth properties</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Closing Section -->
    <div class="team-area de-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-success">
                        Build & Diversify Your Alternate Investment Portfolio with PMSWALA
                    </h2>
                    <p class="mt-3">
                        PMSWALA offers tailor-made investment solutions to help you achieve
                        your financial goals with confidence, stability, and transparency.
                    </p>
                </div>
            </div>
        </div>
    </div>

</main>
<script src="<?=base_url()?>assets/frontend/js/wow.min.js"></script>

<script>
    new WOW().init();
</script>
