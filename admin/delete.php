<?php session_start();

require 'config.php';
require '../functions.php';

checkSession();

$connection = connection($db_config);
if (!$connection) {
    header('Location: ../error.php');
}

# GET the ID to delete
$id = cleanData($_GET['id']);
# Check if the ID exist
if (!$id) {
    header('Location: ' . route . '/admin');
}

# Delete post by ID
$statement = $connection->prepare('DELETE FROM articles WHERE id = :id');
$statement->execute(array('id' => $id));

header('Location: ' . route . '/admin');

?>
