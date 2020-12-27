<?php require 'header.php'; ?>

<div class="container">
    <div class="post">
        <article>
            <h2 class="tittle">Sign-Up</h2>
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="user" placeholder="User">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password2" placeholder="Repeat Password">
                <input type="email" name="email" placeholder="Email">
                <input type="submit" value="Sign-up">
                <br>
                <?php if(!empty($errors)): ?>
                    <div class="error">
                        <ul>
                            <?php echo $errors; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </form>
            <p>Do you already have an account? <a href="login.php">Login</a></p>
        </article>
    </div>
</div>


<?php require 'footer.php'; ?>