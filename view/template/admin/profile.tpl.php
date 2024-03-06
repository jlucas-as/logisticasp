<?php include VIEW .'common/head.tpl.php'; ?>
<?php include VIEW .'admin/navbar.tpl.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" id="formProfile" name="formProfile">
                            <input type="hidden" name="action" id="action" value="edit">
                            <input type="hidden" name="id" value="<?= $profile->id ?>">
                            <div class="form-group row">
                                <label class="col-md-2">Nome</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" value="<?= $_SESSION['login']['name'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">E-mail</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" name="email" value="<?= $_SESSION['login']['email'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">Senha</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" name="pass">
                                    <small class="smallpass text-danger">S贸 digitar se deseja alterar a senha deste usu谩rio</small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" form="formProfile" class="btn btn-warning"><i class="fa fa-save"></i> Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    $('#formProfile').submit(function(e) {
        e.preventDefault();
        $.post('/admin/perfil', $('#formProfile').serialize(), 'json')
        .done((response) => {
            response = JSON.parse(response);
            showMessage(response.title, response.message, response.type);
            if (response.type == 'success') setTimeout(() => { location.reload()}, 2000);
        });
    });
});
</script>
<?php include VIEW .'common/footer.tpl.php'; ?>
