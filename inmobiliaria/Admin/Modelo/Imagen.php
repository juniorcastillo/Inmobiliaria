<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
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
class Imagen {

    private $id;
    private $nombre;
    private $promocion;
    private $portada;
    private $id_inmueble;
    private $provincia_inmueble;

    function __construct($id, $nombre, $promocion, $id_inmueble, $portada, $provincia) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->promocion = $promocion;
        $this->id_inmueble = $id_inmueble;
        $this->provincia_inmueble = $provincia;
        $this->portada = $portada;
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
    public function getpromocionIMG() {
        return $this->promocion;
    }

    //Getter
    public function getid_inmuebleIMG() {
        return $this->id_inmueble;
    }

    //Getter
    public function getprovincia_inmuebleIMG() {
        return $this->provincia_inmueble;
    }

    //Inserto una fila
    public function insertIMG() {
        require_once 'Conexion.php';
        $conexion = Inmobiliaria::conectar();
        $insercion = "INSERT INTO imagen(nombre_img,promocion,id_inmueble,portada)"
                . "VALUES (\"" . $this->nombre . "\", \"" . $this->promocion . "\", \"" . $this->id_inmueble . "\", \"" . $this->portada . "\")";
        // echo $insercion;

        $conexion->exec($insercion);
    }

//***************** Devuelve las imaganes del id del imnueble que se pasa *********************************//


    public static function list_imagenes_inmueble($id) {
        require_once 'Conexion.php';
        $conexion = Inmobiliaria::conectar();
        $existenciaimagen = "SELECT * FROM imagen WHERE id_inmueble='$id'";
        $consulta = $conexion->query($existenciaimagen);
        //SI EXISTEN FILAS GUARDA LA CANTIDAD DE FILA

        $list_imagenes_inmueble_array = [];
//Creo un nuevo objeto 
        while ($registro = $consulta->fetchObject()) {
            $list_imagenes_inmueble_array [] = new Imagen($registro->id, $registro->nombre_img, $registro->promocion, $registro->id_inmueble);
        }

        return $list_imagenes_inmueble_array;
    }

    //***************** Borra las imaganes del id del imnueble que se pasa *********************************//

    public static function borrar_imagenes_inmueble($id) {
        require_once 'Conexion.php';
        $conexion = Inmobiliaria::conectar();
        $borrar_imagen = "DELETE FROM imagen WHERE id_inmueble='$id'";
        $conexion->exec($borrar_imagen);
    }

//***************** Cuenta la cantidad de imagenes que tiene un inmueble *********************************//

    public static function cuentaIMG($id) {
        require_once 'Conexion.php';
        $conexion = Inmobiliaria::conectar();
        $existenciaimagen = "SELECT * FROM imagen WHERE id_inmueble='$id'";
        $consulta = $conexion->query($existenciaimagen);
        //SI EXISTEN FILAS GUARDA LA CANTIDAD DE FILA
        $numrows = $consulta->rowCount();
        return $numrows;
    }

//***************** Compruebo que las imagenes no se repitan*********************************//

    public static function validarIMG($n, $i) {
        require_once 'Conexion.php';
        $conexion = Inmobiliaria::conectar();
        $existenciaimagen = "SELECT * FROM imagen WHERE nombre_img LIKE '%$n' and id_inmueble LIKE '%$i'";
        $consulta = $conexion->query($existenciaimagen);
        //SI EXISTEN FILAS GUARDA LA CANTIDAD DE FILA
        $numrows = $consulta->rowCount();
        return $numrows;
    }

//***************** Muestro listado de las imagenes con prioridad 1 *********************************//

    public static function list_galeriaIMG() {
        require_once 'Conexion.php';
        $conexion = Inmobiliaria::conectar();
        $seleccion = "SELECT * FROM imagen WHERE promocion=1";
        $consulta = $conexion->query($seleccion);

        $list_galeria = [];
//Creo un nuevo objeto 
        while ($registro = $consulta->fetchObject()) {
            $list_galeria[] = new Imagen($registro->id, $registro->nombre_img, $registro->promocion, $registro->id_inmueble);
        }

        return $list_galeria;
    }

    //***************** Muestro listado de las imagenes que estan en venta  *********************************//

    public static function list_ventaIMG() {
        require_once 'Conexion.php';
        $conexion = Inmobiliaria::conectar();
        $seleccion = "SELECT imagen.id,imagen.nombre_img,imagen.portada, imagen.promocion, imagen.id_inmueble, inmueble.provincia, imagen.portada FROM inmueble inner join imagen WHERE inmueble.idinmueble=imagen.id_inmueble and inmueble.operacion='Venta' and imagen.portada='1'";
        $consulta = $conexion->query($seleccion);

        $list_venta = [];
//Creo un nuevo objeto 
        while ($registro = $consulta->fetchObject()) {
            $list_venta[] = new Imagen($registro->id, $registro->nombre_img, $registro->promocion, $registro->id_inmueble, $registro->portada, $registro->provincia);
        }

        return $list_venta;
    }

    //***************** Muestro listado de las imagenes que estan en alquiler  *********************************//

    public static function list_alquilerIMG() {
        require_once 'Conexion.php';
        $conexion = Inmobiliaria::conectar();
        $seleccion = "SELECT imagen.id,imagen.nombre_img,imagen.portada, imagen.promocion, imagen.id_inmueble, inmueble.provincia, imagen.portada FROM inmueble inner join imagen WHERE inmueble.idinmueble=imagen.id_inmueble and inmueble.operacion='Alquiler' and imagen.portada='1'";
        $consulta = $conexion->query($seleccion);

        $list_alquiler = [];
//Creo un nuevo objeto 
        while ($registro = $consulta->fetchObject()) {
            $list_alquiler[] = new Imagen($registro->id, $registro->nombre_img, $registro->promocion, $registro->id_inmueble, $registro->portada, $registro->provincia);
        }

        return $list_alquiler;
    }

}
