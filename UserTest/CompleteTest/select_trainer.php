<Html>

<title>Select Trainer</title>
<link rel='stylesheet' type=text/css' href='../user_test_style.css'/>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>


<body>

<ul class='navigation_bar'>
    <li><a href='../test_user_home.php'>Back</a></li>
    <li class='right'>
        <a href='../../AccountPage/account_user_home.php'>
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['user']['Login_Username'];
            ?>
        </a>
    </li>
</ul>

<h1 id='home_header'>CHOOSING TRAINER</h1>


<?php

// Adding in the configuration file
include ('../../config.php');

$test_id=$_GET['id'];


echo "<div class='form_area'>";
    echo "<div class='form_container'>";
    echo"<h3>Select trainer</h3>";

        echo "<form method='post' action='user_test.php?id=$test_id' autocomplete='off'>";
            echo "<table border='0'>";
                echo "<tr>";
                echo "<td>Which Trainer Taught You?</td>";


                echo"<td><select name='trainer'>";

                $test_id = $_GET['id']; // Gets the test paper id

                $query = ("SELECT Name,Id FROM Trainer");
                $sql = mysqli_query($conn, $query);

                while ($row = $sql->fetch_assoc()){

                    echo "<option name='trainer' value=" . $row['Id'] . ">" . $row['Name'] . " </option>";
                    }

                echo "</select></td>";
                echo "<tr>";


            echo "</table>";
            echo "<input type='submit' value='SUMBIT'>";

        echo "</form>";
        if(isset($_GET['error'])){
            echo urldecode($_GET['error']);
        }
        if(isset($_GET ['alert'])){
            echo urldecode($_GET['alert']);
        }

    echo"</div>";
echo"</div>";
?>


</body>


<a class='footer'> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->

</Html>







