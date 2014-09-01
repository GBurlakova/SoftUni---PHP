<?php

class Student {
    public $name;
    public $secondName;
    public $email;
    public $examScore;
    private $allowedPrintFunc = true;

    public function __construct($name, $secondName, $email, $examScore){
        try{
            $namesPattern = '/^[A-Z][a-z]{1,19}$/';
            $emailPattern = '/^[^@]+@[^@]+\.\w+$/';

            if(!empty($name) && preg_match($namesPattern, $name) == 1){
                $this->name = $name;
            } else {
                throw new Exception('Please enter only correct names.');
            }

            if(!empty($secondName) && preg_match($namesPattern, $secondName) == 1){
                $this->secondName = $secondName;
            } else {
                throw new Exception('Please enter only correct names.');
            }

            if(!empty($email) && preg_match($emailPattern, $email) == 1){
                $this->email = $email;
            } else {
                throw new Exception('Please enter correct emails.');
            }

            if(!empty($examScore) && is_numeric($examScore)){
                $this->examScore = $examScore;
            } else {
                throw new Exception('Please enter only numbers for the exam score.');
            }
        } catch(Exception $e){
            echo $e->getMessage();
            $this->allowedPrintFunc = false;
            return;
        }
    }

    public function allowedPrintFunction(){
        return $this->allowedPrintFunc;
    }

    public static  function allowedPrintForAll($arr){
        foreach($arr as $element){
            if($element->allowedPrintFunction() == false){
                return false;
            }
        }
        return true;
    }

    //    Sort By Name Functions

    public static function sortByNameAsc($a, $b){
        if($a->name == $b->name){
            return 0 ;
        }
        return ($a->name < $b->name) ? -1 : 1;
    }

    public static function sortByNameDsc($a, $b){
        if($a->name == $b->name){
            return 0 ;
        }
        return ($a->name > $b->name) ? -1 : 1;
    }

    //    Sort By Second Name Functions

    public static function sortBySecondNameAsc($a, $b){
        if($a->secondName == $b->secondName){
            return 0 ;
        }
        return ($a->secondName < $b->secondName) ? -1 : 1;
    }

    public static function sortBySecondNameDsc($a, $b){
        if($a->secondName == $b->secondName){
            return 0 ;
        }
        return ($a->secondName > $b->secondName) ? -1 : 1;
    }

    //    Sort By Email Functions

    public static function sortByEmailAsc($a, $b){
        if($a->email == $b->email){
            return 0 ;
        }
        return ($a->email < $b->email) ? -1 : 1;
    }

    public static function sortByEmailDsc($a, $b){
        if($a->email == $b->email){
            return 0 ;
        }
        return ($a->email > $b->email) ? -1 : 1;
    }

    // Sort By Score Functions

    public static function sortByScoreAsc($a, $b){
        if($a->examScore == $b->examScore){
            return 0 ;
        }
        return ($a->examScore < $b->examScore) ? -1 : 1;
    }

    public static function sortByScoreDesc($a, $b){
        if($a->examScore == $b->examScore){
            return 0 ;
        }
        return ($a->examScore > $b->examScore) ? -1 : 1;
    }

    public static function printStudents(array $students){
        $totalScore = 0;
        $studentsCount = count($students);
        $averageScore = 0;
        ?>
        <table>
            <thead>
                 <tr>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Exam Score</th>
                 </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student):?>
                    <tr>
                        <td><?php echo $student->name; ?></td>
                        <td><?php echo $student->secondName; ?></td>
                        <td><?php echo $student->email; ?></td>
                        <td><?php echo $student->examScore; ?></td>
                        <?php $totalScore += $student->examScore; ?>
                    </tr>
                <?php endforeach;
                $averageScore = round($totalScore / $studentsCount);
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Average Score:</td>
                    <td> <?php echo $averageScore; ?> </td>
                </tr>
            </tfoot>
        </table>
        <?php
    }

    public  static function selectSortCriteria($criteria, $order, &$students){
        try{
            if($criteria == 1){
                switch($order){
                    case 1: return usort($students, 'Student::sortByNameDsc'); break;
                    case 2: return usort($students, 'Student::sortByNameAsc'); break;
                    default: throw new Exception('Please select correct order term!');
                }
            } elseif ($criteria == 2){
                switch($order){
                    case 1: return usort($students, 'Student::sortBySecondNameDsc'); break;
                    case 2: return usort($students, 'Student::sortBySecondNameAsc'); break;
                    default: throw new Exception('Please select correct order term!');
                }
            } elseif ($criteria == 3){
                switch($order){
                    case 1: return usort($students, 'Student::sortByEmailDsc'); break;
                    case 2: return usort($students, 'Student::sortByEmailAsc'); break;
                    default: throw new Exception('Please select correct order term!');
                }
            } elseif($criteria == 4){
                switch($order){
                    case 1: return usort($students, 'Student::sortByScoreDsc'); break;
                    case 2: return usort($students, 'Student::sortByScoreAsc'); break;
                    default: throw new Exception('Please select correct order term!');
                }
            } else {
                throw new Exception('Please select correct sort term!');
            }
        } catch(Exception $e){
            header('Location: StudentSorting.php');
            exit;
        }
    }
} 