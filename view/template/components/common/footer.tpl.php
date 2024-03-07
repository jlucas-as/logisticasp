</div>

	<?php if (@$_GET['page'] !== 'admin') { ?>
	<!-- /.content-wrapper -->
    <footer class="bg-black text-inverse">
        <div class="container pt-4 pb-2">
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-3">
                    <div class="widget">
                        <nav class="nav social social-white" <?php if(isMobile()) echo 'style="justify-content:center;"'; ?>>
                            <a href="https://www.instagram.com/agenciaevoclick" target="_blank"><i class="uil uil-instagram"></i></a>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="widget">
                        <p class="mb-0">© <?= date('Y') ?> - <?= NOME_SITE ?>. Todos os direitos reservados.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <p class="mb-0" style="text-align:<?= isMobile() ? 'center' : 'right' ?>;">Feito com <span style="color:red;">❤</span> por <a style="color:green; margin:0" title="Visite nosso site" target="_blank" href="https://evoclick.com.br">EvoClick</a>.</p>
                    </div>
                </div>
            </div>
    </footer>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <a href="<?= WHATSAPP_LINK ?>" target="_blank">
        <img src="<?= IMAGES ?>whats.png" style="position:fixed; bottom:45px; <?= isMobile() ? 'right:-165px' : 'left:15px' ?>; width:256px; z-index:9999;" title="Cotação rápida no WhatsApp" alt="Cotação rápida no WhatsApp">
    </a>
	
	<?php } ?>
	
    <script src="<?= JS ?>popper.min.js"></script>
	<script src="<?= JS ?>bootstrap.min.js"></script>
	<script src="<?= JS ?>plugins.js"></script>
    <script src="<?= JS ?>theme.js"></script>
    <script>
        var mobile = $('header.wrapper').hasClass('mobile');
        slide1();
        
        function slide1() {
            if (mobile) $('section.wrapper.angled.lower-start').css('background-image', `url('<?= url() ?>view/asset/img/slide1.png')`);
            $('img.photoslide').attr('src', `<?= url() ?>view/asset/img/slide1.png`);
            setTimeout("slide2()", 5000);
        }
        function slide2() {
            if (mobile) $('section.wrapper.angled.lower-start').css('background-image', `url('<?= url() ?>view/asset/img/slide2.png')`);
            $('img.photoslide').attr('src', `<?= url() ?>view/asset/img/slide2.png`);
            setTimeout("slide3()", 5000);
        }
        function slide3() {
            if (mobile) $('section.wrapper.angled.lower-start').css('background-image', `url('<?= url() ?>view/asset/img/logistica-sobre-nos.jpg')`);
            $('img.photoslide').attr('src', `<?= url() ?>view/asset/img/logistica-sobre-nos.jpg`);
            setTimeout("slide1()", 5000);
        }
    </script>
</body>
</html>
