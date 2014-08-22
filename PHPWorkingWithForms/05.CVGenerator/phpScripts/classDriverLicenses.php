<?php

class driverLicenses{
    public $categories;
    private $allowedFunctions = true;

    public function __construct(array $licenses){
        try{
            $licenseRegex = '/[ABC]/';
            foreach($licenses as $license){
                if(empty($license) == true){
                    throw new Exception('Please fill each field in the skills section.');
                }

                if(preg_match($licenseRegex, $license) == false){
                    throw new Exception('Please use A, B or C for the licenses.');
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
        $this -> categories = $licenses;
    }

    public function hasAllowedFunctions(){
        return $this -> allowedFunctions;
    }
}