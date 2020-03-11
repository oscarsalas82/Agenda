<?php

  include 'conexion.php';
  $Titulo=$_POST['titulo'];
  $FechaInicio=$_POST['start_date'];
  $FechaFinal=$_POST['end_date'];
  $HoraFinal=$_POST['end_hour'];
  $HoraInicial=$_POST['start_hour'];
  $TodoDia=$_POST['allDay'];

  if ($TodoDia=='true')
  {
    $TodoDia=1;
  }
  else {
    $TodoDia=0;
  }

  CrearEvento();

  function CrearEvento(){
    IniciarConexion();

    if ($GLOBALS['TodoDia']==0)
    {
      $Consulta = "INSERT INTO evento (IdUsuario, Titulo, FechaInicio, HoraInicio, FechaFinalizacion, HoraFinalizacion, DiaCompleto)
      VALUES (".$_COOKIE['IdUser'].", '".$GLOBALS['Titulo']."', '".$GLOBALS['FechaInicio']."', '".$GLOBALS['HoraInicial']."', '".$GLOBALS['FechaFinal']."', '".$GLOBALS['HoraFinal']."', '".$GLOBALS['TodoDia']."')";
    }
    else {
      $Consulta = "INSERT INTO evento (IdUsuario, Titulo, FechaInicio, DiaCompleto)
      VALUES (".$_COOKIE['IdUser'].", '".$GLOBALS['Titulo']."', '".$GLOBALS['FechaInicio']."', '".$GLOBALS['TodoDia']."')";
    }





    if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
        echo json_encode(array("msg"=>"OK","Id"=>$GLOBALS['Conexion']->insert_id));
    } else {
        echo json_encode(array("msg"=>"Error!!!"));
    }
    DesactivarConexion();
  }

 ?>
