<?php //continue.php
    session_start();

    if (isset($_SESSION['nombre']))
    {
        $nombre = htmlspecialchars($_SESSION['nombre']);

        echo "Bienvenido otra vez $nombre.<br>
               <a href=tabla.php>Escribe aqui</a>";
    }
    else echo "Por favor <a href=index.php>Click aqui</a>
                para ingresar";
?>
