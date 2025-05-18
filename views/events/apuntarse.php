<div class="d-flex gap-2">
    <?php if ($_SESSION['is_logged_in']) : ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <h4>¿Quiere apuntarse en el evento: <?php echo $_GET['titulo'] ?> en <?php echo $_GET['nombreProv']; ?>?</h4>
            <input type="hidden" value="<?php echo $_GET['idEvento']; ?>" name="idEvento">
            <input type="hidden" value="<?php echo $_GET['idProvincia']; ?>" name="idProvincia">
            <input type="hidden" value="" name="validar">
            <input type="submit" class="btn btn-success w-50 fa" value="&#x2b; Apuntarse al evento">

            <br>
            <br>

            <a class="btn btn-danger w-50" onclick="window.history.back(); return false;">Cancel</a>
        </form>
    <?php endif; ?>
</div>