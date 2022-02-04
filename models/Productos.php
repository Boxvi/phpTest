<?php

class Productos
{

    public function __construct()
    {
    }

    public function verificarProductos($Id_producto)
    {
        try {
            $sql = "SELECT COUNT(*) AS Existe FROM `productos` WHERE `Id_producto` = '" . $Id_producto . "';";

            $dbCon = getConnection();
            $stmt = $dbCon->query($sql);
            $row = $stmt->fetch();
            if ($row['Existe'] == 0) {
                $dbCon = null;
                return true;
            } else {
                $dbCon = null;
                echo "no hay  ese codigo";
                return false;
            }
        } catch (PDOException $exc) {
            return false;
        }

    }

    public function crearProducto($id_producto, $costo, $descripcion, $nombre, $stock)
    {
        try {
            $dbCon = getConnection();
            $sql = "INSERT INTO `productos`(`id_producto`, `costo`, `descripcion`, `nombre`, `stock`) VALUES ('" . $id_producto . "','" . $costo . "','" . $descripcion . "','" . $nombre . "','" . $stock . "')";
            $dbCon->beginTransaction();
            $dbCon->exec($sql);
            $dbCon->commit();
            $respuesta = '{"exec":"OK"}';
            $dbCon = null;
            return $respuesta;
        } catch (PDOException $exc) {
            if ($dbCon->inTransaction()) {
                $dbCon->rollBack();
            }
            $dbCon = null;
            return '{"error":"' . $exc->getMessage() . '"}';
        }
    }

    public function verProductos($Id_producto = '')
    {

        if ($this->verificarProductos($Id_producto)) {

            try {
                $dbCon = getConnection();
                $sql = "SELECT `Id_producto`, `Nombre`, `Descripcion`, `Costo`, `Stock` FROM `productos` WHERE `Id_producto` = '" . $Id_producto . "';";

                $dbCon = getConnection();
                $stmt = $dbCon->query($sql);
                $datosProducto = $stmt->fetch();
                if (!empty($datosProducto['id_producto'])) {
                    $dbCon = null;
                    $producto["Id_producto"] = utf8_encode($datosProducto['Id_producto']);
                    $producto["Costo"] = utf8_encode($datosProducto['Costo']);
                    $producto["Descripcion"] = utf8_encode($datosProducto['Descripcion']);
                    $producto["Nombre"] = utf8_encode($datosProducto['Nombre']);
                    $producto["Stock"] = utf8_encode($datosProducto['Stock']);

                    return json_encode($producto, JSON_PRETTY_PRINT);
                } else {
                    $dbCon = null;
                    return '{"error":"no existe ese producto"}';
                }
            } catch (PDOException $exc) {
                return '{"error":"' . $exc->getMessage() . '"}';
            }
        }
    }

    public function actualizarProducto($Id_producto, $Costo, $Descripcion, $Nombre, $Stock)
    {
        if ($this->verificarProductos($Id_producto)) {
            try {
                $dbCon = getConnection();
                $sql = "    UPDATE `productos` SET 
                           `Costo`='" . $Costo . "',
                           `Descripcion`='" . $Descripcion . "',
                           `Nombre`='" . $Nombre . "',
                           `Stock`='" . $Stock . "'  
                           WHERE `Id_producto` = '" . $Id_producto . "';";

                $dbCon->beginTransaction();
                $dbCon->exec($sql);
                $dbCon->commit();
                $respuesta = '{"exec":"OK"}';

                $dbCon = null;
                return $respuesta;
            } catch (PDOException $exc) {
                if ($dbCon->inTransaction()) {
                    $dbCon->rollBack();
                }
                $dbCon = null;
                return '{"error":"' . $exc->getMessage() . '"}';
            }
        }
    }


    public function eliminarProducto($Id_producto)
    {
        if ($this->verificarProductos($Id_producto)) {
            try {
                $dbCon = getConnection();
                $sql = "DELETE FROM `productos` WHERE `Id_producto` = '" . $Id_producto . "';";

                $dbCon->beginTransaction();
                $dbCon->exec($sql);
                $dbCon->commit();
                $respuesta = '{"exec":"OK"}';

                $dbCon = null;
                return $respuesta;

            } catch (PDOException $exc) {
                if ($dbCon->inTransaction()) {
                    $dbCon->rollBack();
                }
                $dbCon = null;
                return '{"error":"' . $exc->getMessage() . '"}';
            }
        }

    }

}

/*

    public function verDireccionPersona($Id_direccion = '')
    {
        if ($this->verificarDireccionPersona($Id_direccion)) {
            try {
                $dbCon = getConnection();
                $sql = "SELECT `Codigo_persona`, `Id_direccion`, `Direccion`, `estado` FROM personas.`direccionpersona` WHERE `Id_direccion` = '" . $Id_direccion . "';";
                $dbCon = getConnection();
                $stmt = $dbCon->query($sql);
                $datosDireccionPersona = $stmt->fetch();
                if (!empty($datosDireccionPersona['Codigo_persona'])) {
                    $dbCon = null;
                    $DireccionPersona['Codigo_persona'] = utf8_encode($datosDireccionPersona['Codigo_persona']);
                    $DireccionPersona['Id_direccion'] = utf8_encode($datosDireccionPersona['Id_direccion']);
                    $DireccionPersona['Direccion'] = utf8_encode($datosDireccionPersona['Direccion']);
                    $DireccionPersona['estado'] = utf8_encode($datosDireccionPersona['estado']);

                    return json_encode($DireccionPersona, JSON_PRETTY_PRINT);
                } else {
                    $dbCon = null;
                    return '{"error":"no existe esa direccion"}';
                }

            } catch (PDOException $exc) {
                return '{"error":"' . $exc->getMessage() . '"}';
            }
        }
    }
}

?>
 */