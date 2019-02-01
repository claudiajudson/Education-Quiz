<?php
// Adding in the configuration file
include('../../config.php');
?>

<Html>

<link rel="stylesheet" type="text/css" href="change_password.css"/> <!-- Linking the login page to the css file for styling the login page -->
<link rel="stylesheet" type="text/css" href="../../general_style.css"/>
<body>
<?php
if(!isset($_SESSION)){
    session_start();
}
echo "Hello ".$_SESSION["user"]["Name"];
echo "USERNAME: ".$_SESSION["user"]["Login_Username"];

?>

<div class="form_area">
    <div class="form_container">
        <h3>Change Password Form</h3>
        <div id="messageText" class="error"><p><?php if(isset($message)){echo $message;} ?></p></div>
        <div id="messageText" class="alert"><p><?php if(isset($message)){echo $message;} ?></p></div>
        <form class="login_form" action="change_password_auth.php" method="post" id="change_password_form" autocomplete="off">
            <table border="0">
                <tr>
                    <td>User name:</td>
                    <td><input type='text' name='Username'  readonly value='<?php echo $_SESSION['user']['Login_Username'] ?>'></td>
                </tr>
                <tr>
                    <td>Old Password:</td>
                    <td><input type="password" name="oldpassword" placeholder="Old Password" id="password" required/></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="newpassword" placeholder="New Password" id="password" required/></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirmnewpassword" placeholder="Confirm New Password" id="password" required/></td>
                </tr>
                <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>

                <div id="messageText" class="error"><p><?php if(isset($message)){echo $message;} ?></p></div> <!-- outputting the error message -->
                <div id="messageText" class="alert"><p><?php if(isset($message)){echo $message;} ?></p></div> <!-- outputting the alert message -->
            </table>
            <input type="submit" value="Update Password" />
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

