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
    <title>Dashboard</title>
    <link href="https://www.judgify.me/l/wp-content/uploads/2018/09/judgify-favicon.png" type="IMAGE/X-ICON" rel="SHORTCUT ICON">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="px-4 py-5 container">
        <div class="d-flex  mb-5 align-items-center justify-content-between">
            <img class="d-block rounded" src="https://www.judgify.me/l/wp-content/uploads/2020/09/Judgify-logo.png" alt="" width="200px" height="auto">
            <div>
                <h4>
                <?php print $request->get("user_email") ?>
                </h4>
            </div>
        </div>

        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome!</h1>
                <p class="col-md-8 fs-4">
                    Your have login successfully. Please click on the button below to proceed to zoho desk.
                </p>

                <form action="post-saml.php">
                    <button class="btn btn-primary btn-lg" type="submit">Go to zoho desk</button>

                    <input type="hidden" name="user_email"
                        value="<?php print $request->get("user_email") ?>">

                    <input type="hidden" name="SAMLRequest"
                        value="<?php print $request->get("SAMLRequest") ?>">
                    <input type="hidden" name="RelayState"
                        value="<?php print $request->get("RelayState") ?>">
                </form>
            </div>
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

</body>
</html>