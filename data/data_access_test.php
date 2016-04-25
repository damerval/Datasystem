<?php
/**
 * Created by PhpStorm.
 * User: philippe
 * Date: 4/22/16
 * Time: 10:33 PM
 */

$host = "localhost";
$database = "jys_data";
$connect_user = "root";
$connect_password = "root";

/** Get a connection to the local MySQL server
 * @return mysqli connection object
  */
function getConnection() {
  global $host, $database, $connect_user, $connect_password;
  $__connection = mysqli_connect($host, $connect_user, $connect_password);
  if (!$__connection) {
    return null;
  }
  if (mysqli_select_db($__connection, $database)) {
    return $__connection;
  } else {
    if (mysqli_query($__connection, "CREATE DATABASE " . $database)) {
      mysqli_select_db($__connection, $database);
      return $__connection;
    } else {
      return null;
    }
  }
}

/** Run a query string and return a json document containing the result
 * @param $sqlString
 * @param $parameters
 * @return string
 */
function runQuery($sqlString, $parameters) {

  $__jsonString = "";

  if ($statement = mysqli_prepare(getConnection(), $sqlString)) {

    if (null != $parameters) $__result = null; // Temp Just to appease the inspector
    
    $__user_id = 812;
    
    mysqli_stmt_bind_param($statement, 'i', $__user_id);

    mysqli_stmt_execute($statement);

    $__result = mysqli_stmt_get_result($statement);
    $__json = array();

    while ($__row = mysqli_fetch_assoc($__result)) {
      $__json[] = $__row;
    }

    $__jsonString = json_encode($__json);

    mysqli_stmt_free_result($statement);

  }

  return $__jsonString;

}

