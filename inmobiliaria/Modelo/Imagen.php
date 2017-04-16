<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imagen
 *
 * @author Junior Castillo Sanatana
 */
class imagen {

    private $id;
    private $nombre;
    private $prioridad;
    private $id_inmueble;

    function __construct($id, $nombre, $prioridad, $id_inmueble) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->prioridad = $prioridad;
        $this->id_inmueble = $id_inmueble;
       // echo"<br> Este es el id inmueble en la clase --> " .$this->id_inmueble . " <br> ";
    }

    //Getter
    public function getIdIMG() {
        return $this->id;
    }

    //Getter
    public function getnomreIMG() {
        return $this->nombre;
    }

    //Getter
    public function getprioridadIMG() {
        return $this->prioridad;
    }

    //Getter
    public function getid_inmuebleIMG() {
        return $this->id_inmueble;
    }

    //Inserto una fila
    public function insertIMG() {
        require_once 'conexion.php';
        $conexion = Inmobiliaria::conectar();
        $insercion = "INSERT INTO imagen(nombre_img,prioridad,id_inmueble)"
                . "VALUES (\"" . $this->nombre . "\", \"" . $this->prioridad  . "\", \"" . $this->id_inmueble . "\")";
        // echo $insercion;

        $conexion->exec($insercion);
    }
//***************** Compruebo que las imagenes no se repitan*********************************//

    public static function validarIMG($n,$i) {
        require_once 'conexion.php';
        $conexion = Inmobiliaria::conectar();
        $existenciaimagen = "SELECT * FROM imagen WHERE nombre_img LIKE '%$n' and id_inmueble LIKE '%$i'";
        $consulta = $conexion->query($existenciaimagen);
        //SI EXISTEN FILAS GUARDA LA CANTIDAD DE FILA
        $numrows = $consulta->rowCount();
        return $numrows;
    }

}
