<?php
    require_once "./config/app.php";
    require_once "./autoload.php";
    require_once "./app/views/inc/session_start.php";

    if(isset($_GET['views'])){
        $url = explode("/", $_GET['views']);

    }
    else{
        $url = ["login"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "./app/views/inc/head.php"; ?>
</head>
<body>

<?php 
    use app\controllers\viewsController;

    $viewsController = new viewsController();
    $vista = $viewsController->obtenerVistasController($url[0]);
    require_once "./app/views/inc/script.php"; 
    
?>
</body>
</html>