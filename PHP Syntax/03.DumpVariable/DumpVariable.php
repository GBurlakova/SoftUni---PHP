<!DOCTYPE html>
<html>

<head>
    <title>Dump Variable</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="DumpVariable.css"/>
</head>

<body>
    <div class="result">
    <?php
    $result = (object)[2,34];
    if(is_numeric($result)){
        var_dump($result);
    } else{
        echo gettype($result);
    }
    ?>
    </div>
</body>

</html>