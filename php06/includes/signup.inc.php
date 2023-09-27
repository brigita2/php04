<?php
if (isset($_POST['submit'])) {
    include_once 'db.inc.php';
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //vardas ir pavardė su raidėmis, su simboliais nepraeina, taip pat su lietuvybėmis 
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            //email patikrinimas
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=invalidemail");
                exit();
                //tikriname DB ar yra sutapimas, unikalus vartotojo vardas turi būti
            } else {
                $sql = "SELECT * FROM users WHERE user_uid = '$uid'";
                //conn jungtis prie DB
                $result = mysqli_query($conn, $sql);
                //result konvertuojame i skaiciu, mums nesvarbu kas ten, svarbu ar yra kazkiek 
                $result_check = mysqli_num_rows($result);
                //jeigu yra daugiau uz 0, jeigu vartotojas toks egzistuoja, neleidziam buti tokiam sukurtam 
                if ($result_check > 0) {
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                    //jeigu nesuradom tokio vartotojo:
                } else {
                    //užšifruojame slaptažodį
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //į sql kintamąjį įdedame visus duomenis i stulpelius tai ką vartotojas įrašė - values
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES('$first','$last','$email','$uid','$hashedPwd');";
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../signup.php");
    exit();
}
