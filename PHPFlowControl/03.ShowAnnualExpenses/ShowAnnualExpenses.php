<!DOCTYPE html>

<html>

<head>
    <title>Show Annual Expenses</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="ShowAnnualExpenses.css"/>
</head>

<body>

    <div class="heading">
        <p>Enter number of years</p>
    </div>

    <form action="ShowAnnualExpenses.php" method="post" class="form">
        <input type="text" name="years" placeholder="Enter number of years"/>
        <input type="submit" value="Submit"/>
        <input type="hidden" name="submitted"/>
    </form>
    <div class="result">
        <?php
        if(isset($_POST['submitted'])):
            if(!empty($_POST['years']) && is_numeric($_POST['years'])):
                $years = $_POST['years'] + 0;
                $currentYear = date('Y');
                $endYear = $currentYear + $years;
                $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                                'October', 'November', 'December'); ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Year</th>
                                <?php foreach($months as $month): ?>
                                <th><?php echo $month; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($year = $currentYear; $year <= $endYear; $year++): ?>
                                <tr>
                                    <td> <?php echo $year; ?> </td>
                                    <?php for($month = 1; $month <= 12; $month++): ?>
                                    <td> <?php echo rand(0, 999); ?> </td>
                                    <?php endfor; ?>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
            <?php else:
                echo 'Please enter valid number of years.';
            endif;
        endif;
        ?>
    </div>

</body>

</html>