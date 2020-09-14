<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COGIP</title>
    <link rel="stylesheet" href="/COGIP-app/public/css/style.css">
</head>
<body>
    <?php require './view/header.php';?>
    <main>
        <?php
            echo $model->message;
            require './view/pages/' . $model->viewPath;
        ?>
    </main>
    <?php require './view/footer.php';?>
</body>
</html>