<?php 
session_start();

require 'admin/config.php';
require 'functions.php';

$errors = '';

# Capture data from POST
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = cleanData($_POST['user']);
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']);

    if ($_POST['email'] != ""){ // Honey Pot
        exit;
    }

    # Connect with DB
    if (empty($user) or empty($password) or empty($password2)) {
        $errors .= '<li>Please, fill in the data correctly.</li>';
    } else {
        try{
                $connection = connection($db_config);
        } catch (PDOException $e){
                echo "Error: " . $e->getMessage();
        }
    
    # Search if the new user exists
    $statement = $connection->prepare("SELECT * FROM users WHERE user = :user LIMIT 1");
    $statement->execute(array(':user' => $user));
    $exists = $statement->fetch(); //False if it does NOT exists

    # If alredy exists, ask for a change
    if ($exists != false){
        $errors .= '<li>User already exists.</li>';
    } 

    // Protect password
    $password = hash('sha512', $password);
    $password2 = hash('sha512', $password2);

    # pass1 & pass2 must match
    if ($password != $password2) {
        $errors = '<li>Passwords must match.</li>';
    }
}

# Create new user & pass
if ($errors == '') {
    $statement = $connection->prepare('INSERT INTO users (id, user, pass) VALUES (NULL, :user, :pass)');
    $statement->execute(array(
        ':user' => $user,
        ':pass' => $password
    ));
    header('Location:login.php');
}
}

require 'views/sign-up.view.php';