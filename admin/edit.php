<?php session_start();

require 'config.php';
require '../functions.php';

checkSession();

$connection = connection($db_config);
if (!$connection) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # receive de new data
    $id = cleanData($_POST['id']);
    $tittle = cleanData($_POST['tittle']);
    $intro = cleanData($_POST['intro']);
    $content = cleanData($_POST['content']);
    $thumb_previous = $_POST['thumb-previous'];
    $thumb = $_FILES['thumb'];

    # upload new image to server, if avaliable
    if (empty($thumb['name'])) {
        $thumb = $thumb_previous;
    } else {
        $upload_file = '../' . $blog_config['img_store'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $upload_file);
        $thumb = $_FILES['thumb']['name'];
    }

    # upload edited posts to DB
    $statement = $connection->prepare('UPDATE articles SET tittle = :tittle, intro = :intro, content = :content, thumb = :thumb WHERE id = :id');
    $statement->execute(array(
        ':tittle' => $tittle,
        ':intro' => $intro,
        ':content' => $content,
        ':thumb' => $thumb,
        ':id' => $id
    ));

    header('Location: ' . route . '/admin');

} else {
    # article must exist
    $id_article = id_article($_GET['id']);
    if (empty($id_article)) {
        header('Location: ' . route . '/admin');
    }

    $post = show_post_per_id($connection, $id_article);

    if (empty($post)) {
        header('Location: ' . route . '/admin');
    }
    # Due to array structure
    $post = $post[0];
}
require '../views/edit.view.php';
?>