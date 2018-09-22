<?php
header('Content-Type: application/json');
require dirname(__FILE__).'/../private/functions.php';

$uuid = generate_uuid();
echo json_encode($uuid);
?>
