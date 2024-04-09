<br> <?php foreach($usuarios as $usuario) : ?>
    <?php foreach($usuario as $key => $value) : ?>
        <b><?= $key ?>: </b> <?= $value ?>. <br>
    <?php endforeach ?> <br>
<?php endforeach ?> <br>