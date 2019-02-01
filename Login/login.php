<?php
// Adding in the configuration file
include('../config.php');
?>

<Html>

<!-- Creating the page login title  -->
<title>Login</title>
<!-- Linking the login page to the css file for styling the login page -->
<link rel='stylesheet' type='text/css' href='login_style.css'/>


<!-- Div tags are used to create the login section, so how much of the page it uses -->
<div class='login_area'>
    <!-- This is the login container div which is what is used to style the container -->
    <div class='login_box'>
        <!-- Creating the login div header -->
        <div id='login_header'><h1 align="center" id='login_form_header'>Assessment Login</h1></div>
        <!-- Adding the image to the login form -->
        <img id='login_img' src='Gentrack.png' title='Gentrack image' />


        <!-- Creating the login form, adding the login auth file to check the login,
        turning auto complete off prevents people from finding out usernames -->
        <form class="login_form" action="./login_auth.php" method="post" id="login_form" autocomplete="off">

            <!-- Using a table for the layout of the login box -->
            <table id="login">
                <tr>
                    <td>Username:</td>
                    <!-- Username input box-->
                    <td><input type="text" name="username" placeholder="Username">
                </tr>
                <tr>
                    <td>Password:</td>
                    <!-- Password input box-->
                    <td><input type="password" name="password" placeholder="Password"/>
                </tr>
            </table>

            <!-- Sign in button to submit form to the login auth-->
            <input type="submit" value="Sign In"/>

        </form>


        <!-- Creating the error tag -->
        <div class="error">
            <p>
                <?php
                if(isset($message)) {
                    echo $message; // Outputting error in login box
                }
                ?>
            </p>
        </div>

        <?php
            if(isset($_GET["error"])){
                // Getting error from auth file if login isn't successful
                echo urldecode($_GET["error"]);
            }
        ?>
    </div>
</div>


<!-- Creating a copyright in the footer -->
<a class="footer"> Copyright  &copy;  2018  Claudia  Judson</a>

</Html>


