<?php

class DireccionPersona
{

    public function __construct()
    {

    }

    function verificarDireccionPersona($Id_direccion)
    {
        try {
            $sql = "SELECT COUNT(*) AS Existe  
                FROM personas.`direccionpersona`
                WHERE `Id_direccion` = '" . $Id_direccion . "';";

            $dbCon = getConnection();
            $stmt = $dbCon->query($sql);
            $row = $stmt->fetch();

            if ($row['Existe'] == 1) {
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

    public function crearDireccionPersona()
    {

    }

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

    public function actualizarDireccionPersona()
    {

    }
}

?>