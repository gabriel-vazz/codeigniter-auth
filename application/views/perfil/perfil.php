<?php $this->load->helper('url') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= strtoupper($perfil['nome']) ?></title>
</head>
<body>
    <h1><?= $perfil['nome'] ?></h1>

    <h2>Postagens</h2>
    <?php foreach($posts as $post) : ?>
        <?= $post['texto'] ?> <br>
    <?php endforeach ?> <br>

    <button><a href="<?= site_url('') ?>">
        VOLTAR
    </a></button>
</body>
</html>