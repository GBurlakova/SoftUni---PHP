<?php

class person{
    public $name;
    public $lastName;
    public $email;
    public $phone;
    public $gender;
    public $birthDate;
    public $nationality;
    private $allowedFunctions = true;

    public function __construct($name, $lastName, $email, $phone, $gender, $birthDate, $nationality){
        $inputArgs = func_get_args();
        $args = array_map('trim', $inputArgs);
        $reflect = new ReflectionClass($this);
        $publicProperties = $reflect -> getProperties(ReflectionProperty::IS_PUBLIC);
        $publicPropertiesNames = array();
        foreach($publicProperties as $property){
            $publicPropertiesNames[] = $property -> getName();
        }

        $propertiesOfficialNames = array('First Name', 'Last Name', 'Email', 'Phone', 'Gender', 'Birth Date', 'Nationality');

        try{
//          First check - for empty fields in the form
            foreach($args as $k => $v){
                if(empty($v)){
                    throw new Exception('Please enter '.strtolower($propertiesOfficialNames[$k]).' before generate the CV.');
                }
            }

//          Second Check - for correctness of the names - 2 to 20 symbols starting with a capital
            $namesRegex = '/^[A-Z][a-z]{2,20}$/';
            if(preg_match($namesRegex, $name) == false){
                throw new Exception('First name must consist of 2 to 20 letters starting with a capital.');
            }

            if(preg_match($namesRegex, $lastName) == false){
                throw new Exception('Last name must consist of 2 to 20 letters starting with a capital.');
            }

//          Third check  - for correctness of the email - only one @ symbol, only one dot
            $emailRegexp = '/^[^@]+@[^@]+\.\w+$/';
            if(preg_match($emailRegexp, $email) == false){
                throw new Exception('Email must contain: letters, digits and exactly one @ and one dot symbol.');
            }

//          Fourth check - for correctness of the phone number - starting
            $numberRegexp = '/^[+\-]?[0-9]+[0-9- ]+$/';
            if(preg_match($numberRegexp, $phone) == false){
                throw new Exception('Phone number must consist only of numbers and could contain the symbols: +, - and spaces.');
            }

//          Fifth check for correctness of the gender data
            if($args[4] == 1){
                $args[4] = 'Female';
            } else if($args[4] == 2){
                $args[4] = 'Male';
            } else {
                throw new Exception('Value for the gender must be male or female.');
            }

//          Sixth check - for correctness of the date format
            $dateRegexp = '/^(0[1-9]|[12][0-9]|3[01])[\/](0[1-9]|1[012])[\/](19\d\d|20\d\d)$/';
            if(preg_match($dateRegexp, $birthDate) == false){
                throw new Exception('The date must be in the format dd/mm/yyyy.');
            }
        } catch (Exception $e){
            $message = $e -> getMessage();
            echo <<<EOT
                 <div>$message</div>
EOT;
            $this -> allowedFunctions = false;
            return;
        }

        $combined = new MultipleIterator();
        $combined -> attachIterator(new ArrayIterator($publicPropertiesNames));
        $combined -> attachIterator(new ArrayIterator($propertiesOfficialNames));
        $combined -> attachIterator(new ArrayIterator($args));
        foreach($combined as $v){
            $this -> $v[0] = array($v[1] => $v[2]);
        }
    }

    public function printPerson(){
        $reflect = new ReflectionClass($this);
        $publicProperties = $reflect -> getProperties(ReflectionProperty::IS_PUBLIC);
        $publicPropertiesValues = array();
        foreach($publicProperties as $property){
            $publicPropertiesValues[] = $property -> getValue($this);
        }
        echo <<<EOT
        <table>
        <thead>
        <tr><th colspan="2">Personal Information</th></tr>
        </thead>
        <tbody>
EOT;
        foreach($publicPropertiesValues as $v){
            foreach($v as $k => $vv)
                echo <<<EOT
                <tr><td>$k</td><td>$vv</td></tr>
EOT;
        }
        echo <<<EOT
        </tbody>
EOT;
        echo <<<EOT
        </table>
EOT;

    }

    public function hasAllowedFunctions(){
        return $this -> allowedFunctions;
    }
}