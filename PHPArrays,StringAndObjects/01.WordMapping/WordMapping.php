<!DOCTYPE html>

<html>

<head>
    <title>Word Mapping</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="WordMapping.css"/>
</head>

<body>
    <form action="WordMapping.php" method="post" class="form">
        <div>
            <p>Enter some text</p>
        </div>
        <textarea name="input" id="input" cols="30" rows="10" placeholder="Enter your text here"></textarea>
        <input type="hidden" name="submitted"/>
        <input type="submit" value="Submit"/>
    </form>
    <div class="result">
        <?php
        if(isset($_POST['submitted'])){
            if(empty($_POST['input']) !== true){
                $wordsPattern = '/[A-za-z]+/';
                $words = array();
                $input = strtolower($_POST['input']);
                preg_match_all($wordsPattern, $input, $words);
                if($words[0] >= 1){
                    $wordsOccurrences = array_count_values($words[0]); ?>
                    <table>
                    <?php
                    foreach($wordsOccurrences as $k => $v): ?>
                        <tr>
                            <td><?php echo $k; ?></td><td><?php echo $v ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                    <?php
                } else {
                    echo 'No words found';
                }
            }
        }
        ?>
    </div>
</body>

</html>