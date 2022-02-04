<?php

function ObtenerFecha()
{
    $sql = "SELECT DATE_FORMAT(CURDATE(), '%Y/%m/%d') AS FechaActual;";
    try {
        $dbCon = getConnection();
        $stmt = $dbCon->query($sql);
        $row = $stmt->fetch();

        //echo $stmt->queryString;
        //echo $row['existe'];

        if (!($row['FechaActual'] == null)) { //Evalúas $data directamente
            $dbCon = null;
            return $row['FechaActual'];
        } else {
            $dbCon = null;
            return "";
        }
    } catch (PDOException $e) {
        return "";
    }
}

function base64UrlEncode($text)
{
    return str_replace(
        ['+', '/', '='],
        ['-', '_', ''],
        base64_encode($text)
    );
}