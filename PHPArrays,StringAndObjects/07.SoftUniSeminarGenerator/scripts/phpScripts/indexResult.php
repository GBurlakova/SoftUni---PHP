<?php
    session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <title>SoftUni Seminar Generator</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../../styles/indexResult.css"/>
</head>

<body>
    <?php
    require_once 'seminar.php';
    try{
        if(!empty($_POST['text'])){
            $inputPattern = '/^(([^-]+)-([A-z][a-z]+ [A-z][a-z]+)-(([1-9]|([012][0-9])|(3[01]))-([0]{0,1}[1-9]|1[012])-\d\d\d\d [012]{0,1}[0-9]:[0-6][0-9]) (.*)\.\.\.([\s]*))+$/';
            $datesPattern = '/([1-9]|([012][0-9])|(3[01]))-([0]{0,1}[1-9]|1[012])-\d\d\d\d [012]{0,1}[0-9]:[0-6][0-9]/';
            $descriptionPattern = '/(?<=[0-9]:[0-6][0-9] ).+/';
            if(preg_match($inputPattern, $_POST['text']) != true){
                throw new Exception('Please enter seminars information in the format needed - [Seminar name]-[Lecturer’s name]-[dd-mm-YYYY hh:MM] [Seminar info]');
            }
            $seminarsInfo = preg_split('/\.\.\./', $_POST['text']);
            $seminars = array();
            foreach($seminarsInfo as $seminar){
                $seminar = trim($seminar);
                if(!empty($seminar)){
                    $name = preg_split('/-/', $seminar)[0];
                    $lecturer = preg_split('/-/', $seminar)[1];
                    $date = array();
                    preg_match_all($datesPattern, $seminar, $date);
                    $date = $date[0][0];
                    $description = array();
                    preg_match_all($descriptionPattern, $seminar, $description);
                    $description = $description[0][0];
                    $currentSeminar = new Seminar($name, $lecturer, $date, $description);
                    $seminars[] = $currentSeminar;
                } else{
                    continue;
                }
            }
            $sortTerm = $_POST['term'];
            $order = $_POST['order'];
            if(($sortTerm == 1 || $sortTerm == 2) && ($order == 1 || $order == 2)){
                if($sortTerm == 1){
                    switch($order){
                        case 1: usort($seminars, 'Seminar::sortByNameAsc'); break;
                        case 2: usort($seminars, 'Seminar::sortByNameDsc'); break;
                    }
                } else {
                    switch($order){
                        case 1: usort($seminars, 'Seminar::sortByDateAsc'); break;
                        case 2: usort($seminars, 'Seminar::sortByDateDsc'); break;
                    }
                }
            } else {
                throw new Exception('Please use only allowed sort term and sort order.');
            }
            ?>


            <table>
                <thead>
                    <tr>
                        <th>Seminar name</th>
                        <th>Date</th>
                        <th>Participate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $currentId = 1;
                        foreach($seminars as $seminar): ?>
                        <tr>
                            <td>
                                <a href="#" id="<?php echo $currentId; ?>"><?php echo $seminar->name?></a>
                                <div id="description<?php echo $currentId; ?>">
                                    <p><?php echo $seminar->description; ?></p>
                                </div>
                            </td>
                            <td><?php echo $seminar->date; $currentId++; ?></td>
                            <td><button type="button" class="signup">SIGN UP</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php
        } else {
            throw new Exception('Please enter all the information needed before generate.');
        }
    } catch(Exception $e){
        $_SESSION['error'] = $e->getMessage();
        header('Location: indexErrorMessage.php');
        return;
    }
    ?>
    <script src="../javascripts/jquery-1.11.1.min.js"></script>
    <script src="../javascripts/showDescriptionHide.js"></script>
</body>

</html>