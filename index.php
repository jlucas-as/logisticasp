<?php
require_once 'config.php';

# "Sistema de rotas"...
if (!isset($_GET['page'])) pages('index');
