<!DOCTYPE html>

<html>

<head>
    <title>Square Root</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="SquareRootSum.css"/>
</head>

<body>

    <section>
        <table>
            <thead>
            <tr>
                <th>Number</th>
                <th>Square</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sum = 0;
            for($number = 0; $number <= 100; $number++):
                if($number %2 == 0):
                    $sqrt = round(sqrt($number), 2);
                    $sum += $sqrt ?>
                    <tr>
                        <td><?php echo $number ?></td>
                        <td><?php echo $sqrt?></td>
                    </tr>
                <?php endif;
            endfor;
            $sum = round($sum, 2);
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Total</td>
                <td><?php echo $sum?></td>
            </tr>
            </tfoot>
        </table>
    </section>

</body>

</html>