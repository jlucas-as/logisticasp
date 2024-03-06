<?php
/**
 * Funções de autenticação
**/
function verifyLogin() {
    if (isset($_SESSION['login']) && $_SESSION['login']['success']) return false;
    header('Location: /admin/login');
}
function login() {
    if (@$_SESSION['login']['success']) header('Location: /admin/cargas');

    view('admin.login', [
        'title' => 'Login'
    ]);
}
function loginAuth() {
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $email = $_POST['user'];
        $result = mysqli()->query("SELECT id, name, pass, status, level FROM users WHERE email = '{$email}'");
        $is_user = $result->num_rows;
        $user = $result->fetch_object();
        if ($is_user && $user->status && password_verify($_POST['pass'], $user->pass)) {
            session_start();
            $_SESSION['login'] = ['success' => true, 'name' => $user->name, 'email' => $email, 'level' => $user->level];
            header('Location: /admin/cargas');
        } else {
            echo "<script>alert('Dados inválidos! Tente novamente.');</script>";
            echo "<script>location.href='/admin/login';</script>";
        }
    } else {
        header('Location: /admin/login');
    }
}
function logout() {
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: /admin/login');
}

/**
 * FUNÇÕES DAS PÁGINAS DO PAINEL
**/

function dashboard() {
    verifyLogin();
    view('admin.dashboard', [
        'title' => 'Dashboard'
    ]);
}

/** Funções das cargas **/
function shippings() {
    verifyLogin();
    view('admin.shippings', [
        'title' => 'Cargas',
        'shippings' => mysqli()->query("SELECT shippings.*, users.name as username FROM shippings INNER JOIN users ON (shippings.user_id = users.id) ORDER BY created_at DESC;")
    ]);
}
function createShipping() {
    try {
		$origin       = $_POST['origin'];
		$destination  = $_POST['destination'];
		$client_name  = $_POST['client_name'];
        $client_email = $_POST['client_email'];
		$client_phone = $_POST['client_phone'];
        $note_cost    = $_POST['note_cost'];
        $quantity     = $_POST['quantity'];
        $weight       = $_POST['weight'];
        $comments     = $_POST['comments'];
		
        $user_id = mysqli()->query("SELECT id FROM users WHERE name = '{$_SESSION['login']['name']}' AND email = '{$_SESSION['login']['email']}'")->fetch_object()->id;
		$created_at = date('Y-m-d H:i:s');
		

        mysqli()->query("INSERT INTO shippings SET origin = '{$origin}', destination = '{$destination}', client_name = '{$client_name}', client_email = '{$client_email}', client_phone = '{$client_phone}', note_cost = '{$note_cost}', quantity = '{$quantity}', weight = '{$weight}', comments = '{$comments}', user_id = '$user_id', created_at = '{$created_at}';");
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Carga cadastrada com sucesso!', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao cadastrar carga!', 'error_message' => $e->getMessage(), 'type' => 'danger']);
    }
}
function showShipping() {
    $shipping_id = explode('shipping_id=', $_SERVER['REQUEST_URI'])[1];
    if ($shipping_id) {
        $shipping = mysqli()->query("SELECT * FROM shippings WHERE id = '{$shipping_id}';")->fetch_object();
        echo json_encode($shipping);
    }
}
function editShipping() {
    try {
        $shipping_id = $_POST['shipping_id'];
		
        $origin       = $_POST['origin'];
		$destination  = $_POST['destination'];
		$client_name  = $_POST['client_name'];
        $client_email = $_POST['client_email'];
		$client_phone = $_POST['client_phone'];
        $note_cost    = $_POST['note_cost'];
        $quantity     = $_POST['quantity'];
        $weight       = $_POST['weight'];
        $comments     = $_POST['comments'];

        mysqli()->query("UPDATE shippings SET origin = '{$origin}', destination = '{$destination}', client_name = '{$client_name}', client_email = '{$client_email}', client_phone = '{$client_phone}', note_cost = '{$note_cost}', quantity = '{$quantity}', weight = '{$weight}', comments = '{$comments}', updated_at = now() WHERE id = '{$shipping_id}';");
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Carga editada com sucesso!', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao editar carga!', 'error_message' => $e->getMessage(), 'type' => 'danger']);
    }
}
function deleteShipping() {
    try {
        mysqli()->query("DELETE FROM shippings WHERE id = {$_POST['shipping_id']};");
        mysqli()->query("DELETE FROM shipping_locations WHERE shipping_id = {$_POST['shipping_id']};");

        echo json_encode(['title' => 'Tudo certo', 'message' => 'Carga deletada com sucesso!', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao deletar a carga!', 'error_message' => $e->getMessage(), 'type' => 'success']);
    }
}
function publishShipping() {
	try {
		$is_publish = $_POST['is_publish'] == 1 ? 0 : 1;
		
        mysqli()->query("UPDATE shippings SET is_publish = '{$is_publish}', updated_at = now() WHERE id = '{$_POST['shipping_id']}';");
		
		$action = $is_publish ? 'publica': 'despublica';

        echo json_encode(['title' => 'Tudo certo', 'message' => "Carga {$action}da com sucesso!", 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => "Erro ao {$action}r a carga!", 'error_message' => $e->getMessage(), 'type' => 'success']);
    }
}

/** Funções de localização das cargas **/
function showLocations() {
    $shipping_id = explode('shipping_id=', $_SERVER['REQUEST_URI'])[1];
    $tracking_code = mysqli()->query("SELECT tracking_code FROM shippings WHERE id = {$shipping_id}")->fetch_object()->tracking_code;
    $result = mysqli()->query("SELECT shipping_locations.id, location, shipping_locations.created_at, name FROM shipping_locations INNER JOIN users ON (user_id = users.id) WHERE shipping_id = {$shipping_id} ORDER BY created_at DESC");

    while ($location = $result->fetch_object()) {
        $locations[] = [
            'id' => $location->id,
            'location' => $location->location,
            'created_at' => date('d/m/Y à\s H:i', strtotime($location->created_at)),
            'username' => $location->name
        ];
    }

    echo json_encode(['shipping_id' => $shipping_id, 'tracking_code' => $tracking_code, 'locations' => $locations]);
}
function createLocation() {
    try {
        $location = $_POST['location'];
        $shipping_id = $_POST['shipping_id'];
        $user_id = mysqli()->query("SELECT id FROM users WHERE name = '{$_SESSION['login']['name']}' AND email = '{$_SESSION['login']['email']}'")->fetch_object()->id;
        $created_at = $_POST['created_at']. ':00';

        mysqli()->query("INSERT INTO shipping_locations SET location = '{$location}', shipping_id = '{$shipping_id}', user_id = '$user_id', created_at = '{$created_at}';");
        notifyClient($location, $created_at, $shipping_id);

        echo json_encode(['title' => 'Tudo certo', 'message' => 'Localização cadastrada com sucesso!', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao cadastrar localização!', 'error_message' => $e->getMessage(), 'type' => 'danger']);
    }
}
function deleteLocation() {
    try {
        mysqli()->query("DELETE FROM shipping_locations WHERE id = {$_POST['id']};");
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Localização deletada com sucesso!', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao deletar a localização!', 'error_message' => $e->getMessage(), 'type' => 'success']);
    }
}
function notifyClient($location, $created_at, $shipping_id) {
    require_once(CONTROLLER .'notify-client.php');
    $shipping = mysqli()->query("SELECT * FROM shippings WHERE id = '{$shipping_id}';")->fetch_object();
    sendNotifyClient($shipping->client_name, $shipping->client_email, $shipping->tracking_code, $location, $created_at);
}

/** Funções dos usuários **/
function users() {
    verifyLogin();
    view('admin.users', [
        'title' => 'Usuários',
        'users' => mysqli()->query("SELECT id, name, email, level, status, created_at, updated_at FROM users;")
    ]);
}
function createUser() {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $level = $_POST['level'];
        $status = $_POST['status'];
        $create = mysqli()->query("INSERT INTO users SET name = '{$name}', email = '{$email}', pass = '{$pass}', level = '{$level}', status = '$status';");

        echo json_encode(['title' => 'Tudo certo', 'message' => 'Usuário cadastrado com sucesso!', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao cadastrar usuário!', 'error_message' => $e->getMessage(), 'type' => 'danger']);
    }
}
function showUser() {
    $user_id = explode('user_id=', $_SERVER['REQUEST_URI'])[1];
    if ($user_id) {
        $user = mysqli()->query("SELECT id, name, email, level, status, created_at, updated_at FROM users WHERE id = '{$user_id}';")->fetch_object();
        echo json_encode($user);
    }
}
function editUser() {
    try {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $level = $_POST['level'];
        $status = $_POST['status'];

        $sql_edit = "UPDATE users SET name = '{$name}', email = '{$email}', level = '{$level}', status = '$status'";
        if ($_POST['pass']) {
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $sql_edit .= ", pass = '{$pass}'";
        }
        $sql_edit .= ", updated_at = now() WHERE id = {$user_id}";


        mysqli()->query($sql_edit);
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Usuário editado com sucesso!', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao editar o usuário!', 'error_message' => $e->getMessage(), 'type' => 'success']);
    }
}
function deleteUser() {
    try {
        mysqli()->query("DELETE FROM users WHERE id = {$_POST['user_id']};");
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Usuário deletado com sucesso!', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao deletar o usuário!', 'error_message' => $e->getMessage(), 'type' => 'success']);
    }
}

/** Funções de perfil **/
function profile() {
    verifyLogin();
    view('admin.profile', [
        'title' => 'Meu perfil',
        'profile' => mysqli()->query("SELECT id FROM users WHERE name = '{$_SESSION['login']['name']}' AND email = '{$_SESSION['login']['email']}';")->fetch_object()
    ]);
}
function editProfile() {
    try {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql_edit = "UPDATE users SET name = '{$name}', email = '{$email}'";
        if ($_POST['pass']) {
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $sql_edit .= ", pass = '{$pass}'";
        }
        $sql_edit .= ", updated_at = now() WHERE id = {$id}";

        mysqli()->query($sql_edit);
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Seu perfil foi editado com sucesso! A próxima vez que fizer login os dados estarão alterados.', 'type' => 'success']);
    } catch (\Exception $e) {
        echo json_encode(['title' => 'Tudo certo', 'message' => 'Erro ao editar seu perfil!', 'error_message' => $e->getMessage(), 'type' => 'success']);
    }
}