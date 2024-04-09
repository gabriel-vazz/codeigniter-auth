<?php $this->load->helper(['form', 'url']) ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVO POST</title>
</head>
<body>
    <h1>Fazer Nova Postagem</h1>

    <?= form_open('perfil/post') ?>
        <?= form_textarea([
            'name' => 'texto',
            'rows' => 8, 'cols' => 50
        ])?> <br>

        <?= form_input([
            'type' => 'submit',
            'value' => 'POSTAR'
        ]) ?>
    <?= form_close() ?> <br>

    <button><a href="<?= site_url('perfil') ?>">
        VOLTAR
    </button></a>

    <div style="color: red;">
        <?= validation_errors() ?>
    </div>

</body>
</html>