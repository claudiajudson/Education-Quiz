<?php
// including the database connection file
include_once("../../config.php");

if(isset($_POST['update']))
{
    $trainer_id = $_POST['Id'];

    $name=$_POST['Name'];

    $action = $_POST['Status'];

    //updating the table
    $query =("UPDATE Trainer SET Name='$name', Status='$action' WHERE Id=$trainer_id");
    $update = mysqli_query($conn, $query);

    //redirectig to the display page. In our case, it is index.php
    header("Location: manage_trainers.php");

}
?>
<?php
//getting id from url
$trainer_id = $_GET['id'];

//selecting data associated with this particular id
$query2 = ("SELECT * FROM Trainer WHERE Id=$trainer_id");
$select = mysqli_query($conn, $query2);

while($res = mysqli_fetch_array($select))
{
    $name = $res['Name'];
    $action = $res['Status'];
}
?>
<Html>
<title>Edit Trainer</title>

<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a href="manage_trainers.php">Back</a></li>
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
<h1 id='home_header'>EDIT TRAINER</h1>




<div class="form_area">
    <div class="form_container">
        <h3>Edit Trainer Form</h3>
        <form name="form1" method="post" action="trainers_edit.php" autocomplete="off">
            <table border="0">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="Name" value="<?php echo $name;?>" required></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><input type="radio" name="Status" value=Live required><br>Live</td>
                    <td><input type="radio" name="Status" value=Suspended><br>Suspended</td>
                </tr>
                <tr>
                    <td><input type="hidden" name="Id" value="<?php echo $_GET['id'];?>"></td>
                </tr>
            </table>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</div>
