<?php require '../views/header.php'; ?>

    <div class="container">
        <h1>Hello <?php echo $_SESSION['admin']; ?> &#128512;</h1>
        <h2>Welcome to Control Panel, <?php echo $notice ?></h2>
        <br>
        

        <a href="new.php" class="btn">New Article</a>
        <a href="close.php" class="btn">Close Session</a>
        <br>

        <?php foreach($posts_author as $post): ?>

            <div class="post">
                <article>
                    <h2 class="tittle"><?php echo $post['id'] . '.-' .$post['tittle']; ?></h2>
                    <h2 class="intro">Author: <?php echo $post['author']; ?></h2>
                    <br>
                    <p class="intro"><?php echo $post['intro']; ?></p>
                    <br>
                    <a href="edit.php?id=<?php echo $post['id']; ?>">Edit</a>
                    <a href="../single.php?id=<?php echo $post['id']; ?>">Read</a>
                    <a href="delete.php?id=<?php echo $post['id']; ?>">Delete</a>
                </article>
            </div>

        <?php endforeach; ?>


        <?php require 'pagination.php'; ?>
    </div>

<?php require '../views/footer.php'; ?>