<header class="wrapper" style="background-color:#efc900;">
    <nav class="navbar navbar-expand-lg center-nav transparent navbar-dark">
        <div class="container flex-lg-row flex-nowrap align-items-center" style="
    background: rgb(255 255 255 / 85%);
    padding: 5px;
    border-radius: 10px;
">
            <div class="navbar-brand w-100">
                <a href="<?= ROOT ?>">
                    <img class="logo-dark" src="<?= IMAGES ?>logotipo.png" width="150" alt="<?= $title ?>" />
                    <img class="logo-light" src="<?= IMAGES ?>logotipo.png" width="250" alt="<?= $title ?>" />
                </a>
            </div>
            <div class="navbar-collapse offcanvas-nav">
                <div class="offcanvas-header d-lg-none d-xl-none">
                    <a href="#!"><img class="logo-dark" src="<?= IMAGES ?>logotipo.png" width="151" alt="<?= $title ?>" /></a>
                    <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
                </div>
                <ul class="navbar-nav" style="background-color:#fefefe; border-radius:10px;">
                    <li class="nav-item"><a class="nav-link" style="padding:15px; color:#252525;" href="<?= ROOT ?>">Página inicial</a></li>
                    <li class="nav-item"><a class="nav-link" style="padding:15px; color:#252525;" href="#serviços">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" style="padding:15px; color:#252525;" href="#sobre-nos">Sobre nós</a></li>
                    <li class="nav-item"><a class="nav-link" style="padding:15px; color:#252525;" href="#contato">Contato</a></li>
                </ul>
            </div>
            <?php if (isMobile()) { ?>
            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
                    <li class="nav-item d-lg-none">
                        <div class="navbar-hamburger"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </nav>
</header>
