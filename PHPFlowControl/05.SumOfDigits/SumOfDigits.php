<!DOCTYPE html>

<html>

<head>
    <title>Sum of Digits</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="SumOfDigits.css"/>
</head>

<body>

    <div class="heading">
        <p>Enter numbers separated by a comma</p>
    </div>

    <form action="SumOfDigits.php" method="post" class="form">
        <input type="text" name="input" placeholder="Enter numbers"/>
        <input type="submit" value="Submit"/>
        <input type="hidden" name="submitted"/>
    </form>
    <div class="result">
        <?php
        function splitStr($strInput){
            $patternToMatch = '/^([^,\s]+)?$|^(([^,\s]+)?((, )([^,\s]+))+)$/';
            $patternSplit = '/, /';
            if(preg_match($patternToMatch, $strInput) == 1){
                return preg_split($patternSplit, $strInput);
            }
            return false;
        }

        function sumTokenDigits($token){
            if(is_numeric($token)){
                $digits = str_split($token);
                $sum = 0;
                foreach($digits as $digit){
                    $digit += 0;
                    $sum += $digit;
                }
                echo $sum;
            } else {
                echo 'I cannot sum that';
            }
        }
        if(isset($_POST['submitted'])):
            if(!empty($_POST['input'])):
                $tokens = splitStr($_POST['input']);
                if($tokens != false): ?>
                    <table>
                        <thead>
                        <tr>
                            <th>Input token</th>
                            <th>Sum of digits</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($tokens as $token):  ?>
                            <tr>
                                <td> <?php echo $token; ?> </td>
                                <td> <?php sumTokenDigits($token); ?> </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: echo 'Please enter numbers separated by a comma!';
                endif;
            else:
                echo 'Please enter numbers before submission.';
            endif;
        endif;
        ?>
    </div>

</body>

</html>