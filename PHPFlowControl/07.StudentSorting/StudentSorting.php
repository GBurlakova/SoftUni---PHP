<?php
mb_internal_encoding("utf-8");
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>

<html>

<head>
    <title>Student Sorting</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/StudentSorting.css"/>
</head>

<body>
    <form method="post" action="StudentSorting.php" class="form">
        <div class="header">
            <div>First Name</div>
            <div>Second Name</div>
            <div>Email</div>
            <div>Exam Score</div>
        </div>
        <div id="students" class="students">
            <div id="student1">
                <input type="text" name="firstNames[]" placeholder="First Name"/>
                <input type="text" name="secondNames[]" placeholder="Second Name"/>
                <input type="text" name="emails[]" placeholder="Email"/>
                <input type="number" name="scores[]" placeholder="Exam Score"/>
                <button type="button" onclick="removeStudent(this, studentId)">-</button>
            </div>
        </div>
        <div class="options">
            <button type="button" id="add">+</button>
            <label for="criteria">Sort By: </label>
            <select name="criteria" id="criteria">
                <option value="1">First Name</option>
                <option value="2">Last Name</option>
                <option value="3">Email</option>
                <option value="4">Exam Score</option>
            </select>
            <label for="order">Order: </label>
            <select name="order" id="order">
                <option value="1">Descending</option>
                <option value="2">Ascending</option>
            </select>
            <input type="submit" value="Submit"/>
            <input type="hidden" name="submitted"/>
        </div>
    </form>
    <?php
        include_once 'scripts/phpscripts/student.php';

        if(isset($_POST['submitted'])){
            $names = $_POST['firstNames'];
            $secondNames = $_POST['secondNames'];
            $emails = $_POST['emails'];
            $scores = $_POST['scores'];
            if(count($names) == count($secondNames) &&
               count($names) == count($scores)){
                $sortCriteria = $_POST['criteria'];
                $sortOrder = $_POST['order'];
                $iterator = new MultipleIterator();
                $iterator->attachIterator(new ArrayIterator($names));
                $iterator->attachIterator(new ArrayIterator($secondNames));
                $iterator->attachIterator(new ArrayIterator($emails));
                $iterator->attachIterator(new ArrayIterator($scores));
                $students = array(); ?>
                <div class="result">
                    <?php
                    foreach($iterator as $entrySet){
                        $students[] = new Student($entrySet[0], $entrySet[1], $entrySet[2], $entrySet[3]);
                    }
                    if( Student::allowedPrintForAll($students)){
                        Student::selectSortCriteria($sortCriteria, $sortOrder, $students);
                        Student::printStudents($students);
                    }
                    ?>
                </div>
                <?php
            }
        }
    ?>

    <script src="scripts/jquery/jquery-1.11.1.min.js"></script>
    <script src="scripts/javascrips/addRemoveStudent.js"></script>
</body>

</html>