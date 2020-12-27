<?php require 'header.php'; ?>

    <div class="container">
        <h2><?php echo $notice ?></h2><br>
        <?php foreach($search_found as $post): ?>

            <div class="post">
                <article>
                    <h2 class="tittle"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['tittle']; ?></a></h2>
                    <h2 class="intro"><a href="author.php?=<?php echo $post['author']; ?>">Author: <?php echo $post['author']; ?></a></h2>
                    <br>
                    <p class="date"><?php echo date_creation($post['date']); ?></p>
                    <div class="thumb">
                        <a href="single.php?id=<?php echo $post['id']; ?>">
                            <img src="<?php echo route; ?>/images/<?php echo $post['thumb']; ?>" alt="">
                        </a>
                    </div>
                    <p class="intro"><?php echo $post['intro']; ?></p>
                    <a href="single.php?id=<?php echo $post['id']; ?>" class="continue">Read more...</a>
                </article>
            </div>

        <?php endforeach; ?>


        <?php require 'pagination.php'; ?>
    </div>

<?php require 'footer.php'; ?>