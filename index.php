<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Passwords</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Passwords</h1>
    <hr>
    <?
        if (empty($_GET['pg'])) {
            require 'list.php';
        } else {
            require $_GET['pg'] . '.php';
        }
    ?>
    <script src="public/js/main.js"></script>
</body>
</html>

