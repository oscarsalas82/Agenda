<?php

    include 'conexion.php';
    CrearUsuarios("Oscar","1980/08/25","oscar@hotmail.com","12345");
    CrearUsuarios("Alejandra","2000/10/01","alejandra@hotmail.com","12345");
    CrearUsuarios("Juan","1975/12/31","juan@hotmail.com","12345");

    function CrearUsuarios($Nombre,$FechaNacimiento,$UserName,$Password){
    IniciarConexion();
    $Consulta="Select * from usuario where Username='".$UserName."'";
    $Resultado= mysqli_num_rows($GLOBALS['Conexion']->query($Consulta));
    if($Resultado==0){
        $Consulta = "INSERT INTO usuario (Nombre, FechaNacimiento, Username, Password)
        VALUES ('".$Nombre."', '".$FechaNacimiento."', '".$UserName."', '".password_hash($Password, PASSWORD_BCRYPT)."')";

        if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
            echo "Usuario Creadro Satisfactoriamente";
        } else {
            echo "Error: " . $sql . "<br>" . $GLOBALS['Conexion']->error;
        }
    }
    else {
      echo "El Usuario ya existe, Intente con otro nombre de usuario, por favor....";
    }
    DesactivarConexion();
    }
 ?>
