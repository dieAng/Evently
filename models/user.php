<?php

class UserModel extends Model
{
    public function Index()
    {
        return;
    }

    public function register()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit']) && $post['submit']) {
            $nombre = $post['nombre'];
            $provincia = $post['provincia'];
            $idProvincia = $this->convertNombreProvToId($provincia);
            $email = $post['email'];
            $contrasenaHashed = md5($post['contrasena']);
            $contrasena2Hashed = md5($post['contrasena2']);

            if ($nombre == '' || $provincia == '' || $email == '' || $contrasenaHashed == '' || $contrasena2Hashed == '') {
                Messages::setMsg('error1', 'error');
                return;
            }

            $this->comprobarEmailExist($email);

            $this->confirmarContrasena($contrasenaHashed, $contrasena2Hashed);

            $this->insertarUsr($nombre, $email, $contrasenaHashed, $idProvincia);

            if ($this->lastInsertId()) {
                header('Location: ' . ROOT_URL . '/users/login');
            }
        }
    }

    public function login()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit']) && $post['submit']) {
            $email = $post['email'];
            $contrasenaHashed = md5($post['contrasena']);

            if ($email == '' || $contrasenaHashed == '') {
                Messages::setMsg('error1', 'error');
                return;
            }

            $row = $this->selectUsr($contrasenaHashed, $email);

            if ($row) {
                $idUsuario = $row['idUsuario'];
                $nombre = $row['nombre'];
                $email = $row['email'];
                $idProvincia = $row['idProvincia'];
            } else {
                Messages::setMsg('error4', 'error');
                return;
            }

            $provincia = $this->convertIdProvToNombre($idProvincia);

            $this->declareSession($idUsuario, $nombre, $email, $provincia);

            header('Location: ' . ROOT_URL . '/home/index');
        }
    }

    public
    function changePassword()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit']) && $post['submit']) {
            $contrasenaActualHashed = md5($post['contrasenaActual']);
            $contrasenaNuevaHashed = md5($post['contrasenaNueva']);
            $contrasenaNueva2Hashed = md5($post['contrasenaNueva2']);

            if ($contrasenaActualHashed == '' || $contrasenaNuevaHashed == '' || $contrasenaNueva2Hashed == '') {
                Messages::setMsg('error1', 'error');
                return;
            }

            $this->confirmarContrasena($contrasenaNuevaHashed, $contrasenaNueva2Hashed);

            if ($contrasenaActualHashed == $contrasenaNuevaHashed) {
                Messages::setMsg('error6', 'error');
                return;
            }

            $row = $this->selectUsr($contrasenaActualHashed);

            if ($row) {
                $this->updatePassword($contrasenaNuevaHashed);

                header('Location: ' . ROOT_URL . '/users/index');
            } else {
                Messages::setMsg('error7', 'error');
            }
        }
    }

    public
    function changeEmail()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit']) && $post['submit']) {
            $emailNuevo = $post['emailNuevo'];
            $contrasena = md5($post['contrasena']);

            if ($emailNuevo == '' || $contrasena == '') {
                Messages::setMsg('error1', 'error');
                return;
            }

            if ($_SESSION['user_data']['email'] == $post['emailNuevo']) {
                Messages::setMsg('error11', 'error');
                return;
            }

            $row = $this->selectUsr($contrasena);

            if ($row) {
                $this->updateEmail($emailNuevo);

                header('Location: ' . ROOT_URL . '/users/index');
            } else {
                Messages::setMsg('error7', 'error');
            }
        }
    }
}