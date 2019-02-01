<?php
include('../config.php');
?>
<Html>
<title>User Settings</title>
<link rel='stylesheet' type='text/css' href='../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a  href="../HomePages/home_admin.php">Home</a></li>
    <li><a href="../TestAdmin/Test_admin_home.php">Tests</a></li>
    <li><a class="active">Users</a></li>
    <li><a href="../Training/training_course_home.php" >Training</a></li>
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
<h1 id='home_header'>USERS</h1>

<p>
    <a href="CreateNewUser/new_user.php" id="circle_images_container">
        <img id="circle_images" src="create_new_user.png" /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    Create New User
</p>
<p>
    <a href="ManageUsers/manage_users.php" id="circle_images_container">
        <img id="circle_images" src="manage_users.png" /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    Manage Users
</p>

<a class="footer"> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->
</body>


</Html>



