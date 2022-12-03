<?php
include('../config/config.php'); /* LLAMAMOS CONFIG DE URLS */
include('../config/database.php'); /* CONEXION A LA BD */


class Patient{
    public $conexion; /* LLAMO LA CONEXION DE MI BASE DE DATOS */

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombredequienrecibe= $params['nombredequienrecibe'];
        $numerodequienrecibe= $params['numerodequienrecibe'];
        $direccion = $params['direccion'];
        $fechadeentrega = $params['fechadeentrega'];
        $horadeentrega = $params['horadeentrega'];
        $nombredequienenvia = $params['nombredequienenvia'];
        $mensaje = $params['mensaje'];
        $imagen = $params['imagen'];

        $insert= "INSERT INTO pedidos VALUES (NULL, '$nombredequienrecibe', '$numerodequienrecibe', '$direccion', '$fechadeentrega', '$horadeentrega', '$nombredequienenvia', '$mensaje', '$imagen')"; /* INSERTAR EN LA TABLA LOS SIGUIENTES VALORES */

        return mysqli_query($this->conexion, $insert); /* ENVIAR A LA BD TODO LO QUE ESTE DENTRO DE INSERT */

    }

     function getAll(){
        $basededatos= "SELECT * FROM pedidos"; 
        return mysqli_query($this->conexion, $basededatos);
    }

    function getOne($id){
        $sql = "SELECT * FROM pedidos WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
      }
    function update($params){
        $nombredequienrecibe= $params['nombredequienrecibe'];
        $numerodequienrecibe= $params['numerodequienrecibe'];
        $direccion = $params['direccion'];
        $fechadeentrega = $params['fechadeentrega'];
        $horadeentrega = $params['horadeentrega'];
        $nombredequienenvia = $params['nombredequienenvia'];
        $mensaje = $params['mensaje'];
        $imagen = $params['imagen'];
        $id = $params['id'];
  
        $update = " UPDATE pedidos SET nombredequienrecibe='$nombredequienrecibe', numerodequienrecibe='$numerodequienrecibe', direccion='$direccion', fechadeentrega='$fechadeentrega', horadeentrega='$horadeentrega', nombredequienenvia='$nombredequienenvia', mensaje='$mensaje', imagen='$imagen' WHERE id = $id";
        return mysqli_query($this->conexion, $update);
      }
  
    function delete($id){
        $eliminar= "DELETE FROM pedidos WHERE id = $id"; 
        return mysqli_query($this->conexion, $eliminar);
    } 

}



?>