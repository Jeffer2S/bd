<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuarto</title>
    <link rel="stylesheet" href="./css/index.css">
    
</head>
<body>
    <header>
        <img src="./img/header.png" alt="" width="100%" >
    </header>
    <nav>
        <ul>
            <li><a href="index.php?action=inicio">Inicio</a></li>
            <li><a href="index.php?action=nosotros">Nosotros</a></li>
            <li><a href="index.php?action=servicios">Servicios</a></li>
            <li><a href="index.php?action=contactanos">Contatanos</a></li>
        </ul>
    </nav>

    <section>
        <?php
            $mvc = new MvcController();
            $mvc->enlacesPaginasContrller();
        ?>
    </section>

    <footer>
        Derechos reservados @CuartoSoftware
    </footer>

</body>
</html>