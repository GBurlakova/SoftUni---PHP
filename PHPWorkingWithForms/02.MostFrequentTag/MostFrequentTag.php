<!DOCTYPE html>

<html>

<head>
    <title>Most Frequent Tag</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="MostFrequentTag.css"/>
</head>

<body>
    <form action="MostFrequentTag.php" method="post" class="form">
        <div>
            <label for="input">Enter Tags:</label>
        </div>
        <input type="text" id="input" name="input"/> <input type="submit" value="Submit"/>
        <input type="hidden" name="submitted"/>
    </form>
    <div class="result">
        <?php
        require_once('../CheckForEmptyForm.php');
        if(isset($_POST['submitted'])){
            if(isEmptyForm($_POST)){
                echo 'Please enter the tags first.';
                return;
            }
            $regexp = '/(([\w]+, )+[A-Za-z]+)/';
            $tagsAsStr = $_POST['input'];
            $inputMatch = preg_match($regexp, $tagsAsStr);
            if($inputMatch == 1){
                $tags = explode(', ', $tagsAsStr);
                $tagsByFrequency = array();
                foreach ($tags as $v) {
                    if(array_key_exists($v, $tagsByFrequency)){
                        $tagsByFrequency[$v] += 1;
                    } else {
                        $tagsByFrequency[$v] = 1;
                    }

                }
                arsort($tagsByFrequency);
                foreach($tagsByFrequency as $k => $v){
                    echo "<div>$k: $v times</div>";
                }

                reset($tagsByFrequency);
                $mostFrequentTag = key($tagsByFrequency);
                echo "<div>Most Frequent Tag is $mostFrequentTag.</div>";
            } else{
                echo 'Please use correct format for the input';
            }
        }
        ?>
    </div>
</body>

</html>