<?php

include "inc.php";

/**  Reading the HTTP Request */
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IdP Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4 rounded" src="https://info.varonis.com/hubfs/Blog_SAML_BlogHero_202202_V1.png" alt="" width="auto" height="200">
        <h1 class="display-5 fw-bold text-body-emphasis my-4">IDP Login </h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-5">
            Please log in with your IDP account to access this service.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit veniam, repellat cumque nulla soluta rerum dolores recusandae, atque adipisci ipsum, ea quas iure dicta molestiae! Ex atque esse explicabo hic.
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

            <form action="post-saml.php">
                <div class="d-flex mb-3">
                    <div class="form-floating me-2" style="width: 300px">
                        <input name="user_email"  type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating"  style="width: 300px">
                        <input name="password"  type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Password</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg px-4 gap-3 w-100">Sign in</button>

                <input type="hidden" name="SAMLRequest"
                    value="<?php print $request->get("SAMLRequest") ?>">
                <input type="hidden" name="RelayState"
                    value="<?php print $request->get("RelayState") ?>">
            </form>

        </div>

            <div class="bg-light rounded p-4 my-5">
                <div>
                    <h5>SAMLRequest </h5>
                    <p style="word-break: break-all;">
                    <?php print $request->get("SAMLRequest") ?>
                    </p>
                </div>
                <div class="my-3"></div>
                <div>
                    <h5>RelayState </h5>
                    <p style="word-break: break-all;">
                    <?php print $request->get("RelayState") ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
