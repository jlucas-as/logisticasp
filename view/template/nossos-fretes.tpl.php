<?php
include VIEW .'components/common/head.tpl.php';
include VIEW .'components/common/navbar.tpl.php';
?>

<section class="wrapper angled lower-start" style="background-image:url('<?= IMAGES ?>viaslog-transporte-e-logistica-slider.jpg'); background-size:cover; background-position:center; top:<?= isMobile() ? '-128px' : '-85px' ?>; padding-top:100px;">
    <div class="container pt-7 pt-md-11 pb-8">
        <div class="row gx-0 gy-10 align-items-center">
            <div class="col-lg-6" data-cues="slideInDown" data-group="page-title" data-delay="600">
                <h1 class="display-1 text-white mb-4">Fretes <span style="color:#efc900; font-weight:900; <?php if (isMobile()) echo 'background-color:#fff; padding:0px 5px 3px; border-radius:5px;'; ?>">disponíveis</span></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
						<table id="shippings" class="display table table-sm" style="width:100%; color:#212121;">
							<thead>
								<tr>
									<th class="text-center">Rota</th>
									<th class="text-center">Preço</th>
									<th class="text-center">Quantidade</th>
									<th class="text-center">Peso</th>
									<th class="text-center">Contato</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($shippings->num_rows) { ?>
								<?php while($shipping = $shippings->fetch_object()) { ?>
                                    <tr>
                                        <td class="text-middle">Origem: <?= $shipping->origin ?><br>Destino: <?= $shipping->destination ?></td>
										<td class="text-middle text-center">R$ <?= $shipping->note_cost ?></td>
										<td class="text-middle text-center"><?= $shipping->quantity ?></td>
										<td class="text-middle text-center"><?= $shipping->weight ?></td>
										<td class="text-middle text-center"><a href="//api.whatsapp.com/send?phone=55<?= str_replace(['-', '(', ')', ' '], '', $shipping->client_phone) ?>&text=Olá, vim pelo site Vias Log. Desejo saber mais informações sobre o frete"><i class="fab fa-whatsapp"></i> <?= $shipping->client_phone ?></a></td>
                                        <td class="text-middle text-center">
                                            <button type="button" onclick="showShipping('<?= $shipping->id ?>')" title="Visualizar" class="btn btn-link"><i class="fa fa-search"></i> Visualizar</button>
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
                <h5 class="modal-title" id="exampleModalLabel" style="color:#212121">Visualizar frete</h5>
                <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
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
							<input type="text" class="form-control money" aria-describedby="btnGroupAddon" name="note_cost" id="note_cost" value="" required="" maxlength="22">
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
						<div class="col-md-5 form-group">
							<label for="client_email" id="label_email">E-mail</label>
							<div class="form-control" id="client_email"></div>
						</div>
						<div class="col-md-3 form-group" style="margin-bottom:15px;">
							<label for="client_phone" id="label_phone">Telefone</label>
							<div class="form-control" id="client_phone"></div>
						</div>
						<div class="col-md-12 form-group" style="margin-bottom:15px;">
							<label for="comments" style="margin:0; line-height:1">Observações</label>
							<textarea class="form-control" rows="3" name="comments" id="comments" required=""></textarea>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include VIEW .'components/common/footer.tpl.php';
?>
<script>
function showShipping(shipping_id) {
    $.get('/admin/cargas/visualizar', {'shipping_id':shipping_id})
    .done((response) => {
        response = JSON.parse(response);		
		var phone = response.client_phone.replace(['-', '(', ')', ' '], '');

        $('#formShipping input[name=shipping_id]').val(response.id);
        $('#formShipping input[name=origin]').val(response.origin);
        $('#formShipping input[name=destination]').val(response.destination);
		$('#formShipping input[name=note_cost]').val(`R$ ${response.note_cost}`);
		$('#formShipping input[name=quantity]').val(response.quantity);
		$('#formShipping input[name=weight]').val(response.weight);
        $('#formShipping input[name=client_name]').val(response.client_name);
        $('#formShipping div#client_email').html(`<a href="mailto:${response.client_email}" target="_blank"><i class="fa fa-envelope"></i> ${response.client_email}</a>`);
        $('#formShipping div#client_phone').html(`<a href="//api.whatsapp.com/send?phone=55$${phone}&text=Olá, vim pelo site Vias Log. Desejo saber mais informações sobre o frete"><i class="fab fa-whatsapp"></i> ${response.client_phone}</a>`);
        $('#formShipping textarea[name=comments]').val(response.comments);

        $('#shippingModal').modal('show');
    });
}
</script>