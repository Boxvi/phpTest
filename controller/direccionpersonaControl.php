<?php

include_once "utilites/GeneralFunctions.php";
include_once "utilites/SimpleRest.php";
include_once "utilites/RequestRestHandler.php";
include_once "models/DireccionPersona.php";

class direccionpersonaControl
{
    public function verDireccionPersona()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array) $handler->decodeJson($json);

            if (isset($datosPeticion['Id_direccion'])) {
                $Id_direccion = $datosPeticion ['Id_direccion'];

                if (!empty($Id_direccion)) {
                    $Id_direccion = $datosPeticion ['Id_direccion'];
                    $direccionpersonaDB = new DireccionPersonaDB();

                    $responseVerDP = $direccionpersonaDB->verDireccionPersona($Id_direccion);
                    $datosRespuesta = (array) $handler->decodeJson($responseVerDP);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseVerDP;
                    } else {
                        $responseListado["error"] = "True";
                        $responseListado["status"] = "ERROR";
                        $responseListado["message"] = $datosRespuesta['error'];
                        $responseListado["message"] = "Error datos respuesta";
                    }
                    return $responseListado;

                } else {
                    $responseListado["error"] = "True";
                    $responseListado["status"] = "ERROR";
                    $responseListado["message"] = "Faltan datos";
                    $responseListado["message"] = "{}";
                }
                return $responseListado;
            }

        } catch (Exception $exc) {
            return '{"error":"' . $exc->getMessage() . '"}';
        }
    }
}