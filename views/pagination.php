<?php 

$number_pages = number_pages($blog_config['post_per_page'], $connection); ?>



<section class="pagination">
    <ul>
        <?php if (current_page() === 1): ?>
            <li class="disabled">&laquo;</li>
        <?php else: ?>
            <li><a href="index.php?p=<?php echo current_page() -1 ?>">&laquo;</a></li>
        <?php endif; ?>
        
        <?php for($pg = 1; $pg <= $number_pages; $pg++): ?>
            <?php if (current_page() === $pg): ?>
                <li class="active"><?php echo $pg ?></li>
            <?php else: ?>
                <li><a href="index.php?p=<?php echo $pg ?>"><?php echo $pg ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if(current_page() == $number_pages): ?>
            <li class="disabled">&raquo;</li>
        <?php else: ?>
            <li><a href="index.php?p=<?php echo current_page() +1; ?>">&raquo;</a></li>
        <?php endif; ?>
        
    </ul>
</section>
