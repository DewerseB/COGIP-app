<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COGIP</title>
</head>
<body>
    <?php
        require './view/header.php';

        echo $message;

        require './view/pages/' . $route->getPath();

        require './view/footer.php';
    ?>
</body>
</html>