<?php

include "inc.php";

$idpTools = new IdpTools();

echo "<pre>";
/**  Reading the HTTP Request */
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$saml_request = $idpTools->readSAMLRequest($request);

var_dump($request);

?>