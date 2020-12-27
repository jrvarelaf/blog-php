<?php

# This route must be changed for your server
define('route', '//localhost/blog/');

# Access to DataBase for POSTS and USERS
# host=localhost at functions.php
$db_config = array(
    'database' => 'blog',
    'user' => 'root',
    'pass' => ''
);

# Blog settings
$blog_config = array(
    'post_per_page' => '2',
    'img_store' => 'images/'
);

?>