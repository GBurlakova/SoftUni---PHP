<!DOCTYPE html>

<html>

<head>
    <title>Non-repeating digits</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="Non-RepeatingDigits.css"/>
</head>

<body>
    <form action="Non-RepeatingDigits.php" method="post" class="form">
        <div>
            <label for="input">Input</label><input
                type="text"
                name="input"
                placeholder="Enter a number"
                tabindex="1"/>
        </div>
        <input type="submit" value="Submit Data"/>
    </form>
    <div class="result">
        <?php
        function isEmptyForm($input_arr){
            foreach($input_arr as $v){
                if($v == ''){
                    return true;
                }
            }
        }

        if(isset($_POST['input'])){
            if(isEmptyForm($_POST)){
                echo 'Please enter a number!';
                return;
            }

            if(is_numeric($_POST['input'])){
                if($_POST['input'] >= 102){
                    $endOfLoop = $_POST['input'] + 0;
                    $result = array();
                    for($val = 102; $val <= $endOfLoop; $val++){
                        $digits = str_split($val);
                        $uniqueDigits = array_unique($digits);
                        if(count($uniqueDigits) < count($digits)){
                            continue;
                        } else {
                            array_push($result, $val);
                        }
                    }
                    $output = implode(', ', $result);
                    echo $output;
                } else {
                    echo 'no';
                }
            } else {
                echo 'Please submit only numbers!';
            }
        }
        ?>
    </div>
</body>

</html>