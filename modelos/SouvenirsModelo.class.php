<?php
require '../framework/autoloader.php';

abstract class SouvenirsModelo extends Modelo {
    public $id;
    public $nombre;
    public $descripcion;
    public $stock;
    public $precio;
    public $fechadealta;

    public function Guardar() {
        $this->prepararInsert();
        $this->sentencia->execute();
        if ($this->sentencia->error) {
            throw new Exception("Hubo un problema al ingresar el souvenirs: " . $this->sentencia->error);
        }
    }

    private function prepararInsert() {
        
        
        $sql = "INSERT INTO Souvenirs(id,nombre,descripcion,stock,precio,fechadealta) VALUES (?,?,?,?,?,?)";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param(
            "isssss",
            $this->id,
            $this->nombre,
            $this->descripcion,
            $this->stock,
            $this->precio,
            $this->fechadealta
        );
    


    }
    
    public function Borrar() {
        $this->prepararDelete();
        $this->sentencia->execute();
        if ($this->sentencia->error) {
            throw new Exception("Hubo un problema al borar el souvenirs: " . $this->sentencia->error);
        }
    
    }

    private function prepararDelete() {
        $sql = "DELETE souvenirs where id = ?";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param(
            "i",
            $this->id
        );
    }
    
    public function Modificar() {
        $this->prepararUpdate();
        $this->sentencia->execute();
        if ($this->sentencia->error) {
            throw new Exception("Hubo un problema al modificar el souvenirs: " . $this->sentencia->error);
        }
    
    }

    private function prepararUpdate() {
        $sql = "UPDATE souvenirs set nombre = ?, descripcion = ?, stock = ? , precio = ? , fechadealta = ? where id = ?";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param(
            "sssssi",
            $this->nombre,
            $this->descripcion,
            $this->stock,
            $this->precio,
            $this->fechadealta,
            $this->id
        );
    }

    public function obtenerTodos()
    {
        $filas = $this->crearArrayDeSouvenirs();
        if ($this->conexion->error) {
            throw new Exception("Error al obtener los souvenirs: " . $this->conexion->error);
        }
        return $filas;
    }
    private function crearArrayDeSouvenirs()
    {
        $sql = "SELECT * FROM Souvenirs";
        $colsouvenirs = array();
        foreach ($this->conexion->query($sql)->fetch_all(MYSQLI_ASSOC) as $fila) {
            $itemsouvenirs = array(
                "id" => $fila->id,
                "nombre" => $fila->nombre,
                "descripcion" => $fila->descripcion,
                "stock" => $fila->stock,
                "precio" => $fila->precio,
                "fechadealta" => $fila->fechadealta
              
            );
            array_push($colsouvenirs, $item);
        }
            
        return $colsouvenirs;
    }

    public function asignarDatosDeSouvenirs($resultado) {
        $this->id = $resultado['id'];
        $this->nombre = $resultado['nombre'];
        $this->descripcion = $resultado['descripcion'];
        $this->stock = $resultado['stock'];
        $this->precio = $resultado['precio'];
        $this->fechadealta = $resultado['fechadealta'];
    }

    
}
