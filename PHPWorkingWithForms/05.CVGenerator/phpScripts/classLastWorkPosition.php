<?php

class lastWorkPosition{
    public $compName;
    public $from;
    public $to;
    private $allowedFunctions = true;

    public function __construct($compName, $from, $to){
        $inputArgs = func_get_args();
        $args = array_map('trim', $inputArgs);
        $propertiesOfficialNames = array('Company Name', 'From', 'To');
        $reflect = new ReflectionClass($this);
        $publicProperties = $reflect -> getProperties(ReflectionProperty::IS_PUBLIC);
        $publicPropertiesNames = array();
        foreach($publicProperties as $property){
            $publicPropertiesNames[] = $property -> getName();
        }
        try{
            foreach($args as $k => $v){
                $v = trim($v);
                if(empty($v)){
                    throw new Exception('Please enter '.strtolower($propertiesOfficialNames[$k]).' before generate the CV.');
                }
            }

            $nameRegex = '/^[A-Z][a-z]{2,20}$/';
            if(preg_match($nameRegex, $compName) == false){
                throw new Exception('Company name must consist of 2 to 20 letters starting with a capital.');
            }

            $dateRegexp = '/^(0[1-9]|[12][0-9]|3[01])[\/](0[1-9]|1[012])[\/](19\d\d|20\d\d)$/';
            if((preg_match($dateRegexp, $from) == false) || (preg_match($dateRegexp, $to) == false)){
                throw new Exception('The date must be in the format dd/mm/yyyy.');
            }

            if(strtotime($to) < strtotime($from)){
                throw new Exception('Please enter correct date range.');
            }

        } catch (Exception $e){
            $message = $e -> getMessage();
            echo <<<EOT
                 <div>$message</div>
EOT;
            $this -> allowedFunctions = false;
            return;
        }

        $workPositionInf = new MultipleIterator();
        $workPositionInf -> attachIterator(new ArrayIterator($publicPropertiesNames));
        $workPositionInf -> attachIterator(new ArrayIterator($propertiesOfficialNames));
        $workPositionInf -> attachIterator(new ArrayIterator($args));
        foreach($workPositionInf as $v){
            $this -> $v[0] = array($v[1] => $v[2]);
        }
    }

    public function hasAllowedFunctions(){
        return $this -> allowedFunctions;
    }

    public function printLastWorkPos(){
        $reflect = new ReflectionClass($this);
        $publicProperties = $reflect -> getProperties(ReflectionProperty::IS_PUBLIC);
        $publicPropertiesValues = array();
        foreach($publicProperties as $property){
            $publicPropertiesValues[] = $property -> getValue($this);
        }

        echo <<<EOT
        <table>
            <thead>
                <tr>
                    <th colspan="2">Last Work Position</th>
                </tr>
            </thead>
            <tbody>
EOT;

        foreach($publicPropertiesValues as $v){
            foreach($v as $k => $vv){
                echo <<<EOT
                <tr>
                    <td>$k</td>
                    <td>$vv</td>
                </tr>
EOT;
            }
        }
        echo <<<EOT
                <tbody>
                </table>
EOT;
    }

}