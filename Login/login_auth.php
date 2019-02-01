<?php
include('../config.php'); //Adding in the configuration file to this auth file.

$username = $_POST["username"]; // Getting the value the user inputted in username box
$password = ($_POST["password"]); // Getting the value the user inputted in password box


$sql = "SELECT * FROM Application_User WHERE Login_Username='$username' AND Login_password = '$password' LIMIT 1";
if($res = $conn->query($sql)){

    if($row = $res->fetch_assoc()) {
            session_start();

        if ($row['Status'] == "Live") {
            $_SESSION["user"] = $row;
            $role = $row['Type'];

            if ($role == "Administrator") {
                header("location:../HomePages/home_admin.php");
            }

            else if ($role == "Student") {
                header("location:../HomePages/home_user.php");
            }
        }

        else {
            header("location: login.php?error=User%20denied%20access");
        }
    }
    else {
        header("location: login.php?error=Incorrect%20Login");
    }
}

?>

