<!DOCTYPE html>

<html>

<head>
    <title>Sentence Extractor</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../styles/indexResult.css"/>
</head>

<body>
    <?php
    $text = trim($_POST['text']);
    $search = $_POST['search'];
    $wordPattern = '/[A-Za-z]+/';
    $searchPattern = '/\b'.$search.'\b/';
    $sentencePattern = '/[^\\s][^.?!]+[.?!]+/';
    if(preg_match($sentencePattern, $text) && preg_match($wordPattern, $search)): ?>
        <div class="header">
            <p>The results found are as follows</p>
        </div>
            <div class="result">
        <?php
        $sentences = array();
        preg_match_all($sentencePattern, $text, $sentences);
        $sentences = $sentences[0];
        $resultsFound = 0;
        foreach($sentences as $sentence){
            $sentenceLower = strtolower($sentence);
            if(preg_match($searchPattern, $sentenceLower) == 1): ?>
                <div><?php echo $sentence; $resultsFound++ ?></div>
            <?php endif;
        }
        if($resultsFound == 0){
            echo 'No matches found.';
        }
        ?>
        </div>
    <?php
    else:
        header('Location: indexErrorMessage.php');
        return;
    endif;
    ?>
</body>

</html>