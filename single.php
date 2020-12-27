<?php

require 'admin/config.php';
require 'functions.php';

$connection = connection($db_config);
if (!$connection) {
    header('Location: error.php');
}

$id_article = id_article($_GET['id']);
if (empty($id_article)) {
    header('Location: index.php');
}

$post = show_post_per_id($connection, $id_article);
if (empty($post)) {
    header('Location: index.php');
}
# due to array structure, it can be seen with print_r($post);
$post = $post[0];


require 'views/single.view.php';

?>