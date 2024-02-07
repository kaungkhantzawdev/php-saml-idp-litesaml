<?php

$xml = '<EntityDescriptor entityID="urn:dev-polynn.au.auth0.com" xmlns="urn:oasis:names:tc:SAML:2.0:metadata">
<IDPSSODescriptor protocolSupportEnumeration="urn:oasis:names:tc:SAML:2.0:protocol">
  <KeyDescriptor use="signing">
    <KeyInfo xmlns="http://www.w3.org/2000/09/xmldsig#">
      <X509Data>
        <X509Certificate>MIID0TCCArmgAwIBAgIUfN+qjxNtFSbPoqfiYeKHbetNQ5YwDQYJKoZIhvcNAQELBQAweDELMAkGA1UEBhMCSEUxDTALBgNVBAgMBEhFTE8xDTALBgNVBAcMBEhFTE8xDTALBgNVBAoMBEhFTG8xDTALBgNVBAsMBEhFTE8xDTALBgNVBAMMBEhFTE8xHjAcBgkqhkiG9w0BCQEWD2thdW5nQGdtYWlsLmNvbTAeFw0yNDAyMDMxNjExNDVaFw00NDAxMjkxNjExNDVaMHgxCzAJBgNVBAYTAkhFMQ0wCwYDVQQIDARIRUxPMQ0wCwYDVQQHDARIRUxPMQ0wCwYDVQQKDARIRUxvMQ0wCwYDVQQLDARIRUxPMQ0wCwYDVQQDDARIRUxPMR4wHAYJKoZIhvcNAQkBFg9rYXVuZ0BnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDDbfGpYuEqDhd5sC6693CCp+d09/kckEvnuLglmdx/CL192dasKDP3Eb3aXOlFxe/c+W2DgS+QsUUQSNWWxmCxwtYPTNwUAUbkAJtro/+dQwKKD/A/7unJMuX/bSoYrTC6Du6qqc83jFUOwUlmsyGAobwU4xKdXA3xKBZzyA30am4lww4ZLEiHdf2uqoJ3v2sue3FbOBAIz08pYYFTV8jP3ow2bADTKeqcSZjFD0dMaObhF2a8KVm9Jjiz4PuQ2CQzlbuQWwxsUhTaVU2JGeXRwIiguh2ZKOdeR1Q2I9nqF0ObZ4ZQJZYdIG42Viv54UOAsdltBZQB8dYtjESPoLHBAgMBAAGjUzBRMB0GA1UdDgQWBBTgdDqUkg9uGd3Ce6SETOjebiXszDAfBgNVHSMEGDAWgBTgdDqUkg9uGd3Ce6SETOjebiXszDAPBgNVHRMBAf8EBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAjEbEaGSp6W/95y9XCPwzMnbudeD3NsQfB7cHf9H1J43c+pG4tXMuoUMXoRn26TlrrG0a1XhKVq+mu+dQSFT7etYq5+zSXh6hahlidwE/l3QcnkDFiMcrftZ+kp8EyUJ4wZDBbM3pfwNtI+ADZxcqkCT7xilMd8algppwu750nkA4hWZY/8KoR9nJ8y4IrZw50xShmB8RyuR82gJtmREjI6k9yClzh2xQz6fOWT3hqhVWzLkphmabZklVzH3VjajomVCEYpZozUt+1fLRHT9cbMlRyUuhKhUfa5rHqWQii0WO7Rr2RPxwm4uZiFURjfNaoVSjWke0fqq86Z1ECiSvD</X509Certificate>
      </X509Data>
    </KeyInfo>
  </KeyDescriptor>
  <SingleLogoutService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect" Location="https://dev-test.awardregister.com/logout.php"/>
  <SingleLogoutService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST" Location="https://dev-test.awardregister.com/logout.php"/>
  <NameIDFormat>urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress</NameIDFormat>
  <NameIDFormat>urn:oasis:names:tc:SAML:2.0:nameid-format:persistent</NameIDFormat>
  <NameIDFormat>urn:oasis:names:tc:SAML:2.0:nameid-format:transient</NameIDFormat>
  <SingleSignOnService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect" Location="https://dev-test.awardregister.com/login.php"/>
  <SingleSignOnService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST" Location="https://dev-test.awardregister.com/login.php"/>
  <Attribute Name="http://schemas.xmlsoap.org/ws/2005/05/identity/claims/emailaddress" NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:uri" FriendlyName="E-Mail Address" xmlns="urn:oasis:names:tc:SAML:2.0:assertion"/>
  <Attribute Name="http://schemas.xmlsoap.org/ws/2005/05/identity/claims/givenname" NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:uri" FriendlyName="Given Name" xmlns="urn:oasis:names:tc:SAML:2.0:assertion"/>
  <Attribute Name="http://schemas.xmlsoap.org/ws/2005/05/identity/claims/name" NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:uri" FriendlyName="Name" xmlns="urn:oasis:names:tc:SAML:2.0:assertion"/>
  <Attribute Name="http://schemas.xmlsoap.org/ws/2005/05/identity/claims/surname" NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:uri" FriendlyName="Surname" xmlns="urn:oasis:names:tc:SAML:2.0:assertion"/>
  <Attribute Name="http://schemas.xmlsoap.org/ws/2005/05/identity/claims/nameidentifier" NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:uri" FriendlyName="Name ID" xmlns="urn:oasis:names:tc:SAML:2.0:assertion"/>
</IDPSSODescriptor>
</EntityDescriptor>';

echo $xml;