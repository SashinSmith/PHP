<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task6</title>
        <!-- CSS FOR STYLING THE PAGE -->
        <style>
            table {
                /*margin: 0 auto;*/
                font-size: large;
                border: 1px solid black;
            }

            h1 {
                /*text-align: center;*/
                /*color: #006600;*/
                font-size: xx-large;
            }

            td {

                border: 1px solid black;
            }
            th{
                background-color: #ADD8E6
            }
            th,
            td {
                font-weight: bold;
                border: 1px solid black;
                padding: 10px;
                text-align: center;
            }

            td {
                font-weight: lighter;
            }
        </style>
    </head>
    <body>
        <?php
        include 'menu.inc';
        ?>
        <br>
        <br>
        <?php
        //global database variable to be accessed by function in later sections
        global $db;
        $dsn = 'mysql:host=localhost;dbname=actorsinfo';
        $username = 'root';
        $password = 'lemonDreams11';
        $db = new PDO($dsn, $username, $password);

        //catches error if the database fails to connect
        try {
            $db = new PDO($dsn, $username, $password);
            echo 'You are connected to the database';
        } catch (Exception $ex) {
            $error_message = $e->getMessage();
            echo 'Error: ' . $error_message;
        }
        ?>

        <?php
        //gets data from table to added to table
        $query = "SELECT * FROM filmactorroles";
        $statement = $db->prepare($query);
        $statement->execute();
        ?>

        <section>
            <h1>FilmActorRoles</h1>
            <!-- table creation -->
            <table>
                <tr>
                    <th>FilmTitleID</th>
                    <th>ActorID</th>
                    <th>RoleTypeID</th>
                    <th>Character Name</th>
                    <th>CharacterDescription</th>
                </tr>
                <!-- Gets the rows -->
                <?php
                // loops until end of all data
                while ($rows = $statement->fetch()) {
                    ?>
                    <tr>
                        <!-- fetches all rows -->
                        <td><?php echo $rows['FilmTitleID']; ?></td>
                        <td><?php echo $rows['ActorID']; ?></td>
                        <td><?php echo $rows['RoleTypeID']; ?></td>
                        <td><?php echo $rows['CharacterName']; ?></td>
                        <td><?php echo $rows['CharacterDescription']; ?></td>
                    </tr>
                    <?php
                }
                $statement->closeCursor();
                ?>
            </table>
        </section>
        <br>
        <br>
        <?php
        //gets data from table to added to table
        $query = "SELECT * FROM filmtitles";
        $statement = $db->prepare($query);
        $statement->execute();
        ?>

        <section>
            <h1>FilmTitles</h1>
            <!-- TABLE CONSTRUCTION -->
            <table>
                <tr>
                    <th>FilmTitleID</th>
                    <th>FilmTitle</th>
                    <th>FilmDuration</th>
                    <th>FilmStory</th>
                </tr>
                <!-- gets the rows -->
                <?php
                // loops until end of all data
                while ($rows = $statement->fetch()) {
                    ?>
                    <tr>
                        <!-- fetches all rows -->
                        <td><?php echo $rows['FilmTitleID']; ?></td>
                        <td><?php echo $rows['FilmTitle']; ?></td>
                        <td><?php echo $rows['FilmDuration']; ?></td>
                        <td><?php echo $rows['FilmStory']; ?></td>
                    </tr>
                    <?php
                }
                $statement->closeCursor();
                ?>
            </table>
        </section>
        <br>
        <br>
        <?php
        //gets data from table to added to table
        $query = "SELECT * FROM actors";
        $statement = $db->prepare($query);
        $statement->execute();
        ?>

        <section>
            <h1>Actors</h1>
            <!-- TABLE CONSTRUCTION -->
            <table>
                <tr>
                    <th>ActorID</th>
                    <th>ActorFullName</th>
                    <th>ActorNotes</th>
                </tr>
                <!-- Gets the rows -->
                <?php
                // loops until end of all data
                while ($rows = $statement->fetch()) {
                    ?>
                    <tr>
                        <!-- fetches all rows -->
                        <td><?php echo $rows['ActorID']; ?></td>
                        <td><?php echo $rows['ActorFullName']; ?></td>
                        <td><?php echo $rows['ActorNotes']; ?></td>
                    </tr>
                    <?php
                }
                $statement->closeCursor();
                ?>
            </table>
        </section>
        <br>
        <br>
        <?php
        //gets data from table to added to table
        $query = "SELECT * FROM roletypes";
        $statement = $db->prepare($query);
        $statement->execute();
        ?>

        <section>
            <h1>RoleTypes</h1>
            <!-- TABLE CONSTRUCTION -->
            <table>
                <tr>
                    <th>RoleTypeID</th>
                    <th>RoleType</th>
                </tr>
                <!-- Gets the rows -->
                <?php
                // loops until end of all data
                while ($rows = $statement->fetch()) {
                    ?>
                    <tr>
                        <!-- fetches all rows -->
                        <td><?php echo $rows['RoleTypeID']; ?></td>
                        <td><?php echo $rows['RoleType']; ?></td>
                    </tr>
                    <?php
                }
                $statement->closeCursor();
                ?>
            </table>
        </section>
        <br>
        <br>
        <form method="post">
            <label>Radio Section:</label><br>
            <input type="radio" name="selectR" value="n1" checked>ORDER BY<br>
            <input type="radio" name="selectR" value="n2">LIKE <br>
            <input type="radio" name="selectR"value="n3">INNER JOIN <br>
            <input type="radio" name="selectR" value="n4">WHERE with OR <br>
            <input type="radio" name="selectR" value="n5">MAX <br>
            <input type="submit" name="Submit">
        </form>

        <?php
        //gets the value for the radio button
        $choice = filter_input(INPUT_POST, 'selectR');

        //switch statement to run the specific function for selected value
        switch ($choice) {
            case 'n1':
                orderByS();
                break;
            case 'n2':
                likeS();
                break;
            case 'n3':
                injoinS();
                break;
            case 'n4':
                wherOrS();
                break;
            case 'n5':
                maxS();
                break;
            default:
                echo 'Error';
        }

        /////////////////////////////Number 1///////////////////////////////////
        //orders the values
        function orderByS() {
            echo 'n1';
            global $db;
            $query = "SELECT * FROM filmtitles ORDER BY FilmDuration";
            $statement = $db->prepare($query);
            $statement->execute();
            ?>
            <section>
                <h1>FilmTitles</h1>
                <!-- TABLE CONSTRUCTION -->
                <table>
                    <tr>
                        <th>FilmTitleID</th>
                        <th>FilmTitle</th>
                        <th>FilmDuration</th>
                        <th>FilmStory</th>
                    </tr>
                    <!-- Gets the rows -->
                    <?php
                    // loops until end of all data
                    while ($rows = $statement->fetch()) {
                        ?>
                        <tr>
                            <!-- fetches all rows -->
                            <td><?php echo $rows['FilmTitleID']; ?></td>
                            <td><?php echo $rows['FilmTitle']; ?></td>
                            <td><?php echo $rows['FilmDuration']; ?></td>
                            <td><?php echo $rows['FilmStory']; ?></td>
                        </tr>
                        <?php
                    }
                    $statement->closeCursor();
                    ?>
                </table>
                <?php
            }

            //////////////////////Number 2//////////////////////////////////////
            //the like section
            function likeS() {
                echo 'n2';
                global $db;
                $query = "SELECT * FROM roletypes WHERE RoleTypeID LIKE 'WM'";
                $statement = $db->prepare($query);
                $statement->execute();
                ?>
                <section>
                    <h1>RoleTypes</h1>
                    <!-- TABLE CONSTRUCTION -->
                    <table>
                        <tr>
                            <th>RoleTypeID</th>
                            <th>RoleType</th>
                        </tr>
                        <!-- Gets the rows -->
                        <?php
                        // loops until end of all data
                        while ($rows = $statement->fetch()) {
                            ?>
                            <tr>
                                <!-- fetches all rows -->
                                <td><?php echo $rows['RoleTypeID']; ?></td>
                                <td><?php echo $rows['RoleType']; ?></td>
                            </tr>
                            <?php
                        }
                        $statement->closeCursor();
                        ?>
                    </table>
                    <?php
                }

                ////////////////////////////Number 3////////////////////////////
                function injoinS() {
                    echo 'n3';
                    global $db;
                    //joins the actors table to filmactors to display actors name and character name
                    $query = "SELECT ActorFullName, CharacterName 
                            FROM filmactorroles 
                            INNER JOIN actors 
                            ON filmactorroles.ActorID = actors.ActorID";
                    $statement = $db->prepare($query);
                    $statement->execute();
                    ?>
                    <section>
                        <h1>Joined Table</h1>
                        <!-- TABLE CONSTRUCTION -->
                        <table>
                            <tr>
                                <th>ActorFullName</th>
                                <th>CharacterName</th>
                            </tr>
                            <!-- Gets the rows -->
                            <?php
                            // loops until end of all data
                            while ($rows = $statement->fetch()) {
                                ?>
                                <tr>
                                    <!-- fetches all rows -->
                                    <td><?php echo $rows['ActorFullName']; ?></td>
                                    <td><?php echo $rows['CharacterName']; ?></td>
                                </tr>
                                <?php
                            }
                            $statement->closeCursor();
                            ?>
                        </table>
                        <?php
                    }

                    /////////////////////Number 4///////////////////////////////
                    //uses a where and or to match two values from the db
                    function wherOrS() {
                        echo 'n4';
                        global $db;
                        $query = "SELECT * FROM roletypes WHERE RoleType LIKE 'Hero' OR RoleTypeID LIKE '%3%'";
                        $statement = $db->prepare($query);
                        $statement->execute();
                        ?>
                        <section>
                            <h1>WHEREOR</h1>
                            <!-- TABLE CONSTRUCTION -->
                            <table>
                                <tr>
                                    <th>RoleTypeID</th>
                                    <th>RoleType</th>
                                </tr>
                                <!-- Gets the rows -->
                                <?php
                                // loops until end of all data
                                while ($rows = $statement->fetch()) {
                                    ?>
                                    <tr>
                                        <!-- fetches all rows -->
                                        <td><?php echo $rows['RoleTypeID']; ?></td>
                                        <td><?php echo $rows['RoleType']; ?></td>
                                    </tr>
                                    <?php
                                }
                                $statement->closeCursor();
                                ?>
                            </table>
                            <?php
                        }

                        /////////////////////Number 5///////////////////////////
                        //gets the maximum of the duration columb
                        function maxS() {
                            echo 'n5';
                            global $db;
                            $longest = array();
                            $query = "SELECT  MAX(FilmDuration) FROM filmtitles";
                            $statement = $db->prepare($query);
                            $statement->execute();
                            //return array of max values
                            $longest = $statement->fetch();
                            echo "<br>";
                            //only need the first max value
                            print_r('The longest duration is ' . $longest[0]);

                            $statement->closeCursor();
                        }
                        ?>



                        <br>
                        <br>
                        <iframe src="task6.txt" height="400" scrolling="yes" width="1200px">
                            <p>Your browser does not support iframes.</p></iframe>
                        </body>

                        </html>