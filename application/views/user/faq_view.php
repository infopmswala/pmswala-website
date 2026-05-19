<main class="main-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
                <div class="col-12 col-lg-10 m-auto">
                    <div class="inner-contents">
                        <div class="row">
                            <div class="page-header align-items-center text-center justify-content-between mr-bottom-30">
                                <div class="">
                                    <h4 class="bg-lightgreen p-3 text-center">FAQ's</h4>
                                </div>
                            </div>
                            <div class="card shadow rounded-2">
                                <div class="card-body">
                                    <div class="accordion" id="accordionExample">
                                        <?php foreach($td_faqs as $key => $val){ ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$val['id'];?>"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                   <?=$val['question'];?>
                                                </button>
                                            </h2>
                                            <div id="collapse<?=$val['id'];?>" class="accordion-collapse collapse <?php if($key == 0){ echo 'show';}?>" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?=$val['answer'];?>
                                                </div>
                                            </div>
                                        </div>
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
</main>
<script>
    document.getElementById("support").classList.add('nav-open');
    document.getElementById("faq").classList.add('active');
    document.getElementById("supportmenu").style.display='block';
</script>