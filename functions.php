<?php

// Just insert connection($db_config); where is needed
function connection($db_config){
    try {
        $connection = new PDO('mysql:host=localhost;dbname='.$db_config['database'], $db_config['user'], $db_config['pass']);
        return $connection;
    } catch (PDOException $e) {
        return false;
    }
}

// Cleaning the data
function cleanData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// GET the current page
function current_page(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

// Show the correct number of posts in page
function show_posts($post_per_page, $connection){
    $start = (current_page() > 1) ? current_page() * $post_per_page - $post_per_page : 0;
    $sentence = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articles LIMIT $start, $post_per_page");
    $sentence->execute();
    return $sentence->fetchAll();
}

// Calculate de number of pages
// Use SQL_CALC_FOUND_ROWS from above
function number_pages($post_per_page, $connection){
    $total_post = $connection->prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];

    $number_pages = ceil($total_post / $post_per_page);
    return $number_pages;
}

// Clean id of articles
function id_article($id){
    return (int)cleanData($id);
}

// Show one wanted post per id
function show_post_per_id($connection, $id){
    $post_per_id = $connection->query("SELECT * FROM articles WHERE id = $id LIMIT 1");
    $post_per_id = $post_per_id->fetchAll();
    return ($post_per_id) ? $post_per_id : false;
}

// Clean author of articles******************
function author_article($author){
    return cleanData($author);
}

// Show wanted posts per author*******************
function show_post_per_author($connection, $author){
    $post_per_author = $connection->query("SELECT * FROM articles WHERE author = $author LIMIT 20");
    $post_per_author = $post_per_author->fetchAll();
    return ($post_per_author) ? $post_per_author : false;
}

// Format for date of creation
function date_creation($date_creation){
    $timestamp = strtotime($date_creation);
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $day = date('d', $timestamp);
    $month = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);
    $date_creation = "$months[$month] " . "$day, " . "$year";
    return $date_creation;
}

// Check if the session is enabled
function checkSession(){
    if (!isset($_SESSION['admin'])) {
        header('Location: ' . route . 'error.php');
    } 
}

?>