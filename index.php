<?php

require 'admin/config.php';
require 'functions.php';

# Call Connection
$connection = connection($db_config);
if (!$connection) {
    header('Location: error.php');
}

# Preparing the posts
$posts = show_posts($blog_config['post_per_page'], $connection);
if (!$posts) {
    header('Location: error.php');
}



require 'views/index.view.php';

?>