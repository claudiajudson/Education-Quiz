<?php
// Adding in the configuration file
include_once("../../config.php");

if(isset($_POST['update']))
{
    $user_id = $_POST['Id'];

    $name = $_POST['Name'];

    $username = $_POST['username'];

    $password = $_POST['password'];

    $action = $_POST['Status'];

    $type = $_POST['Type'];


    //updating the table
    $result = mysqli_query($conn, "UPDATE Application_User SET Login_Username='$username', Login_Password='$password', Status='$action', Type='$type'WHERE Id=$user_id");

    //redirectig to the display page. In our case, it is index.php

    header("Location: manage_users.php");


}
?>
<?php
//getting id from url
$user_id = $_GET['Id'];

//selecting data associated with this particular id
$query = ("SELECT * FROM Application_User WHERE Id=$user_id");
$result = mysqli_query($conn, $query);

while($res = mysqli_fetch_array($result))
{
    $name = $res['Name'];
    $username = $res['Login_Username'];
    $password = $res['Login_Password'];
    $type = $res['Type'];
    $action = $res['Status'];
}
?>
<Html>
<title>Edit User</title>
<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a href="manage_users.php">Back</a></li>
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
<body>
<h1 id='home_header'>EDIT USER</h1>



<div class="form_area">
    <div class="form_container">
        <h3>Edit User Form</h3>
        <form name="form1" method="post" action="users_edit.php"autocomplete="off">
            <table border="0">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="Name" value="<?php echo $name;?>" required readonly></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $username;?>" required readonly></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="text" name="password" value="<?php echo $password;?>" required></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><input type="radio" name="Type" value="Student" required><br>Student</td>
                    <td><input type="radio" name="Type" value="Administrator"><br>Administrator</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><input type="radio" name="Status" value="Live" required><br>Live</td>
                    <td><input type="radio" name="Status" value="Suspended"><br>Suspended</td>
                </tr>
                <tr>
                    <td><input type="hidden" name="Id" value="<?php echo $_GET['Id'];?>"></td>

                </tr>
            </table>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</div>
