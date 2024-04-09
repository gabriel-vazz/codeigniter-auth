<?php $this->load->helper('url') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEU PERFIL</title>
</head>
<body>
    <h1>Meu Perfil</h1>

    <b>ID: </b> <?= $perfil['id'] ?>. <br>
    <b>Nome: </b> <?= $perfil['nome'] ?>. <br>
    <b>E-Mail: </b> <?= $perfil['email'] ?>. <br>
    <b>Senha: </b> <?= $perfil['senha'] ?>. <br><br>

    <button><a href="<?= site_url('home') ?>">
        VOLTAR
    </a></button>
    <button><a href="<?= site_url(['perfil', 'editar']) ?>">
        EDITAR PERFIL
    </a></button> 
    <button><a href="<?= site_url(['perfil', 'post'])  ?>">
        POST
    </a></button> <br><br>

    <div style="color: green;">
        <?php if($this->session->flashdata('atualizado')) : ?>
            <?= $this->session->flashdata('atualizado') ?>
        <?php endif ?>
    </div>
    <div style="color: green;">
        <?php if($this->session->flashdata('publicado')) : ?>
            <?= $this->session->flashdata('publicado') ?>
        <?php endif ?>
    </div>

    <h2>Minhas Postagens</h2>

    <?php foreach($posts as $post) : ?>
        <?= $post['texto'] ?> <br>
    <?php endforeach ?>
    </div>
</body>
</html>