<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tipo
 *
 * @author JUNIOR CASTILLO
 */
class Tipo {

  private $idtipo;
  private $nombre;

  function __construct($idtipo, $nombre) {
    $this->idtipo = $idtipo;
    $this->nombre = $nombre;
  }

  public function getIdTipo() {
    return $this->idtipo;
  }

  public function getNombreTipo() {
    return $this->nombre;
  }


 
  public static function getListTipo() {
    
    require_once 'Conexion.php';
    $conexion = Inmobiliaria::conectar();
 
    $seleccion = "SELECT idtipo, nombre 
			FROM tipo
			ORDER BY nombre";
    $consulta = $conexion->query($seleccion);

    $listadoTipo = [];
//Creo un nuevo objeto 
    while ($registro = $consulta->fetchObject()) {
       $listadoTipo[] = new Tipo($registro->idtipo, $registro->nombre);
               
               
    }
   
    return  $listadoTipo;
  }

}
