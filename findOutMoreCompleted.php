<!DOCTYPE html>

<html lang="en">


<?php
// Database connection
include 'database_conn.php';

//Verifying if information has been recieved for all fields. If not empty field gets assigned a null value
$forename = isset($_REQUEST['custForename']) ? $_REQUEST['custForename'] : null;
$surname = isset($_REQUEST['custSurname']) ? $_REQUEST['custSurname'] : null;
$email = isset($_REQUEST['custEmail']) ? $_REQUEST['custEmail'] : null;
$landline = isset($_REQUEST['custLandline']) ? $_REQUEST['custLandline'] : null;
$phone = isset($_REQUEST['custNumber']) ? $_REQUEST['custNumber'] : null;
$address = isset($_REQUEST['custAddress']) ? $_REQUEST['custAddress'] : null;
$info = isset($_REQUEST['info']) ? $_REQUEST['info'] : null;
$category = isset($_REQUEST['category']) ? $_REQUEST['category'] : null;

//Buiding the SQL query
$sql = "INSERT INTO CT_expressedInterest (expressInterestID, forename, surname, postalAddress, 
                    landLineTelNo, mobileTelNo, email, sendMethod, catID) 
                    VALUES 
                    (NULL,'$forename','$surname','$address', '$landline', '$phone', '$email', '$info' , '$category');";

//Executing the SQL query
$queryResult = $dbConn->query($sql);

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="./styles.css" rel="stylesheet" type="text/css">
    <!--   Fonts   -->
    <!--   Font - FatFace - Linked from Google Fonts   -->
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <!--   Font - Text Me One - Linked from Google Fonts   -->
    <link href="https://fonts.googleapis.com/css?family=Text+Me+One" rel="stylesheet">
    <title>Find Out More</title>

    <?php
    //Changing the cover image in response to category chosen. 
    //Note that the tearoom option uses the same image as the main website as it's main focus is also the tearoom
        if($category=="c1")
                echo"<style>header {
                    height: 50%;
                    background-image: url(./cup.png);
                    background-size: cover;
                    background-repeat: no-repeat;
                    color:#ffffff;
                }</style>";
        else if($category=="c2")
                echo"<style>header {
                    height: 50%;
                    background-image: url(./craft.png);
                    background-size: cover;
                    background-repeat: no-repeat;
                    color:#ffffff;
                }</style>";
        else if($category=="c3")
                echo"<style>header {
                    height: 50%;
                    background-image: url(./village.jpg);
                    background-size: cover;
                    background-repeat: no-repeat;
                    color:#ffffff;
                }</style>";
        else if($category=="c4")
                echo"<style>header {
                    height: 50%;
                    background-image: url(./post.png);
                    background-size: cover;
                    background-repeat: no-repeat;
                    color:#ffffff;
                }</style>";
        else if($category=="c5")
                echo"<style>header {
                    height: 50%;
                    background-image: url(./bed.png);
                    background-size: cover;
                    background-repeat: no-repeat;
                    color:#ffffff;
                }</style>";
        ?>
</head>

<body>
    <!--   Wrapper for main page    -->
    <div class="wrapper">
        <!--   Header includes navbar and image with title    -->
        
        <header>
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
            <h1 style="font-size:5vw;">Thank you</h1>
        </header>
        <main class="content">
            <div class="main">
                <?php  
                //Information from the form is displayed to the user         

                echo "\t<p>Forename: $forename</p>\n";

                echo "\t<p>Surname: $surname</p>\n";

                echo "\t<p>E-Mail: $email</p>\n";

                //If a field is empty, an appropriate message is shown
                if (empty($landline)) {
                    echo "<p>You have not provided your landline number</p>\n";
                }
                else
                    echo "\t<p>Landline number: $landline</p>\n";

                if (empty($phone)) {
                    echo "<p>You have not provided your phone number</p>\n";
                }
                else
                    echo "\t<p>Phone number: $phone</p>\n";

                if (empty($address)) {
                        echo "<p>You have not provided your address</p>\n";
                    }
                else
                        echo "\t<p>Address: $address</p>\n";

                //The name of the chosen category is displayed instead of a code like "c1" which would be of no use to the user
                echo "\t<p>You will be contacted by: $info</p>\n";
                if($category=="c1")
                echo "\t<p>You have expressed interest in the Tearoom</p>\n";
                else if($category=="c2")
                echo "\t<p>You have expressed interest in the Craft Shop</p>\n";
                else if($category=="c3")
                echo "\t<p>You have expressed interest in the Village Store</p>\n";
                else if($category=="c4")
                echo "\t<p>You have expressed interest in the Post office</p>\n";
                else if($category=="c5")
                echo "\t<p>You have expressed interest in the Bed and Breakfast</p>\n";


                echo "\t</p>\n";
                echo "</section>\n";
                ?>

            </div>

        </main>

    </div>

</body>

</html>