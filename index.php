<?php
session_start();

require_once 'vendor/autoload.php';
use brteam\rpass;
use brteam\DB;

$dbFile = __DIR__ . '/db/pm.db';

if (!is_file($dbFile)) {
    $db = new DB();
    rpass::create($db);
} else {
    $db = new DB();
}

$oper = 'list';
if (isset($_REQUEST['pg'])) {
    $oper = $_REQUEST['pg'].'Form';
}
if (isset($_REQUEST['operation'])) {
    $oper = $_REQUEST['operation'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Password manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="row">
        <div class="col-9">
            <h1><a href="./">Password manager</a></h1>
        </div>
        <div class="col-3 text-end">
            <a class="btn btn-sm btn-success" href="?pg=add">&nbsp;<i class="fas fa-2x fa-plus"></i>&nbsp;</a>
        </div>
    </div>
    <hr>
    <?
        switch($oper) {
            case 'list':
                rpass::list($db);
                break;
            case 'add':
                rpass::add($db);
                break;
            case 'addForm':
                echo rpass::addForm();
                break;      
            case 'del':
                rpass::del($db);
                break;
        }
    ?>
    <script src="public/js/main.js"></script>
</body>
</html>

