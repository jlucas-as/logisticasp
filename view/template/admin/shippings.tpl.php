<?php include VIEW .'components/common/head.tpl.php'; ?>
<?php include VIEW .'admin/navbar.tpl.php'; ?>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <button type="button" onclick="modalShipping('create')" class="btn btn-warning"><i class="fa fa-truck"></i> Adicionar nova carga</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="shippings" class="display table table-sm" style="width:100%; color:#212121;">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th class="text-center">Rota</th>
                                        <th class="text-center">Data de criação</th>
                                        <th class="text-center">Última alteração</th>
										<th class="text-center">É publico?</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($shippings->num_rows) { ?>
                                    <?php while($shipping = $shippings->fetch_object()) { ?>
                                    <tr>
                                        <td class="text-middle"><?= $shipping->client_name ?><br><small><?= $shipping->client_email ?></small></td>
                                        <td class="text-middle text-center"><small><?= $shipping->origin ?><br><?= $shipping->destination ?></small></td>
                                        <td class="text-middle text-center"><?= date('d/m/Y', strtotime($shipping->created_at)) ?></td>
                                        <td class="text-middle text-center"><?= (!is_null($shipping->updated_at)) ? date('d/m/Y', strtotime($shipping->updated_at)) : 'Nenhuma alteração'; ?></td>
										<td class="text-middle text-center"><?= $shipping->is_publish ? 'Sim' : 'Não' ?></td>
                                        <td class="text-middle text-center">
                                            <button type="button" onclick="showShipping('<?= $shipping->id ?>')" title="Editar" class="btn btn-link p-0"><i class="fa fa-edit"></i></button>
											
											<?php if ($_SESSION['login']['level'] == 1) { ?>
											<button type="button" onclick="publishIt(<?= $shipping->id ?>, <?= $shipping->is_publish ?>)" title="<?= $shipping->is_publish ? 'Desp' : 'P' ?>ublicar" class="btn btn-link p-0"><i class="fa fa-<?= $shipping->is_publish ? 'times' : 'check' ?>"></i></button>
											<?php } ?>
											
                                            <button type="button" onclick="deleteShipping('<?= $shipping->id ?>')" title="Excluir" class="btn btn-link p-0"><i class="fa fa-trash"></i></button>
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
    </div>
</section>

<div class="modal fade" id="shippingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:#212121">Novo usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formShipping" name="formShipping">
                    <input type="hidden" name="action" id="action" value="create">
                    <input type="hidden" name="shipping_id" value="">
					
					<div class="row" style="margin-bottom:0;">
						<div class="col-md-6 form-group">
							<label for="origem">Cidade de origem</label>
							<input class="form-control" type="text" name="origin" id="origin" value="" required="">
						</div>
						<div class="col-md-6 form-group" style="margin-bottom:15px;">
							<label for="cidadeDestino">Cidade de destino</label>
							<input class="form-control" type="text" name="destination" id="destination" value="" required>
						</div> 
						<div class="col-md-4 col-sm-3">
							<label>Valor do frete</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text input-group-text-left" id="btnGroupAddon">R$</div>
								</div>
								<input type="text" class="form-control money" aria-describedby="btnGroupAddon" name="note_cost" id="note_cost" value="" required="" maxlength="22">
							</div>
						</div>
						<div class="col-md-4 col-sm-3 form-group">
							<label>Quantidade</label>
							<input type="text" class="form-control" id="quantity" name="quantity" value="" required="">
						</div>
						<div class="col-md-4 col-sm-3" style="margin-bottom:15px;">
							<label>Peso</label>
							<input type="text" class="form-control" aria-describedby="btnGroupAddon" name="weight" id="weight" value="" required="" maxlength="22">
						</div>
						<div class="col-md-4 form-group"><label for="client_name">Nome</label><input type="text" class="form-control" id="client_name" name="client_name" value="" required=""></div>
						<div class="col-md-5 form-group"><label for="client_email" id="label_email">E-mail</label><input type="email" class="form-control" id="client_email" name="client_email" value="" required=""></div>
						<div class="col-md-3 form-group" style="margin-bottom:15px;">
							<label for="client_phone" id="label_phone">Telefone</label>
							<input type="tel" onblur="phoneMask(this, true)" class="form-control" id="client_phone" name="client_phone" required="">
						</div>
						<div class="col-md-12 form-group" style="margin-bottom:15px;"><div id="label_comments_mudanca" style="display:none;"><label for="comments" style="margin:0; line-height:1">Observações <small>(favor enviar a relação dos móveis a serem transportados.)</small></label><small style="margin:0px 0 10px; line-height:13px; font-weight:600; display:block; font-family:monospace; font-size:90%;">Caso a origem e o destino seja na mesma cidade, favor nos informar os bairros e/ou ruas.</small></div><div id="label_comments_transporte_de_carga"><label for="comments">Observações <small>(Peso, quantidade de volumes, medidas, valor NF. Caso seja mudança favor enviar a relação dos móveis a serem transportados.)</small></label></div><textarea class="form-control" rows="3" name="comments" id="comments" required=""></textarea></div>
					</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" form="formShipping" class="btn btn-warning"><i class="fa fa-plus"></i> Salvar carga</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= CSS ?>jquery.dataTables.min.css"></script>
<script src="<?= JS ?>jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#shippings').DataTable({
        "order": [[ 4, "asc" ]]
    });

    $('#formShipping').submit(function(e) {
        e.preventDefault();
        $.post('/admin/cargas', $('#formShipping').serialize(), 'json')
        .done((response) => {
            response = JSON.parse(response);
            showMessage(response.title, response.message, response.type);
            if (response.type == 'success') {
				$('#shippingModal').modal('hide');
                setTimeout(() => { location.reload()}, 2000);
            }
        });
    });
    $('#formLocation').submit(function(e) {
        e.preventDefault();
        $.post('/admin/cargas/localizacoes', $('#formLocation').serialize(), 'json')
        .done((response) => {
            response = JSON.parse(response);
            let shipping_id = $('#formLocation input[name=shipping_id]').val();
            showMessageLocation(response.title, response.message, response.type);
            if (response.type == 'success') {
                locationShipping(shipping_id);
                $('#formLocation')[0].reset();
            }
        });
    });
} );

function modalShipping(action) {
	if (action == 'create') $('#formShipping')[0].reset();
    $('#shippingModal .modal-title').text(action == 'create' ? 'Nova carga' : 'Editar carga');
    $('#shippingModal #action').val(action);
	
    $('#shippingModal').modal('show');
}
function showShipping(shipping_id) {
    $.get('/admin/cargas/visualizar', {'shipping_id':shipping_id})
    .done((response) => {
        response = JSON.parse(response);

        $('#formShipping input[name=shipping_id]').val(response.id);
        $('#formShipping input[name=origin]').val(response.origin);
        $('#formShipping input[name=destination]').val(response.destination);
		$('#formShipping input[name=note_cost]').val(response.note_cost);
		$('#formShipping input[name=quantity]').val(response.quantity);
		$('#formShipping input[name=weight]').val(response.weight);
        $('#formShipping input[name=client_name]').val(response.client_name);
        $('#formShipping input[name=client_email]').val(response.client_email);
        $('#formShipping input[name=client_phone]').val(response.client_phone);
        $('#formShipping textarea[name=comments]').val(response.comments);

        modalShipping('edit');
    });
}
function deleteShipping(shipping_id) {
    if (confirm("Realmente deseja excluir essa carga?")) {
        $.post('/admin/cargas', {'shipping_id':shipping_id, 'action':'delete'}, 'json')
        .done((response) => {
            response = JSON.parse(response);
            showMessage(response.title, response.message, response.type);

            if (response.type == 'success') setTimeout(() => { location.reload()}, 2000);
        });
    }
}

function publishIt(shipping_id, action) {
	actionConfirm = action ? 'desp' : 'p';
	
	if (confirm(`Realmente deseja ${actionConfirm}ublicar essa carga?`)) {
		$.post('/admin/cargas', {'shipping_id':shipping_id, 'is_publish':action, 'action':'publish'}, 'json')
		.done((response) => {
            response = JSON.parse(response);
            showMessage(response.title, response.message, response.type);

            if (response.type == 'success') setTimeout(() => { location.reload()}, 2000);
        });
	}
}
</script>
<?php include VIEW .'components/common/footer.tpl.php'; ?>
