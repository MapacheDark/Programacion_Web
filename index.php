<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);

    if($conexion->connect_error) die("Error fatal");

    if (isset($_POST['username'])&&
        isset($_POST['password']))
    {
        $un_temp = mysql_entities_fix_string($conexion, $_POST['username']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);
        $query   = "SELECT * FROM usuarios WHERE username='$un_temp'";
        $result  = $conexion->query($query);
        echo "Pulse aqui para <a href=index.php>Salir </a> <br>" ;
        if (!$result) die ("Usuario no encontrado");
        elseif ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();

            if (password_verify($pw_temp, $row[3])) 
            {
                session_start();
                $_SESSION['nombre']=$row[1];
                echo htmlspecialchars("
                    hola $row[1], has ingresado como '$row[2]'");
                die ("<p><a href='continue.php'>
              Click para continuar</a></p>");
            }
            else {
                echo "Usuarios/password incorrecto <p><a href='signup.php'>
            Registrarse</a></p>";
            }
        }
        else {
          echo "Usuarios/password incorrecto <p><a href='signup.php'>
      Registrarse</a></p>";
      }   
    }
    else
    {
      echo <<<_END
      <h1>Iniciar sesion</h1>
      <form action="index.php" method="post"><pre>
      Usuario  <input type="text" name="username">
      Password <input type="text" name="password">
               <input type="submit" value="INGRESAR">
      </form>
      _END;
    }
    echo " <br><p><a href='signup.php'> Registrate</a></p>";


    $conexion->close();

    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
       // if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }  
?>
