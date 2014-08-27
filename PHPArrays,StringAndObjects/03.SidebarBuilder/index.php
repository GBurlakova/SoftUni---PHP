<!DOCTYPE html>

<html>

<head>
    <title>Sidebar Building</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/sidebarBuilder.css"/>
</head>

<body>
    <form action="indexResult.php" method="post" class="form">
        <div>
            <p>Enter categories, tags and months</p>
        </div>
        <div>
            <label for="categories">Categories: </label>
            <input type="text" id="categories" name="categories"/>
        </div>
        <div>
            <label for="tags">Tags: </label>
            <input type="text" id="tags" name="tags"/>
        </div>
        <div>
            <label for="months">Months: </label>
            <input type="text" id="months" name="months"/>
        </div>
        <input type="hidden" name="submitted"/>
        <input type="submit" value="Generate"/>
    </form>
</body>

</html>