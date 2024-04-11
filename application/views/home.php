<?php $this->load->helper('url') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
    <h1>Bem vindo, <?= $sessao['nome'] ?>.</h1>

    <input id="pesquisa"><button id="pesquisar">
        PESQUISAR
    </button>

    <div id="postagens">
        <br> <?php foreach($posts as $post) : ?>
            <a href="<?= site_url(['perfil', $post['idpostou']])?>">
                <?= $post['autor'] ?>: 
            </a>
            <?= $post['texto'] ?> <br>
        <?php endforeach ?> <br>
    </div>
    <div id="perfis">
    
    <button><a href="<?= site_url(['logout'])?>">
        SAIR
    </a></button>

    <button><a href="<?= site_url(['perfil'])?>">
        MEU PERFIL
    </a></button> 

    <script>
        $('#pesquisar').click(() => {
            if(!$('#pesquisa').val()) {
                return
            }
            $.ajax({
                url: 'http://[::1]/projeto/index.php/home/pesquisa/'+$('#pesquisa').val(),
                type: 'GET',
                success: (data) => {
                    $('#postagens').empty();
                    $('#perfis').html(data);
                }
            })
        })
    </script>
</body>
</html>