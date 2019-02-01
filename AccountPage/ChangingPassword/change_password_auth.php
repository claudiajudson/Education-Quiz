<?php
include('../../config.php');
session_start();

$oldpassword = HashIt($_POST['oldpassword']);
$username = ($_SESSION['user']['Login_Username']);
$newpassword = HashIt($_POST['newpassword']);
$confirmnewpassword = HashIt($_POST['confirmnewpassword']);


$query = ("SELECT Login_Username FROM Application_User WHERE Login_Username='$username' AND Login_Password = '$oldpassword'");
$check = mysqli_query($conn, $query);

//If Username doesn't exsist then go to incorrect login
if(mysqlI_num_rows($check)==1) {
    if ($newpassword == $confirmnewpassword) {
        $query2 = ("UPDATE Application_User SET Login_Password='$newpassword' WHERE Login_Username='$username'");
        $sql1 = mysqli_query($conn, $query2);
        header("location: change_password.php?alert=Password%20Updated!");
    }
    else if ($newpassword <> $confirmnewpassword) {
        header("location: change_password.php?error=New%20password%20and%20confirmation%20password%20don't%20match.");
    }
}
// If old password is the same as new password
else {
    header("location: change_password.php?error=Incorrect%20Login!");

}
