<?php

/*
 Crud Persona
 */
include_once "utilites/GeneralFunctions.php";
include_once "utilites/SimpleRest.php";
include_once "utilites/RequestRestHandler.php";
include_once "models/Persona.php";

class personaControl
{

    public function crearPersona()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array)$handler->decodeJson($json);


            if (isset($datosPeticion['Codigo_persona'])) {
                $CodAutor = $datosPeticion['Codigo_persona'];

                if (!empty($CodAutor)) {
                    $Codigo_persona = $datosPeticion['Codigo_persona'];
                    $Nombres = $datosPeticion['Nombres'];
                    $Apellidos = $datosPeticion['Apellidos'];
                    $Codigo_tipo_identificacion = $datosPeticion['Codigo_tipo_identificacion'];
                    $Identificacion_persona = $datosPeticion['Identificacion_persona'];
                    $Sexo = $datosPeticion['Sexo'];
                    $Fecha_nacimiento = $datosPeticion['Fecha_nacimiento'];
                    $Estado_persona = $datosPeticion['Estado_persona'];

                    $personaDB = new Persona();

                    $responseCrearP = $personaDB->crearPersona($Codigo_persona, $Nombres, $Apellidos,
                        $Codigo_tipo_identificacion, $Identificacion_persona, $Sexo, $Fecha_nacimiento, $Estado_persona);
                    $datosRespuesta = (array)$handler->decodeJson($responseCrearP);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseCrearP;
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

    public function verPersona()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array)$handler->decodeJson($json);

            if (isset($datosPeticion['Codigo_persona'])) {
                $Codigo_persona = $datosPeticion['Codigo_persona'];

                if (!empty($Codigo_persona)) {
                    $Codigo_persona = $datosPeticion['Codigo_persona'];
                    $personaDB = new Persona();
                    $responseVerP = $personaDB->verPersona($Codigo_persona);
                    $datosRespuesta = (array)$handler->decodeJson($responseVerP);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseVerP;
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

    public function actualizarPersona()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array)$handler->decodeJson($json);

            if (isset($datosPeticion['Codigo_persona'])) {
                $Codigo_persona = $datosPeticion['Codigo_persona'];

                if (!empty($Codigo_persona)) {
                    $Codigo_persona = $datosPeticion['Codigo_persona'];
                    $Nombres = $datosPeticion['Nombres'];
                    $Apellidos = $datosPeticion['Apellidos'];
                    $Codigo_tipo_identificacion = $datosPeticion['Codigo_tipo_identificacion'];
                    $Identificacion_persona = $datosPeticion['Identificacion_persona'];
                    $Sexo = $datosPeticion['Sexo'];
                    $Fecha_nacimiento = $datosPeticion['Fecha_nacimiento'];
                    $Estado_persona = $datosPeticion['Estado_persona'];

                    $personaDB = new Persona();

                    $responseActualizarP = $personaDB->actualizarPersona($Codigo_persona, $Nombres, $Apellidos,
                        $Codigo_tipo_identificacion, $Identificacion_persona, $Sexo, $Fecha_nacimiento, $Estado_persona);
                    $datosRespuesta = (array)$handler->decodeJson($responseActualizarP);

                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseActualizarP;
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

    public function eliminarPersona()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array)$handler->decodeJson($json);

            if (isset($datosPeticion['Codigo_persona'])) {
                $Codigo_persona = $datosPeticion['Codigo_persona'];

                if (!empty($Codigo_persona)) {
                    $Codigo_persona = $datosPeticion['Codigo_persona'];

                    $personaDB = new Persona();

                    $responseeliminarPersona = $personaDB->eliminarPersona($Codigo_persona);
                    $datosRespuesta = (array)$handler->decodeJson($responseeliminarPersona);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseeliminarPersona;
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

?>