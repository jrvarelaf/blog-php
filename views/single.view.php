<?php require 'header.php'; ?>

    <div class="container">

        <div class="post">
            <article>
                <h2 class="tittle"><?php echo $post['tittle']; ?></h2>
                <h2 class="intro"><a href="author.php?=<?php echo $post['author']; ?>">Author: <?php echo $post['author']; ?></a></h2>
                    <br>
                <p class="date"><?php echo date_creation($post['date']); ?></p>
                <div class="thumb">
                        <img src="<?php echo route; ?>/images/<?php echo $post['thumb']; ?>" alt="<?php echo $post['tittle']; ?>">
                </div>
                <!-- save the line break at DB with nl2br() -->
                <p class="intro"><?php echo nl2br($post['intro']); ?></p>
                <br>
                <p class="content"><?php echo nl2br($post['content']); ?></p>
            </article>
        </div>
        <div class="endpost"></div>
    </div>

<?php require 'footer.php'; ?>
