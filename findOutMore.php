<!DOCTYPE html>

<html lang="en">

<?php
//Database connection
include 'database_conn.php';
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
            <h1 style="font-size:5vw;">Find Out More</h1>
        </header>
        <main class="content">
            <div class="main">
                <h2 class="center">Please complete the form</h2>
                <!--   Form with CSS styling    -->
                <!--   Form uses GET method    -->
                <form id="feedback" action="findOutMoreCompleted.php" method="get">
                    <ul class="form-style-1">
                        <li><label>Full Name <span class="required">*</span></label><input type="text" name="custForename"
                                class="field-divided" placeholder="First" required /> <input type="text" name="custSurname"
                                class="field-divided" placeholder="Last" required /></li>
                        <li>
                            <label>Email <span class="required">*</span></label>
                            <input type="email" name="custEmail" class="field-long" required />
                        </li>
                        <li>
                            <label>Landline Telephone Number</label>
                            <input type="number" name="custLandline" class="field-long" />
                        </li>
                        <li>
                            <label>Mobile Number</label>
                            <input type="number" name="custNumber" class="field-long" />
                        </li>
                        <li>
                            <label>Postal Address</label>
                            <input type="text" name="custAddress" class="field-long" />
                        </li>
                        <li>
                            <label>How do you want to be informed</label>
                            <select name="info" class="field-select">
                                <option value="SMS">SMS</option>
                                <option value="post">Post</option>
                                <option value="email">E-Mail</option>
                            </select>
                        </li>
                        <li>
                            <label>What do you require information about</label>
                            <select name="category" class="field-select"> 
                                <?php
                                //Building the SQL query
                                $sql="SELECT * FROM CT_category";

                                //Executing the SQL query
                                $queryResult = $dbConn->query($sql);

                                //Fetch all the rows returned by the query one by one, looping through the query results
                                while($rowObj = $queryResult->fetch_object()): 
                                    echo "<option value ='{$rowObj->catID}'>{$rowObj->catDesc}</option>";
                                ?>
                                <?php endwhile; ?>
                             </select>
                        </li>
                        <li>
                            <input type="submit" value="Submit" />
                        </li>
                    </ul>
                </form>

            </div>

        </main>

    </div>



</body>
<?php
    $queryResult->close();
    $dbConn->close();
?>

</html>