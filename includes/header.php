<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animations.css">
</head>

<body>

    <?php include('includes/control.php'); ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand text-white" href="index.php">Home<span class="sr-only">(current)</span></a>
        <a class="nav-item float-left" href="profile.php"><img src="assets/images/icons/avatar.png" class="profile-icon bg-light" alt="Profile"></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
            <?php 
                if ($user_logged_in) {
                    echo 
                '<li class="nav-item" id="nav-profile-link">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item" id="nav-about-link">
                    <a class="nav-link" href="about.php">About</a>
                </li>';
                } else {
                    echo '<li class="nav-item" id="nav-login-link">
                        <a class="nav-link" href="#">Log in</a>
                    </li>';
                }
            ?>

            </ul>
        </div>
       
    </nav>
    <!-- Start of Content -->