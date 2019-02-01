<?php
// Adding in the configuration file
include_once("../../config.php");

if(isset($_POST['update']))
{
    $course_id = $_POST['Id'];

    $name=$_POST['Name'];

    $action = $_POST['Status'];


    $query = ("UPDATE Training_Course SET Name='$name', Status='$action' WHERE Id=$course_id");
    $update = mysqli_query($conn, $query);

    //redirectig to the display page. In our case, it is index.php
    header("Location: manage_course.php");

}
?>
<?php
//getting id from url
$course_id = $_GET['id'];

//selecting data associated with this particular id
$query2 = ("SELECT * FROM Training_Course WHERE Id=$course_id");
$select = mysqli_query($conn, $query2);

while($res = mysqli_fetch_array($select))
{
    $name = $res['Name'];
    $action = $res['Status'];
}
?>
<Html>
<title>Edit Course</title>

<link rel='stylesheet' type='text/css' href='../../general_style.css'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<body>
<ul class='navigation_bar'>
    <li><a href="manage_course.php">Back</a></li>
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
<h1 id='home_header'>EDIT COURSE</h1>



<div class="form_area">
    <div class="form_area">
        <h3>Edit Course Form</h3>
        <form name="form1" method="post" action="courses_edit.php" autocomplete="off">
            <table border="0">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="Name" value="<?php echo $name;?>" required ></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><input type="radio" name="Status" value=Live checked><br>Live</td>
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
