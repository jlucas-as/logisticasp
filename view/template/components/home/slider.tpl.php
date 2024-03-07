<section class="wrapper angled lower-start" style="background-image:url('<?= url('view/asset/img/hero-logisticasp.webp') ?>'); background-size:cover; background-position:center; top:<?= isMobile() ? '-150px' : '-85px' ?>; padding-top:100px;">
    <div class="container pt-7 pt-md-11 <?php if (!isMobile()) echo 'pb-8'; ?>">
        <div class="row gx-0 gy-10 align-items-center">
            <div class="col-lg-6" data-cues="slideInDown" data-group="page-title" data-delay="600">
                <h1 class="display-1 text-white mb-4" style="background-color: rgb(255 192 0 / 80%); padding:5px 7.5px; border-radius:10px; <?php if (isMobile()) echo 'margin-top:30px;'; ?>">O melhor da logistica é com a <span style="color:#0076a3; font-weight:900;"><?= NOME_SITE ?></span></h1>
            </div>

            <?php if (!isMobile()) { ?>
            <div class="col-lg-5 offset-lg-1 mb-n18" data-cues="slideInDown">
                <div class="position-relative">
                    <figure>
                        <img src="<?= url('view/asset/img/slide1.png') ?>" alt="<?= $title ?>" class="photoslide" style="border:6px solid #fefefe;border-radius: 1.6rem;">
                    </figure>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>