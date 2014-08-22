<!DOCTYPE html>

<html>

<head>
    <title>Rich People's Problems</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="RichPeopleProblems.css"/>
</head>

<body>

    <div class="heading">
        <p>Enter cars separated by comma</p>
    </div>

    <form action="RichPeopleProblems.php" method="post" class="form">
        <input type="text" name="cars" placeholder="Enter cars"/>
        <input type="submit" value="Submit"/>
        <input type="hidden" name="submitted"/>
    </form>
    <div class="result">
        <?php
            function splitCars($strInput){
                $patternToMatch = '/^([A-Z][a-z]+)(, [A-Z][a-z]+)+$/';
                $patternSplit = '/, /';
                if(preg_match($patternToMatch, $strInput) == 1){
                    return preg_split($patternSplit, $strInput);
                }
                return false;

            }

            if(isset($_POST['submitted'])):
                if(!empty($_POST['cars'])):
                    $cars = splitCars($_POST['cars']);
                    if($cars != false):
                        $colors = array('red', 'blue', 'green', 'yellow', 'purple', 'pink', 'white', 'black', 'orange'); ?>
                        <table>
                            <thead>
                            <tr>
                                <th>Car</th>
                                <th>Color</th>
                                <th>Count</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($cars as $car):  ?>
                                <tr>
                                    <td> <?php echo $car; ?> </td>
                                    <td> <?php
                                        $colorIndex = rand(0, count($colors) - 1);
                                        echo ucfirst($colors[$colorIndex]);
                                        ?>
                                    </td>
                                    <td> <?php echo rand(1, 5); ?> </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: echo 'Please enter cars separated by comma!';
                    endif;
                else:
                    echo 'Please enter names of cars before submission.';
                endif;
            endif;
        ?>
    </div>

</body>

</html>