<?php

class IdpProvider {

  /**
   * Retrieves the Assertion Consumer Service.
   *
   * @param string
   *   The Service Provider Entity Id
   * @return
   *   The Assertion Consumer Service Url.
   */
  public function getServiceProviderAcs(){
    return 'https://accounts.zohoportal.com/accounts/csamlresponse/10075915648';
  }

  /**
   * Returning a dummy IdP identifier.
   *
   * @return string
   */
  public function getIdPId(){
    return "https://dev-test.awardregister.com/";
  }

  /**
   * Retrieves the certificate from the IdP.
   *
   * @return \LightSaml\Credential\X509Certificate
   */
  public function getCertificate(){
    return \LightSaml\Credential\X509Certificate::fromFile('cert/ten-years/cert.pem');
  }

  /**
   * Retrieves the private key from the Idp.
   *
   * @return \RobRichards\XMLSecLibs\XMLSecurityKey
   */
  public function getPrivateKey(){
    return \LightSaml\Credential\KeyHelper::createPrivateKey('cert/ten-years/key.pem', '', true);
  }

  /**
   * Returns a dummy user email.
   *
   * @return string
   */
  public function getUserEmail(){
    return "kaungkhantzaw235@gmail.com";
  }

}
