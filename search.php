<?php

require 'admin/config.php';
require 'functions.php';

# Call Connection
$connection = connection($db_config);
if (!$connection) {
    header('Location: error.php');
}

# Receive the search
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search'])){
    $search = cleanData($_GET['search']);

    if ($_GET['email'] != ""){ // Honey Pot
        exit;
    }

    # Prepare the search in DB
    $statement = $connection->prepare(
        'SELECT * FROM articles WHERE 
            tittle LIKE :search or 
            content LIKE :search'
    );
    # Execute the search
    $statement->execute(array(':search' => "%$search%"));
    $search_found = $statement->fetchAll();

    if (empty($search_found)){
        $notice = "No articles found with: " . $search;
    } else {
        $notice = "Articles found with: " . $search;
    }
} else {
    header('Location: ' . route . '/index.php');
}

require 'views/search.view.php';

?>