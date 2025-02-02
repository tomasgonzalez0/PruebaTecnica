<nav class="navbar">
    <div class="navbar-brand">
        <a class="navbar-item" href="<?php echo APP_URL; ?>dashboard/">
            <img src="<?php echo APP_URL; ?>app/views/img/logo.png" alt="ACEMA INGENIERIA" width="100" height="100">
        </a>
        <div class="navbar-burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">

        <div class="navbar-start">
            <a class="navbar-item" href="<?php echo APP_URL; ?>dashboard/">
                Home
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="#">
                    Usuarios
                </a>
                <div class="navbar-dropdown is-boxed">

                    <a class="navbar-item" href="<?php echo APP_URL; ?>userNew/">
                        Nuevo usuario
                    </a>
                    <a class="navbar-item" href="<?php echo APP_URL; ?>userList/">
                        Lista usuarios
                    </a>
                    <a class="navbar-item" href="<?php echo APP_URL; ?>userSearch/">
                        Buscar usuarios
                    </a>

                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    ** <?php echo $_SESSION['usuario']; ?> **
                </a>
                <div class="navbar-dropdown is-boxed">

                    <a class="navbar-item" href="<?php echo APP_URL."userUpdate/".$_SESSION['id']."/"; ?>">
                        Mi cuenta
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="<?php echo APP_URL."logOut/"; ?>" id="btn_exit" >
                        Salir
                    </a>

                </div>
            </div>
        </div>

    </div>
</nav>