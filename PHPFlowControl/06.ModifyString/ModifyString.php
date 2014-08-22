<?php
    mb_internal_encoding("utf-8");
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>

<html>

<head>
    <title>Modify String</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="ModifyString.css"/>
</head>

<body>

    <div class="heading">
        <p>Please select a function</p>
    </div>

    <form action="ModifyString.php" method="post" class="form">
        <div>
            <input type="text" id="string" name="string" placeholder="Enter string to process"/>
        </div>
        <!--Palindrome Function-->
        <div>
            <input type="radio" id="palindrome" name="function" value="1"/>
            <label for="palindrome">Check Palindrome</label>
        </div>
        <!--Reverse Function-->
        <div>
            <input type="radio" id="reverse" name="function" value="2"/>
            <label for="reverse">Reverse String</label>
        </div>
        <!--Split Function-->
        <div>
            <input type="radio" id="split" name="function" value="3"/>
            <label for="split">Split</label>
        </div>
        <!--Hash String Function-->
        <div>
            <input type="radio" id="hash" name="function" value="4"/>
            <label for="hash">Hash String</label>
        </div>
        <!--Shuffle Function-->
        <div>
            <input type="radio" id="shuffle" name="function" value="5"/>
            <label for="shuffle">Shuffle</label>
        </div>
        <div>
            <input type="submit" value="Submit"/>
        </div>
        <input type="hidden" name="submitted"/>
    </form>
    <div class="result">
        <?php
        function isPalindrome($string) {
            if ((mb_strlen($string) == 1) || (mb_strlen($string) == 0)) {
                return "$string is a palindrome";
            } else {
                if (mb_substr($string, 0 ,1) == mb_substr($string, (mb_strlen($string) - 1), 1)) {
                    return isPalindrome(mb_substr($string, 1, mb_strlen($string) -2));
                } else {
                    return "$string is not a palindrome";
                }
            }
        }

        function mb_strrev ($string, $encoding = null) {
            if ($encoding === null) {
                $encoding = mb_detect_encoding($string);
            }

            $length   = mb_strlen($string, $encoding);
            $reversed = '';
            while ($length-- > 0) {
                $reversed .= mb_substr($string, $length, 1, $encoding);
            }

            return $reversed;
        }

        function mb_str_split( $string ) {
            return preg_split('/(?<!^)(?!$)/u', $string );
        }

        function shuffleStr($str){
            $arr = mb_str_split($str);
            shuffle($arr);
            $result = implode('', $arr);
            return $result;
        }

        function printResult($str, $function){
            $result = '';

            switch($function){
                case 1: $result = isPalindrome($str); break;
                case 2: $result = mb_strrev($str); break;
                case 3: $result = implode(' ', mb_str_split($str)); break;
                case 4: $result = crypt($str); break;
                case 5: $result = shuffleStr($str); break;
            }
            $result = htmlentities($result);
            echo $result;
        }

        if(isset($_POST['submitted'])):
            if(isset($_POST['function'])):
                $allowedFunctions = array(1, 2, 3, 4, 5);
                $functionToExecute = $_POST['function'];
                $string = $_POST['string'];
                $isAllowedFunc = array_search($functionToExecute, $allowedFunctions) !== false ? true : false;
                if($isAllowedFunc): ?>
                    <span> <?php printResult($string, $functionToExecute); ?> </span>
                <?php else: ?>
                    <span> <?php echo 'Please select allowed function.'; ?> </span>
                <?php endif;
            else:
                echo 'Please select a function first';
            endif;
        endif;
        ?>
    </div>

</body>

</html>