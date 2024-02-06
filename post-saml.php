<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "inc.php";
include "service/IdpProvider.php";
include "service/IdpTools.php";


// Initiating our IdP Provider dummy connection.
$idpProvider = new IdpProvider();

// Instantiating our Utility class.
$idpTools = new IdpTools();

// Receive the HTTP Request and extract the SAMLRequest.
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$saml_request = $idpTools->readSAMLRequest($request);

// Getting a few details from the message like ID and Issuer.
$issuer = $saml_request->getMessage()->getIssuer()->getValue();
$id = $saml_request->getMessage()->getID();

// Simulate user information from IdP
$user_id = "spec-id-1001";
$user_email = $request->get("user_email");

// Construct a SAML Response.
$response = $idpTools->createSAMLResponse($idpProvider, $user_id, $user_email, $issuer, $id, $request->get('RelayState'));

// Prepare the POST binding (form).
$bindingFactory = new \LightSaml\Binding\BindingFactory();
$postBinding = $bindingFactory->create(\LightSaml\SamlConstants::BINDING_SAML2_HTTP_POST);
$messageContext = new \LightSaml\Context\Profile\MessageContext();
$messageContext->setMessage($response);

// Ensure we include the RelayState.
$message = $messageContext->getMessage();
$message->setRelayState(base64_decode($request->get('RelayState')));
$messageContext->setMessage($message);

try {
    // Return the Response.
    /** @var \Symfony\Component\HttpFoundation\Response $httpResponse */
    $httpResponse = $postBinding->send($messageContext);
		$saml_response = $httpResponse->getData();
		// print_r(base64_decode($saml_response['SAMLResponse']));

		// die();

    $samlResponse = $saml_response['SAMLResponse'];
    
    // Now $samlResponse contains the raw SAML response XML
    
    // You can parse and process the SAML response using a library like LightSAML
    // For example, using LightSAML:
    $response = new \LightSaml\Model\Protocol\Response();
    $response->fromXml($samlResponse);

    // Now you can access various attributes of the SAML response
    $status = $response->getStatus();
    $assertions = $response->getAllAssertions();

    print_r($assertions);
    die();
		
    print $httpResponse->getContent();
} catch (\Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}

