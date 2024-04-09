<?php $this->load->helper(['url', 'form']); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div style="color: green">
        <?php if($this->session->flashdata('sucesso')) : ?>
            <?= $this->session->flashdata('sucesso') ?>
        <?php endif ?>
    </div> 

    <h1>LOGIN</h1>

    <?= form_open('login/auth'); ?>
        <?= form_input([
            'name' => 'nome',
            'placeholder' => 'Nome',
        ]); ?> <br>

        <?= form_input([
            'name' => 'senha',
            'placeholder' => 'Senha',
            'type' => 'password'
        ]); ?> <br>

        <?= form_input([
            'type' => 'submit',
            'value' => 'LOGIN'
        ]) ?>
    <?= form_close(); ?> <br>

    <button><a href="<?= site_url(['registrar'])?>">
        CRIAR CONTA
    </a></button>

    <div style="color: red">
    <br>
        <?php if($this->session->flashdata('erro_credenciais')) : ?>
            <?= $this->session->flashdata('erro_credenciais') ?>
        <?php endif ?>
    </div> 
</body>
</html>