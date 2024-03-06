<?php include VIEW .'common/head.tpl.php'; ?>
<?php include VIEW .'admin/navbar.tpl.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <button type="button" onclick="modalUser('create')" class="btn btn-warning"><i class="fa fa-user-plus"></i> Adicionar novo usuário</button>
                    </div>
                    <div class="card-body">
                        <table id="users" class="display table" style="width:100%; color:#212121;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th class="text-center">Nível</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Data de criação</th>
                                    <th class="text-center">Última alteração</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($users->num_rows) { ?>
                                <?php while($user = $users->fetch_object()) { ?>
                                <tr>
                                    <td style="vertical-align:middle;"><?= $user->name ?></td>
                                    <td style="vertical-align:middle;"><?= $user->email ?></td>
                                    <td style="vertical-align:middle;" class="text-center"><?= ($user->level == 1) ? 'Admin' : 'Operador' ?></td>
                                    <td style="vertical-align:middle;" class="text-center"><?= $user->status ? 'Ativo' : 'Inativo' ?></td>
                                    <td style="vertical-align:middle;" class="text-center"><?= date('d/m/Y', strtotime($user->created_at)) ?></td>
                                    <td style="vertical-align:middle;" class="text-center"><?= (!is_null($user->updated_at)) ? date('d/m/Y', strtotime($user->updated_at)) : 'Nenhuma alteração'; ?></td>
                                    <td class="text-center">
                                        <button type="button" onclick="showUser('<?= $user->id ?>')" class="btn btn-link"><i class="fa fa-edit"></i></button>
                                        <button type="button" onclick="deleteUser('<?= $user->id ?>')" class="btn btn-link"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:#212121">Novo usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formUser" name="formUser">
                    <input type="hidden" name="action" id="action" value="create">
                    <input type="hidden" name="user_id" value="">
                    <div class="form-group row">
                        <label class="col-md-2">Nome</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">E-mail</label>
                        <div class="col-md-10">
                            <input class="form-control" type="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Senha</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" name="pass" required>
                            <small class="smallpass text-danger">Só digitar se deseja alterar a senha deste usuário</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Nível</label>
                        <div class="col-md-10">
                            <select class="form-control" name="level" required>
                                <option value="1">Admin</option>
                                <option value="2">Operador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Status</label>
                        <div class="col-md-10">
                            <select class="form-control" name="status" required>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" form="formUser" class="btn btn-warning"><i class="fa fa-user-plus"></i> Salvar usuário</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= ASSET ?>css/jquery.dataTables.min.css"></script>
<script src="<?= ASSET ?>js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#users').DataTable({
        "order": [[ 4, "desc" ], [0, "asc"]]
    });

    $('#formUser').submit(function(e) {
        e.preventDefault();
        $.post('/admin/usuarios', $('#formUser').serialize(), 'json')
        .done((response) => {
            response = JSON.parse(response);
            showMessage(response.title, response.message, response.type);
            if (response.type == 'success') {
                $('#userModal').modal('hide');
                setTimeout(() => { location.reload()}, 2000);
            }
        });
    });
} );

function modalUser(action) {
    $('#userModal .modal-title').text(action == 'create' ? 'Novo usuário' : 'Editar usuário');
    $('#userModal #action').val(action);

    if (action == 'create') {
        $('#formUser input[name=pass]').attr('required', 'required');
        $('#formUser .smallpass').hide();
    } else {
        $('#formUser input[name=pass]').removeAttr('required');
        $('#formUser .smallpass').show();
    }

    $('#userModal').modal('show');
}
function showUser(user_id) {
    $.get('/admin/usuarios/visualizar', {'user_id':user_id})
    .done((response) => {
        response = JSON.parse(response);

        $('#formUser input[name=user_id]').val(response.id);
        $('#formUser input[name=name]').val(response.name);
        $('#formUser input[name=email]').val(response.email);
        $('#formUser select[name=level]').val(response.level);
        $('#formUser select[name=status]').val(response.status);

        modalUser('edit');
    });
}
function deleteUser(user_id) {
    if (confirm("Realmente deseja excluir esse usuário?")) {
        $.post('/admin/usuarios', {'user_id':user_id, 'action':'delete'}, 'json')
        .done((response) => {
            response = JSON.parse(response);
            showMessage(response.title, response.message, response.type);
            if (response.type == 'success') setTimeout(() => { location.reload()}, 2000);
        });
    }
}
</script>
<?php include VIEW .'common/footer.tpl.php'; ?>
