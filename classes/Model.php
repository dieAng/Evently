<?php

abstract class Model
{
    protected $dbh;
    protected $stmt;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';', DB_USER, DB_PASS);
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
    protected function verificarSubmit($tipo, $uno = '', $dos = '', $tres = '', $cuatro = '', $cinco = '', $seis = '')
    {
        switch ($tipo) {
            case 1:
                if ($uno == '') {
                    Messages::setMsg('error1', 'error');
                    return;
                }
                break;

            case 2:
                if ($uno == '' || $dos == '') {
                    Messages::setMsg('error1', 'error');
                    return;
                }
                break;

            case 3:
                if ($uno == '' || $dos == '' || $tres == '') {
                    Messages::setMsg('error1', 'error');
                    return;
                }
                break;

            case 4:
                if ($uno == '' || $dos == '' || $tres == '' || $cuatro == '') {
                    Messages::setMsg('error1', 'error');
                    return;
                }
                break;

            case 5:
                if ($uno == '' || $dos == '' || $tres == '' || $cuatro == '' || $cinco == '') {
                    Messages::setMsg('error1', 'error');
                    return;
                }
                break;

            case 6:
                if ($uno == '' || $dos == '' || $tres == '' || $cuatro == '' || $cinco == '' || $seis == '') {
                    Messages::setMsg('error1', 'error');
                    return;
                }
                break;
        }
        return null;
    }
    */

    protected function convertNombreProvToId($nombreProv)
    {
        $this->query('SELECT idProvincia FROM provincia
                            WHERE nombreProv = :nombreProv');
        $this->bind(':nombreProv', $nombreProv);

        $row = $this->single();
        if ($row) {
            return $row['idProvincia'];
        } else {
            Messages::setMsg('error3', 'error');
            return null;
        }
    }

    protected function convertIdProvToNombre($idProvincia)
    {
        $this->query('SELECT nombreProv FROM provincia
                            WHERE idProvincia = :provincia');
        $this->bind(':provincia', $idProvincia);

        $row = $this->single();
        if ($row) {
            return $row['nombreProv'];
        } else {
            Messages::setMsg('error3', 'error');
            return null;
        }
    }

    protected function comprobarEmailExist($email)
    {
        $this->query('SELECT COUNT(*) numEmails FROM usuario 
                            WHERE email = :email');
        $this->bind(':email', $email);

        $numEmails = $this->single();
        if ($numEmails['numEmails'] > 0) {
            Messages::setMsg('error2', 'error');
            return;
        }
    }

    protected function confirmarContrasena($contrasena, $contrasena2)
    {
        if ($contrasena != $contrasena2) {
            Messages::setMsg('error5', 'error');
            return;
        }
    }

    protected function selectUsr($contrasenaHashed = '', $email = '')
    {
        if ($email != '') {
            $this->query('SELECT * FROM usuario
                                WHERE email = :email AND contrasena = :contrasena');
            $this->bind(':email', $email);
            $this->bind(':contrasena', $contrasenaHashed);
        } else {
            $this->query('SELECT * FROM usuario
                                WHERE idUsuario = :idUsuario AND contrasena = :contrasenaActual');
            $this->bind(':idUsuario', $_SESSION['user_data']['idUsuario']);
            $this->bind(':contrasenaActual', $contrasenaHashed);
        }

        return $this->single();
    }

    protected function selectEvt($idEvento = null, $idProvincia = null, $single = false)
    {
        $this->query('SET lc_time_names = \'es_ES\';');
        $this->execute();

        if ($idEvento != null && $idProvincia != null) {
            $this->query('SELECT evento.idEvento, titulo, evento.desc, nombre, idOrganizador, YEAR(fechaHora) ano, MONTHNAME(fechaHora) mes, DAY(fechaHora) dia,
                                       fechaHora, nombreProv, provincia.idProvincia, COUNT(apuntarse.idUsuario) numMiembros FROM evento JOIN usuario
                                ON evento.idOrganizador = usuario.idUsuario LEFT JOIN provincia
                                ON evento.idProvincia = provincia.idProvincia LEFT JOIN apuntarse
                                ON evento.idEvento = apuntarse.idEvento AND evento.idProvincia = apuntarse.idProvincia
                                WHERE evento.idEvento = :idEvento AND evento.idProvincia = :idProvincia
                                GROUP BY evento.idEvento, titulo, evento.desc, nombre, fechaHora, nombreProv');
            $this->bind(':idEvento', $idEvento);
            $this->bind(':idProvincia', $idProvincia);

        } else {
            $this->query('SELECT evento.idEvento, titulo, evento.desc, nombre, idOrganizador, YEAR(fechaHora) ano, MONTHNAME(fechaHora) mes, DAY(fechaHora) dia,
                                       fechaHora, nombreProv, provincia.idProvincia ,COUNT(apuntarse.idUsuario) numMiembros FROM evento JOIN usuario
                                ON evento.idOrganizador = usuario.idUsuario LEFT JOIN provincia
                                ON evento.idProvincia = provincia.idProvincia LEFT JOIN apuntarse
                                ON evento.idEvento = apuntarse.idEvento AND evento.idProvincia = apuntarse.idProvincia
                                GROUP BY evento.idEvento, titulo, evento.desc, nombre, fechaHora, nombreProv
                                ORDER BY fechaHora');
        }

        if ($single) {
            return $this->single();
        }
        return $this->resultSet();
    }

    protected function selectEvtUsr($tipo)
    {
        switch ($tipo) {
            case 1:
                $this->query('SET lc_time_names = \'es_ES\';');
                $this->execute();

                $this->query('SELECT evento.idEvento, titulo, evento.desc, nombre , idOrganizador, YEAR(fechaHora) ano, MONTHNAME(fechaHora) mes, DAY(fechaHora) dia,
                                           nombreProv, provincia.idProvincia, COUNT(apuntarse.idUsuario) numMiembros FROM evento JOIN usuario
                            ON evento.idOrganizador = usuario.idUsuario LEFT JOIN provincia
                            ON evento.idProvincia = provincia.idProvincia LEFT JOIN apuntarse
                            ON evento.idEvento = apuntarse.idEvento AND evento.idProvincia = apuntarse.idProvincia
                            WHERE evento.idEvento IN (SELECT apuntarse.idEvento FROM apuntarse
                                                      WHERE apuntarse.idUsuario = :idUsuario)
                            GROUP BY evento.idEvento, titulo, evento.desc, nombre, fechaHora, nombreProv');
                $this->bind(':idUsuario', $_SESSION['user_data']['idUsuario']);

                $rows = $this->single();
                if (!isset($rows)) {
                    return false;
                } else {
                    return $this->resultSet();
                }
                break;

            case 2:
                $this->query('SET lc_time_names = \'es_ES\';');
                $this->execute();

                $this->query('SELECT evento.idEvento, titulo, evento.desc, nombre , idOrganizador, YEAR(fechaHora) ano, MONTHNAME(fechaHora) mes, DAY(fechaHora) dia,
                                           nombreProv, provincia.idProvincia, COUNT(apuntarse.idUsuario) numMiembros FROM evento JOIN usuario
                            ON evento.idOrganizador = usuario.idUsuario LEFT JOIN provincia
                            ON evento.idProvincia = provincia.idProvincia LEFT JOIN apuntarse
                            ON evento.idEvento = apuntarse.idEvento AND evento.idProvincia = apuntarse.idProvincia
                            WHERE evento.idOrganizador = :idUsuario
                            GROUP BY evento.idEvento, titulo, evento.desc, nombre, fechaHora, nombreProv');
                $this->bind(':idUsuario', $_SESSION['user_data']['idUsuario']);

                $rows = $this->single();
                if (!isset($rows)) {
                    return false;
                } else {
                    return $this->resultSet();
                }
                break;
        }
        return null;
    }

    protected function comprobarApuntado($idEvento, $idProvincia, $idOrganizador)
    {
        $this->query('SELECT * FROM apuntarse
                            WHERE idUsuario = :idUsuario AND idEvento = :idEvento AND idProvincia = :idProvincia');
        $this->bind(':idUsuario', $_SESSION['user_data']['idUsuario']);
        $this->bind(':idEvento', $idEvento);
        $this->bind(':idProvincia', $idProvincia);

        $rows = $this->single();
        if ($rows) {
            header('Location: ' . ROOT_URL . '/events/index?idEvento=' . $idEvento . '&idProvincia=' . $idProvincia . '&idOrganizador=' .
                $idOrganizador . '&apuntado=true');

        } else {
            header('Location: ' . ROOT_URL . '/events/index?idEvento=' . $idEvento . '&idProvincia=' . $idProvincia . '&idOrganizador=' .
                $idOrganizador . '&apuntado=false');
        }
    }

    protected function comprobarOrganizador($idEvento)
    {
        $this->query('SELECT * FROM evento
                            WHERE idEvento = :idEvento AND idOrganizador = :idOrganizador');
        $this->bind(':idEvento', $idEvento);
        $this->bind(':idOrganizador', $_SESSION['user_data']['idUsuario']);

        $rows = $this->single();
        if (!$rows) {
            Messages::setMsg('error9', 'error');
            return;
        }
    }

    protected function insertarUsr($nombre, $email, $contrasena, $idProvincia)
    {
        $this->query('INSERT INTO usuario (nombre , email, contrasena, idProvincia)
                            VALUES(:nombre, :email, :contrasena, :idProvincia)');
        $this->bind(':nombre', $nombre);
        $this->bind(':email', $email);
        $this->bind(':contrasena', $contrasena);
        $this->bind(':idProvincia', $idProvincia);

        $this->execute();
    }

    protected function insertarEvt($titulo, $desc, $fechaHora, $idProvincia)
    {
        $this->query('INSERT INTO evento (titulo, evento.desc, fechaHora, idOrganizador, idProvincia)
                            VALUES(:titulo, :desc, :fechaHora, :idOrganizador, :idProvincia)');
        $this->bind(':titulo', $titulo);
        $this->bind(':desc', $desc);
        $this->bind(':fechaHora', $fechaHora);
        $this->bind(':idOrganizador', $_SESSION['user_data']['idUsuario']);
        $this->bind(':idProvincia', $idProvincia);

        $this->execute();
    }

    protected function deleteEvt($idEvento, $idProvincia)
    {
        $this->query('DELETE FROM evento
                            WHERE idEvento = :idEvento AND idOrganizador = :idOrganizador AND idProvincia = :idProvincia');
        $this->bind(':idEvento', $idEvento);
        $this->bind(':idProvincia', $idProvincia);
        $this->bind(':idOrganizador', $_SESSION['user_data']['idUsuario']);

        $this->execute();
    }

    protected function apuntarUsr($idEvento, $idProvincia)
    {
        $this->query('INSERT INTO apuntarse (idUsuario, idEvento, idProvincia)
                            VALUES (:idUsuario, :idEvento, :idProvincia)');
        $this->bind(':idUsuario', $_SESSION['user_data']['idUsuario']);
        $this->bind(':idEvento', $idEvento);
        $this->bind(':idProvincia', $idProvincia);

        $this->execute();
    }

    protected function desapuntarUsr($idEvento, $idProvincia)
    {
        $this->query('DELETE FROM apuntarse
                            WHERE idUsuario = :idUsuario AND idEvento = :idEvento AND idProvincia = :idProvincia');
        $this->bind(':idUsuario', $_SESSION['user_data']['idUsuario']);
        $this->bind(':idEvento', $idEvento);
        $this->bind(':idProvincia', $idProvincia);

        $this->execute();
    }

    protected function updateEmail($emailNuevo)
    {
        $this->query('UPDATE usuario SET email = :emailNuevo
                            WHERE idUsuario = :idUsuario');
        $this->bind(':emailNuevo', $emailNuevo);
        $this->bind(':idUsuario', $_SESSION['user_data']['idUsuario']);

        $this->execute();

        $_SESSION['user_data']['email'] = $emailNuevo;
    }

    protected function updatePassword($contrasenaNueva)
    {
        $this->query('UPDATE usuario SET contrasena = :contrasenaNueva
                            WHERE idUsuario = :idUsuario');
        $this->bind(':contrasenaNueva', $contrasenaNueva);
        $this->bind(':idUsuario', $_SESSION['user_data']['idUsuario']);

        $this->execute();
    }

    protected function updateEvt($titulo, $desc, $fechaHora, $idProvinciaNueva, $idEvento, $idProvincia)
    {
        $this->query('UPDATE evento SET titulo = :titulo, evento.desc = :desc, idProvincia = :idProvinciaNueva, fechaHora = :fechaHora
                            WHERE idEvento = :idEvento AND idOrganizador = :idOrganizador AND idProvincia = :idProvinciaActual');
        $this->bind(':titulo', $titulo);
        $this->bind(':desc', $desc);
        $this->bind(':fechaHora', $fechaHora);
        $this->bind(':idProvinciaNueva', $idProvinciaNueva);
        $this->bind(':idEvento', $idEvento);
        $this->bind(':idOrganizador', $_SESSION['user_data']['idUsuario']);
        $this->bind(':idProvinciaActual', $idProvincia);

        $this->execute();

        header('Location: ' . ROOT_URL . '/events/index?idEvento=' . $idEvento . '&idProvincia=' . $idProvinciaNueva);
    }

    protected function declareSession($idUsuario, $nombre, $email, $provincia)
    {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_data'] = array(
            "idUsuario" => $idUsuario,
            "nombre" => $nombre,
            "email" => $email,
            "provincia" => $provincia
        );
    }
}