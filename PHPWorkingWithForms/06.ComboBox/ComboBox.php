<?php
mb_internal_encoding("utf-8");
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>

<html>

<head>
    <title>Combo Box</title>
    <link rel="stylesheet" href="ComboBox.css"/>
    <meta charset="utf-8"/>
    <script src="CheckValidityInput.js">

    </script>
</head>

<body>
    <div class="heading">
        <p>
            Select a continent to see its countries
        </p>
    </div>
    <div class="main-field">
        <form action="ComboBox.php" method="post" id="userForm">
            <input type="text" id="continent" list="continents" name="continent" oninput="setTimeout(check(this), 1050)" pattern="^(([A-Z][a-z]{2,20})[ ])*([A-Z][a-z]{2,20})$"/>
            <datalist id="continents">
                <option value="Europe">
                <option value="Asia">
                <option value="North America">
                <option value="South America">
                <option value="Australia">
                <option value="Africa">
            </datalist>

            <input type="hidden" name="submitted"/>

        </form>

        <div class="result">
            <?php
            if(isset($_POST['submitted'])){
                $continents = array(
                    'Europe' => array('Albania', 'Andorra', 'Armenia', 'Austria', 'Azerbaijan',
                                      'Belarus', 'Belgium', 'Bosnia & Herzegovina', 'Bulgaria', 'Croatia', 'Cyprus', 'Czech Republic',
                                      'Denmark', 'Estonia', 'Finland', 'France', 'Georgia', 'Germany', 'Greece', 'Hungary', 'Iceland',
                                      'Ireland', 'Italy', 'Kosovo', 'Latvia', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macedonia', 'Malta'),
                    'Asia' => array('Afghanistan', 'Bahrain', 'Bangladesh', 'Bhutan', 'Brunei', 'Cambodia', 'China', 'East Timor', 'India',
                                    'Indonesia', 'Iran', 'Iraq', 'Japan', 'Kazakhstan', 'Korea North', 'Korea South', 'Kuwait', 'Kyrgyzstan', 'Laos',
                                    'Lebanon', 'Malaysia', 'Maldives', 'Mongolia', 'Myanmar (Burma)Yemen', 'Nepal', 'Oman', 'The Philippines',
                                    'Qatar', 'Russia', 'Saudi Arabia', 'Singapore', 'Sri Lanka', 'Taiwan', 'Thailand', 'Turkey', 'Turkmenistan',
                                    'United Arab Emirates', 'Uzbekistan', 'Vietnam'),
                    'North America' => array('Antigua & Barbuda', 'Bahamas', 'Barbados', 'Belize', 'Canada', 'Costa Rica', 'Cuba', 'Dominica', 'Dominican Republic', 'El Salvador', 'Grenada',
                                    'Guatemala', 'Haiti', 'Honduras', 'Jamaica', 'Mexico', 'Nicaragua', 'Panama', 'St. Kitts & Nevis', 'St. Lucia', 'St. Vincent & The Grenadines',
                                    'Trinidad & Tobago', 'United States of America'),
                    'South America' => array('Argentina', 'Bolivia', 'Brazil', 'Chile', 'Colombia', 'Ecuador', 'Guyana', 'Paraguay', 'Peru', 'Suriname', 'Uruguay', 'Venezuela'),
                    'Australia' => array('Australia', 'Fiji', 'Kiribati', 'Marshall Islands', 'Micronesia', 'Samoa', 'Solomon Islands',
                                         'Nauru', 'New Zealand', 'Palau', 'Papua New Guinea', 'Tonga', 'Tuvalu', 'Vanuatu'),
                    'Africa' => array('Algeria', 'Angola', 'Benin', 'Botswana', 'Burkina Faso', 'Burundi', 'Cameroon', 'Cape Verde', 'Central African Republic', 'Chad', 'Comoros', 'Congo',
                                    'Congo Democratic Republic of', 'Cote d\'Ivoire', 'Djibouti', 'Egypt', 'Equatorial Guinea', 'Eritrea', 'Ethiopia', 'Gabon', 'Gambia', 'Ghana',
                                    'Guinea', 'Guinea-Bissau', 'Kenya', 'Lesotho', 'Liberia', 'Libya', 'Madagascar', 'Malawi', 'Mali', 'Mauritania', 'Mauritius', 'Morocco', 'Mozambique',
                                    'Namibia', 'Niger', 'Nigeria', 'Rwanda', 'Sao Tome & Principe', 'Senegal', 'Seychelles', 'Sierra Leone', 'Somalia', 'South Africa', 'South Sudan',
                                    'Sudan', 'Swaziland', 'Tanzania', 'Togo', 'Tunisia', 'Uganda', 'Zambia', 'Zimbabwe') );

                $continent = htmlentities(trim($_POST['continent']));
                if(array_key_exists($continent, $continents)){
                    $countries = $continents[$continent];
                    echo <<<EOT
                    <select name="countries" id="countries" class="select">
EOT;
                    foreach($countries as $country){
                        echo <<<EOT
                        <option>$country</option>
EOT;
                    }
                    echo <<<EOT
                    </select>
EOT;
                } else {
                    echo <<<EOT
                    <div class="errorMessage">Please ensure you have entered existing continent in  a valid format.<div>
EOT;
                }
            }
            ?>
    </div>
</body>

</html>