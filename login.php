<?php session_start();

require 'admin/config.php';
require 'functions.php';

$errors = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = cleanData($_POST['user']);
    $password = cleanData($_POST['password']);
    $password = hash('sha512', $password);

    if ($_POST['email'] != ""){ // Honey Pot
        exit;
    }

    try{
        $connection = connection($db_config);
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    $statement = $connection->prepare("SELECT * FROM users WHERE
    user = :user AND
    pass = :password
    ");

    $statement->execute(array(
    ':user' => $user,
    ':password' => $password
    ));

    $exists = $statement->fetch();

    if ($exists !== false) {
        $_SESSION['admin'] = $user;
        header('Location:' . route . '/admin');
    } else {
        $errors .= "<li>Incorrect data, please try again.</li>";
    }

}

require 'views/login.view.php';