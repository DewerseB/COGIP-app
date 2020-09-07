<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COGIP</title>
</head>
<body>
    <?php
        require './view/header';

        require './view/' . $page;

        require './view/footer';
    ?>
</body>
</html>