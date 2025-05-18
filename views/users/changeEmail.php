<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 transparente-oscuro">
                <h4 class="mb-3"><i class="fa-solid fa-plus"></i> Cambia tu contraseña</h4>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <i class="fa-solid fa-envelope"></i> <label for="emailNuevo" class="form-label">Email
                            Nuevo</label>
                        <input type="email" class="form-control" name="emailNuevo" id="emailNuevo"
                               placeholder="ejemplo@ejemplo.ejemplo"/>
                    </div>

                    <div class="mb-3">
                        <i class="fa-solid fa-signature"></i> <label for="contrasena" class="form-label">
                            Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena"
                               placeholder="••••••••"/>
                    </div>

                    <input type="submit" name="submit" class="btn btn-success w-100 fa-fade"
                           value="Cambiar Email"/>

                    <br>
                    <br>

                    <a class="btn btn-danger w-100" onclick="window.history.back(); return false;">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>