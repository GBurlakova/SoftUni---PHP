<!DOCTYPE html>

<html>

<head>
    <title>Coloring Text</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="ColoringTexts.css"/>
</head>

<body>
    <form action="ColoringTexts.php" method="post" class="form">
        <div>
            <p>Enter some text</p>
        </div>
        <input type="text" name="input" id="input" placeholder="Enter your text here"/>
        <input type="hidden" name="submitted"/>
        <input type="submit" value="Submit"/>
    </form>
    <div class="result">
        <?php
        if(isset($_POST['submitted'])){
            if(empty($_POST['input']) !== true){
                $chars = str_split($_POST['input']);
                foreach($chars as $char){
                    if(ord($char) %2 == 0){
                        $class = 'red';
                    } else {
                        $class = 'blue';
                    } ?>
                    <span class="<?php echo $class?>"><?php echo $char?></span>
                <?php }
            } else{
                echo 'Please enter some text before submit!';
            }
        }
        ?>
    </div>
</body>

</html>