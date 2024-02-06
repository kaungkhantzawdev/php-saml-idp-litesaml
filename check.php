<?php

include "inc.php";

echo "<pre>";
/**  Reading the HTTP Request */
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

var_dump($request);

?>