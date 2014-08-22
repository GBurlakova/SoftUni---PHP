<!DOCTYPE html>
<html>

<head>
    <title>Personal Info</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="PersonalInfo.css"/>
</head>

<body>
    <form action="PersonalInfo.php" method="post" class="form-info">
        <div>
            <label for="firstName">First Name</label><input
                                                     type="text"
                                                     name="firstName"
                                                     id="firstName"
                                                     placeholder="Enter your first name"
                                                     tabindex="1"/>
        </div>
        <div>
            <label for="lastName">Last Name</label> <input
                                                    type="text"
                                                    name="lastName"
                                                    id="lastName"
                                                    placeholder="Enter your last name"
                                                    tabindex="2"/>
        </div>
        <div>
            <label for="age">Age</label><input type="number"
                                               name="age"
                                               id="age"
                                               placeholder="Enter your age"
                                               tabindex="3"/>
        </div>
        <input type="submit" value="Submit Data"/>
    </form>
    <div class="result">
        <?php
        function isEmptyForm($input_arr){
            foreach($input_arr as $v){
                if($v == ''){
                    return true;
                }
            }
        }

        if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['age'])){
            if(isEmptyForm($_POST)){
                echo 'Please enter your personal data.';
                return;
            }
            $firstName = htmlentities($_POST['firstName']);
            $lastName = htmlentities($_POST['lastName']);
            $age = $_POST['age'];
            if(is_numeric($age) == false){
                echo 'Please enter a number for your age.';
                return;
            }
            echo "My name is $firstName $lastName and I am $age years old.";
        } else {
            echo 'Please enter your personal data.';
        }
        ?>
    </div>
</body>

</html>
