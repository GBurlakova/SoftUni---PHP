<!DOCTYPE html>

<html>

<head>
    <title>Form Data</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="FormData.css"/>
</head>

<body>
    <form action="FormData.php" method="post" class="form-info">
        <div>
            <label for="name">Name</label><input type="text"
                                                 id="name"
                                                 name="name"
                                                 placeholder="Name..."
                                                 tabindex="1"/>
        </div>
        <div>
            <label for="age">Age</label><input type="number"
                                               id="age"
                                               name="age"
                                               placeholder="Age..."
                                               tabindex="2"/>
        </div>
        <div>
            <input type="radio" id="male" name="gender" value="1"/><label for="male">Male</label>
        </div>
        <div>
            <input type="radio" id="female" name="gender" value="2"/><label for="female">Female</label>
        </div>
        <div>
            <input type="submit" value="Submit"/>
        </div>
        <input type="hidden" name="submitted"/>
    </form>

    <div class="result">
        <?php
        function isEmptyForm($input_arr){
            foreach($input_arr as $k => $v){
                if($v == '' && $k != 'submitted'){
                    return true;
                }
            }
        }

        if(isset($_POST['submitted'])){
            if(isEmptyForm($_POST)){
                echo 'Please enter your personal data.';
                return;
            }

            try{
                if(is_numeric($_POST['age']) && ($_POST['gender'] == 1 || $_POST['gender'] == 2)){ //Validates data
                    $name = htmlentities($_POST['name']);
                    $age = $_POST['age'] + 0;
                    $gender = $_POST['gender'] + 0;
                    $genderAsWord = $gender == 1 ? 'male' : 'female';
                    $output = "My name is $name. I am $age years old. I am $genderAsWord.";
                    echo $output;
                } else {
                    throw new Exception('Please use correct format for the input');
                }
            } catch (Exception $e){
                echo $e -> getMessage();
            }
        }
        ?>
    </div>
</body>

</html>