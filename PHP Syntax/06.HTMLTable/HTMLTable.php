<!DOCTYPE html>

<html>

<head>
    <title>HTML Table</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="HTMLTable.css"/>
</head>

<body>
    <form action="HTMLTable.php" method="post" class="form-info">
        <div>
            <label for="name">Name</label><input type="text"
                                                 id="name"
                                                 name="name"
                                                 placeholder="Name"
                                                 tabindex="1"/>
        </div>
        <div>
            <label for="phone">Phone number</label><input type="text"
                                                          id="phone"
                                                          name="phone"
                                                          placeholder="Phone number"
                                                          tabindex="2"
                                                          pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"
                                                          />
        </div>
        <div>
            <label for="age">Age</label><input type="number"
                                               id="age"
                                               name="age"
                                               placeholder="Age"
                                               tabindex="3"/>
        </div>
        <div>
            <label for="address">Address</label><input type="text"
                                                       id="address"
                                                       name="address"
                                                       placeholder="Address"
                                                       tabindex="4"/>
        </div>
        <input type="hidden" name="submitted"/>
        <input type="submit" value="Submit"/>
    </form>

    <?php
    function isEmptyForm($input_arr){
        foreach($input_arr as $v){
            if($v == ''){
                return true;
            }
        }
    }

    class user{
        public $Name;
        public $Phone;
        public $Age;
        public $Address;
        public function __construct($_name, $_phone, $_age, $_address){
            $regexp = '/[0-9]{4}-[0-9]{3}-[0-9]{3}/';
            $phoneMatchesPattern = preg_match($regexp, $_phone);
            try{
                if(($phoneMatchesPattern == 1) && is_numeric($_age)){
                    $this -> Name = htmlentities($_name);
                    $this -> Phone = $_phone;
                    $this -> Age = $_age;
                    $this -> Address = htmlentities($_address);
                } else {
                    throw new Exception('Please use correct format for the input data');
                }
            } catch(Exception $e){
                echo $e -> getMessage();
                exit();
            }
        }
        function fillTable(){
            echo '<table class="user-info">';
            $properties = get_object_vars($this);
            foreach($properties as $propKey => $propVal){
                echo '<tr>';
                echo "<td>$propKey</td>";
                echo "<td>$propVal</td>";
                echo '</tr>';
            }
            echo '<table>';
        }
    }

    if(isset($_POST['submitted'])){
        if(isEmptyForm($_POST)){
            echo 'Please enter your personal data.';
            return;
        }

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $user = new user($name, $phone, $age, $address);
        $user -> fillTable();
    }
    ?>
</body>

</html>