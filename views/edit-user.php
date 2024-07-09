<?php
session_start();

include "../classes/User.php";

$user_obj = new User();

$user = $user_obj->getUser();

// print_r($user);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <span class="navbar-text"><?= $_SESSION['fullname']?></span>
                    <form action="" method="post" class="d-flex ms-2">
                        <button type="submit" class="btn btn-danger border-0">Log out</button>
                    </form>
                </div>
            </div>
         </nav>
         <main class="row justify-content-center">
            <div class="col-4">
                <h2 class="text-center mb-4">EDIT USER</h2>

                <form action="../actions/edit-user-action.php" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-center mb-3">
                        <div class="col-6 text-center">
                            <?php
                                if($user['photo']){
                            ?>
                                <img src="../assets/images/<?=$user['photo'] ?>" alt="" class="w-100">

                            
                            <?php
                                }else{
                            ?>
                                <i class="fa-solid fa-user fa-10x"></i>


                            <?php
                                }
                            ?>

                            <input type="file" name="photo" class="form-control mt-2">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="firstname">First Name</label>
                        <input type="text" value="<?= $user['first_name']?>" name="firstname" id="firstname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname">Lats Name</label>
                        <input type="text" value="<?= $user['last_name']?>" name="lastname" id="lastname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" value="<?= $user['username']?>" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="text-end">
                        <a href="" class="btn btn-secondary">Cancel</a>
                        <input type="submit" name="btn_save" id="" class="btn btn-warning px-5" value="Save">

                    </div>




                </form>



            </div>

         </main>




    </div>
    
</body>
</html>