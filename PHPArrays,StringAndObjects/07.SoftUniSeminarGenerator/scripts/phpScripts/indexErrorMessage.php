<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <title>Error</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../../styles/indexErrorMessage.css"/>
</head>

<body>
    <div class="result">
        <p>
            <?php
            echo $_SESSION['error'];
            ?>
        </p>
    </div>
    <?php
    session_destroy();
    ?>
    <button onclick="location.href='../../index.php'">Click to start again</button>
</body>

</html>