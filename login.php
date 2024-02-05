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
    <title>Login</title>
    <link href="https://www.judgify.me/l/wp-content/uploads/2018/09/judgify-favicon.png" type="IMAGE/X-ICON" rel="SHORTCUT ICON">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .r-t {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .r-b {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>

    <div class="px-4 py-5 my-5 mx-auto" style="width: 500px">
        <img class="d-block mb-4 rounded" src="https://www.judgify.me/l/wp-content/uploads/2020/09/Judgify-logo.png" alt="" width="100px" height="auto">
        <p class="lead mb-5">
            Please log in.
        </p>
        <div class="">
            
            <form action="dashboard.php">
                <div class="">
                    <div class="form-floating" style="width: 400px">
                        <input name="user_email"  
                               type="email" 
                               class="form-control r-t" 
                               id="floatingInput" 
                               placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating"  style="width: 400px">
                        <input name="password"  type="password" class="form-control r-b" id="floatingInput" placeholder="....">
                        <label for="floatingInput">Password</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary btn-lg px-4 mt-3" style="width: 400px">Log in</button>
                </div>

                <input type="hidden" name="SAMLRequest"
                    value="<?php print $request->get("SAMLRequest") ?>">
                <input type="hidden" name="RelayState"
                    value="<?php print $request->get("RelayState") ?>">
            </form>

        </div>

            <div class="bg-light rounded p-4 my-5 d-none">
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
