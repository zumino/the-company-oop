<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>

    <div class="container-fluid">
        <div class="card w-25 mx-auto">
            <div class="card-header text-center">
                <h1>Login</h1>
            </div>
            <form action="../actions/login-action.php" method="post">

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control">

                        
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">

                    </div>
                </div>

                <input type="submit" name="btn_submit" value="Login" class="btn btn-primary w-100 mt-3">
                <p class="text-center">
                    <small>
                        No Account? <a href="register.php">Register</a>
                    </small>
                </p>




                </form>
            </div>

        </div>
    </div>

</body>

</html>