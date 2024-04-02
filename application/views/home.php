<?php $this->load->helper('url') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <h1>Bem vindo, <?= $usuario['nome'] ?>.</h1>        
    <button><a href="<?= site_url(['logout'])?>">
        SAIR
    </a></button>
</body>
</html>