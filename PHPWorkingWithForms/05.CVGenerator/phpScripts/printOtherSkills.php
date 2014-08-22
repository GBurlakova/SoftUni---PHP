<?php
    function printOtherSkills(speakingLanguages $speakingLanguages, driverLicenses $driverLicenses){
        $rowspanLangs = count($speakingLanguages -> languageSkills);
        $sectionName = 'Other Skills';
        echo <<<EOT
                 <table>
                    <thead>
                        <tr><th colspan='2'>$sectionName</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan='$rowspanLangs'>Languages</td>
                            <td>
                                <table>
                                    <thead>
                                        <tr><th>Language</th><th>Comprehension</th><th>Reading</th><th>Writing</th></tr>
                                    </thead>
                                    <tbody>
EOT;
                                foreach($speakingLanguages -> languageSkills as $speakingLang => $skills){
                                    echo <<<EOT
                                        <tr><td>$speakingLang</td><td>$skills[0]</td><td>$skills[1]</td><td>$skills[2]</td></tr>
EOT;
                                }
                            echo <<<EOT
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>Driver's license</td>
                            <td>
EOT;
                            echo implode($driverLicenses -> categories);
                            <<<EOT
                            </td>
                        </tr>
                    </tbody>
                  </table>
EOT;
    }