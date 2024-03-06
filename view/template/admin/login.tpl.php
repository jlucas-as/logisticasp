<?php include VIEW .'components/common/head.tpl.php'; ?>

<div class="sidenav">
    <div class="login-main-text">
        <img src="<?= IMAGES ?>viaslog.png" style="width:256px; margin-bottom:36px;">
        <h2>Administração Login</h2>
        <p>Faça login para acessar a area administrativa do site.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form method="post">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" placeholder="Seu email" name="user" style="color:#495057;">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" placeholder="Sua senha" name="pass" style="color:#495057;">
                </div>
				
				<div class="form-group mt-3">
					<input type="submit" name="login" value="Entrar no sistema" class="btn btn-orange">
					<a href="https://viaslog.com.br/" class="btn btn-secondary">Voltar ao site</a>
				</div>
            </form>
        </div>
    </div>
</div>

<?php include VIEW .'components/common/footer.tpl.php'; ?>
