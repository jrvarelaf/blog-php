<?php require 'header.php'; ?>

<div class="container">
    <div class="post">
        <article>
            <h2 class="tittle">New Article</h2>
            <p class="intro">*All fields are required, including a photo</p>
            <br>
            <!-- enctype to upload images -->
            <form enctype="multipart/form-data" method="post" class="form"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="tittle" placeholder="Tittle for the Article">
                <input type="text" name="intro" placeholder="Short introduction">
                <textarea name="content" placeholder="Write your story"></textarea>

                <p class="intro">IMAGE: recommended &#8660; 940px and &#8661; 300px.</p>
                <br>
                <input type="file" name="thumb">

                <!-- Check  -->
			    <?php if(!empty($error)): ?>
				<div class="error">
					<?php echo $error; ?>
				</div>
			    <?php endif; ?>

                <input type="submit" value="Send Article">
            </form>
        </article>
    </div>

</div>


<?php require 'footer.php'; ?>