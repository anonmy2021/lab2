<?php
$isRestricted = false;
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    $isRestricted = true;
}?>
<!doctype html>
<html lang="en">
<head>
    <title>
        Home
    </title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .b1 {
            text-decoration: none;
            background: #bfffc0;
            color: black;
            font-size: 15pt;
            padding: 12px 12px;
            border-radius: 60px;
        }
    </style>
</head>
<body>
<script src="../assets/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="b1" aria-current="page" href="?controller">Home</a>
            </li>
            <li class="nav-item">
                <a class="b1" href="?controller=users">List of all Users</a>
            </li>
        </ul>
        <form class="d-flex mx-auto">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <ul class="navbar-nav mx-3">
            <li class="nav-item">
                 <?php if (isset($_SESSION['auth']) && $_SESSION['auth']):?>
                     <form action="?controller=users&action=show&id=<?=$_SESSION['user']['userID']?>" method="post">
                         <button class="nav-link active btn" type="submit" name="id" value="<?=$_SESSION['user']['userID']?>">Hello, <?php echo $_SESSION['user']['name'] ?></button>
                     </form>

                 <?php else:?>
                     <button type="button" class="nav-link active btn" data-bs-toggle="modal" data-bs-target="#modalForm">
                         Sign In
                     </button>
                 <?php endif;?>
            </li>
            <div class="vl"></div>
            <li class="nav-item">
                <?php if (isset($isRestricted) && $isRestricted):?>
                    <a class="nav-link active btn" aria-current="page" href="?controller&action=logout">Sign out</a>
                <?php else:?>
                    <a class="nav-link active btn" aria-current="page" href="?controller=users&action=addForm">Sign up</a>
                <?php endif;?>
            </li>
        </ul>
    </div>
</div>
</nav>
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bootstrap 5 Modal Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?controller&action=auth" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="username" name="email" placeholder="Username" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                    </div>
                    <div class="modal-footer d-block">
                        <p class="float-start">Don't have an account? <a href="#">Sign Up</a></p>
                        <button type="submit" class="btn btn-success float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>