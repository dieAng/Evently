<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 transparente-oscuro">
                <h4 class="mb-3"><i class="fa-solid fa-plus"></i> Cambia tu contraseña</h4>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <i class="fa-solid fa-signature"></i> <label for="contrasenaActual" class="form-label">Contraseña
                            Actual</label>
                        <input type="password" class="form-control" name="contrasenaActual" id="contrasenaActual"
                               placeholder="••••••••"/>
                    </div>

                    <div class="mb-3">
                        <i class="fa-solid fa-signature"></i> <label for="contrasenaNueva" class="form-label">Contraseña
                            Nueva</label>
                        <input type="password" class="form-control" name="contrasenaNueva" id="contrasenaNueva"
                               placeholder="••••••••"/>
                    </div>

                    <div class="mb-3">
                        <i class="fa-solid fa-signature"></i> <label for="contrasenaNueva2" class="form-label">Confirma
                            la Contraseña Nueva</label>
                        <input type="password" class="form-control" name="contrasenaNueva2" id="contrasenaNueva2"
                               placeholder="••••••••"/>
                    </div>

                    <input type="submit" name="submit" class="btn btn-success w-100 fa-fade"
                           value="Cambiar Contraseña"/>

                    <br>
                    <br>

                    <a class="btn btn-danger w-100" onclick="window.history.back(); return false;">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>