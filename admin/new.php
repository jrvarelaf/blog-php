<?php session_start();

require 'config.php';
require '../functions.php';

checkSession();
$author = $_SESSION['admin'];

$error = '';

$connection = connection($db_config);
if (!$connection) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tittle = cleanData($_POST['tittle']);
    $intro = cleanData($_POST['intro']);
    $content = $_POST['content'];
    # Author from $_SESSION
    $thumb = $_FILES['thumb']['tmp_name'];

    $upload_file = '../' . $blog_config['img_store'] . $_FILES['thumb']['name'];
    move_uploaded_file($thumb, $upload_file); 


    $statement = $connection->prepare(
    'INSERT INTO articles (id, tittle, intro, content, author, thumb)
    VALUES (null, :tittle, :intro, :content, :author, :thumb)'
    );

    if (empty($tittle) or empty($intro) or empty($content) or empty($thumb)) {
        $error .= 'Please, fill in all the fields and add a photo';

    } else {

    $statement->execute(array(
        ':tittle' => $tittle,
        ':intro' => $intro,
        ':content' => $content,
        ':author' => $author,
        ':thumb' => $_FILES['thumb']['name']
    ));

    header('Location: ' . route . '/admin');
    }
} 
    


require '../views/new.view.php';

