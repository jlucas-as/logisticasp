<section class="wrapper angled lower-start" style="background-image:url('<?= url('view/asset/img/hero-logisticasp.webp') ?>'); background-size:cover; background-position:center; top:<?= isMobile() ? '-128px' : '-85px' ?>; padding-top:100px;">
    <div class="container pt-7 pt-md-11 pb-8">
        <div class="row gx-0 gy-10 align-items-center">
            <div class="col-lg-6" data-cues="slideInDown" data-group="page-title" data-delay="600">
                <h1 class="display-1 text-white mb-4" style="background-color: rgb(255 192 0 / 80%); padding: 5px 7.5px; border-radius: 10px;">O melhor da logistica é com a <span style="color:#0076a3; font-weight:900; <?php if (isMobile()) echo 'background-color:#fff; padding:0px 5px 3px; border-radius:5px;'; ?>"><?= NOME_SITE ?></span></h1>
            </div>

            <div class="col-lg-5 offset-lg-1 mb-n18" data-cues="slideInDown">
                <div class="position-relative">
                    <figure>
                        <img src="<?= url('view/asset/img/slide1.png') ?>" alt="<?= $title ?>" class="photoslide" style="border:6px solid #fefefe;border-radius: 1.6rem;">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    slide1();
    function slide1() {
        $('img.photoslide').attr('src', `<?= url() ?>view/asset/img/slide1.png`);
        setTimeout("slide2()", 5000);
    }
    function slide2() {
        $('img.photoslide').attr('src', `<?= url() ?>view/asset/img/slide2.png`);
        setTimeout("slide3()", 5000);
    }
    function slide3() {
        $('img.photoslide').attr('src', `<?= url() ?>view/asset/img/logistica-sobre-nos.jpg`);
        setTimeout("slide1()", 5000);
    }
</script>