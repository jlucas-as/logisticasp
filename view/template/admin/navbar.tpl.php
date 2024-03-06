<nav class="navbar navbar-expand-lg center-nav transparent banner--clone fixed  banner--stick">
	<div class="container flex-lg-row flex-nowrap align-items-center">
		<div class="navbar-brand w-100">
			<a href="/">
				<img class="logo-dark" src="//viaslog.com.br/view/asset/img/viaslog.png" width="150" alt="VIAS Log - Transporte e Logística">
				<img class="logo-light" src="//viaslog.com.br/view/asset/img/viaslog.png" width="250" alt="VIAS Log - Transporte e Logística">
			</a>
		</div>
		<div class="navbar-collapse offcanvas-nav">
			<div class="offcanvas-header d-lg-none d-xl-none">
				<a href="#!"><img class="logo-dark" src="//viaslog.com.br/view/asset/img/viaslog.png" width="151" alt="VIAS Log - Transporte e Logística"></a>
				<button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
			</div>
			<ul class="navbar-nav" style="background-color:#fefefe; border-radius:10px;" data-smartmenus-id="16759476425051106">
				<li class="nav-item"><a class="nav-link cargas" style="padding:0 20px; color:#252525;" href="/admin/cargas"><i class="fa fa-truck"></i> Cargas</a></li>
				<li class="nav-item"><a class="nav-link perfil" style="padding:0 20px; color:#252525;" href="<?= ROOT ?>admin/perfil"><i class="fa fa-user"></i> Perfil</a></li>
				<li class="nav-item"><a class="nav-link" style="padding:0 20px; color:#252525;" target="_blank" href="<?= ROOT ?>"><i class="fa fa-desktop"></i> Ver o site</a></li>
				<li class="nav-item"><a class="nav-link" style="padding:0 20px; color:#252525;" href="javascript:logout();"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
			</ul>
		</div>
	</div>
</nav>

<div id="alert-message" role="alert" style="position:fixed; top:15px; right:15px; width:350px; display:none; z-index:9999;">
    <h4 class="alert-heading">Well done!</h4>
    <hr>
    <p class="alert-message" style="margin:0;">Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
</div>

<script>
function logout() {
    if (confirm('Deseja realmente sair do sistema?')) location.href="/admin/logout";
}

function showMessage(title, message, type) {
    $('#alert-message').attr('class', `alert alert-${type}`)
    $('#alert-message .alert-heading').html(title);
    $('#alert-message .alert-message').html(message);
    $('#alert-message').show();

    setTimeout(() => { $('#alert-message').hide('slow'); }, 5000);
}

$(document).ready(function() {
    let page = window.location.href.split('/')[4];
    $(`li.nav-item.${page}`).addClass('active');
});
</script>