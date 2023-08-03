<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task1</title>
    </head>
    <body>
        <?php
        include 'menu.inc';
        ?>
        <br>
        <br>
        <br>
        <form method="get">
            <label>Argument One:</label>
            <input type="text" name="a1">
            <br>
            <label>Argument Two:</label>
            <input type="text" name="a2" value="1">
            <br>
            <input type="submit" name="Submit">
        </form>
        <br>
        <br>

        <!-- Task1 (a) -->
        <?php
        //get values from form
        $a1 = $_GET['a1'];
        $a2 = $_GET['a2'];

        //runs function to display answer for the values
        echo ("Answer: " . boolToText($a1, $a2));

        //function that returns answer to be displayed
        function boolToText($a1, $a2) {
            //converts values to integers
            $a1 = intval($a1);
            $a2 = intval($a2);

            //case statement to check each value for argument 2
            switch ($a2) {
                case 1:
                    //if statement to determine the return value
                    if ($a1 == 0) {
                        return "False";
                    } else {
                        return "True";
                    }
                    break;
                case 2:
                    if ($a1 == 0) {
                        return "No";
                    } else {
                        return "Yes";
                    }
                    break;
                case 3:
                    if ($a1 == 0) {
                        return "Negative";
                    } else {
                        return "Positive";
                    }
                    break;
                //defualt value to be used if other cases are not met
                default :
                    if ($a1 == 0) {
                        return "0";
                    } else {
                        return "1";
                    }
                    break;
            }
        }
        ?>

        <form method="get">
            <label>Argument:</label>
            <br>
            <input type="text" name="arg" >
            <br>
            <input type="submit" name="Submit">
        </form>
        <br>

        <!-- Task1 (b) -->
        <?php
        //sets values as the argment given
        $values = $_GET['arg'];
        //sets $nums as the coounter
        $nums = 0;
        //makes an array of the argumenets
        $arrValues = explode(", ", $values);
        foreach ($arrValues as $value) {
            if (is_numeric($value) == true) {
                $nums++;
            }
        }

        //displays answer
        echo "Answer: <br>";
        echo 'Total number of arguments: ' . count($arrValues) . ' Total number if numerals in these arguments: ' . $nums;
        ?>

        <br>
        <br>
        <iframe src="task1.txt" height="400" scrolling="yes" width="1200px">
            <p>Your browser does not support iframes.</p></iframe>
    </body>

</html>