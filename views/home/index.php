<div class="container mt-4">
    <div class="row columna-fija">
        <main class="col-md-9">
            <h4 class="mb-4">
                <i class="fa-solid fa-house"></i> Bienvenid@
                <?php if (isset($_SESSION['is_logged_in'])) : ?>

                    <?php echo $_SESSION['user_data']['nombre']; ?>

                <?php endif; ?>
            </h4>
            <?php foreach ($viewmodel as $item) : ?>

                <a href="<?php echo ROOT_URL; ?>/events/index?idEvento=<?php echo $item['idEvento']; ?>&idProvincia=<?php echo $item['idProvincia']; ?>&idOrganizador=<?php echo $item['idOrganizador']; ?>"
                   class="text-decoration-none text-white">
                    <div class="card mb-3 transparente-oscuro">
                        <div class="card-body">
                            <h3><i class="fa-solid fa-signature"></i> <?php echo $item['titulo']; ?>
                                <small class="text-muted">
                                    @<?php echo $item['nombre']; ?>

                                    <br>
                                    <br>

                                    <pre style="font-family: sans-serif; font-size: 20px;"><i
                                                class="fa-solid fa-calendar-days"></i>   <?php echo $item['dia']; ?> <?php echo $item['mes']; ?> <?php echo $item['ano']; ?></pre>
                                </small>
                            </h3>

                            <br>

                            <p style="font-size: 20px;">
                                <?php $posicion = strrpos(substr($item['desc'], 0, 90), ' ');
                                echo substr($item['desc'], 0, $posicion) . '...'; ?>
                            </p>

                            <br>

                            <div class="d-flex justify-content-between">
                                <span><i class="fa-solid fa-location-dot"></i> <?php echo $item['nombreProv']; ?></span>
                                <span><i class="fa-solid fa-users"></i> <?php echo $item['numMiembros']; ?> miembros</span>
                            </div>
                        </div>
                    </div>
                </a>

            <?php endforeach; ?>
        </main>
    </div>
</div>