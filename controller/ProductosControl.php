<?php

include_once "utilites/GeneralFunctions.php";
include_once "utilites/SimpleRest.php";
include_once "utilites/RequestRestHandler.php";
include_once "models/Productos.php";

class ProductosControl
{
    public function crearProducto()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array)$handler->decodeJson($json);

            if (isset($datosPeticion['Id_producto'])) {
                $id_productos = $datosPeticion['Id_producto'];

                if (!empty($id_productos)) {
                    $Id_producto = $datosPeticion['Id_producto'];
                    $Costo = $datosPeticion['Costo'];
                    $Descripcion = $datosPeticion['Descripcion'];
                    $Nombre = $datosPeticion['Nombre'];
                    $Stock = $datosPeticion['Stock'];

                    $producto = new Productos();

                    $responseCrearProducto = $producto->crearProducto($Id_producto, $Costo, $Descripcion, $Nombre, $Stock);

                    $datosRespuesta = (array)$handler->decodeJson($responseCrearProducto);

                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseCrearProducto;
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


    public function verProductos()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array)$handler->decodeJson($json);

            if (isset($datosPeticion['Id_producto'])) {//aqui no variables
                $Id_producto = $datosPeticion ['Id_producto'];//nombre de la petcion http

                if (!empty($Id_producto)) {
                    $Id_producto = $datosPeticion ['Id_producto'];//solo en variables

                    $productosDB = new Productos();
                    $responseVerP = $productosDB->verProductos($Id_producto);
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

    public function actualizaProducto()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array)$handler->decodeJson($json);

            if (isset($datosPeticion['Id_producto'])) {
                $Id_producto = $datosPeticion['Id_producto'];

                if (!empty($Id_producto)) {
                    $Id_producto = $datosPeticion['Id_producto'];
                    $Costo = $datosPeticion['Costo'];
                    $Descripcion = $datosPeticion['Descripcion'];
                    $Nombre = $datosPeticion['Nombre'];
                    $Stock = $datosPeticion['Stock'];

                    $producto = new Productos();

                    $responseActualizaProducto = $producto->actualizarProducto($Id_producto, $Costo, $Descripcion, $Nombre, $Stock);
                    $datosRespuesta = (array)$handler->decodeJson($responseActualizaProducto);


                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseActualizaProducto;
                    } else {
                        $responseListado["error"] = "True";
                        $responseListado["status"] = "ERROR";
                        $responseListado["message"] = $datosRespuesta['error'];
                        $responseListado["message"] = "Error datos respuesta";
                    }
                    return $responseListado;
                }
            } else {
                $responseListado["error"] = "True";
                $responseListado["status"] = "ERROR";
                $responseListado["message"] = "Faltan datos";
                $responseListado["message"] = "{}";
            }
            return $responseListado;


        } catch (Exception $exc) {
            return '{"error":"' . $exc->getMessage() . '"}';
        }
    }

    public function eliminarProducto()
    {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array)$handler->decodeJson($json);

            if (isset($datosPeticion['id_producto'])) {
                $id_producto = $datosPeticion['id_producto'];
                if (!empty($id_producto)) {
                    $id_producto = $datosPeticion['id_producto'];

                    $producto = new Productos();
                    $responseActualizaProducto = $producto->eliminarProducto($id_producto);
                    $datosRespuesta = (array)$handler->decodeJson($responseActualizaProducto);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseActualizaProducto;
                    } else {
                        $responseListado["error"] = "True";
                        $responseListado["status"] = "ERROR";
                        $responseListado["message"] = $datosRespuesta['error'];
                        $responseListado["message"] = "Error datos respuesta";
                    }
                    return $responseListado;
                }


            } else {
                $responseListado["error"] = "True";
                $responseListado["status"] = "ERROR";
                $responseListado["message"] = "Faltan datos";
                $responseListado["message"] = "{}";
            }
            return $responseListado;

        } catch (Exception $exc) {
            return '{"error":"' . $exc->getMessage() . '"}';
        }
    }
}
