<?php

class EventModel extends Model
{
    public function Index()
    {
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $idEvento = $_GET['idEvento'];
        $idProvincia = $_GET['idProvincia'];
        $idOrganizador = $_GET['idOrganizador'];

        $this->query('SET lc_time_names = \'es_ES\';');
        $this->execute();

        if (isset($_SESSION['is_logged_in']) && !isset($_GET['apuntado'])) {
            $this->comprobarApuntado($idEvento, $idProvincia, $idOrganizador);
        } else {
            return $this->selectEvt($idEvento, $idProvincia);
        }
        return null;
    }

    public function add()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post) && $post['submit']) {
            $titulo = $post['titulo'];
            $desc = $post['desc'];
            $fechaHora = $post['fechaHora'];
            $provincia = $post['provincia'];

            if ($titulo == '' || $desc == '' || $fechaHora == '' || $provincia == '') {
                Messages::setMsg('error1', 'error');
                return;
            }

            $idProvincia = $this->convertNombreProvToId($provincia);

            $this->insertarEvt($titulo, $desc, $fechaHora, $idProvincia);

            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . '/home/index');
            }
        }
        return null;
    }

    public function update()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $idEvento = $_GET['idEvento'];
        $idProvincia = $_GET['idProvincia'];

        if (isset($post['submit']) && $post['submit']) {
            $titulo = $post['titulo'];
            $desc = $post['desc'];
            $fechaHora = $post['fechaHora'];
            $provinciaNueva = $post['provincia'];

            if ($titulo == '' || $desc == '' || $fechaHora == '' || $provinciaNueva == '') {
                Messages::setMsg('error1', 'error');
                return;
            }

            $idProvinciaNueva = $this->convertNombreProvToId($provinciaNueva);
            if (!$idProvinciaNueva) {
                Messages::setMsg('error3', 'error');
                return;
            }

            $this->updateEvt($titulo, $desc, $fechaHora, $idProvinciaNueva, $idEvento, $idProvincia);

        } else {
            return $this->selectEvt($idEvento, $idProvincia, true);
        }
        return null;
    }

    public function delete()
    {
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if (isset($_GET['idEvento']) && isset($_GET['idProvincia']) && isset($_GET['validar'])) {
            $idEvento = $_GET['idEvento'];
            $idProvincia = $_GET['idProvincia'];

            $this->comprobarOrganizador($idEvento);

            $this->deleteEvt($idEvento, $idProvincia);

            header('Location: ' . ROOT_URL . '/home/index');
        }
    }

    public function apuntarse()
    {
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if (isset($_GET['idEvento']) && isset($_GET['idProvincia']) && isset($_GET['validar'])) {
            $idEvento = $_GET['idEvento'];
            $idProvincia = $_GET['idProvincia'];
            $idOrganizador = $_GET['idOrganizador'];

            $this->apuntarUsr($idEvento, $idProvincia);

            header('Location: ' . ROOT_URL . '/events/index?idEvento=' . $idEvento . '&idProvincia=' . $idProvincia . '&idOrganizador=' . $idOrganizador);
        }
    }

    public function desapuntarse()
    {
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if (isset($_GET['idEvento']) && isset($_GET['idProvincia']) && isset($_GET['validar'])) {
            $idEvento = $_GET['idEvento'];
            $idProvincia = $_GET['idProvincia'];
            $idOrganizador = $_GET['idOrganizador'];

            $this->desapuntarUsr($idEvento, $idProvincia);

            header('Location: ' . ROOT_URL . '/events/index?idEvento=' . $_GET['idEvento'] . '&idProvincia=' . $_GET['idProvincia'] . '&idOrganizador=' . $_GET['idOrganizador']);
        }
    }

    public function apuntado()
    {
        return $this->selectEvtUsr(1);
    }

    public function creado()
    {
        return $this->selectEvtUsr(2);
    }
}