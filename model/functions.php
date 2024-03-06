<?php
function dd($termo, $array = false) {
    if ($array) {
        foreach ($termo as $key => $value) {
            if (is_array($termo)) {
                echo '<pre style="background: #000; color: tomato; padding: 10px;">';
                foreach ($value as $key2 => $val) {
                    echo "$key2 => $val<br>";
                }
                echo '</pre>';
            } else {
                echo '<pre style="background: #000; color: tomato; padding: 10px;">';
                print_r($key . ' => ' . $value);
                echo '</pre>';
            }
        }
        exit(0);
    } else {
        echo '<pre style="background: #000; color: tomato; padding: 10px;">';
        print_r($termo);
        exit(0);
    }
}

function slug($string) {
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/'=>'-', ' '=>'-'
    );

    // -- Remove duplicated spaces
    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

    return strtolower(strtr($string, $table));
}

function mysqli() {
    return new mysqli('br40-cp.valueserver.com.br', 'viaslog_user', 'uC0#rq}uM#T&', 'viaslog_db');
}

function pages($page) {
    include CONTROLLER .'pages.php';
    $page();
    exit(0);
}
function pagesAdmin($page) {
    include CONTROLLER .'pages-admin.php';
    $page();
    exit(0);
}

function view($file, $parameters = null) {
    if (!is_null($parameters)) {
        foreach ($parameters as $key => $parameter) {
            $$key = $parameter;
        }
    }

    $file = implode('/', explode('.', $file));
    include VIEW ."$file.tpl.php";
}

function includes($file) {
    $file = implode('/', explode('.', $file));
    include VIEW ."$file.tpl.php";
}

function email() {
    include CONTROLLER .'email.php';
    exit(0);
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function url($url = '') {
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ROOT . $url;
}

function link_zap_info($info) {
    return str_replace('solicitar uma cotação', "saber mais sobre $info", WHATSAPP_LINK);
}
