<?php
/**
 * Created by PhpStorm.
 * User: philippe
 * Date: 4/22/16
 * Time: 8:14 PM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/functions/session.inc.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/data/permissions_dispatcher.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/data/data_access_test.php");

/* Read GET parameters for widget name and argument values, fetch user ID from session.
 * TODO Uncomment sample values after testing.
 */
$widget_name = "widget1";
$auth_user = 812;
$arg_values_csv = 812;

if (isset($_GET['widget_name'])) $widget_name = $_GET['widget_name'];
if (isset($_GET['arg_values_csv'])) $arg_values_csv = $_GET['arg_values_csv'];
if (isset($_SESSION)) $auth_user = session_getUserID();


$widget_info = getWidgetDefinition($widget_name, $auth_user);

$json = runQuery($widget_info['sql'], $auth_user);

echo $json;

