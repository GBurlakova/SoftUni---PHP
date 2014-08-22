<!DOCTYPE html>

<html>

<head>
    <title>Print Tags</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="PrintTags.css"/>
</head>

<body>
    <form action="PrintTags.php" method="post" class="form">
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
            $regexp = '/^(([\w]+, )+[A-Za-z]+)$/';
            $tagsAsStr = $_POST['input'];
            $inputMatch = preg_match($regexp, $tagsAsStr);
            if($inputMatch == 1){
                $tags = explode(', ', $tagsAsStr);
                foreach($tags as $key => $tag): ?>
                <div> <?php echo $key.': '. $tag ?> </div>
                <?php endforeach;
            } else {
                echo 'Please use correct format for the input';
            }
        }
    ?>
    </div>
</body>

</html>