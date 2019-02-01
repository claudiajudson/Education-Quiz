<?php
// Adding in the configuration file
include('../config.php');
?>

<Html>

<title>Home</title>
<link rel='stylesheet' type='text/css' href='../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>


<body>

<ul class='navigation_bar'>
    <li><a class='active'>Home</a></li>
    <li><a href='../TestAdmin/Test_admin_home.php'>Tests</a></li>
    <li><a href='../UserAdmin/user_admin_home.php'>Users</a></li>
    <li><a href='../Training/training_course_home.php'>Training</a></li>
    <li class='right' >
        <a href='../AccountPage/account_admin_home.php'>
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['user']['Login_Username'];
            ?>
        </a>
    </li>
</ul>

<h1 id='home_header'>ADMINISTRATOR</h1>


<h2>
    <?php
    if(!isset($_SESSION)){
        session_start();
    }
    echo "Hello ".$_SESSION['user']['Name'];
    ?>
</h2>


</body>

<a class='footer'> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->

</Html>