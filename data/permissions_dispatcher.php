<?php
/*
 * Date: 4/20/2016
 * Time: 8:44 AM
 */

/** Retrieve user permissions from database and return array of widget/visibility flag pairs
 * @param array[] $widgets List of widgets to look up permissions information for 
 * @param $user_number
 * @return array
 */
function getVisibilityFlags($widgets, $user_number) {
  $__visibilities = array("visible", "not visible", "visible");
  $__permissions = array_combine($widgets, $__visibilities);
  $__return = array("permissions" => $__permissions, 
                    "permissionsCount" => count($__permissions), "temp" => $user_number);
  return $__return;
}

function getWidgetDefinition($widget, $user_number) {
  $__return = array();
  $__sql = "select *, ? as col from 
            (SELECT FIRST_NAME, LAST_NAME 
              from employee where ACTIVE=1 order by rand() limit 20) a 
            order by LAST_NAME";
  $__args_contract = array("user_id");
  $__return["widget_name"] = $widget;
  $__return["sql"] = $__sql;
  $__return["args"] = $__args_contract;
  $__return["types"] = "i";
  $__return["temp"] = $user_number;
  return $__return;
}