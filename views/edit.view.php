<?php require 'header.php'; ?>

<div class="container">
    <div class="post">
    <article>
            <h2 class="tittle">Edit Article</h2>
            <p class="intro">All fields are required</p>
            <br>
            <!-- enctype to upload images -->
            <form enctype="multipart/form-data" method="post" class="form"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

                <input type="text" name="tittle" value="<?php echo $post['tittle']; ?>">
                <input type="text" name="intro" value="<?php echo $post['intro']; ?>">
                <textarea name="content"><?php echo $post['content']; ?></textarea>

                <input type="file" name="thumb">
                <input type="hidden" name="thumb-previous" value="<?php echo $post['thumb'] ?>">
                <p class="content"> Current image: <?php echo $post['thumb']; ?></p>
                
                <input type="submit" value="Modify Article">
            </form>
        </article>
    </div>
</div>

<?php require 'footer.php'; ?>