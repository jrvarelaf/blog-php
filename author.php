<?php

require 'admin/config.php';
require 'functions.php';

# Call Connection
$connection = connection($db_config);
if (!$connection) {
    header('Location: error.php');
}

# Receive the search
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['author'])){
    $search = cleanData($_GET['author']);

    # Prepare the search in DB
    $statement = $connection->prepare(
        'SELECT * FROM articles WHERE 
            author LIKE :author'
    );
    # Execute the search
    $statement->execute(array(':author' => "%$search%"));
    $search_found = $statement->fetchAll();

    if (empty($search_found)){
        $notice = "There are no articles by this author";
    } else {
        $notice = "Articles by the author: " . $search;
    }
} else {
    header('Location: ' . route . '/index.php');
}

require 'views/search.view.php';

?>