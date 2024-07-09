<?php

include "../classes/User.php";

session_start();

$user = new User();
$all_users = $user->getAllUsers();
// print_r($all_users);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css//style.css">


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
                    <form action="../actions/logout-action.php" method="post" class="d-flex ms-2">
                        <button type="submit" class="btn btn-danger border-0">Log out</button>
                    </form>
                </div>
            </div>
        </nav>
        <main class="row justify-content-center">
            <div class="col-6">
                <h2 class="text-center mb-4">USER LIST</h2>

                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th><!-- for the photo--></th>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th><!-- for action buttons--></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($user = $all_users->fetch_assoc()){
                        ?>
                        <tr>
                            <td>
                                <?php
                                    if($user['photo']){
                                ?>
                                    <img src="../assets/images/<?=$user['photo'] ?>" alt="" class="dashboard-photo">

                                
                                <?php
                                    }else{
                                ?>
                                    <i class="fa-solid fa-user"></i>


                                <?php
                                    }
                                ?>

                            </td>
                            <td><?= $user['id']?></td>
                            <td><?= $user['first_name']?></td>
                            <td><?= $user['last_name']?></td>
                            <td><?= $user['username']?></td>
                            <td>
                                <?php
                                    if($user['id'] == $_SESSION['id']){
                                ?>

                                        <a href="edit-user.php" class="btn btn-outline-warning">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a href="delete-user.php" class="btn btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                
                                
                                <?php
                                    }
                                ?>

                            </td>
                        </tr>

                        <?php
                            }
                        ?>

                    </tbody>



                </table>


            </div>
            

        </main>
    </div>
    
</body>
</html>