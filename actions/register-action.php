<?php

    include "../classes/User.php";

    $user = new User;

    $user->store($_POST);


?>