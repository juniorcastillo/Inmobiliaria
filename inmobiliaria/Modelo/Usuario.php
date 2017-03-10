<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Junior Castillo
 */
class Usuario {

    private $id;
    private $nombre;
    private $password;
    private $direccion;
    private $telefono;
    private $fecha_alta;
    private $email;
    private $rol;

    function __construct($id, $nombre, $password, $direccion, $tel, $fecha_alta, $email, $rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->direccion = $direccion;
        $this->telefono = $tel;
        $this->fecha_alta = $fecha_alta;
        $this->email = $email;
        $this->rol = $rol;
    }

    //Getter
    public function getIdUsuario() {
        return $this->id;
    }

    public function getNombreUsuario() {
        return $this->nombre;
    }

    public function getPasswordUsuario() {
        return $this->password;
    }

    public function getdireccionUsuario() {
        return $this->direccion;
    }

    public function getTelUsuario() {
        return $this->telefono;
    }

    public function getFechaAltaUsuario() {
        return $this->fecha_alta;
    }

    public function getEmailUsuario() {
        return $this->email;
    }

    public function getRolUsuario() {
        return $this->rol;
    }

    
    //Inserto una fila
  public function insertUsuario() {
    require_once 'conexion.php';
    $conexion = Inmobiliaria::conectar();
    $insercion = "INSERT INTO usuario( nombre, password,direccion,telefono, fecha_alta,email,rol) "
            . "VALUES (\"" . $this->nombre . "\", \"" .$this->password . "\", \"" . $this->direccion . "\", \"" . $this->telefono . "\", \"" . $this->fecha_alta . "\", \"" . $this->email . "\", \"" . $this->rol ."\")";
    echo $insercion;

    $conexion->exec($insercion);
  }

    
    //-----------Cuenta cuantos usuarios hay creados----------------//
    public static function cuentaUsuario() {
        require_once 'conexion.php';
        $conexion = Inmobiliaria::conectar();
        $count_query = $conexion->query("SELECT * FROM usuario");
        //SI EXISTEN FILAS GUARDA LA CANTIDAD DE FILA
        $numrows = $count_query->rowCount();
        return $numrows;
    }

//************************* MOdifica el usuario que se desee *****************************************************//
    public function update() {
        require_once 'conexion.php';
        $conexion = Inmobiliaria::conectar();

        $modificacion = "UPDATE usuario SET  id=\"$this->id\",nombre=\"$this->nombre\",password=\"$this->password\",direccion=\"$this->direccion\",telefono=\"$this->telefono\",fecha_alta=\"$this->fecha_alta\" Where id=\"$this->id\"";
        echo $modificacion . " Esta es la consulta";
        $conexion->exec($modificacion);
    }

//*********************** Comprueba si el usuario existe ne la base de datos **************************************//
    //Devuelve 0 si el usuario no existe y 1 si existe
    public static function controlUsuario($e,$c) {
        require_once 'conexion.php';
        $conexion = Inmobiliaria::conectar();
        $existenciaUsuario = "SELECT * FROM usuario WHERE email LIKE '%$e' and password LIKE '%$c'";
        $consulta = $conexion->query($existenciaUsuario);
         $listadoUsuario = [];
         while ($registro = $consulta->fetchObject()) {
            $listadoUsuario[] = new Usuario($registro->id, $registro->nombre, $registro->password, $registro->direccion, $registro->telefono, $registro->fecha_alta,$registro->email,$registro->rol);
        }

        return $listadoUsuario;
    }

//************************** Borra el usuario seleccionado ***********************************//

    public function delete() {
        require_once 'conexion.php';
        $conexion = Inmobiliaria::conectar();
        $borrado = "DELETE FROM usuario WHERE id=" . $this->id;
        echo $borrado;
        $conexion->exec($borrado);
    }

//****Hace un lista de todos los usuarios dados de alta***//

    public static function listadoUsuario() {
        require_once 'conexion.php';
        $conexion = Inmobiliaria::conectar();
        include 'pagination.php'; //incluir el archivo de paginación
        include 'cuenta_listado_usuario.php';
        $seleccion = "SELECT * from usuario ORDER BY 1 LIMIT $offset,$per_page";
        $consulta = $conexion->query($seleccion);

        $listadoUsuario = [];
//Creo un nuevo objeto 
        while ($registro = $consulta->fetchObject()) {
            $listadoUsuario[] = new Usuario($registro->id, $registro->nombre, $registro->password, $registro->direccion, $registro->telefono, $registro->fecha_alta,$registro->email,$registro->rol);
        }

        return $listadoUsuario;
    }

}
