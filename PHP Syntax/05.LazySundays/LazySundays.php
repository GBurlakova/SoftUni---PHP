<!DOCTYPE html>

<html>

<head>
    <title>Lazy Sundays</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="LazySundays.css"/>
</head>

<body>
    <div class="result">
        <?php
        $currentMonthDays = date('t');
        $currentYear = date('Y');
        $currentMonth = date('n');
        for($day = 1; $day <= $currentMonthDays; $day++){
            $date = "$currentYear/$currentMonth/".$day;
            $dayOfWeek = date('w', strtotime($date));
            if($dayOfWeek == 0){
                echo '<div>'.date('jS F Y', strtotime($date)).'</div>';
            }
        }
        ?>
    </div>
</body>

</html>