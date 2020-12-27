<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo route ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo route ?>/css/style.css">
    <title>MyHub BLOG</title>
</head>
<body>
    <header>
    <div class="container">
        <div class="logo left">
            <p><a href="<?php echo route; ?>">MyHub BLOG</a></p>
        </div>

        <div class="right">
            <form name="search" class="search" 
            action="<?php echo route; ?>/search.php" method="get">
                <input type="text" name="search" placeholder="Search within posts">

                <!-- see css at end -->
                <input type="email" name="email" placeholder="Email">

                <button type="submit" class="icon fa fa-search"></button>
            </form>

            <nav class="menu">
                <ul>
                    <li><a href="<?php echo route; ?>login.php">Login to the BLOG <i class="fa fa-sign-in"></i></a></li>
                    <li><a href="<?php echo route; ?>index.php">HOME <i class="fa fa-home"></i></a></li>
                    <li><a href="<?php echo route; ?>contact.php">Contact<i class="icon fa fa-envelope"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
    </header>