<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Книжный каталог</title>
    <link rel="stylesheet" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/my.css">

    <script type="text/javascript" src="resource/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="resource/js/popper.min.js"></script>
    <script type="text/javascript" src="resource/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="resource/js/my.js?1273455236"></script>
</head>
<body>

<div class="container">
    <p class="h1 row col">Книжный каталог</p>
    <?php
    $username = '';
    if (isset($_SERVER['PHP_AUTH_USER'])) {
        $username = $_SERVER['PHP_AUTH_USER'];
        echo "<p><strong>Пользователь: " . $username . "</strong></p>";
    } else {
        echo "<a href='login.php'>Войти как администратор</a>";
    }

    ?>


</div>
<hr/>


