<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evently</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="website icon" href="../assets/img/logoNav.jpg" type="image/x-icon"/>
</head>

<body>
<!-- Nav -->
<nav class="navbar navbar-expand px-4 nav-fija transparente-claro">
    <a class="navbar-brand fw-bold" href="<?php echo ROOT_URL; ?>/home/index">
        <img src="../assets/img/logo.jpg" alt="logo" class="logo"/>
    </a>
    <?php if (isset($_SESSION['is_logged_in'])) : ?>
        <div class="ms-auto d-flex align-items-center">
            <a href="<?php echo ROOT_URL; ?>/users/index" class="btn btn-sm"
               style="font-size: 20px; margin-left: 5px;">
                <i class="fa-solid fa-user"></i> <?php echo $_SESSION['user_data']['nombre']; ?></a>
            <a href="<?php echo ROOT_URL; ?>/users/logout" class="btn btn-outline-danger btn-sm"
               style="font-size: 20px; margin-left: 5px;">
                <i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal"></i> CERRAR SESIÓN</a>
        </div>
    <?php else : ?>
        <div class="ms-auto d-flex align-items-center">
            <a href="<?php echo ROOT_URL; ?>/users/login" class="btn btn-sm"
               style="font-size: 20px; margin-left: 5px;">
                <i class="fa-solid fa-arrow-right-to-bracket"></i> INICIAR SESIÓN</a>
            <a href="<?php echo ROOT_URL; ?>/users/register" class="btn btn-outline-success"
               style="font-size: 20px; margin-left: 5px;">
                <i class="fa-solid fa-id-card"></i> REGISTRARSE</a>
        </div>
    <?php endif; ?>
</nav>

<!-- Menu -->
<?php if (isset($_SESSION['is_logged_in']) && $view != 'views/Events/add.php' && $view != 'views/Events/delete.php'
    && $view != 'views/Events/update.php' && $view != 'views/Events/apuntarse.php' && $view != 'views/Events/desapuntarse.php'
    && $view != 'views/Users/changeEmail.php' && $view != 'views/Users/changePassword.php') : ?>

    <div class="container mt-4">
        <div class="row columna-fija">
            <aside class="col-md-3 mb-4 menu-fijo">
                <a href="<?php echo ROOT_URL; ?>/users/index" class="text-decoration-none text-white">
                    <div class="card mb-3 transparente-oscuro">
                        <div class="card-body text-center">
                            <h4><i class="fa-solid fa-user"></i> Perfil</h4>

                            <br>
                            <br>

                            <h5 class="card-title"><?php echo $_SESSION['user_data']['nombre']; ?></h5>
                            <p class="small"><?php echo $_SESSION['user_data']['provincia']; ?>, España</p>

                            <br>

                            <?php if ($view == 'views/Users/index.php' || $view == 'views/Events/apuntado.php' || $view == 'views/Events/creado.php') : ?>

                                <a href="<?php echo ROOT_URL; ?>/users/changeEmail" class="btn btn-outline-light">Cambiar
                                    email</a>

                                <br>
                                <br>

                                <a href="<?php echo ROOT_URL; ?>/users/changePassword" class="btn btn-outline-light">Cambiar
                                    la contraseña</a>
                            <?php endif; ?>

                        </div>
                    </div>
                </a>

                <div class="d-grid gap-2 transparente-oscuro">
                    <a href="<?php echo ROOT_URL; ?>/events/add" class="btn btn-success">
                        <i class="fa-solid fa-plus"></i>
                        CREAR EVENTO</a>
                </div>
            </aside>
        </div>
    </div>

<?php endif; ?>

<!-- Contenido/Main -->
<div class="container">
    <div class="row">
        <?php Messages::display();
        require($view); ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ae9a063981.js" crossorigin="anonymous"></script>
</body>

</html>