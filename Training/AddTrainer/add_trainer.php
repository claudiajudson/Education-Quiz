<?php
// Adding in the configuration file
include('../../config.php');
?>

<Html>
<title>Add Trainer</title>

<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>


<body>

<ul class='navigation_bar'>
    <li><a href="../training_course_home.php">Back</a></li>
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

<h1 id='home_header'>ADD TRAINER</h1>


<div class='form_area'>
    <div class='form_container'>
        <h3>Trainer Form</h3>

        <div id='messageText' class='error'><p><?php if(isset($message)){echo $message;} ?></p></div> <!-- outputting the error message -->
        <div id='messageText' class='alert'><p><?php if(isset($message)){echo $message;} ?></p></div> <!-- outputting the alert message -->

        <!-- creating the form for the input of the new user results -->
        <form class = 'add_trainer_form' action='add_trainer_auth.php' method='post' id='add_trainer_form' autocomplete='off'>

            <?php if(isset($smsg)){ ?><div class='alert alert-success' role='alert'> <?php echo $smsg; ?> </div><?php } ?>
            <input type='text' placeholder='Name of trainer' name='trainer_name' required/> <!-- Required makes sure every input box is filled -->
            <input type='submit' value = 'add'/>

        </form>

        <!-- creating error or alert messages -->
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