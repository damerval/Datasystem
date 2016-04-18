<?php
# FileName="jysdata_connection.php"
# Type="MSSQL"
# HTTP="true"

$serverName="BLUE";
$database="jys_data_blue";
$connectionInfo = array("UID"=>"jys", "PWD"=>"jys", "Database"=>$database);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if (!$conn) {
	echo print_r(sqlsrv_errors());
}

?>