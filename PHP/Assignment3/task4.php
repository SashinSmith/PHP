<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task4</title>
    </head>
    <body>
        <?php
        include 'menu.inc';
        ?>
        <br>
        <br>
    <p1>(a)</p1>
    <br>
    <br>
    <form method="get">
        <label>Username:</label>
        <br>
        <input type="text" name="username" >
        <br>
        <label>Password:</label>
        <br>
        <input type="text" name="password" >
        <br>
        <br>
        <input type="submit" name="Submit">

    </form>
    <br>
    <br>
    <!-- Task4 (a) -->
    <?php

    //class creation
    class Validate {

        //static variables with patterns
        private static $valUser = "/[a-z]{4}/"; //matches any lower case letters repeated 4 times
        private static $valPass = "/\d{6,8}/"; //matches any digit but must be between 6 and 8

        //validates username using pattern
        public static function validateUser($user) {
            return preg_match(self::$valUser, $user);
        }

        //validates password using pattern
        public static function validatePassword($password) {
            return preg_match(self::$valPass, $password);
        }

    }

    //gets values to check
    $user = $_GET['username'];
    $password = $_GET['password'];
    //sets blank variables to be used for output
    $ouputU = '';
    $outputP = '';

    //changes output based off the results from runing function validateUser
    if (Validate::validateUser($user) == true) {
        $outputU = 'Valid';
    } else {
        $outputU = 'Invalid';
    }

    //changes output based off the results from runing function validatePassword
    if (Validate::validatePassword($password) == true) {
        $outputP = 'Valid';
    } else {
        $outputP = 'Invalid';
    }

    //displays results
    echo 'Username: ' . $outputU . "<br>";
    echo 'Password: ' . $outputP . "<br>";
    ?>

    <br>
    <br>
    <p1>(b)</p1>
    <br>
    <br>
    <!-- task4 (b) --> 
    <?php
    //string that will true
    $stringT = '01/36/5123';
    //string that will be false
    $stringF = '0101/4a/12';

    //displays results
    echo 'String 1: ' . $stringT . ' and Result: ' . preg_match('/^[01]?\d\/[0-3]\d\/\d{4}$/', $stringT);
    echo "<br>";
    echo 'String 1: ' . $stringF . ' and Result: ' . preg_match('/^[01]?\d\/[0-3]\d\/\d{4}$/', $stringF);
    echo "<br>";
    ?>
    <br>
    <br>
    <iframe src="task4.txt" height="400" scrolling="yes" width="1200px">
        <p>Your browser does not support iframes.</p></iframe>
</body>

</html>