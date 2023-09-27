<?php
include 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper-signup">
        <h2>Sign Up</h2>
        <!-- action signup failas apdoroja duomenu siuntima -->
        <form class="signup-form" action="includes/signup.inc.php" method="post">
            <input type="text" placeholder="First Name" name="first">
            <input type="text" placeholder="Last Name" name="last">
            <input type="text" placeholder="Email" name="email">
            <input type="text" placeholder="Username" name="uid">
            <input type="password" placeholder="Password" name="pwd">
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
</section>
<?php
include 'footer.php';
?>