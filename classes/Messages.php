<?php

class Messages
{
    public static function setMsg($text, $type)
    {
        if ($type == 'error') {
            switch ($text) {
                case 'error1':
                    $text = 'Por favor rellene todos los campos';
                    break;
                case 'error2':
                    $text = 'El email ya está registrado';
                    break;
                case 'error3':
                    $text = 'La provincia seleccionada no existe';
                    break;
                case 'error4':
                    $text = 'Inicio de sesión incorrecto, por favor intente de nuevo';
                    break;
                case 'error5':
                    $text = 'Confirmación de la contraseña inválida';
                    break;
                case 'error6':
                    $text = 'La contraseña nueva no debe ser igual que la actual';
                    break;
                case 'error7':
                    $text = 'Contraseña incorrecta';
                    break;
                case 'error8':
                    $text = 'Debe rellenar al menos un campo';
                    break;
                case 'error9':
                    $text = 'ERROR';
                    break;
                case 'error10':
                    $text = 'El evento no existe';
                    break;
                case 'error11':
                    $text = 'El email nuevo no debe ser igual que el actual';
                    break;
                default:
                    $text = 'ERROR desconocido';
            }

            $_SESSION['errorMsg'] = $text;
        } else {
            $_SESSION['successMsg'] = $text;
        }
    }

    public static function display()
    {
        if (isset($_SESSION['errorMsg'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['errorMsg'] . '</div>';
            unset($_SESSION['errorMsg']);
        }

        if (isset($_SESSION['successMsg'])) {
            echo '<div class="alert alert-success">' . $_SESSION['successMsg'] . '</div>';
            unset($_SESSION['successMsg']);
        }
    }
}