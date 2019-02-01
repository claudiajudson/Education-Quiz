<?php
// Adding in the configuration file
include('../../config.php');
?>

<Html>
<title>Create Users</title>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a href="../user_admin_home.php">Back</a></li>
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
<h1 id='home_header'> CREATE USER </h1>




<!-- creating the body part of the page -->

<div class="form_area">
    <div class="form_container">
        <h3>Registration Form</h3>
        <form class = "new_user_form" action="./new_user_auth.php" method="post"  id="create_user_form" autocomplete="off">
            <table border="0">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" placeholder="Full Name" name="name" required/></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" placeholder="User Name" name="username" required/></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" placeholder="Password" name="password" required/></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" placeholder="Confirm Password" name="confirmpassword" required/></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><input type="radio" name="Type" value="Student" required><br>Student</td>
                    <td><input type="radio" name="Type" value="Administrator"><br>Administrator</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><input type="radio" name="status" value="Live" required><br>Live</td>
                    <td><input type="radio" name="status" value="Suspended"><br>Suspended</td>
                </tr>


                <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>

                <div id="messageText" class="error"><p><?php if(isset($message)){echo $message;} ?></p></div> <!-- outputting the error message -->
                <div id="messageText" class="alert"><p><?php if(isset($message)){echo $message;} ?></p></div> <!-- outputting the alert message -->
            </table>
            <input type="submit" value = "register">
        </form>
        <?php
        if(isset($_GET["error"])){
            echo urldecode($_GET["error"]);
        }
        if(isset($_GET["alert"])){
            echo urldecode($_GET["alert"]);
        }
        ?>
    </div>
</div>





</body>
<a class="footer"> Copyright  &copy;  2018  Claudia  Judson</a> <!-- Creating a copyright in the footer -->
</Html>

