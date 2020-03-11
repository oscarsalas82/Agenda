<?php

    include 'conexion.php';
    ObtenerEventos();
    function ObtenerEventos(){
       $Eventos="";
       IniciarConexion();
       $Consulta="select * from evento where IdUsuario=1";
       $Resultado= $GLOBALS['Conexion']->query($Consulta);

       while ($fila = mysqli_fetch_array($Resultado)){
         if(empty($Eventos)){
            $Eventos="[".json_encode(array("id"=> $fila['Id'], "title"=> $fila['Titulo'], "start"=> $fila['FechaInicio']." ". $fila['HoraInicio'], "allDay"=> $fila['DiaCompleto'], "end"=> $fila['FechaFinalizacion']." ".$fila['HoraFinalizacion']));
          }else{
            $Eventos=$Eventos.",".json_encode(array("id"=> $fila['Id'], "title"=> $fila['Titulo'], "start"=> $fila['FechaInicio']." ". $fila['HoraInicio'], "allDay"=> $fila['DiaCompleto'], "end"=> $fila['FechaFinalizacion']." ".$fila['HoraFinalizacion']));
          }//cierra if
        } //cierra
        if(!empty($Eventos)){
          $Eventos=$Eventos."]";
        }//cierra if

       DesactivarConexion();
       echo $Eventos;
       //echo json_encode(array("msg"=>"OK","Id"=>$GLOBALS['Conexion']->$Eventos));
    }
 ?>
