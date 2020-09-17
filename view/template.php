<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COGIP</title>
    <link rel="stylesheet" href="/COGIP-app/public/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="/COGIP-app/public/css/style.css">
    <script src="/COGIP-app/public/js/form_validator.js"></script>

</head>

<body onload="init()">
    <?php require './view/header.php'; ?>
    <main>
        <?php
        echo $model->message;
        require './view/pages/' . $model->viewPath;
        ?>
    </main>
    <?php require './view/footer.php'; ?>
</body>

</html>