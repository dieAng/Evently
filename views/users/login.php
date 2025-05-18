<div class="container d-flex flex-column align-items-center justify-content-center"
     style="min-height: 100vh; margin-bottom: 0;">
    <div class="card p-4 shadow-sm w-100 transparente-oscuro" style="max-width: 55%; min-height: 40vh; margin-top: 0;">
        <h2 class="text-center mb-4"><i class="fa-solid fa-id-card"></i> Bienvenido, inicia sesión con tu cuenta!</h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <i class="fa-solid fa-envelope"></i> <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@ejemplo.ejemplo"/>
            </div>

            <div class="mb-3">
                <i class="fa-solid fa-key"></i> <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="••••••••"/>
            </div>

            <br>

            <input class="btn btn-primary w-100 fa fa-fade" style="font-size: 20px" name="submit" type="submit"
                   value="&#xf2c2; Iniciar Sesion">
            <p class="text-center mt-3">¿No tienes cuenta todavía? <a href="<?php echo ROOT_PATH; ?>users/register">¡Crea
                    una!</a></p>
        </form>
    </div>
</div>