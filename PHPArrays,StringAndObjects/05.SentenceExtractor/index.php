<!DOCTYPE html>

<html>

<head>
    <title>Sentence Extractor</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/index.css"/>
</head>

<body>
<form action="phpScripts/indexResult.php" method="post" class="form">
    <div>
        <p>Enter text</p>
        <textarea name="text" cols="30" rows="10"></textarea>
    </div>
    <div>
        <p>Enter word to search</p>
        <input type="text" name="search"/>
    </div>
    <input type="hidden" name="submitted"/>
    <input type="submit" value="Search"/>
</form>
</body>

</html>