<!DOCTYPE html>

<html>

<head>
    <title>Text filter</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/resultPage.css"/>
</head>

<body>
    <?php
    $text = trim($_POST['text']);
    $wordsStr = $_POST['banlist'];
    $banlistPattern = '/(([A-Za-z]+, )+[A-Za-z]+)|[A-Za-z]+/';
    if(preg_match($banlistPattern, $wordsStr)){
        $wordsToBan = preg_split('/, /', $wordsStr);
        foreach($wordsToBan as $word){
            $replacement = preg_replace('/./', '*', $word);
            $text = str_replace($word, $replacement, $text);
        }
        ?>
        <div class="header">
            <p>The result of the replacement is as follows</p>
        </div>
        <div class="result">
            <?php echo $text; ?>
        </div>
    <?php
    } else {
        header('Location: indexErrorMessage.php');
        return;
    }
    ?>
</body>

</html>