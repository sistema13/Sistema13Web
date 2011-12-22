<?php
// @TODO: Agregar envio de correo electronico avisando que hay un nuevo mensaje

    include_once("configuracion.php");
    $link = mysql_connect($srvr,$usr,$pass) OR die("No se pudo realizar la conexion");
    mysql_select_db($dbase, $link);
    
    $nombre     =   utf8_decode(mysql_real_escape_string($_POST["nombre"]));
    $email      =   utf8_decode(mysql_real_escape_string($_POST["email"]));
    $mensaje    =   utf8_decode(mysql_real_escape_string($_POST["mensaje"]));
    
    $sql="INSERT INTO contacto(nombre, email, mensaje) values ('$nombre','$email', '$mensaje')";
    if(!mysql_query($sql))
        die("Hubo un error al ingresar sus datos");
    mysql_close($link);
    echo "Su mensaje ha sido enviado";
    
?>