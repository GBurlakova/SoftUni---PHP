<!DOCTYPE html>

<html>

<head>
    <title>Calculate Interest</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="CalculateInterest.css"/>
</head>

<body>
    <form action="CalculateInterest.php" method="post" class="form">
        <div>
            <label for="amount">Enter amount</label>
            <input type="number" id="amount" name="amount" tabindex="1"/>
        </div>
        <div>
            <input type="radio" id="USD" name="currency" value="USD" tabindex="2"/> <label for="USD">USD</label>
            <input type="radio" id="EUR" name="currency" value="EUR" tabindex="3"/> <label for="EUR">EUR</label>
            <input type="radio" id="BGN" name="currency" value="BGN" tabindex="4"/> <label for="BGN">BGN</label>
        </div>
        <div>
            <label for="interest">Compound Interest Amount</label>
            <input type="number" id="interest" name="interest" tabindex="5"/>
        </div>
        <div>
            <select name="period" id="period">
                <option value="6">6 Months</option>
                <option value="1">1 Year</option>
                <option value="2">2 Years</option>
                <option value="5">5 Years</option>
            </select>
            <input type="submit" value="Calculate"/>
        </div>
        <input type="hidden" name="submitted"/>
    </form>
    <div class="result">
        <?php
        function addCurrencySymbol($currency, $amountMoney){
            $currencySymbols = array('USD' => '$', 'EUR' => '€', 'BGN' => 'lv');
            $symbol = $currencySymbols[$currency];
            $amountMoney = number_format($amountMoney, 2, '.', '');
            if($currency == 'BGN'){
                $amountMoney .= ' '.$symbol;
            } else {
                $amountMoney = $symbol.' '.$amountMoney;
            }
            return $amountMoney;
        }

        require_once('../CheckForEmptyForm.php');
        if(isset($_POST['submitted'])){
            if(isEmptyForm($_POST)){
                echo 'Please enter the data to calculate the result.';
                return;
            }

            $allowedPeriodValues = array(1, 2, 5, 6);
            $allowedCurrencySymbols = array('USD', 'EUR', 'BGN');
            if(is_numeric($_POST['amount']) && is_numeric($_POST['interest'])
               && (array_search($_POST['period'], $allowedPeriodValues) !== false)
               && (array_search($_POST['currency'], $allowedCurrencySymbols) !== false)){
               $amount = $_POST['amount'];
               $periodValue = $_POST['period'];
               $periodInMonths = 0;
               if($periodValue == 6){
                $periodInMonths = 6;
               } else{
                $periodInMonths = $periodValue * 12;
               }
               $interestPerMonth = (($_POST['interest'] / 12) / 100) + 1;
               $currency = $_POST['currency'];
               $result = $amount;
               for($month = 1; $month <= $periodInMonths; $month++){
                   $result *= $interestPerMonth;
               }
               echo addCurrencySymbol($currency, $result);
            } else {
                echo 'Please use correct data';
            }
        }
        ?>
    </div>
</body>

</html>