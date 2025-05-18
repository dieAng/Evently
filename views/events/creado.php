<div class="container mt-4">
    <div class="row columna-fija">
        <main class="col-md-9">
            <h4 class="mb-4"><i class="fa-solid fa-thumbtack"></i> Mis Eventos - Que he creado</h4>
            <?php if ($viewmodel) : ?>

                <?php foreach ($viewmodel as $item) : ?>

                    <a href="<?php echo ROOT_URL; ?>/events/index?idEvento=<?php echo $item['idEvento']; ?>&idProvincia=<?php echo $item['idProvincia']; ?>&idOrganizador=<?php echo $item['idOrganizador']; ?>"
                       class="text-decoration-none text-white">
                        <div class="card mb-3 transparente-oscuro">
                            <div class="card-body">
                                <h4><i class="fa-solid fa-signature"></i> <?php echo $item['titulo']; ?>
                                    <small class="text-muted">
                                        @<?php echo $item['nombre']; ?>

                                        <br>
                                        <br>

                                        <pre style="font-family: 'Segoe UI', sans-serif;">
                                            <i class="fa-solid fa-calendar-days"></i>   <?php echo $item['dia']; ?> <?php echo $item['mes']; ?> <?php echo $item['ano']; ?></pre>
                                    </small>
                                </h4>

                                <br>

                                <p>
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

            <?php else : ?>

                <h5>Todavía no has creado ningún evento, <a href="<?php echo ROOT_URL; ?>/events/add">vamos a
                        cambiarlo!</a></h5>

            <?php endif; ?>
        </main>
    </div>
</div>