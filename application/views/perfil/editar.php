<?php $this->load->helper(['form', 'url']) ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PERFIL</title>
</head>
<body>
    <h1>Editar Perfil</h1>

    <?= form_open('perfil/editar') ?>
        <?= form_input([
            'name' => 'nome',
            'placeholder' => 'Nome',
            'value' => $this->input->post('nome') ?? $perfil['nome']
        ]) ?> <br>

        <?= form_input([
            'name' => 'email',
            'placeholder' => 'E-Mail',
            'value' => $this->input->post('email') ?? $perfil['email'] 
        ]) ?> <br>

        <?= form_input([
            'name' => 'senha',
            'placeholder' => 'Senha',
            'type' => 'password',
            'value' => $this->input->post('senha') ?? $perfil['senha'] 
        ]) ?> <br>

        <?= form_input([
            'type' => 'submit',
            'value' => 'SALVAR'
        ]) ?>
    <?= form_close() ?> <br>

    <button><a href="<?= site_url('perfil') ?>">
        VOLTAR
    </a></button>

    <div style="color: red;">
        <?= validation_errors() ?>
    </div>
</body>
</html>