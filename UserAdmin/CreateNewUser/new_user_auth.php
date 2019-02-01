<?php
// Adding in the configuration file
include ('../../config.php');

$username = $_POST['username'] ;
$password = HashIt($_POST['password']);
$confirmpassword = HashIt($_POST['confirmpassword']);
$name = $_POST['name'];
$type = $_POST['Type'];
$action = $_POST['status'];


//$sql = "SELECT * FROM Application_User WHERE Login_Username='$username' OR Name = '$name' LIMIT 1";

//If username already exists
$query = ("SELECT Login_Username FROM Application_User WHERE Login_Username='$username'");
$usernamecheck = mysqli_query($conn, $query);
if(mysqlI_num_rows($usernamecheck)<1) {
    if ($password == $confirmpassword) {
        $query2 = ("INSERT INTO Application_User (Name, Login_Username, Login_Password, Type, Status) VALUES ('$name', '$username', '$password', '$type', '$action')");
        $insert = mysqli_query($conn, $query2);

        header("location: new_user.php?alert=User%20added");
    }
    else {
        header("location: new_user.php?error=Password's%20do%20not%20match");
    }
}
else{
    header("location: new_user.php?error=Error%20$username%20is%20taken");

    }

?>

