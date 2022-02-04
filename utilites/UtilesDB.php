<?php

include_once "config/config.php";

/**
 * Open connection to database
 */
function getConnection()
{
    try {
        $conn = new PDO("mysql:host=" . host . ";dbname=" . db . ";port=" . port, username, password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $exception) {
        exit($exception->getMessage());
    }
}

/**
 * Get parameters for updates
 */
function getParams($input)
{
    $filterParams = [];
    foreach ($input as $param => $value) {
        $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
}

/**
 * Associate all parameters to a sql
 */
function bindAllValues($statement, $params)
{
    foreach ($params as $param => $value) {
        $statement->bindValue(':' . $param, $value);
    }
    return $statement;
}