<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand navbar-dark bg-dark mb-5">
            <div class="container">
                <a href="" class="navbar-brand">
                    <h1 class="h3">The Company</h1>
                </a>
                <div class="navbar-nav">
                    <span class="navbar-text"><?= $_SESSION['username']?></span>
                    <form action="" method="post" class="d-flex ms-2">
                        <button type="submit" class="btn btn-danger border-0">Log out</button>
                    </form>
                </div>
            </div>
        </nav>

        <main>
            <div class="card w-25 mx-auto text-center">
                <div class="card-header text-center">
                    <i class="fa-solid fa-triangle-exclamation text-danger"></i>
                </div>
                <div class="card-body">
                    <h2 class="text-danger mb-5">DELETE ACCOUNT</h2>
                    <p class="fw-bold">Are you sure you want to delete your account?</p>

                    <div class="row">
                        <div class="col">
                            <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a> 
                        </div>
                        <div class="col">
                            <form action="../actions/delete-user-action.php" method="post">
                                <input type="submit" name="btn_delete" value="Delete" class="btn btn-danger w-100">
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </main>


    </div>
    
</body>
</html>