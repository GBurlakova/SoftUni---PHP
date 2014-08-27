<!DOCTYPE html>

<html>

<head>
    <title>SoftUni Seminar Generator</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/index.css"/>
</head>

<body>
    <form action="scripts/phpScripts/indexResult.php" method="post" class="form">
        <div>
            <p>Enter seminars information</p>
            <textarea name="text" cols="50" rows="10"></textarea>
        </div>
        <label for="term">Sort by: </label>
        <select name="term" id="term">
            <option value="1">Name</option>
            <option value="2">Date</option>
        </select>
        <label for="order">Sort by: </label>
        <select name="order" id="order">
            <option value="1">Ascending</option>
            <option value="2">Descending</option>
        </select>
        <input type="hidden" name="submitted"/>
        <input type="submit" value="Generate"/>
    </form>
</body>

</html>