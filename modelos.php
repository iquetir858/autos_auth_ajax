<!DOCTYPE html>
<html>

<head>
    <style>
        figure {
            border: 1px #cccccc solid;
            padding: 4px;
            margin: auto;
        }

        figcaption {
            background-color: navy;
            color: white;
            font-weight: bolder;
            font-style: italic;
            padding: 2px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Obtenemos el objeto del cliente
    require_once 'client.php';

    //Obtenemos los modelos según la marca pasada como parámetro
    $marca = $_GET['marca'] ?? 'Ford';
    $modelos = $client->ObtenerModelosPorMarca($marca);
    ?>
    <h1>Modelos disponibles marca: <?php echo $marca ?> </h1>
    <?php
    foreach ($modelos as $modelo) {
    ?>
        <figure>
            <img src="images/<?php echo $marca ?>.png" alt="logo <?php echo $marca ?>" width="75px" />
            <figcaption><?php echo $modelo["modelo"] ?></figcaption>
        </figure>
        <?php
    }
    ?>

</body>

</html>