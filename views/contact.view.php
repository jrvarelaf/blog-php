<?php require 'header.php'; ?>

<div class="container">
    <div class="contact">
        <article>
            <h2 class="tittle">Contact form</h2>
            <br>
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="name" placeholder="Name" 
                value="<?php if (!$send && isset($name)) echo $name ?>">

                <input type="email" name="email" placeholder="Email" 
                value="<?php if (!$send && isset($email)) echo $email ?>">

                <input type="country" name="country" placeholder="Country">

                <textarea name="message" placeholder="Your Message:"
                ><?php if (!$send && isset($message)) echo $message ?></textarea>
                                
                <?php if (!empty($errors)): ?>
                <div class="alert error">
                        <?php echo $errors; ?>
                </div>
                <?php elseif($send): ?>
                    <div class="alert success">
                        <p>Your message has been submitted</p>
                </div>
                <?php endif ?>


                <input type="submit" name="submit" value="Send Message">
            </form>
            <p>Info about this <a href="#">contact form</a></p>
        </article>
    </div>
</div>


<?php require 'footer.php'; ?>