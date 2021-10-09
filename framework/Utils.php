<?php
require '../framework/autoloader.php';



class Contenido {

    private static $StaticRootDir = "/var/www/html";
    private static $Extensiones = [
        ".css" => "text/css",
        ".png" => "image/png",
        ".jpg" => "image/jpg",
        ".jpeg" => "image/jpeg",
        ".pdf" => "document/pdf",
        ".js" => "text/js"
    ];
    static function esContenidoEstatico($archivo) {
        foreach (self::$Extensiones as $extension => $v) {
            if (strpos($archivo, $extension) !== false) {
                return true;
            }
        }
    }
    static function cargarContenido($url) {
        foreach (self::$Extensiones as $extension => $contenido) {
            if (strpos($url, $extension) !== false) {
                $ContentType = $contenido;
            }
        }
        $contenidoarchivo = [
            "contenido" => file_get_contents(self::$StaticRootDir . $url),
            "contentType" => $ContentType
        ];
        return $contenidoarchivo;
    }
    static function GuardarImagen($foto) {
        $tmpdir = $foto['tmp_name'];
        $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $filename = uniqid("Img_") . "." . $ext;
        move_uploaded_file($tmpdir, self::$StaticRootDir . "/static/img/" . $filename);
        return "/static/img/" . $filename;
    }
}

class Informes {
    public static function InformarErrores($msg, $vista, $params) {
        $params['exito'] = false;
        $params['msg'] = $msg;
        return generarHtml($vista, $params);
    }

    public static function InformarExito($msg, $vista, $params) {
        $params['exito'] = true;
        $params['msg'] = $msg;
        return generarHtml($vista, $params);
    }

    public static function EspacioInformes($parametros) {

        $exito = $parametros['exito'];
        $msg = $parametros['msg'];
        if (isset($exito) && $exito == false) {
            echo <<<HTML
            <div class="alert alert-danger" role="alert">
                {$msg}
            </div>
            HTML;
        } else if (isset($exito) && $exito == true) {
            echo <<<HTML
            <div class="alert alert-success" role="alert">
             {$msg}
            </div>
            HTML;
        }
    }
}
