<?php

class Seminar {
    public $name;
    public $lecturer;
    public $date;
    public $description;

    public function __construct($name, $lecturer, $date, $description){
        try {
            $namesPattern = '/[A-Z][a-z]+ [A-Z][a-z]+/';
            $datesPattern = '/([1-9]|([012][0-9])|(3[01]))-([0]{0,1}[1-9]|1[012])-\d\d\d\d [012]{0,1}[0-9]:[0-6][0-9]/';
            $args = func_get_args();
            foreach($args as $arg){
                if(empty($arg)){
                    throw new Exception("Please ensure you have entered complete data for the seminars!");
                }
            }
            if(preg_match($namesPattern, $lecturer) != true){
                throw new Exception("Please enter correct name for the lecturer!");
            }
            if(preg_match($datesPattern, $date) != true){
                throw new Exception('Please use correct date/time format.');
            }
        } catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header('Location: indexErrorMessage.php');
            return;
        }

        $this->name = $name;
        $this->lecturer = $lecturer;
        $this->date = $date;
        $this->description = $description;
    }

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

    public static function sortByDateAsc($a, $b){
        if(strtotime($a->date) == strtotime($b->date)){
            return 0 ;
        }
        return (strtotime($a->date) < strtotime($b->date)) ? -1 : 1;
    }

    public static function sortByDateDsc($a, $b){
        if(strtotime($a->date) == strtotime($b->date)){
            return 0 ;
        }
        return (strtotime($a->date) > strtotime($b->date)) ? -1 : 1;
    }
} 