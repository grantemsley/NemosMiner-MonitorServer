<?php
// Quick checks for valid data before loading any includes
if(empty($_REQUEST['user'])) { echo "Failure - must specify user"; exit; }
//Force users to use valid UUID for username
if(preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $_REQUEST['user']) !== 1) { echo "Failure - Invalid user id."; exit;}

require dirname(__FILE__).'/../private/functions.php';

echo get_workers_json($_REQUEST['user']);
?>
