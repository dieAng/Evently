<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 transparente-oscuro">
                <h4 class="mb-3"><i class="fa-solid fa-plus"></i> Modifica el evento</h4>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <i class="fa-solid fa-signature"></i> <label for="titulo" class="form-label">Nombre del
                            Evento</label>
                        <input type="text" class="form-control" name="titulo" id="titulo"
                               value="<?php echo $viewmodel['titulo']; ?>"
                               placeholder="Ej: Torneo de fútbol"/>
                    </div>

                    <div class="mb-3">
                        <i class="fa-solid fa-calendar-days"></i> <label for="fechaHora" class="form-label">Fecha y Hora
                            del
                            Evento</label>
                        <input type="datetime-local" class="form-control" name="fechaHora" id="fechaHora"
                               value="<?php echo $viewmodel['fechaHora']; ?>"
                               placeholder="DD/MM/YYYY hh:mm"/>
                    </div>

                    <div class="mb-3">
                        <i class="fa-solid fa-location-dot"></i> <label for="provincia" class="form-label">Provincia del
                            Evento</label>
                        <input type="text" class="form-control" name="provincia" id="provincia"
                               value="<?php echo $viewmodel['nombreProv']; ?>" list="listProv"/>
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

                    <div class="mb-3">
                        <i class="fa-solid fa-signature"></i> <label for="desc" class="form-label">Descripción
                            del Evento</label>
                        <textarea class="form-control" name="desc" id="desc" rows="3"
                                  placeholder="Descripción del evento..."><?php echo $viewmodel['desc'] ?></textarea>
                    </div>

                    <input type="submit" name="submit" class="btn btn-success w-100 fa fa-fade"
                           value="&#xf044; Modificar Evento">

                    <br>
                    <br>

                    <a class="btn btn-danger w-100" onclick="window.history.back(); return false;">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>