<?php

require '../framework/autoloader.php';

class SouvenirsController
{

    public static function AltaSouvenirs($pid, $pnombre, $pdescripcion, $pstock, $pprecio , $pfechadealta )
    {
        try {
            $souvenirs = new SouvenirsModelo();
            $souvenirs->id = $pid;
            $souvenirs->nombre = $pnombre;
            $souvenirs->descripcion = $pdescripcion;
            $souvenirs->stock = $pstock;
            $souvenirs->precio = $pprecio;
            $souvenirs->fechadealta = $pfechadealta;
            $souvenirs->Guardar();
            
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return generarHtml('altasouvenirs', ['exito' => false]);
        }
        return generarHtml('altasouvenirs', ['exito' => true]);
    }
   
    public static function BajaSouvenirs($pid, $pnombre, $pdescripcion, $pstock, $pprecio , $pfechadealta )
    {
        try {
            $souvenirs = new SouvenirsModelo();
            $souvenirs->id = $pid;
            $souvenirs->nombre = $pnombre;
            $souvenirs->descripcion = $pdescripcion;
            $souvenirs->stock = $pstock;
            $souvenirs->precio = $pprecio;
            $souvenirs->fechadealta = $pfechadealta;
            $souvenirs->Borrar();
            
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return generarHtml('altasouvenirs', ['exito' => false]);
        }
        return generarHtml('altasouvenirs', ['exito' => true]);
    }

    public static function ModificarSouvenirs($pid, $pnombre, $pdescripcion, $pstock, $pprecio , $pfechadealta )
    {
        try {
            $souvenirs = new SouvenirsModelo();
            $souvenirs->id = $pid;
            $souvenirs->nombre = $pnombre;
            $souvenirs->descripcion = $pdescripcion;
            $souvenirs->stock = $pstock;
            $souvenirs->precio = $pprecio;
            $souvenirs->fechadealta = $pfechadealta;
            $souvenirs->Modificar();
            
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return generarHtml('altasouvenirs', ['exito' => false]);
        }
        return generarHtml('altasouvenirs', ['exito' => true]);
    }

    public static function ListarSouvenirs()
    {
        $souvenirs = new SouvenirsModelo();
        $colsouvenirs = array();
        foreach ($souvenirs->obtenerTodos() as $fila) {
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
              
            return generarHtml('ListarSouvenirs', ['ColSouvenirs' => $colsouvenirs]);
        

    }
   
   
   
}
