<!DOCTYPE html>

<html>

<head>
    <title>Find Primes In Range</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="FindPrimesInRange.css"/>
</head>

<body>

    <div class="heading">
        <p>Enter range to search in</p>
    </div>

    <form action="FindPrimesInRange.php" method="post" class="form">
        <label for="start">Starting Index: </label>
        <input type="text" id="start" name="start" placeholder="Enter start of the range"/>
        <label for="end">End Index: </label>
        <input type="text" id="end" name="end" placeholder="Enter end of the range"/>
        <input type="submit" value="Submit"/>
        <input type="hidden" name="submitted"/>
    </form>
    <div class="result">
        <?php
        function isValidRange($start, $end){
            if(!empty($start) && is_numeric($start) &&
               !empty($end) && is_numeric($end)){
                if($start <= $end && $start >= 2){
                    return true;
                }
                return false;
            }
            return false;
        }

        function isPrime($number){
            $divider = 2;
            $lastDivider = round(sqrt($number));
            while($divider <= $lastDivider){
                if($number % $divider == 0){
                    return false;
                }
                $divider++;
            }
            return true;
        }

        function printResult($number, $endLoop){
            if($number == $endLoop){
                echo $number;
            } else{
                echo $number.', ';
            }
        }

        if(isset($_POST['submitted'])):
            if(isValidRange($_POST['start'], $_POST['end'])):
                $start = $_POST['start'] + 0;
                $end = $_POST['end'] + 0;
                $result = '';
                for($number = $start; $number <= $end; $number++):
                    if(isPrime($number)): ?>
                        <span class="bold"> <?php printResult($number, $end); ?> </span>
                    <?php else: ?>
                        <span> <?php printResult($number, $end); ?> </span>
                    <?php endif;
                endfor;
            else: ?>
                <div class="error-message">Please enter valid range of numbers - starting index should be bigger than 2 or equal to 2.</div>
            <?php endif;
        endif;
        ?>
    </div>

</body>

</html>