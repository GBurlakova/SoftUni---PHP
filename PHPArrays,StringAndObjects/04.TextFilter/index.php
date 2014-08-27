<!DOCTYPE html>

<html>

<head>
    <title>Text filter</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/index.css"/>
</head>

<body>
    <form action="indexResult.php" method="post" class="form">
        <div>
            <p>Enter text</p>
            <textarea name="text" cols="30" rows="10"></textarea>
        </div>
        <div>
            <p>Enter words for the banlist</p>
            <input type="text" name="banlist"/>
        </div>
        <input type="hidden" name="submitted"/>
        <input type="submit" value="Ban"/>
    </form>
</body>

</html>