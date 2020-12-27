<?php session_start();

// INDEX of ADMIN

require 'config.php';
require '../functions.php';

$connection = connection($db_config);
if (!$connection) {
    header('Location: ../error.php');
}

checkSession();

$author = $_SESSION['admin'];

# Prepare the search in DB
$statement = $connection->prepare(
    'SELECT * FROM articles WHERE 
        author LIKE :author'
);

# Execute the search
$statement->execute(array(':author' => "$author"));
$posts_author = $statement->fetchAll();

if (empty($posts_author)){
    $notice = "you haven't written anything yet.";
} else {
    $notice = "these are your articles.";

} 


if (isset($_SESSION['admin'])) {
    require '../views/admin_index.view.php';
} else {
    header('Location: login.php');
}

?>