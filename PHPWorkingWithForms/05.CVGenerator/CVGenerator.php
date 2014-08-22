<!DOCTYPE html>

<html>

<head>
    <title>CV Generator</title>
    <link rel="stylesheet" href="styles/CV%20Generator.css"/>
    <meta charset="UTF-8"/>
</head>

<body>
    <section class="form">
        <form action="CVGenerator.php" method="post">
            <fieldset>
                <legend>
                    Personal Information
                </legend>
                <div><input type="text" name="firstName" placeholder="First name"/></div>
                <div><input type="text" name="lastName" placeholder="Last name"/></div>
                <div><input type="email" name="email" placeholder="Email"/></div>
                <div><input type="text" name="phone" placeholder="Phone Number"/></div>
                <div>
                    <label for="female">Female</label><input type="radio" id="female" name="gender" value="1"/>
                    <label for="male">Male</label><input type="radio" id="male" name="gender" value="2"/>
                </div>
                <div>
                    <label for="birthday">Date of Birth</label>
                </div>
                <input type="text" id="birthday" name="birthday" placeholder="dd/mm/yyyy"
                       pattern="(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19\d\d|20\d\d)"/>
                <div>
                    <label for="nationality">Nationality</label>
                </div>
                <input type="text" id="nationality" list="nationalities" name="nationality"/>
                <datalist id="nationalities">
                    <option value="American">
                    <option value="Bulgarian">
                    <option value="French">
                    <option value="German">
                </datalist>
            </fieldset>

            <fieldset>
                <legend>
                    Last Work Position
                </legend>
                <div>
                    <label for="compName">Company name: </label><input type="text" id="compName" name="compName"/>
                </div>
                <div>
                    <label for="from">From: </label><input type="text" id="from" name="from" placeholder="dd/mm/yyyy"
                                                           pattern="(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19\d\d|20\d\d)"/>
                </div>
                <div>
                    <label for="to">To: </label><input type="text" id="to" name="to" placeholder="dd/mm/yyyy"
                                                       pattern="(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19\d\d|20\d\d)"/>
                </div>
            </fieldset>
            <fieldset>
                <legend>Computer Skills</legend>
                <div>
                    <label>Programming Languages</label>
                </div>
                <div id="parentForLanguages">
                    <div id="progLang1">
                        <input type="text" name="progLangs[]"/>
                        <select name="levelsProg[]">
                            <option value="Beginner">Beginner</option>
                            <option value="Programmer">Programmer</option>
                            <option value="Ninja">Ninja</option>
                        </select>
                    </div>
                </div>
                <button type="button" id="addProgLang" ">Add language</button>
                <button type="button" id="removeProgLang">Remove language</button>
            </fieldset>
            <fieldset>
                <legend>
                    Other Skills
                </legend>
                <div>
                    <label>
                        Languages
                    </label>
                </div>
                <div id="parentForSpeakingLanguages">
                    <div id="speakingLang1">
                        <input type="text" name="speakingLangs[]"/>
                        <select name="comprehension[]">
                            <option value="0" selected>-Comprehension-</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                        <select name="reading[]">
                            <option value="0" selected>-Reading-</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                        <select name="writing[]">
                            <option value="0" selected>-Writing-</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                    </div>
                </div>
                <button type="button" id="addSpeakingLang" ">Add language</button>
                <button type="button" id="removeSpeakingLang">Remove language</button>
                <div>
                    <label>
                        Driver's License
                    </label>
                </div>
                <label for="aCat">B</label><input type="checkbox" id="aCat" name="licenses[]" value="A"/>
                <label for="bCat">A</label><input type="checkbox" id="bCat" name="licenses[]" value="B"/>
                <label for="cCat">C</label><input type="checkbox" id="cCat" name="licenses[]" value="C"/>
            </fieldset>
            <input type="submit" value="Generate CV" class="button"/>
            <input type="hidden" name="submitted"/>
        </form>
    </section>

    <section class="cv">
        <header>CV</header>
        <div>
        <?php
        require_once 'phpScripts/classPerson.php';

        require_once 'phpScripts/classLastWorkPosition.php';

        require_once 'phpScripts/classProgrammingLanguages.php';

        require_once 'phpScripts/classSpeakingLanguages.php';

        require_once 'phpScripts/classDriverLicenses.php';

        require_once 'phpScripts/printOtherSkills.php';

        function inputDataIsSet($arr){
            if(!empty($arr)){
                $propsHaveToBeSet = array('firstName', 'lastName', 'email', 'phone',
                                          'gender', 'birthday', 'nationality', 'compName',
                                          'from', 'to', 'progLangs', 'levelsProg', 'speakingLangs',
                                          'comprehension', 'reading', 'writing', 'licenses');
                foreach($propsHaveToBeSet as $prop){
                    if(isset($arr[$prop]) == false){
                        return false;
                    }
                }
                return true;
            } else {
                return false;
            }
        }

        if(isset($_POST['submitted'])){
            if(inputDataIsSet($_POST) == true){
                $person = new person($_POST['firstName'], $_POST['lastName'], $_POST['email'],
                                     $_POST['phone'], $_POST['gender'], $_POST['birthday'], $_POST['nationality']);
                $lastWorkPos = new lastWorkPosition($_POST['compName'], $_POST['from'], $_POST['to']);
                $programmingLanguages = new programmingLanguages(array($_POST['progLangs'], $_POST['levelsProg']));
                $speakingLanguages = new speakingLanguages(array($_POST['speakingLangs'], $_POST['comprehension'], $_POST['reading'], $_POST['writing']));
                $driverLicenses = new driverLicenses($_POST['licenses']);

                if($person -> hasAllowedFunctions() && $lastWorkPos -> hasAllowedFunctions() &&
                    $programmingLanguages -> hasAllowedFunctions() && $speakingLanguages -> hasAllowedFunctions() &&
                    $driverLicenses -> hasAllowedFunctions()){
                    $person -> printPerson();
                    $lastWorkPos -> printLastWorkPos();
                    $programmingLanguages -> printComputerSkillsSection();
                    printOtherSkills($speakingLanguages, $driverLicenses);
                }
            } else {
                echo 'Please fill each field in the form before generate your CV.';
            }
        }
        ?>
        </div>
    </section>

    <script src="javascripts/jquery-1.11.1.min.js"></script>
    <script src="javascripts/AddRemoveProgrammingLanguage.js"></script>
    <script src="javascripts/AddRemoveSpeakingLanguage.js"></script>
</body>

</html>