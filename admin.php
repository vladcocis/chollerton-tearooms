<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="./styles.css" rel="stylesheet" type="text/css">
    <!--   Fonts   -->
    <!--   Font - FatFace - Linked from Google Fonts   -->
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <!--   Font - Text Me One - Linked from Google Fonts   -->
    <link href="https://fonts.googleapis.com/css?family=Text+Me+One" rel="stylesheet">
    <title>Find Out More</title>
</head>

<body>
    <!--   Wrapper for main page    -->
    <div class="wrapper">
        <!--   Header includes navbar and image with title    -->
        <header class="header">
            <!--   Navbar area    -->
            <nav>
                <!--   Tabbing index from left to right    -->
                <div class="nav-centered">
                    <a href="index.html" class="active" tabindex="3">Home</a>
                </div>

                <a href="findOutMore.php" tabindex="1">Find out more</a>
                <a href="admin.php" tabindex="2">Admin</a>

                <div class="nav-right">
                    <a href="credits.html" tabindex="4">Credits</a>
                    <a href="./wireframe.pdf" tabindex="5">Wireframe</a>
                </div>
            </nav>
            <!--   Title is responsive, in order to scale with page size    -->
            <h1 style="font-size:5vw;">Admin</h1>
        </header>
        <main class="content">
            <div class="main">
                <h2 class="center">Customers who have signed up for more information</h2>
                <div class="main">
                    <!--   Table with CSS styling    -->
                    <table class="orangeTable">
                        <!--   Main sections of the table are outlined here    -->
                        <thead>
                        <tr> <td>Surname</td> 
                             <td>Forename</td> 
                             <td>Address</td> 
                             <td>LandLine</td>
                             <td>Phone</td> 
                             <td>E-mail</td> 
                             <td>Send Method</td> 
                             <td>Interesed in</td>
                        </tr> 
                        </thead>
                        <tbody>
                        <?php
                        //Database connection
                        include 'database_conn.php';

                        //Buiding the SQL query
                        $sql = "SELECT * FROM `CT_expressedInterest`
                                JOIN `CT_category` on `CT_expressedInterest`.`catID` = `CT_category`.`catID`
                                ORDER BY `CT_expressedInterest`.`surname`";

                        //Executing the SQL query
                        $queryResult = $dbConn->query($sql);

                        // Check for and handle query failure
                        if($queryResult === false) {
                            echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
                            exit;
                        }
                        // Otherwise fetch all the rows returned by the query one by one, looping through the query results.
                        
                        else {
                            while($rowObj = $queryResult->fetch_object()){
                                echo  " <tr> <td>{$rowObj->surname}</td> 
                                            <td>{$rowObj->forename}</td> 
                                            <td>{$rowObj->postalAddress}</td> 
                                            <td>{$rowObj->landLineTelNo}</td>
                                             <td>{$rowObj->mobileTelNo}</td> 
                                             <td>{$rowObj->email}</td> 
                                             <td>{$rowObj->sendMethod}</td> 
                                             <td>{$rowObj->catDesc}</td>
                                        </tr>";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                 </div>
            </div>

        </main>

    </div>


</body>


</html>