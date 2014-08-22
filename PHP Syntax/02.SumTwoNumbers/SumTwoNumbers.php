<!DOCTYPE html>

<html>

<head>
    <title>Sum two numbers</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="SumTwoNumbers.css"/>
    <script src="Error.js"></script>
</head>

<body>
    <form action="SumTwoNumbers.php" method="post" class="form">
        <div>
            <label for="firstVal">First Number</label> <input
                                                            type="text"
                                                            name="firstVal"
                                                            placeholder="Enter your first number"
                                                            tabindex="1"
                                                            id="1"
                                                            oninput="check(1)"/>
        </div>
        <div>
            <label for="secondVal">Second number</label> <input
                                                            type="text"
                                                            name="secondVal"
                                                            placeholder="Enter your second number"
                                                            tabindex="2"
                                                            id="2"
                                                            oninput="check(2)"/>
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

        if(isset($_POST['firstVal']) && isset($_POST['secondVal'])){
            if(isEmptyForm($_POST)){
                echo 'Please enter your numbers.';
                return;
            }

            if(is_numeric($_POST['firstVal']) && is_numeric($_POST['secondVal'])){
                $firstVal = $_POST['firstVal'];
                $secondVal = $_POST['secondVal'];
                $result = number_format((float)($firstVal + $secondVal), 2, '.', '');
                echo "\$firstNumber + \$secondNumber = $firstVal + $secondVal = $result";
            } else{
                echo 'Please use only numbers';
            }
        }
        ?>
    </div>
</body>

</html>