<?php
// Adding in the configuration file
include('../config.php');
?>
<Html>

<title>Test Settings</title>
<link rel='stylesheet' type='text/css' href='../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>


<body>

<ul class='navigation_bar'>
    <li><a href="../HomePages/home_admin.php">Home</a></li>
    <li><a class="active" >Tests</a></li>
    <li><a href="../UserAdmin/user_admin_home.php">Users</a></li>
    <li><a href="../Training/training_course_home.php">Training</a></li>
    <li class="right" >
        <a href="../AccountPage/account_admin_home.php">
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['user']['Login_Username'];
            ?>
        </a>
    </li>
</ul>

<h1 id='home_header'>TESTS PAGE</h1>

<p>
<a href="CreatingTest/creating_test.php" id="circle_images_container">
    <img id="circle_images" src="Create_Test_icon.png" /> <!--https://www.flaticon.com/packs/modern-education-->
</a>
    Create Test
</p>


<p>
    <a href="ManageTests/manage_test.php" id="circle_images_container">
        <img id="circle_images" src="Manage_Test_icon.png" /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    Manage Test
</p>


<p>
    <a href="ViewUserResults/view_results.php" id="circle_images_container">
        <img id="circle_images" src="view_results_a.png" /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    View Results
</p>


</body>

<a class="footer"> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->

</Html>