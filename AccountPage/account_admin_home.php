<?php
// Adding in the configuration file
include('../config.php');
?>
<Html>
<title>Account</title>
<link rel='stylesheet' type='text/css' href='../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a  href="../HomePages/home_admin.php">Home</a></li>
    <li><a href="../TestAdmin/Test_admin_home.php">Tests</a></li>
    <li><a href="../UserAdmin/user_admin_home.php">Users</a></li>
    <li><a href="../Training/training_course_home.php">Training</a></li>
    <li class="right" ><a  class="active">Account</a></li>
</ul>
<h1 style="font-family: Verdana, Geneva, sans-serif;">ACCOUNT</h1>
<h2>
    <?php
    if(!isset($_SESSION)){
        session_start();
    }
    echo "Hello ".$_SESSION["user"]["Name"];

    echo "USERNAME: ".$_SESSION["user"]["Login_Username"];
    ?>
</h2>
<p>
    <a href="Logout/logout.php" id="circle_images_container">
        <img id="circle_images" src="logout.png" /> <!--https://www.flaticon.com/search?word=logout-->
    </a>
    Logout
</p>

<p>
    <a href="ChangingPassword/change_password.php" id="circle_images_container">
        <img id="circle_images" src="change_password.png" /> <!--https://www.flaticon.com/search?word=logout-->
    </a>
    Changing Password
</p>


<a class="footer"> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->
</body>


</Html>



