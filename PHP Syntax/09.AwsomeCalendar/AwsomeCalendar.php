<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Problem 9. Awesome Calendar</title>
    <link href="AwesomeCalendar.css" rel="stylesheet">
</head>

<body>
    <?php
        class Month{
            public $nameBG;
            public $nameEN;
            public $year;
            public $days;

            public function __construct($year, $monthNumberNumber){
                $this -> year = $year;
                switch($monthNumberNumber){
                    case 1: $this -> nameBG = 'Януари';
                            $this -> nameEN = 'January';
                        break;
                    case 2: $this -> nameBG = 'Февруари';
                            $this -> nameEN = 'February';
                        break;
                    case 3: $this -> nameBG = 'Март';
                            $this -> nameEN = 'March';
                        break;
                    case 4: $this -> nameBG = 'Април';
                            $this -> nameEN = 'April';
                        break;
                    case 5: $this -> nameBG = 'Май';
                            $this -> nameEN = 'May';
                            break;
                    case 6: $this -> nameBG = 'Юни';
                            $this -> nameEN = 'June';
                            break;
                    case 7: $this -> nameBG = 'Юли';
                            $this -> nameEN = 'July';
                            break;
                    case 8: $this -> nameBG = 'Август';
                            $this -> nameEN = 'August';
                            break;
                    case 9: $this -> nameBG = 'Септември';
                            $this -> nameEN = 'September';
                            break;
                    case 10: $this -> nameBG = 'Октомври';
                             $this -> nameEN = 'October';
                             break;
                    case 11: $this -> nameBG = 'Ноември';
                             $this -> nameEN = 'November';
                             break;
                    case 12: $this -> nameBG = 'Декември';
                             $this -> nameEN = 'December';
                             break;
                }


                $monthFirstDay = 1;
                $monthNameEN = $this -> nameEN;
                $monthLastDay =  date('d', strtotime("last day of $monthNameEN $year"));

                $weekNumber = 1;
                $this -> days = array_fill(1, 5, array_fill(1, 7, ""));
                for($day = $monthFirstDay; $day <= $monthLastDay; $day++){
                    $currentDate = strtotime("$day $monthNameEN $year");
                    $currentWeekDay = date('w', $currentDate);
                    if($currentWeekDay == 0){
                        $currentWeekDay = 7;
                    }
                    $currentWeekDay += 0;
                    $this -> days[$weekNumber][$currentWeekDay] = $day;
                    if($currentWeekDay == 7){
                        $weekNumber += 1;
                    }
                }
            }

            function printMonth(){
                echo '<table>';
                echo '<thead>';
                echo '<tr><th colspan="7">'.$this -> nameBG.'</th></tr>';
                echo '<tr><th>По</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Съб</th><th class="sunday">Не</th></tr>';
                echo '</thead>';
                echo '<tbody>';
                for($week = 1; $week <= 5; $week++){
                    echo '<tr>';
                    for($day = 1; $day <= 7; $day++){
                        echo '<td>'.$this -> days[$week][$day].'</td>';
                    }
                    echo '</tr>';
                }
                echo '<tbody>';
                echo '</table>';
            }
        }
    ?>

    <div class="calendar">
        <?php
            $year = 2014;
            echo "<p class='year'>$year</p>";
            for($monthNumber = 1; $monthNumber <= 12; $monthNumber++){
                $currentMonth = new Month($year, $monthNumber);
                $currentMonth -> printMonth();
            }
        ?>
    </div>

</body>

</html>