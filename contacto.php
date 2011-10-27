<?php
    $link = mysql_connect("localhost","root","ackbar") OR die("No se pudo realizar la conexión");
    mysql_select_db("sistema13_web", $link);
    
    $nombre     =   utf8_decode(mysql_real_escape_string($_POST["nombre"]));
    $email      =   utf8_decode(mysql_real_escape_string($_POST["email"]));
    $mensaje    =   utf8_decode(mysql_real_escape_string($_POST["mensaje"]));
    
    $sql="INSERT INTO contacto(nombre, email, mensaje) values ('$nombre','$email', '$mensaje')";
    if(!mysql_query($sql))
        die("Hubo un error al ingresar sus datos");
    mysql_close($link);
    echo "Su mensaje ha sido enviado";
    
?>