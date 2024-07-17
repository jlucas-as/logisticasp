<section id="serviços" class="wrapper bg-light" <?php if(isMobile()) echo 'style="margin-top:-155px;"'; ?>>
    <div class="container pt-8 <?= !isMobile() ? 'pb-11' : 'pb-3' ?>">
        <div class="row">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <h2 class="fs-16 text-uppercase text-line text-primary mb-3">O QUE NÓS FAZEMOS?</h2>
                <h3 class="display-4 mb-9" <?php if(isMobile()) echo 'style="font-size:24px;"'; ?>>Serviços projetados para atender às suas necessidades.</h3>
            </div>
        </div>
        <div class="row gx-md-8 gy-8 <?= !isMobile() ? 'mb-8' : 'mb-0' ?> mb-sm-5">
            <div class="col-md-6 col-6 col-lg-3">
                <img class="w-100 rounded mb-4" src="<?= url('view/asset/img/armazenamento.webp') ?>" alt="Armazenamento">
                <h4>Armazenamento</h4>
                <p class="mb-3">Temos um galpão amplo e espaçoso para armazenarmos as cargas dos nossos clientes</p>
                <a target="_blank" href="<?= link_zap_info('armazenamento') ?>">Saiba mais</a>
            </div>
            <div class="col-md-6 col-6 col-lg-3">
                <img class="w-100 rounded mb-4" src="<?= url('view/asset/img/carga-e-descarga.webp') ?>" alt="Carga e Descarga">
                <h4>Carga e Descarga</h4>
                <p class="mb-3">Nós descarregamos e carregamos os veículos sempre cuidando para não danificar a sua carga</p>
                <a target="_blank" href="<?= link_zap_info('carga e descarga') ?>">Saiba mais</a>
            </div>
            <div class="col-md-6 col-6 col-lg-3">
                <img class="w-100 rounded mb-4" src="<?= url('view/asset/img/movimentacao-de-carga.webp') ?>" alt="Movimentação de Carga">
                <h4>Movimentação de Carga</h4>
                <p class="mb-3">Organizamos veículos de acordo com entregas, remontagem de veículo</p>
                <a target="_blank" href="<?= link_zap_info('movimentação de carga') ?>">Saiba mais</a>
            </div>
            <div class="col-md-6 col-6 col-lg-3">
                <img class="w-100 rounded mb-4" src="<?= url('view/asset/img/paletizacao.webp') ?>" alt="Paletização">
                <h4>Paletização</h4>
                <p class="mb-3">Organizamos a carga em paletes, de acordo com a necessidade de nossos clientes</p>
                <a target="_blank" href="<?= link_zap_info('paletização') ?>">Saiba mais</a>
            </div>
            <div class="col-md-6 col-6 col-lg-3">
                <img class="w-100 rounded mb-4" src="<?= url('view/asset/img/transbordo-de-cargas.webp') ?>" alt="Transbordo de carga">
                <h4>Transbordo de cargas</h4>
                <p class="mb-3">Transferência de uma carga que está alocada em um meio de transporte para outro</p>
                <a target="_blank" href="<?= link_zap_info('transbordo de carga') ?>">Saiba mais</a>
            </div>
            <div class="col-md-6 col-6 col-lg-3">
                <img src="<?= url('view/asset/img/coletas-e-distribuicao-de-cargas.webp') ?>" alt="Coletas e Distribuição das cargas">
                <h4>Coletas e Distribuição das cargas</h4>
                <p class="mb-3">Realizamos o serviço de coletar e entregar sua carga que estiver conosco até o destinatário</p>
                <a target="_blank" href="<?= link_zap_info('coleta e distribuição das cargas') ?>">Saiba mais</a>
            </div>
            <div class="col-md-6 col-6 col-lg-3">
                <img class="w-100 rounded mb-4" src="<?= url('view/asset/img/aluguel-de-container.webp') ?>" alt="Aluguel de Container">
                <h4>Aluguel de Container</h4>
                <p class="mb-3">Temos balança com capacidade de 2.500 Kg. Pode ser pesada a carga com palete junto</p>
                <a target="_blank" href="<?= link_zap_info('aluguel de container') ?>">Saiba mais</a>
            </div>
        </div>
    </div>
</section>
