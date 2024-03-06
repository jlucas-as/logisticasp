<?php
function index() {
    view('home', [
        'title' => NOME_SITE . ' - Transporte e Logística',
        'description' => 'Desenvolvemos a '. NOME_SITE .' com o compromisso de prestar todos os serviços com a máxima qualidade.'
    ]);
}

function nossosFretes() {	
	view('nossos-fretes', [
        'title' => 'Fretes disponíveis - '. NOME_SITE . ' - Transporte e Logística',
        'description' => 'Desenvolvemos a '. NOME_SITE .' com o compromisso de prestar todos os serviços com a máxima qualidade.',
		'shippings' => mysqli()->query("SELECT shippings.* FROM shippings WHERE is_publish = 1 ORDER BY created_at DESC;")
    ]);
}

function entre_em_contato() {
    view('entre-em-contato', [
        'title' => 'Entre em contato',
        'description' => ''
    ]);
}
