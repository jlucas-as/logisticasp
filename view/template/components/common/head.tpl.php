<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#efc900">
		<meta name="description" content="<?= @$description ?>">
        <link rel="shortcut icon" href="<?= IMAGES ?>/favicon.png">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="<?= CSS ?>plugins.css">
        <link rel="stylesheet" href="<?= CSS ?>style.css">
		<link rel="stylesheet" href="<?= CSS ?>fontawesome-all.css">
        <link rel="stylesheet" href="<?= CSS ?>colors/aqua.css">
        <link rel="preload" href="<?= CSS ?>fonts/thicccboi.css" as="style" onload="this.rel='stylesheet'">
		<?php if(@$_GET['page'] == 'admin') { ?>
		<link rel="stylesheet" href="<?= CSS ?>bootstrap.min.css">
		<link rel="stylesheet" href="<?= CSS ?>admin.css">
		<?php } ?>
		<script src="<?= JS ?>jquery.min.js"></script>

        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="<?= NOME_SITE ?>" />
        <meta property="og:url" content="<?= url() ?>" />
        <meta property="og:title" content="<?= $title ?>" />
        <meta property="og:description" content="<?= @$description ?>" />
        <meta property="og:image" content="<?= IMAGES ?>favicon.png" />
    </head>
    <body>
        <div class="content-wrapper">
