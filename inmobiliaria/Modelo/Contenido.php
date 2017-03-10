<?php

/*
 *Esta ubicado en el modelo. Es la clase Contenido que se encarga de hacer las CONSULTA  A La BASE DE 
 *datos Y gestionar la inmobiliaria.
 * 
 */

/**
 * Description of contenido
 *
 * @author Junior Miguel Castillo Santana
 */
class Contenido {

  private $referencia;
  private $fecha_alta ;
  private $precio;
  private $direccion;
  private $operacion;
  private $provincia;
  private $tipo;
  private $visita;
  private $nombreTipo;
  private $idUsuario;
 

  //, $fecha_alta, $tipo, $operacion, $provincia, $superficie, $precio, $imagen, $vendedor
  function __construct($idinmueble, $fecha_alta,$precio,$direccion,$operacion, $provincia,$tipo, $visita,$nombreTipo) {
    $this->referencia = $idinmueble;
    $this->fecha_alta = $fecha_alta;
    $this->precio = $precio;
    $this->direccion = $direccion;
    $this->operacion = $operacion;
    $this->provincia = $provincia;
    $this->tipo = $tipo;
    $this->visita=$visita;
    $this->nombreTipo=$nombreTipo;
   
  
   
  }

  public function getId() {
    return $this->referencia;
  }

  public function getFechaAlta() {
    return $this->fecha_alta;
  }

  public function getTipo() {
    return $this->tipo;
  }

  public function getOperacion() {
    return $this->operacion;
  }

  public function getProvincia() {
    return $this->provincia;
  }

  public function getdireccion() {
    return $this->direccion;
  }

  public function getVisita() {
    return $this->visita;
  }

  public function getPrecio() {
    return $this->precio;
  }


  public function getNombreTipo() {
    return $this->nombreTipo;
  }



//Inserto una fila
  public function insert() {
    require_once 'conexion.php';
    $conexion = Inmobiliaria::conectar();
    $insercion = "INSERT INTO inmueble (idinmueble,fecha,precio,direccion,operacion,provincia,idtipo,visita) "
            . "VALUES (\"" . $this->referencia . "\", \"" .$this->fecha_alta . "\", \"" . $this->precio . "\", \"" . $this->direccion . "\", \"" . $this->operacion . "\", \"" . $this->provincia . "\", \"" . $this->tipo . "\", \"" . $this->visita ."\")";

    //echo $insercion;

    $conexion->exec($insercion);
  }

//Modifico el inmueble
  public function update() {
    require_once 'conexion.php';
    $conexion = Inmobiliaria::conectar();

    $modificacion = "UPDATE inmueble SET  idinmueble=\"$this->referencia\",fecha=\"$this->fecha_alta\",precio=\"$this->precio\",direccion=\"$this->direccion\",operacion=\"$this->operacion\",provincia=\"$this->provincia\",idtipo=\"$this->tipo\",visita=\"$this->visita\" WHERE idinmueble=\"$_POST[idModificar]\"";
  //  echo $modificacion. " Esta es la consulta"; 
    $conexion->exec($modificacion);
  }

//Borro las filas
  public function delete() {
    require_once 'conexion.php';
    $conexion = Inmobiliaria::conectar();
    $borrado = "DELETE FROM inmueble WHERE idinmueble=" . $this->referencia;
    echo $borrado;
    $conexion->exec($borrado);
  }

  public static function cuenta() {
    require_once 'conexion.php';
    $conexion = Inmobiliaria::conectar();
    $count_query = $conexion->query("SELECT * FROM inmueble");
    //SI EXISTEN FILAS GUARDA LA CANTIDAD DE FILA
    $numrows = $count_query->rowCount();
    return $numrows;
  }

//El get que muestra la lista de los inmueble
 

  public static function getListInmueble($o,$p) {
    $ordenar=$o;
    $forma=$p;
    require_once 'conexion.php';
    $conexion = Inmobiliaria::conectar();
    include 'pagination.php'; //incluir el archivo de paginación
    include 'listadoPag.php';
 
    $seleccion = "SELECT p.idinmueble,DATE_FORMAT(p.fecha,'%d/%m/%Y') as FechaAlta,p.idtipo,p.operacion,p.provincia,p.direccion,p.precio,p.visita,t.nombre as nombretipo  FROM inmueble p , tipo t WHERE p.idtipo = t.idtipo ORDER BY  $ordenar $forma LIMIT $offset,$per_page";
    $consulta = $conexion->query($seleccion);

    $listado = [];
//Creo un nuevo objeto 
    while ($registro = $consulta->fetchObject()) {
      $listado[] = new contenido($registro->idinmueble, $registro-> FechaAlta, $registro->precio, $registro->direccion, $registro->operacion, $registro->provincia, $registro->idtipo, $registro->visita,$registro->nombretipo);
    }
   
    return $listado;
  }

}