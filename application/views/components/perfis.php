<?php $this->load->helper('url') ?>

<h3>RESULTADOS:</h3>
<?php foreach($usuarios as $usuario) : ?>
    <button><a href="<?= site_url(['perfil', $usuario['id']])?>">
        <?= $usuario['nome'] ?> 
    </a></button><br>
<?php endforeach ?> <br>