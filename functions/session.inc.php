<?php
if (session_status() != 2) session_start();

function session_getClientID() {
	if (!isset($_SESSION['clientID']) OR ($_SESSION['clientID'] == "")) {
    $clientID = 2311;  // Test client
  } else {
	  $clientID = $_SESSION['clientID'];
  }
	return $clientID;
}

function session_isUserAdmin() {
	if (isset($_SESSION["credentials"]) 
		&& ($_SESSION["credentials"]["isSupervisor"] 
			|| 		$_SESSION["credentials"]["isAdmin"])) {	
		return true;	
	} else {
		return false;
	}
}
