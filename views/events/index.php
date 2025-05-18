<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php foreach ($viewmodel as $item) : ?>

                <div class="card p-4 transparente-oscuro">
                    <h3 class="mb-1"><?php echo $item['titulo']; ?></h3>
                    <p class="text-muted mb-3">@<?php echo $item['nombre']; ?></p>

                    <p><strong>Descripción:</strong></p>
                    <p><?php echo $item['desc']; ?></p>

                    <div class="row my-3">
                        <div class="col-md-4">
                            <strong>Fecha:</strong><br/>
                            <?php echo $item['dia']; ?> <?php echo $item['mes']; ?> <?php echo $item['ano']; ?>
                        </div>

                        <div class="col-md-4">
                            <strong>Ubicación:</strong><br/>
                            <?php echo $item['nombreProv']; ?>, España
                        </div>

                        <div class="col-md-4">
                            <strong>Miembros:</strong><br/>
                            <?php echo $item['numMiembros']; ?> inscritos
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <?php if (isset($_SESSION['logged_in'])) {
                            $apuntado = filter_var($_GET['apuntado'], FILTER_VALIDATE_BOOLEAN);
                        }
                        if (isset($_SESSION['logged_in']) && $apuntado) : ?>

                            <a href="<?php echo ROOT_URL; ?>/events/desapuntarse?titulo=<?php echo $item['titulo']; ?>&nombreProv=<?php echo $item['nombreProv']; ?>&idEvento=<?php echo $item['idEvento']; ?>&idProvincia=<?php echo $item['idProvincia']; ?>"
                               class="btn btn-primary"><i class="fa-solid fa-minus"></i> Desapuntarse</a>

                        <?php else : ?>

                            <a href='<?php echo ROOT_URL; ?>/events/apuntarse?titulo=<?php echo $item['titulo']; ?>&nombreProv=<?php echo $item['nombreProv']; ?>&idEvento=<?php echo $item['idEvento']; ?>&idProvincia=<?php echo $item['idProvincia']; ?>&idOrganizador=<?php echo $item['idOrganizador']; ?>'
                               class="btn btn-primary"><i class="fa-solid fa-plus"></i> Apuntarse</a>

                        <?php endif; ?>

                        <?php if (isset($_SESSION['is_logged_in']) && ($_SESSION['user_data']['idUsuario'] == $item['idOrganizador'])) : ?>

                            <a href="<?php echo ROOT_URL; ?>/events/update?titulo=<?php echo $item['titulo']; ?>&nombreProv=<?php echo $item['nombreProv']; ?>&idEvento=<?php echo $item['idEvento']; ?>&idProvincia=<?php echo $item['idProvincia']; ?>"
                               class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Modificar
                            </a>
                            <a href="<?php echo ROOT_URL; ?>/events/delete?titulo=<?php echo $item['titulo']; ?>&nombreProv=<?php echo $item['nombreProv']; ?>&idEvento=<?php echo $item['idEvento']; ?>&idProvincia=<?php echo $item['idProvincia']; ?>"
                               class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar
                            </a>

                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>