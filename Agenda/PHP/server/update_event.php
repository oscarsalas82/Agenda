<?php

  include 'conexion.php';
  $ID=$_POST['id'];
  $FechaInicio=$_POST['start_date'];
  $FechaFinal=$_POST['end_date'];
  $HoraFinal=$_POST['end_hour'];
  $HoraInicial=$_POST['start_hour'];


  CrearEvento();

  function CrearEvento(){
    IniciarConexion();

    if ($GLOBALS['FechaFinal']=="Invalid da")
    {
      $Consulta = "update evento set FechaInicio='".$GLOBALS['FechaInicio']."', HoraInicio='".$GLOBALS['HoraInicial']."'  where Id=".$GLOBALS['ID'];

    }
      else {
        $Consulta = "update evento set FechaInicio='".$GLOBALS['FechaInicio']."', HoraInicio='".$GLOBALS['HoraInicial']."', FechaFinalizacion='".$GLOBALS['FechaFinal']."', HoraFinalizacion='".$GLOBALS['HoraFinal']."'
        where Id=".$GLOBALS['ID'];

      }

    if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
        echo json_encode(array("msg"=>"OK"));
    } else {
        echo json_encode(array("msg"=>"Error!!!"));
    }
    DesactivarConexion();
  }
?>
