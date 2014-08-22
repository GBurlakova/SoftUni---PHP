<?php

class programmingLanguages{
    public $programmingSkills;
    private $allowedFunctions = true;

    public function __construct(array $programmingSkills){
        try{
            $valueRegex = '/^[A-Z][a-z+#]{2,20}$/';
            foreach($programmingSkills as $subArr){
                foreach($subArr as $value){
                    if(empty($value) == true){
                        throw new Exception('Please fill each field in the computer skills section.');
                    }

                    if(preg_match($valueRegex, $value) == false){
                        throw new Exception('All the values for a programming language must consist
                                            of 2 to 20 letters starting with a capital.');

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
        $iterator -> attachIterator(new ArrayIterator($programmingSkills[0]));
        $iterator -> attachIterator(new ArrayIterator($programmingSkills[1]));
        foreach($iterator as $v){
            $this -> programmingSkills[$v[0]] = $v[1];
        }
    }

    public function printComputerSkillsSection(){
        $colspanTHead = 3;
        $rowspan = count($this -> programmingSkills) + 1;
        $sectionName = 'Computer Skills';
        echo <<<EOT
            <table>
                <thead>
                    <tr>
                        <th colspan='$colspanTHead'>$sectionName</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td rowspan='$rowspan'>Programming Languages</td>
                        <td>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Language</th><th>Skill Level</th>
                                    </tr>
                                </thead>
                                <tbody>



EOT;
        foreach($this -> programmingSkills as $programmingLang => $skill){
            echo <<<EOT
                                    <tr>
                                        <td>$programmingLang</td>
                                        <td>$skill</td>
                                    </tr>
EOT;
        }
        echo <<<EOT
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <tbody>
            </table>
EOT;
    }

    public function hasAllowedFunctions(){
        return $this -> allowedFunctions;
    }
}