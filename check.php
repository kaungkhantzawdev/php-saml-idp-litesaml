<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "inc.php";
include "service/IdpTools.php";

$idpTools = new IdpTools();

echo "<pre>";
/**  Reading the HTTP Request */
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

// $samlResponse = base64_decode($saml_response['SAMLResponse']);
    
// // Load the response into a DOMDocument
// $doc = new DOMDocument();
// $doc->loadXML($samlResponse);

// // Extract relevant information (e.g., user attributes)
// $xpath = new DOMXPath($doc);
// $xpath->registerNamespace('saml', 'urn:oasis:names:tc:SAML:2.0:assertion');
// $email = $xpath->query("//saml:Attribute[@Name='Email']/saml:AttributeValue")->item(0)->nodeValue;


var_dump($request->get('SAMLResponse'));
die();
    

?>