<?php 
    
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db,$port);
    if ($conexion->connect_error) die ("Fatal error");
    if (isset($_POST['delete']) && isset($_POST['fecha']))
    {   
        $fecha = get_post($conexion, 'fecha');
        $query = "DELETE FROM datas WHERE fecha='$fecha'";
        $result = $conexion->query($query);
        if (!$result) echo "BORRAR falló"; 
    }
    if (isset($_POST['titulo']) &&
        isset($_POST['texto']) &&
        isset($_POST['fecha']))
    {     
        $titulo = get_post($conexion, 'titulo');
        $texto = get_post($conexion, 'texto');
        $fecha = get_post($conexion, 'fecha');
        
        $query = "INSERT INTO datas VALUE" .
            "(' ', '$titulo', '$texto', '$fecha')";
        $result = $conexion->query($query);
        if (!$result) echo "INSERT falló <br><br>";
    }
    echo <<<_END
    <form action="tabla.php" method="post"><pre>
        Titulo: <input type="text" name="titulo">
        Texto:  <input type="text" name="texto">
         Fecha: <input type="date" name="fecha">
             <input type="submit" value="Agregar Nota">
    </pre></form>
    _END;
    $query = "SELECT * FROM datas";
    $result = $conexion->query($query);
    if (!$result) die ("Falló el acceso a la base de datos");
    $rows = $result->num_rows;
    for ($j = 0; $j < $rows; $j++)
    {
        $row = $result->fetch_array(MYSQLI_NUM);
        $r1 = htmlspecialchars($row[1]);
        $r2 = htmlspecialchars($row[2]);
        $r3 = htmlspecialchars($row[3]);
        echo <<<_END
        <pre> 
        Titulo: $r1
        Texto: $r2
        Fecha: $r3    
        </pre>
          </pre>
        <form action='tabla.php' method='post'>
        <input type='hidden' name='delete' value='yes'>
        <input type='hidden' name='fecha' value='$r3'>
        <input type='submit' value='Borrar Nota'></form>
      _END;
    } echo "Pulse aqui para.<br> <a href=index.php>Salir </a>" ;
    $result->close();
    $conexion->close();
    //evitar inyeccion sql
    function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }
?>