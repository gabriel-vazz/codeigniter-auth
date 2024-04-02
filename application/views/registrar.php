<?php $this->load->helper(['url', 'form']); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIAR CONTA</title>
</head>
<body>
    <h1>CRIAR CONTA</h1>

    <?= form_open('login/registrar'); ?>
        <?= form_input([
            'name' => 'nome',
            'placeholder' => 'Nome',
            'value' => $this->input->post('nome')
        ]); ?> <br>

        <?= form_input([
            'name' => 'email',
            'placeholder' => 'E-Mail',
            'value' => $this->input->post('email')
        ]); ?> <br>

        <?= form_input([
            'name' => 'senha',
            'placeholder' => 'Senha',
            'type' => 'password',
            'value' => $this->input->post('senha')
        ]); ?> <br>

        <?= form_input([
            'type' => 'submit',
            'value' => 'CRIAR CONTA'
        ]) ?>
    <?= form_close(); ?> <br>

    <button><a href="<?= site_url(['login'])?>">
        VOLTAR
    </a></button>

    <div style="color: red">
        <?= validation_errors(); ?>
    </div> <br>

    <?php if($this->session->flashdata('erro_usuario_existente')) : ?>
        <?= $this->session->flashdata('erro_usuario_existente') ?>
    <?php endif ?>
    
</body>
</html>