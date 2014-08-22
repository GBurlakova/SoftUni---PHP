<?php

class speakingLanguages{
    public $languageSkills;
    private $allowedFunctions = true;

    public function __construct(array $languageSkills){
        try{
            $valueRegex = '/^[A-Z][a-z]{2,20}$/';
            foreach($languageSkills as $subArr){
                foreach($subArr as $value){
                    if(empty($value) == true){
                        throw new Exception('Please fill each field in the speaking languages section.');
                    }

                    if(preg_match($valueRegex, $value) == false){
                        throw new Exception('All the values for a speaking language
                                            must consist of 2 to 20 letters starting with a capital.');
                    }
                }
            }
        } catch (Exception $e){
            $message = $e -> getMessage();
            echo <<<EOT
                 <div>$message</div>
EOT;
            $this -> allowedFunctions = false;
            return;
        }


        $iterator = new MultipleIterator();
        $iterator -> attachIterator(new ArrayIterator($languageSkills[0]));
        $iterator -> attachIterator(new ArrayIterator($languageSkills[1]));
        $iterator -> attachIterator(new ArrayIterator($languageSkills[2]));
        $iterator -> attachIterator(new ArrayIterator($languageSkills[3]));
        foreach($iterator as $v){
            $this -> languageSkills[$v[0]] = array($v[1], $v[2], $v[3]);
        }
    }

    public function hasAllowedFunctions(){
        return $this -> allowedFunctions;
    }
}