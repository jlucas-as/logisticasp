<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL ^ E_WARNING);
$anoAtual = (date('Y') > 2021) ? ' - '.date('Y') : '';

// DEFINE AS CONSTANTES DE CAMINHO E SUAS PASTAS --> PADRAO MVC
define('ROOT', $_SERVER['SERVER_NAME'] == 'localhost' ? '/clientes/logisticasp/' : '/');
define('MODEL', $_SERVER['DOCUMENT_ROOT'] . ROOT .'model/');
define('VIEW', $_SERVER['DOCUMENT_ROOT'] . ROOT .'view/template/');
define('CONTROLLER', $_SERVER['DOCUMENT_ROOT'] . ROOT .'controller/');

# CONSTANTES DE CONFIGURAÇÃO DO SITE
define('NOME_SITE', 'JC Logistica SP');
require_once MODEL . 'functions.php';

define('IMAGES', url() . 'view/asset/img/');
define('CSS', url() . 'view/asset/css/');
define('JS', url() . 'view/asset/js/');


define('WHATSAPP_TEXT', '(11) 99554-0061');
define('WHATSAPP_LINK', 'https://api.whatsapp.com/send?phone=55'. str_replace(['(', ')', ' ', '-'], '', WHATSAPP_TEXT) .'&text=Olá vim pelo site '. NOME_SITE);
define('PHONE_TEXT', '(11) 2613-7000');
define('PHONE_LINK', 'tel:'. str_replace(['(', ')', ' ', '-'], '', PHONE_TEXT));

define('EMAIL_TEXT', 'comercial@logisticasp.com.br');
define('EMAIL_LINK', 'mailto:'. EMAIL_TEXT);
define('ADDRESS_TEXT', 'Rua Benedita Dornellas Claro, 662 - Jardim Andarai, São Paulo - SP, 02168-020');
define('MAP_LINK', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.4636804556917!2d-46.576971723789484!3d-23.515819659922442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5f3d7be09685%3A0x1eadfb2047a884c1!2sRua%20Benedita%20Dornellas%20Claro%2C%20662%20-%20Jardim%20Andarai%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2002168-020!5e0!3m2!1spt-BR!2sbr!4v1709748732310!5m2!1spt-BR!2sbr');