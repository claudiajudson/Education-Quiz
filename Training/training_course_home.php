<?php
// Adding in the configuration file
include('../config.php');
?>


<Html>
<title>Training Settings</title>
<link rel='stylesheet' type='text/css' href='../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a  href="../HomePages/home_admin.php">Home</a></li>
    <li><a href="../TestAdmin/Test_admin_home.php">Tests</a></li>
    <li><a href="../UserAdmin/user_admin_home.php">Users</a></li>
    <li><a class="active" >Training</a></li>
    <li class="right" ><a href="../AccountPage/account_admin_home.php" ><?php
            if(!isset($_SESSION)){
                session_start();

            }
            echo $_SESSION["user"]["Login_Username"];


            ?></a></li>
</ul>
<h1 id='home_header'>TRAINING HOME</h1>


<p>
    <a href="AddTrainer/add_trainer.php" id="circle_images_container">
        <img id="circle_images" src="add_user.png" /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    Add Trainer
</p>


<p>
    <a href="ManageTrainers/manage_trainers.php" id="circle_images_container">
        <img id="circle_images" src="manage_trainers.png" /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    Manage Trainers
</p>

<p>
    <a href="AddTrainingCourse/training_course.php" id="circle_images_container">
        <img id="circle_images" src="add_course.png" /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    Add Training Course
</p>

<p>
    <a href="ManageCourses/manage_course.php" id="circle_images_container">
        <img id="circle_images" src="manage_courses.png" /> <!--https://www.flaticon.com/packs/modern-education-->
    </a>
    Manage Courses
</p>




<a class="footer"> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->
</body>


</Html>



