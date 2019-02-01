<?php
// including the database connection file
include_once("../../config.php");

if(isset($_POST['update'])) {
    $test_id = $_POST['Id'];
    $name = $_POST['Name'];
    $action = $_POST['Status'];
    $maxscore = $_POST['MaxScore'];

    $query = ("UPDATE Test_Paper SET Name='$name', Max_Score = $maxscore, Status='$action' WHERE Id=$test_id");
    $sql =mysqli_query($conn, $query);

    //redirectig to the display page. In our case, it is index.php
    header("Location: manage_test.php");

}

?>

<Html>
<title>Edit Test</title>

<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a href="manage_test.php">Back</a></li>
    <li class="right" >
        <a href="../../AccountPage/account_admin_home.php">
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['user']['Login_Username'];
            ?>
        </a>
    </li>
</ul>

<h1 id='home_header'>EDIT TEST</h1>

<style> /*adding in the style for the creating new user page */




    .test_edit_div {
        width: 100%;
        height: 90%;
    }


    .test_edit_form_container
    { height: auto;
        width: 400px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        background: #d9d5e7;
        overflow: hidden;
        -webkit-border-radius: 10px;
        box-shadow: 5px 5px 5px black;
        border: 3px solid #0067da;
        z-index: 11;}

</style>



<div class="test_edit_div">
    <div class="test_edit_form_container">
        <h3>Edit Test Form</h3>
        <form name="form1" method="post" action="tests_edit.php">
            <table border="0">
                <?php
                //getting id from url
                $test_id = $_GET['id'];

                //selecting data associated with this particular id
                $query2 = ("SELECT * FROM Test_Paper WHERE Id=$test_id");
                $result = mysqli_query($conn, $query2);

                while($res = mysqli_fetch_array($result)) {

                    echo "<tr><td>Name:</td>";
                    echo "<td><input readonly type='text' name='Name' readonly value='" . $res['Name'] . "'/></td>";
                    echo "</tr>";

                    echo "<tr><td>Max Score:</td>";
                    echo "<td><input readonly type='text' name='MaxScore' value='".$res['Max_Score']."' required min='1' max='1000'></td>";
                    echo "</tr>";

                    echo "<tr><td>Status:</td>";
                    echo "<td><input type='radio' name='Status' value=Live checked><br>Live</td>";
                    echo "<td><input type='radio' name='Status' value=Suspended><br>Suspended</td>";
                    echo "</tr>";

                    echo "<tr><td><input type='hidden' name='Id' value=" . $_GET['id'] . "></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <input type='submit' name='update' value='Update'>
        </form>
    </div>
</div>
