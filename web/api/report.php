<?php
// Quick checks for valid data before loading any includes
if(empty($_REQUEST['user'])) { echo "Failure - Must specify user"; exit; }
if(empty($_REQUEST['worker'])) { echo "Failure - Must specify worker"; exit; }
//Force users to use valid UUID for username
if(preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $_REQUEST['user']) !== 1) { echo "Failure - Invalid user"; exit;}

require dirname(__FILE__).'/../private/functions.php';

$version = (!empty($_REQUEST['version'])) ? $_REQUEST['version'] : "Unknown";
$status = (!empty($_REQUEST['status'])) ? $_REQUEST['status'] : "Unknown";
$profit = floatval($_REQUEST['profit']);

echo update_worker($_REQUEST['user'], $_REQUEST['worker'], $version, $status, $profit, $_REQUEST['data']);
?>
