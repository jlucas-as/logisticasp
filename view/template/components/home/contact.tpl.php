<section id="contato" class="wrapper bg-light angled upper-end">
    <div class="container <?php if (!isMobile()) echo 'pb-8'; ?>">
        <div class="row <?= !isMobile() ? 'mb-10' : 'mb-4' ?>">
            <div class="col-xl-10 mx-auto" style="margin-top:-10rem;">
                <div class="card">
                    <h2 class="display-7 <?= !isMobile() ? 'mb-3' : 'mb-0' ?> text-center <?= !isMobile() ? 'pt-8' : 'pt-4' ?>">Deixe-nos uma mensagem</h2>
                    <div class="row gx-0">
                        <?php if (!isMobile()) { ?>
                        <div class="col-lg-7 align-self-stretch">
                            <div class="p-8">
                                <form method="post" action="/email/enviar">
                                    <div class="messages"></div>
                                    <div class="row gx-4">
                                        <div class="col-12">
                                            <div class="form-floating mb-4">
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Jane" required="">
                                                <label for="form_name">Seu nome *</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating mb-4">
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="jane.doe@example.com" required="">
                                                <label for="form_email">Seu e-mail *</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating mb-4">
                                                <input id="form_tel" type="tel" name="tel" class="form-control" placeholder="(xx) xxxx-xxxx">
                                                <label for="form_tel">Seu telefone</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-4">
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Sua mensagem" style="height: 150px" required=""></textarea>
                                                <label for="form_message">Mensagem *</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <input type="submit" class="btn btn-primary rounded-pill btn-send mt-3" value="Enviar mensagem">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-lg-5">
                            <div class="<?= !isMobile() ? 'p-8' : 'p-4' ?>">
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                                    </div>
                                    <div class="align-self-start justify-content-start">
                                        <h5 class="mb-1">Endereço</h5>
                                        <address><?= !isMobile() ? ADDRESS_TEXT : str_replace('<br>', '-', ADDRESS_TEXT) ?></address>
                                    </div>
                                </div>
                                <!--/div -->
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Telefones</h5>
                                        <p>
                                            <a href="<?= WHATSAPP_LINK ?>" class="link-body"><?= WHATSAPP_TEXT ?> <i class="uil uil-whatsapp"></i></a><br>
                                            <a href="<?= PHONE_LINK ?>" class="link-body"><?= PHONE_TEXT ?></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">E-mail</h5>
                                        <p class="mb-0"><a href="<?= EMAIL_LINK ?>" class="link-body"><?= EMAIL_TEXT ?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>