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
  $__temp = $user_number;
  $__visibilities = array("visible", "not visible", "visible");
  $__permissions = array_combine($widgets, $__visibilities);
  $__return = array("permissions" => $__permissions, "permissionsCount" => count($__permissions), "temp" => $__temp);
  return $__return;
}