<?php

class IdpTools{

  /**
   * Reads a SAMLRequest from the HTTP request and returns a messageContext.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The HTTP request.
   *
   * @return \LightSaml\Context\Profile\MessageContext
   *   The MessageContext that contains the SAML message.
   */
  public function readSAMLRequest($request){

    // We use the Binding Factory to construct a new SAML Binding based on the
    // request.
    $bindingFactory = new \LightSaml\Binding\BindingFactory();
    $binding = $bindingFactory->getBindingByRequest($request);

    // We prepare a message context to receive our SAML Request message.
    $messageContext = new \LightSaml\Context\Profile\MessageContext();

    // The receive method fills in the messageContext with the SAML Request data.
    /** @var \LightSaml\Model\Protocol\Response $response */
    $binding->receive($request, $messageContext);

    return $messageContext;
  }

  /**
   * Constructs a SAML Response.
   *
   * @param \IdpProvider $idpProvider
   * @param $user_id
   * @param $user_email
   * @param $issuer
   * @param $id
   */
  public function createSAMLResponse($idpProvider, $user_id, $user_email, $issuer, $id){


    $acsUrl = $idpProvider->getServiceProviderAcs();

    // Preparing the response XML
    $serializationContext = new \LightSaml\Model\Context\SerializationContext();

    // We now start constructing the SAML Response using LightSAML.
    $response = new \LightSaml\Model\Protocol\Response();
    $response
        ->addAssertion($assertion = new \LightSaml\Model\Assertion\Assertion())
        ->setStatus(new \LightSaml\Model\Protocol\Status(
            new \LightSaml\Model\Protocol\StatusCode(
            \LightSaml\SamlConstants::STATUS_SUCCESS)
            )
        )
        ->setID(\LightSaml\Helper::generateID())
        ->setIssueInstant(new \DateTime())
        ->setDestination($acsUrl)
        // We obtain the Entity ID from the Idp.
        ->setIssuer(new \LightSaml\Model\Assertion\Issuer($idpProvider->getIdPId()))
    ;

    $assertion
        ->setId(\LightSaml\Helper::generateID())
        ->setIssueInstant(new \DateTime())
        // We obtain the Entity ID from the Idp.
        ->setIssuer(new \LightSaml\Model\Assertion\Issuer($idpProvider->getIdPId()))
        ->setSubject(
            (new \LightSaml\Model\Assertion\Subject())
            ->setNameID(new \LightSaml\Model\Assertion\NameID(
                $user_email,
                \LightSaml\SamlConstants::NAME_ID_FORMAT_EMAIL
            ))
                ->addSubjectConfirmation(
                    (new \LightSaml\Model\Assertion\SubjectConfirmation())
                        ->setMethod(\LightSaml\SamlConstants::CONFIRMATION_METHOD_BEARER)
                        ->setSubjectConfirmationData(
                            (new \LightSaml\Model\Assertion\SubjectConfirmationData())
                                // We set the ResponseTo to be the id of the SAMLRequest.
                                ->setInResponseTo($id)
                                ->setNotOnOrAfter(new \DateTime('+1 MINUTE'))
                                // The recipient is set to the Service Provider ACS.
                                ->setRecipient($acsUrl)
                        )
                )
        )
        ->setConditions(
            (new \LightSaml\Model\Assertion\Conditions())
                ->setNotBefore(new \DateTime())
                ->setNotOnOrAfter(new \DateTime('+1 MINUTE'))
                ->addItem(
                    // Use the Service Provider Entity ID as AudienceRestriction.
                    new \LightSaml\Model\Assertion\AudienceRestriction([$issuer])
                )
        )
        ->addItem(
        (new \LightSaml\Model\Assertion\AttributeStatement())
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::EMAIL_ADDRESS,
                $user_email
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::COMMON_NAME,
                'x123'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::GIVEN_NAME,
                'given-name'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::NAME,
                'name'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::UPN,
                'upn'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::ADFS_1_EMAIL,
                'adfs_1_email'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::GROUP,
                'group'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::ADFS_1_UPN,
                'adfs_1_upn'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::ROLE,
                'role'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::SURNAME,
                'surname'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::PPID,
                'ppid'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::NAME_ID,
                'name_id'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::AUTHENTICATION_TIMESTAMP,
                'authentication'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::AUTHENTICATION_METHOD,
                'authentication_method'
            ))
            ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                \LightSaml\ClaimTypes::WINDOWS_ACCOUNT_NAME,
                'windows_account_name'
            ))


        )
        ->addItem(
            (new \LightSaml\Model\Assertion\AuthnStatement())
                ->setAuthnInstant(new \DateTime('-10 MINUTE'))
                ->setSessionIndex($assertion->getId())
                ->setAuthnContext(
                    (new \LightSaml\Model\Assertion\AuthnContext())
                        ->setAuthnContextClassRef(\LightSaml\SamlConstants::AUTHN_CONTEXT_PASSWORD_PROTECTED_TRANSPORT)
                )
        )
    ;

    // Sign the response.
    $response->setSignature(new \LightSaml\Model\XmlDSig\SignatureWriter($idpProvider->getCertificate(), $idpProvider->getPrivateKey()));
    
    // Serialize to XML.
    $response->serialize($serializationContext->getDocument(), $serializationContext);

    // Set the postback url obtained from the trusted SPs as the destination.
    $response->setDestination($acsUrl);

    return $response;

  }
}
