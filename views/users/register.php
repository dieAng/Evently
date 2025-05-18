<div class="container d-flex flex-column align-items-center justify-content-center"
     style="min-height: 100vh; margin-bottom: 0;">
    <div class="card p-4 shadow-sm w-100 transparente-oscuro" style="max-width: 50%; min-height: 60vh; margin-top: 0;">
        <h2 class="text-center mb-4"><i class="fa-solid fa-id-card"></i> Bienvenido, crea tu cuenta!</h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <div class="mb-3">
                    <i class="fa-solid fa-signature"></i> <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ejemplo"/>
                </div>

                <div class="mb-3">
                    <i class="fa-solid fa-city"></i> <label for="provincia" class="form-label">Provincia</label>
                    <input type="text" class="form-control" name="provincia" id="provincia"
                           placeholder="Ejemplo" list="listProv"/>
                    <datalist id="listProv">
                        <option value="Álava"></option>
                        <option value="Albacete"></option>
                        <option value="Alicante"></option>
                        <option value="Almería"></option>
                        <option value="Asturias"></option>
                        <option value="Ávila"></option>
                        <option value="Badajoz"></option>
                        <option value="Barcelona"></option>
                        <option value="Burgos"></option>
                        <option value="Cáceres"></option>
                        <option value="Cádiz"></option>
                        <option value="Cantabria"></option>
                        <option value="Castellón"></option>
                        <option value="Ciudad Real"></option>
                        <option value="Córdoba"></option>
                        <option value="Cuenca"></option>
                        <option value="Gerona"></option>
                        <option value="Granada"></option>
                        <option value="Guadalajara"></option>
                        <option value="Guipúzcoa"></option>
                        <option value="Huelva"></option>
                        <option value="Huesca"></option>
                        <option value="Islas Baleares"></option>
                        <option value="Jaén"></option>
                        <option value="La Coruña"></option>
                        <option value="La Rioja"></option>
                        <option value="Las Palmas"></option>
                        <option value="León"></option>
                        <option value="Lérida"></option>
                        <option value="Lugo"></option>
                        <option value="Madrid"></option>
                        <option value="Málaga"></option>
                        <option value="Murcia"></option>
                        <option value="Navarra"></option>
                        <option value="Orense"></option>
                        <option value="Palencia"></option>
                        <option value="Pontevedra"></option>
                        <option value="Salamanca"></option>
                        <option value="Santa Cruz de Tenerife"></option>
                        <option value="Segovia"></option>
                        <option value="Sevilla"></option>
                        <option value="Soria"></option>
                        <option value="Tarragona"></option>
                        <option value="Teruel"></option>
                        <option value="Toledo"></option>
                        <option value="Valencia"></option>
                        <option value="Valladolid"></option>
                        <option value="Vizcaya"></option>
                        <option value="Zamora"></option>
                        <option value="Zaragoza"></option>
                        <option value="Ceuta"></option>
                        <option value="Melilla"></option>
                    </datalist>
                </div>
            </div>

            <br>

            <div class="mb-3">
                <div class="mb-3">
                    <i class="fa-solid fa-envelope"></i> <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="ejemplo@ejemplo.ejemplo"/>
                </div>

                <div class="mb-3">
                    <i class="fa-solid fa-key"></i> <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" id="contrasena"
                           placeholder="••••••••"/>
                </div>

                <div class="mb-3">
                    <i class="fa-solid fa-key"></i> <label for="contrasena2" class="form-label">Confirma la
                        Contraseña</label>
                    <input type="password" class="form-control" name="contrasena2" id="contrasena2"
                           placeholder="••••••••"/>
                </div>
            </div>

            <br>

            <input class="btn btn-primary w-100 fa fa-fade" style="font-size: 20px;" name="submit" type="submit"
                   value="&#xf2c2; Registrarse">
        </form>
        <p class="text-center mt-3">¿Ya tienes una cuenta? <a href="<?php echo ROOT_PATH; ?>users/login">Inicia
                Sesión</a></p>
    </div>
</div>