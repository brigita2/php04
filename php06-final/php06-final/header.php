<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP kursas - Login forma</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="main-wrapper">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                    </ul>
                    <div class="nav-login">
                        <?php
                            if(isset($_SESSION['u_id'])) {
                                echo '<form action="includes/logout.inc.php" method="post">
                                <button type="submit" name="submit">Logout</button></form>';
                            } else {
                                echo '<form action="includes/login.inc.php" method="post">
                            <input type="text" name="uid" placeholder="Username" />
                            <input type="password" name="pwd" placeholder="Password" />
                            <button type="submit" name="submit">Login</button>
                        </form>
                        <a href="signup.php">Sign up</a>';
                            }
                        ?>      
                    </div>
                </div>
            </nav>
        </header>