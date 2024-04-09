<?php $this->load->helper('url') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <h1>Bem vindo, <?= $sessao['nome'] ?>.</h1>

    <input id="pesquisa"> 
    <button id="pesquisar">PESQUISAR</button>
    <br><br>

    <div id="tabela_ajax">
        <?php foreach($usuarios as $usuario) : ?>
            <button><a href="<?= site_url(['perfil', $usuario['id']]) ?>">
                <?php foreach($usuario as $key => $value) : ?>
                    <b><?= $key ?>: </b> <?= $value ?>. <br>
                <?php endforeach ?> <br>
            </a></button> <br><br>
        <?php endforeach ?> <br>
    </div>

    <button><a href="<?= site_url(['logout'])?>">
        SAIR
    </a></button>

    <button><a href="<?= site_url(['perfil'])?>">
        MEU PERFIL
    </a></button>

    <script>
        $('#pesquisar').click(() => {
            if($('#pesquisa').val()) {
                $.ajax({
                    url: 'http://[::1]/projeto/index.php/home/pesquisa/' + $('#pesquisa').val(),
                    type: 'GET',
                    success: (data) => {
                        $('#tabela_ajax').empty();
                        $('#tabela_ajax').html(data);
                    }
                })
            }
        })
    </script>
</body>
</html>