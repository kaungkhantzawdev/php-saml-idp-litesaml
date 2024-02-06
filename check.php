<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "inc.php";
include "service/IdpTools.php";

$idpTools = new IdpTools();

echo "<pre>";
/**  Reading the HTTP Request */
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$saml_request = $idpTools->readSAMLRequest($request);

var_dump($request);

?>