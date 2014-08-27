<!DOCTYPE html>

<html>

<head>
    <title>URL Replacer</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/index.css"/>
</head>

<body>
    <form action="phpScripts/indexResult.php" method="post" class="form">
        <div>
            <p>Enter text to modify</p>
            <textarea name="text" cols="30" rows="10"></textarea>
        </div>
        <input type="hidden" name="submitted"/>
        <input type="submit" value="Modify"/>
    </form>
</body>

</html>