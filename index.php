<?php
require_once 'config.php';

# "Sistema de rotas"...
if (!isset($_GET['page'])) pages('index');
if ($_GET['page'] == 'nossos-fretes') pages('nossosFretes');
if ($_GET['page'] == 'email') email();

# Rotas do admin
if ($_GET['page'] == 'admin') {
    session_start();
    if (!isset($_GET['sub_page']) && !$_SESSION['login']['success']) header('Location: /admin/login');
    if (!isset($_GET['sub_page']) && $_SESSION['login']['success']) header('Location: /admin/dashboard');

    if ($_GET['sub_page'] == 'login' && isset($_POST['login'])) pagesAdmin('loginAuth');
    if ($_GET['sub_page'] == 'login') pagesAdmin('login');
    if ($_GET['sub_page'] == 'logout') pagesAdmin('logout');

    if ($_GET['sub_page'] == 'dashboard') pagesAdmin('dashboard');

    # Rotas de cargas
    if ($_GET['sub_page'] == 'cargas' && @$_GET['param'] == 'localizacoes' && isset($_POST['shipping_id']) && $_POST['shipping_id'] !== '') pagesAdmin('createLocation');
    if ($_GET['sub_page'] == 'cargas' && @$_GET['param'] == 'localizacoes' && isset($_POST['action']) && $_POST['action'] == 'delete') pagesAdmin('deleteLocation');
    if ($_GET['sub_page'] == 'cargas' && @$_GET['param'] == 'localizacoes') pagesAdmin('showLocations');
    if ($_GET['sub_page'] == 'cargas' && isset($_POST['action']) && $_POST['action'] == 'create') pagesAdmin('createShipping');
    if ($_GET['sub_page'] == 'cargas' && isset($_POST['action']) && $_POST['action'] == 'edit') pagesAdmin('editShipping');
	if ($_GET['sub_page'] == 'cargas' && isset($_POST['action']) && $_POST['action'] == 'publish') pagesAdmin('publishShipping');
    if ($_GET['sub_page'] == 'cargas' && isset($_POST['action']) && $_POST['action'] == 'delete') pagesAdmin('deleteShipping');
    if ($_GET['sub_page'] == 'cargas' && @$_GET['param'] == 'visualizar') pagesAdmin('showShipping');
    if ($_GET['sub_page'] == 'cargas') pagesAdmin('shippings');

    # Rotas de perfil
    if ($_GET['sub_page'] == 'perfil' && isset($_POST['action']) && $_POST['action'] == 'edit') pagesAdmin('editProfile');
    if ($_GET['sub_page'] == 'perfil') pagesAdmin('profile');

    # Somente usuários level 1 podem acessar essas rotas
    if ($_SESSION['login']['level'] != 2) {
        if ($_GET['sub_page'] == 'usuarios' && isset($_POST['action']) && $_POST['action'] == 'create') pagesAdmin('createUser');
        if ($_GET['sub_page'] == 'usuarios' && isset($_POST['action']) && $_POST['action'] == 'edit') pagesAdmin('editUser');
        if ($_GET['sub_page'] == 'usuarios' && isset($_POST['action']) && $_POST['action'] == 'delete') pagesAdmin('deleteUser');
        if ($_GET['sub_page'] == 'usuarios' && @$_GET['param'] == 'visualizar') pagesAdmin('showUser');
        if ($_GET['sub_page'] == 'usuarios') pagesAdmin('users');
    } else {
        echo "<script>history.back();</script>";
    }
}
