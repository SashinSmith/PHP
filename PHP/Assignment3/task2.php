<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task2</title>
    </head>
    <body>
        <?php
         include 'menu.inc';
        ?>
        <br>
        <br>
        <form method="get">
            <label>Length:</label>
            <br>
            <input type="text" name="length" >
            <br>
            <input type="submit" name="Submit">
        </form>
        <br>
        <br>
        <!-- Task 2 -->
        <?php
        class Square{
            //the private values of the class
            private $name;
            private $length;
            
            //constructs the object
            public function _construct($l){
                $this->name="Square";
                $this->length=$l;
            }
            
            //gets the area of the square
            public function getArea(){
                $area = $this->length * $this->length;
                return $area;
            }
            
            //gets the perimeter of the square
            public function getPerimeter(){
                $peri=$this->length * 4;
                return $peri;
            }
            
        }
        
        $l=$_GET['length'];
        //creates the object
        $Square = new Square();
        $Square->_construct($l);
        //gets and displays the values
        echo 'The Area = '.$Square->getArea();
        echo "<br>";
        echo 'The Perimeter = '.$Square->getPerimeter();
        
        ?>
        
        <br>
        <iframe src="task2.txt" height="400" scrolling="yes" width="1200px">
        <p>Your browser does not support iframes.</p></iframe>
    </body>
    
</html>