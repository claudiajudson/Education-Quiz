<?php
// Adding in the configuration file
include('../../config.php');
?>

<Html>

<title>Creating Test</title>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>


<body>

<ul class='navigation_bar'>
    <li><a href='../Test_admin_home.php'>Back</a></li>
    <li class='right' >
        <a href='../../AccountPage/account_admin_home.php'>
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['user']['Login_Username'];
            ?>
        </a>
    </li>
</ul>

<h1 id='home_header'>CREATING TEST</h1>


<div class='form_area'>
    <div class='form_container'>
        <h3>Creating Test Form</h3>

        <form class='questionnaire_name_form' method='post' id='questionnaire_form' action='creating_test_auth.php' autocomplete='off'>
            <table border=0>
                <tr>
                    <td>Test name:</td>
                    <td><input type='text' name='Test_name' placeholder='Test name' required></td>
                </tr>
                <tr>
                    <td>Course select:</td>
                    <td>
                    <?php
                    $sql = mysqli_query($conn, "SELECT Name, Id FROM Training_Course");
                    while ($row = $sql->fetch_assoc()){
                        echo "<input type='radio' name='training_course' value=" . $row['Id'] . ">" . $row['Name'] . "<br></option>";
                    }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>number of questions:</td>
                    <td><select value='number_of_questions' name='number_of_questions'>

                        <?php

                        for($i=1; $i<=50; $i++)
                        {

                            echo "<option value=".$i.">".$i."</option>";
                        }
                        ?>

                    </select></td>
                </tr>
                <tr>
                    <td>Test Status:</td>
                    <td><input type='radio' name='Status' value='Live' required><br>Live</td>
                    <td><input type='radio' name='Status' value='Suspended' ><br>Suspended</td>
                </tr>

            </table>
            <input type='submit' value='SUBMIT' />
        </form>

        <?php
        if(isset($_GET['error'])){
            echo urldecode($_GET['error']);
        }
        if(isset($_GET['alert'])){
            echo urldecode($_GET['alert']);
        }
        ?>
    </div>
</div>


</body>

<a class='footer'> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->

</Html>



