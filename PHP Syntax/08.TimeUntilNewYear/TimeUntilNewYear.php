<!DOCTYPE html>

<html>

<head>
    <title>Time Until New Year</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="TimeUntilNewYear.css"/>
</head>

<body>
    <div class="result">
        <?php
        $currentTime = getdate();
        $nowUNIX = $currentTime[0];
        $newYearStart = mktime(0, 0, 0, 1, 1, date('Y') + 1);
        $secondsLeftToNewYear = $newYearStart - $nowUNIX;

        $lastSundayOfMarch = strtotime("last Sunday of March");
        $startSummerTime = mktime(3, 0, 0, 3, date('d', $lastSundayOfMarch), date('Y'));
        $lastSundayOfOctober = strtotime("last Sunday of October");
        $endSummerTime = mktime(4, 0, 0, 10, date('d', $lastSundayOfOctober), date('Y'));

        if ($startSummerTime <= $nowUNIX && $nowUNIX <= $endSummerTime) {
            $secondsLeftToNewYear -= 3600;
        }

        $minutesLeftToNewYear = (int)($secondsLeftToNewYear / 60);
        $hoursLeftToNewYear = (int)($secondsLeftToNewYear / 3600);

        $daysLeftToNewYear = (int)($secondsLeftToNewYear / (3600 * 24));
        $hours = (int)(($secondsLeftToNewYear % (3600 * 24)) / 3600);
        $minutes = (int)(($secondsLeftToNewYear % 3600) / 60);
        $seconds = (int)(($secondsLeftToNewYear % 3600) % 60);
        echo "<div>Hours until new year : $hoursLeftToNewYear</div>";
        echo "<div>Minutes until new year : $minutesLeftToNewYear</div>";
        echo "<div>Seconds until new year : $secondsLeftToNewYear</div>";
        echo "<div>$daysLeftToNewYear:$hours:$minutes:$seconds</div>";
        ?>
    </div>
</body>

</html>