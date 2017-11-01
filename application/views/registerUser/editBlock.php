<!DOCTYPE html>
<html>
<head>
    <title> Панель администратора </title>
    <meta charset='utf-8'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="/css/admin.css" />
</head>

<body>

<?php require_once('navBarUserWorkPlace.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Fixed</h3>
        </div>
    </div>

    <h1><?=$header;?></h1>

    <?php while($selectBlock['count'] >= 0): ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><?=$selectBlock['block_num ' . $selectBlock['count']]['title']; ?></div>
                <div class="panel-body"><?=$selectBlock['block_num ' . $selectBlock['count']]['content']; ?></div>
                <div class="panel-footer"><?=$selectBlock['block_num ' . $selectBlock['count']]['login']; ?></div>
            </div>
        </div>
        <?php --$selectBlock['count']; endwhile; ?>
    </div>
</div>
</body>
</html>
