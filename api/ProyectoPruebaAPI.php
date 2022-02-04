<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "utilites/SimpleRest.php";
include_once "utilites/RequestRestHandler.php";
include_once "utilites/UtilesDB.php";
include_once "controller/tipoIdentificacionControl.php";
include_once "controller/personaControl.php";
include_once "controller/direccionpersonaControl.php";
include_once "controller/ProductosControl.php";

class ProyectoPruebaAPI
{

    public function api()
    {

        try {
            //Declara el objeto rest
            $restObj = new simpleRest();

            //Define la respuesta JSON
            $restObj->setHttpHeaders('Content-Type: application/JSON', 200);

            //switchear funcion
            $method = $_SERVER['REQUEST_METHOD'];
            $action = $_GET['action'];
            $headers = apache_request_headers();


            switch ($action) {
                case 'crearId':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $tipoIdentificacion = new tipoIdentificacionControl();
                        //llamar funcion
                        $responseLista = $tipoIdentificacion->crearId();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'verId':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $tipoIdentificacion = new tipoIdentificacionControl();
                        //llamar funcion
                        $responseLista = $tipoIdentificacion->verId();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'actualizarId':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $tipoIdentificacion = new tipoIdentificacionControl();
                        //llamar funcion
                        $responseLista = $tipoIdentificacion->actualizarId();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'eliminarId':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $tipoIdentificacion = new tipoIdentificacionControl();
                        //llamar funcion
                        $responseLista = $tipoIdentificacion->eliminarId();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                //--------------------------------------------------------------------------PERSONA            
                case 'crearPersona':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new personaControl();
                        //llamar funcion
                        $responseLista = $persona->crearPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;


                case 'verPersona':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new personaControl();
                        //llamar funcion
                        $responseLista = $persona->verPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;


                case 'actualizarPersona':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new personaControl();
                        //llamar funcion
                        $responseLista = $persona->actualizarPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'eliminarPersona':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new personaControl();
                        //llamar funcion
                        $responseLista = $persona->eliminarPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                //--------------------------------------------------------------------------GENERAR EL CRUD PARA ESTADO CIVIL
                case 'crearEstadoCivil':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new estCivControl();
                        //llamar funcion
                        $responseLista = $persona->crearPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                //--------------------------------------------------------------------------GENERAR EL CRUD PARA direccion

                case 'verDireccionPersona':
                    if ($method == 'POST') {
                        //Definir variable de la clase
                        $persona = new direccionpersonaControl();
                        //llamar funcion
                        $responseLista = $persona->verDireccionPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                //--------------------------------------------------------------------------GENERAR EL CRUD PARA producto

                case 'crearProductos':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new ProductosControl();
                        //llamar funcion
                        $responseLista = $persona->crearProducto();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;


                case 'verProducto':
                    if ($method == 'POST') {
                        $persona = new ProductosControl();
                        $responseLista = $persona->verProductos();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;

                case 'actualizarProducto':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new ProductosControl();
                        //llamar funcion
                        $responseLista = $persona->actualizaProducto();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }

                default :
            }
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /* Respuesta al cliente */

    function response($code = 200, $responseRest)
    {
        //objeto que maneja los respuestas
        $rest = new simpleRest();
        //setea el codigo de respuesta
        $rest->setHttpResponseCode($code);
        //objeto que maneja las codificaciones/descodificaciones
        $request = new requestRestHandler();
        //codifica la respuetsa en formato Json
        echo $request->encodeJson($responseRest);
    }

}

?>



