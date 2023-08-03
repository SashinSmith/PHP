<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'menu.inc';
        ?>
        <br>
        <br>
        <br>
        <form method="get">
            <label>Student Number:</label>
            <br>
            <input type="text" name="studentNum" >
            <br>
            <label>Assignment 1:</label>
            <br>
            <input type="number" name="a1" >
            <br>
            <label>Assignment 2:</label>
            <br>
            <input type="number" name="a2" >
            <br>
            <label>Assignment 3:</label>
            <br>
            <input type="number" name="a3" >
            <br>
            <label>Exam Mark:</label>
            <br>
            <input type="number" name="exam" >
            <br>
            <br>
            <input type="submit" name="Submit">

        </form>
        <br><br>
        <!-- Task 3 -->
        <?php

        //creates the AssignmentRecord 
        class AssignmentRecord {

            //private properties
            private $a1;
            private $a2;
            private $a3;
            private $studentNum;

            //constants
            const WP1 = 0.1;
            const WP2 = 0.8;

            //parent constructor
            public function _construct($a1, $a2, $a3, $studentNum) {
                $this->a1 = $a1;
                $this->a2 = $a2;
                $this->a3 = $a3;
                $this->studentNum = $studentNum;
            }

            //calculates and returns the year mark
            public function yearMark() {
                $total = $this->a1 * self::WP1;
                $total += $this->a2 * self::WP1;
                $total += $this->a3 * self::WP2;
                return $total;
            }

            //returns with the "," format
            public function _toString() {
                $outPutStr = $this->studentNum . "," . strval($this->a1) . "," . strval($this->a2) . "," . strval($this->a3);
                return $outPutStr;
            }

        }

        //subclass
        class FullRecord extends AssignmentRecord {

            //properties
            private $exam;

            //constructor
            public function _construct($a1, $a2, $a3, $studentNum, $exam) {
                $this->exam = $exam;
                //sends to parent to finish construction
                parent::_construct($a1, $a2, $a3, $studentNum);
            }

            //converts to the "," format
            public function _toStringFR() {
                //hands over to the parent to get first half
                $outPutFR = parent::_toString() . "," . strval($this->exam);
                writeToFile($outPutFR);
                return $outPutFR;
            }

            //generates the new year mark with exam
            //I assumed the exam counts 80% of the final mark
            public function yearMarkFR() {
                //hands to parent to get year mark
                $total = parent::yearMark() * 0.2;
                //adds exam to total
                $total += $this->exam * 0.8;
                return $total;
            }

        }

        //gets variables
        $studentNum = strval($_GET['studentNum']);
        $a1 = $_GET['a1'];
        $a2 = $_GET['a2'];
        $a3 = $_GET['a3'];
        //creates new instance
        $marks = new AssignmentRecord();
        $marks->_construct($a1, $a2, $a3, $studentNum);
        //gets and displays the values
        //gets values to be displayed
        $marks->_toString();
        $marks->yearMark();
        ?>

        <?php
        //Full Record Section
        $exam = $_GET['exam'];
        $examR = new FullRecord();
        //Sends all variables for both parent and child
        $examR->_construct($a1, $a2, $a3, $studentNum, $exam);
        //displays output
        $examR->_toStringFR();
        $examR->yearMarkFR();
        ?>
        <br>
        <br>
        <br>
        <span></span>
        <!-- Task 8 a) -->
        <h1>a)</h1>
        <br>
        <a href="fullrecords.txt" download>FullRecords</a>
    <p1>

        <?php

//////////////Task 8 a)/////////////////////////////////////////////////
        //writes the data to function it is called after the _toString method
        function writeToFile($record) {
            $file = fopen('fullrecords.txt', 'ab');
            fwrite($file, $record . "\n");
            fclose($file);
            readFileRecords();
        }
        ?>
    </p1>
    <br>
    <br>
    <h1></h1>
    <br>
    <p1>

        <?php

        ///////////////////////////////////Task 8 b)////////////////////////////
        //reads values from file and echos to browser
        function readFileRecords() {
            $values = file('fullrecords.txt');
            foreach ($values as $value) {
                echo '<div>' . $value . '</div>';
            }
        }
        ?>
    </p1>
    <br>
    <br>
    <iframe src="task8.txt" height="400" scrolling="yes" width="1200px">
        <p>Your browser does not support iframes.</p></iframe>
</body>

</html>